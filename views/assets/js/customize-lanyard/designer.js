/* The design flow owns selections and preview; existing account/cart forms
   remain the integration boundary for the site's order system. */
class LanyardDesigner {
  constructor() {
    this.panel = document.getElementById('customize-lanyard');
    this.step = 0;
    this.back = false;
    this.flat = false;
    this.guides = false;
    this.active = false;
    this.busy = false;
    this.uploadVersion = {};
    this.steps = ['Lanyard', 'Printing', 'Fittings', 'Your design', 'Review'];
    this.root = document.createElement('div');
    this.root.className = 'ld-dialog';
    this.root.setAttribute('role', 'dialog');
    this.root.setAttribute('aria-modal', 'true');
    this.root.setAttribute('aria-labelledby', 'ld-title');
    this.root.innerHTML = `
      <header class="ld-header"><div><span class="ld-eyebrow">LANYARDS FOR YOU</span><h2 id="ld-title">Make it yours.</h2></div><button class="ld-close" data-action="close" aria-label="Close designer">×</button></header>
      <nav class="ld-steps" aria-label="Personalisation steps"></nav>
      <div class="ld-body"><div class="ld-preview"><div class="ld-preview-top"><span>LIVE PREVIEW</span><div class="ld-view-controls"><button data-action="front" aria-pressed="true">Front</button><button data-action="back" aria-pressed="false">Back</button><button data-action="layout" aria-pressed="false">Print layout</button></div></div>
        <div class="ld-drawing"></div><div class="ld-preview-caption"></div><label class="ld-guides"><input type="checkbox" data-guides> Show print area</label><p class="ld-preview-note">Visual guide. Colours and final print placement are confirmed in your artwork proof.</p>
      </div><div class="ld-options"><div class="ld-step-heading"><span class="ld-eyebrow" id="ld-step-number"></span><h3 id="ld-step-title" tabindex="-1"></h3><p id="ld-step-intro"></p></div>
        <div class="ld-fields"></div><div class="ld-account" hidden></div>
        <div class="ld-message" role="status" aria-live="polite"></div>
      </div></div>
      <footer class="ld-footer"><div class="ld-quantity"><label for="ld-quantity">Quantity</label><input id="ld-quantity" type="number" inputmode="numeric" min="1" step="1" value="100"></div><div class="ld-cost"><strong id="ld-unit"></strong><span id="ld-total"></span></div><div class="ld-actions"><button class="ld-secondary" data-action="previous">Back</button><button class="ld-primary" data-action="next">Continue</button></div></footer>`;
    this.panel.appendChild(this.root);
    this.panel.classList.add('designer-enabled');
    this.fields = this.root.querySelector('.ld-fields');
    this.account = this.root.querySelector('.ld-account');
    this.forms = {
      login: document.getElementById('login2'), register: document.getElementById('register2'),
      address: this.panel.querySelector('.provided_information'), checkout: this.panel.querySelector('section.checkout')
    };
    for (const form of Object.values(this.forms)) this.account.appendChild(form);
    const checkoutButtons = document.getElementById('container_button_boxes_checkout');
    this.forms.checkout.appendChild(checkoutButtons);
    document.getElementById('add_to_cart_from_buy_cart').textContent = 'Add to cart';
    document.getElementById('login2Email').setAttribute('aria-label', 'Email address');
    document.getElementById('login2Password').setAttribute('aria-label', 'Password');
    for (const [id, label] of [['register2Name','Name'],['register2Email','Email address'],['register2Password','Password']]) document.getElementById(id).setAttribute('aria-label', label);
    for (const id of ['openRegister2','openLogin2','password_forgotten2']) {
      const link = document.getElementById(id);
      link.setAttribute('role', 'button');
      link.tabIndex = 0;
      link.addEventListener('keydown', event => {
        if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); link.click(); }
      });
    }
    this.root.addEventListener('click', event => this.click(event));
    this.root.addEventListener('input', event => this.input(event));
    this.root.addEventListener('change', event => this.change(event));
    this.root.addEventListener('keydown', event => this.keydown(event));
    this.panel.addEventListener('click', event => { if (event.target === this.panel) this.close(); });

    // Login/register callbacks already use these public controller methods.
    customizeLanyard.openProvidedInformation = () => this.showAccount('address');
    customizeLanyard.openLogin = () => this.showAccount('login');
    customizeLanyard.openCheckout = () => this.showAccount('checkout');
    customizeLanyard.openMaterial = () => { if (this.active) this.go(0); };
    customizeLanyard.openArtWorkManual = () => { if (this.active) this.go(3); };
    customizeLanyard.handlePreviewClick = () => this.previous();
    const originalLogin = classlogin2.openLogin.bind(classlogin2);
    const originalRegister = classRegister2.openRegister.bind(classRegister2);
    classlogin2.openLogin = visible => visible && this.active && this.artwork ? this.showAccount('login') : originalLogin(visible);
    classRegister2.openRegister = visible => visible && this.active && this.artwork ? this.showAccount('register') : originalRegister(visible);
    const originalDetails = checkoutClass.obtainProductDetails.bind(checkoutClass);
    checkoutClass.obtainProductDetails = () => {
      if (this.active && this.artwork) checkoutClass.setProductDetails(this.artwork);
      else originalDetails();
    };
  }
  async open(options = {}) {
    let catalogue = customizeLanyard.getJsonLanyards();
    if (!Array.isArray(catalogue) || !catalogue.length) {
      chargingClass.hideShowchargin(true);
      try { await material.makeAjaxRequestGetAllMaterials(); }
      finally { chargingClass.hideShowchargin(false); }
      catalogue = customizeLanyard.getJsonLanyards();
    }
    if (!Array.isArray(catalogue) || !catalogue.length) {
      alert('The customiser could not load. Please try again shortly.');
      return false;
    }
    if (!this.model) this.model = new LanyardDesign.Model(catalogue, {material: options.material || 'Dye Sub polyester'});
    else if (options.material) this.model.update('material', options.material);
    if (options.bestSeller) Object.assign(this.model.state, {material:'Dye Sub polyester', type:'one-end', width:'20mm', sides:'two-side', colours:'full-colour', clip:'dog_clip', attachment:'none', accessory:'none'});
    this.model.normalize();
    this.opener = document.activeElement;
    this.active = true;
    this.panel.style.display = 'flex';
    document.body.classList.add('ld-open');
    this.go(options.bestSeller ? 3 : 0);
    return true;
  }
  close() {
    this.active = false;
    this.panel.style.display = 'none';
    document.body.classList.remove('ld-open');
    if (this.opener && this.opener.isConnected) this.opener.focus();
  }
  go(step) {
    if (this.busy) return;
    this.step = Math.max(0, Math.min(4, step));
    this.accountMode = null;
    this.account.hidden = true;
    this.fields.hidden = false;
    Object.values(this.forms).forEach(form => { form.style.display = 'none'; });
    this.render();
    this.root.querySelector('.ld-options').scrollTop = 0;
    this.root.querySelector('.ld-body').scrollTop = 0;
    this.root.querySelector('#ld-step-title').focus({preventScroll:true});
  }
  message(text) { this.root.querySelector('.ld-message').textContent = text; }
  choose(key, value) {
    const before = {...this.model.state};
    this.model.update(key, value);
    material.setMaterialSelected(this.model.state.material);
    this.artwork = null;
    this.render();
    const adjusted = ['width','sides','colours','quantity'].filter(k => k !== key && before[k] !== this.model.state[k]);
    if (adjusted.length) this.message('Options updated to match the selected material and available catalogue.');
  }
  click(event) {
    const button = event.target.closest('button');
    if (!button || !this.root.contains(button) || this.busy) return;
    if (button.dataset.key) return this.choose(button.dataset.key, button.dataset.value);
    if (button.dataset.step) return this.go(Number(button.dataset.step) - 1);
    switch (button.dataset.action) {
      case 'close': this.close(); break;
      case 'previous': this.previous(); break;
      case 'next': this.next(); break;
      case 'front': this.flat = false; this.back = false; this.renderPreview(); break;
      case 'back': this.flat = false; this.back = true; this.renderPreview(); break;
      case 'layout': this.flat = true; this.back = false; this.renderPreview(); break;
      case 'remove-logo': this.uploadVersion.logo = (this.uploadVersion.logo || 0) + 1; this.choose('logo', ''); break;
      case 'download': this.download(); break;
    }
  }
  input(event) {
    const input = event.target;
    if (input.id === 'ld-quantity' || input.type === 'file') return;
    if (input.dataset.field) {
      this.model.update(input.dataset.field, input.type === 'checkbox' ? input.checked : input.value);
      this.artwork = null;
      this.renderPreview();
      this.renderPrice();
      const output = this.root.querySelector(`[data-output="${input.dataset.field}"]`);
      if (output) output.textContent = this.rangeValue(input.dataset.field);
    }
  }
  change(event) {
    const input = event.target;
    if (input.id === 'ld-quantity') return this.choose('quantity', input.value);
    if (input.dataset.upload) return this.upload(input.dataset.upload, input.files[0]);
    if (input.hasAttribute('data-guides')) { this.guides = input.checked; this.renderPreview(); }
    if (input.dataset.field === 'sameArtwork') this.render();
  }
  keydown(event) {
    if (event.key === 'Escape') { event.preventDefault(); this.close(); }
    if (event.key === 'Tab') {
      const visible = [...this.root.querySelectorAll('button,input,select,a[href],textarea,[role="button"]')].filter(el => !el.disabled && el.getClientRects().length);
      const first = visible[0], last = visible[visible.length-1];
      if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
      else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
    }
  }
  previous() {
    if (this.accountMode === 'checkout') this.showAccount('address');
    else if (this.accountMode === 'register') this.showAccount('login');
    else if (this.accountMode) this.go(4);
    else this.go(this.step - 1);
  }
  async next() {
    if (this.accountMode === 'address') {
      if (!providedInformation.checkEmptyValues()) return this.message('Complete the required address fields to continue.');
      return this.showAccount('checkout');
    }
    if (this.accountMode) return;
    if (!this.model.quote().available) return this.message(this.model.quote().message);
    if (this.step >= 3 && this.model.designError()) return this.message(this.model.designError());
    if (this.step < 4) return this.go(this.step + 1);
    this.busy = true;
    this.renderPrice();
    this.message('Preparing your artwork…');
    try {
      await document.fonts.ready;
      const [left, right] = await Promise.all(['left','right'].map(leg => this.png(LanyardPreview.svg(this.model.state, {flat:true, leg}))));
      this.artwork = {artworkLeft:left, artworkRight:right};
      this.syncOrder();
      if (this.active) this.showAccount(menuClass.getActiveSession() ? 'address' : 'login');
    } catch (error) { this.message('The artwork could not be prepared. Please try another PNG or JPEG image.'); }
    finally { this.busy = false; this.renderPrice(); }
  }
  option(key, value, label, detail = '', image = '') {
    const e = LanyardDesign.escape;
    return `<button type="button" class="ld-choice ${this.model.state[key] === value ? 'is-selected' : ''}" data-key="${key}" data-value="${e(value)}" aria-pressed="${this.model.state[key] === value}">${image ? `<img src="${e(image)}" alt="" loading="lazy">` : ''}<span><strong>${e(label)}</strong>${detail ? `<small>${e(detail)}</small>` : ''}</span><span class="ld-choice-check" aria-hidden="true">✓</span></button>`;
  }
  group(title, choices, className = '') { return `<fieldset class="ld-group ${className}"><legend>${title}</legend><div class="ld-choices">${choices}</div></fieldset>`; }
  asset(path) { return new URL('../../' + path.replace(/^\//,''), location.href).href; }
  render() {
    const s = this.model.state, D = LanyardDesign, e = D.escape;
    this.root.querySelector('.ld-steps').innerHTML = this.steps.map((label,i) => `<button data-step="${i+1}" ${i === this.step ? 'aria-current="step"' : ''}><span>${i+1}</span>${label}</button>`).join('');
    this.root.querySelector('#ld-step-number').textContent = `STEP ${this.step+1} OF 5`;
    this.root.querySelector('#ld-step-title').textContent = ['Start with the right lanyard.','Choose your print.','Make the connection.','Bring your brand to life.','Check every detail.'][this.step];
    this.root.querySelector('#ld-step-intro').textContent = ['Choose a material, width and shape. Only compatible options are shown.','Choose the printed faces, ink options and fabric colour.','Clips and quick releases are fitted to each end. Accessories are one per lanyard.','Add text and a logo, or upload a finished strip design.','Your selections, artwork and item subtotal, together in one place.'][this.step];
    if (this.step === 0) {
      this.fields.innerHTML = this.group('Material', this.model.catalogue.map(m => this.option('material',m.material,D.name(m.material),m.description,this.asset(m.linkImg))).join(''),'ld-materials') +
        this.group('Width', this.model.material.width.map(w => this.option('width',w.width,w.width)).join(''),'ld-pills') +
        this.group('Lanyard ends', this.model.material.lanyardType.slice().sort((a,b)=>Number(a.price)-Number(b.price)).map(t=>this.option('type',t.type,D.name(t.type),t.type==='one-end'?'One clip for a badge or keys':'Two clips for a wider badge')).join(''));
    } else if (this.step === 1) {
      this.fields.innerHTML = this.group('Printed faces',this.model.width.sidePrinted.map(x=>this.option('sides',x.noSides,D.name(x.noSides))).join('')) +
        this.group('Print colours',this.model.sides.noColours.map(x=>this.option('colours',x.noColour,D.name(x.noColour))).join('')) +
        `<p class="ld-hint">${s.sides==='two-side'?'The same design will be printed on both faces.':'The reverse of the strap stays unprinted.'}</p>` +
        `<fieldset class="ld-group"><legend>Strap colour</legend><div class="ld-swatches">${['#173f61','#101820','#ffffff','#b61d35','#176859','#2563b1','#efb931','#823a89'].map(c=>`<button data-key="background" data-value="${c}" style="--swatch:${c}" aria-label="Strap colour ${c}" aria-pressed="${s.background===c}"></button>`).join('')}</div><label class="ld-colour-field">Custom colour <input type="color" data-field="background" value="${s.background}"></label></fieldset>`;
    } else if (this.step === 2) {
      const ends = s.type==='two-end'?2:1;
      this.fields.innerHTML = this.group(`${ends} ${ends===1?'clip':'clips'}`,this.model.width.clips.map(c=>this.option('clip',c.name,D.name(c.name),`+${this.money(Number(c.price)*ends*100)} / lanyard`,this.asset(c.imgLinkOneEnd))).join(''),'ld-hardware') +
        this.group('Quick release',D.attachments.map(a=>this.option('attachment',a.id,a.label,`+${this.money(a.price*ends*100)} / lanyard`)).join('')) +
        `<label class="ld-select-label" for="ld-accessory">Accessory</label><select id="ld-accessory" data-field="accessory">${D.accessories.map(a=>`<option value="${e(a.id)}" ${s.accessory===a.id?'selected':''}>${e(a.label)} · +${this.money(a.price*100)}</option>`).join('')}</select>`;
    } else if (this.step === 3) {
      this.fields.innerHTML = this.group('Design method',this.option('mode','manual','Text & logo','Build your design here')+this.option('mode','artwork','Upload artwork','Use a finished strip design'));
      if (s.mode === 'manual') this.fields.innerHTML += `
        <label class="ld-select-label" for="ld-text">Your text</label><input id="ld-text" type="text" maxlength="80" data-field="text" value="${e(s.text)}" placeholder="Your company, event or message">
        <div class="ld-form-row"><label>Font<select data-field="font">${['Arial','Verdana','Georgia','Trebuchet MS'].map(f=>`<option ${s.font===f?'selected':''}>${f}</option>`).join('')}</select></label><label>Text colour<input type="color" data-field="ink" value="${s.ink}"></label></div>
        <div class="ld-checks"><label><input type="checkbox" data-field="bold" ${s.bold?'checked':''}> Bold</label><label><input type="checkbox" data-field="italic" ${s.italic?'checked':''}> Italic</label><label><input type="checkbox" data-field="underline" ${s.underline?'checked':''}> Underline</label></div>
        ${this.range('textScale','Text size',.25,.8,.01)}${this.range('repeats','Repeats per leg',1,6,1)}${this.range('offset','Print position',-10,10,1)}
        <div class="ld-upload"><label for="ld-logo">${s.logo?'Replace logo':'Add your logo'}</label><input id="ld-logo" type="file" accept="image/png,image/jpeg,image/webp" data-upload="logo"><small>PNG, JPEG or WebP · up to 1 MB. Transparent PNG works best.</small>${s.logo?'<button class="ld-text-button" data-action="remove-logo">Remove logo</button>':''}</div>
        ${s.logo?this.range('logoScale','Logo size',.3,.9,.01)+this.range('logoRotation','Logo rotation',0,360,90):''}`;
      else this.fields.innerHTML += `<div class="ld-upload"><label for="ld-art-left">${s.artworkLeft?'Replace left-leg artwork':'Left-leg artwork'}</label><input id="ld-art-left" type="file" accept="image/png,image/jpeg,image/webp" data-upload="artworkLeft"><small>Upload a horizontal strip. Its proportions are preserved.</small></div>
        <label class="ld-checks"><input type="checkbox" data-field="sameArtwork" ${s.sameArtwork?'checked':''}> Use the same artwork on both legs</label>
        ${!s.sameArtwork?`<div class="ld-upload"><label for="ld-art-right">${s.artworkRight?'Replace right-leg artwork':'Right-leg artwork'}</label><input id="ld-art-right" type="file" accept="image/png,image/jpeg,image/webp" data-upload="artworkRight"><small>PNG, JPEG or WebP · up to 1 MB.</small></div>`:''}`;
      if (s.colours!=='full-colour') this.fields.innerHTML += `<p class="ld-hint">Your logo and artwork should use ${s.colours==='one-colour'?'one print colour':'no more than two print colours'}. Choose a dye-sublimation material for full-colour artwork.</p>`;
    } else this.fields.innerHTML = this.review();
    this.message('');
    this.renderPreview();
    this.renderPrice();
  }
  range(key,label,min,max,step) {
    return `<label class="ld-range">${label}<output data-output="${key}">${this.rangeValue(key)}</output><input type="range" data-field="${key}" min="${min}" max="${max}" step="${step}" value="${this.model.state[key]}"></label>`;
  }
  rangeValue(key) {
    const value=this.model.state[key];
    return ['textScale','logoScale'].includes(key)?`${Math.round(value*100)}%`:key==='offset'?`${value}%`:key==='logoRotation'?`${value}°`:value;
  }
  review() {
    const s=this.model.state,D=LanyardDesign,e=D.escape,q=this.model.quote();
    const rows=[['Material',D.name(s.material),0],['Shape & width',`${D.name(s.type)} · ${s.width}`,0],['Printing',`${D.name(s.sides)} · ${D.name(s.colours)}`,1],['Strap colour',s.background,1],['Clip',D.name(s.clip),2],['Quick release',D.attachments.find(a=>a.id===s.attachment).label,2],['Accessory',D.accessories.find(a=>a.id===s.accessory).label,2],['Design',s.mode==='artwork'?'Uploaded strip artwork':s.text || (s.logo?'Logo only':'Plain lanyard'),3]];
    return `<dl class="ld-review">${rows.map(([k,v,i])=>`<div><dt>${k}</dt><dd>${e(v)}</dd><button data-step="${i+1}" aria-label="Edit ${k.toLowerCase()}">Edit</button></div>`).join('')}</dl>
      ${q.available?`<div class="ld-breakdown"><h4>Per lanyard</h4>${q.lines.filter(l=>l.cents||l.key==='base').map(l=>`<div><span>${e(l.label)}</span><strong>${this.money(l.cents)}</strong></div>`).join('')}</div>`:''}
      <button class="ld-secondary" data-action="download">Download preview</button>`;
  }
  renderPreview() {
    const s = this.model.state;
    this.root.querySelector('.ld-drawing').innerHTML = this.flat ? `<div class="ld-flat">${['left','right'].map(leg=>`<div><span>${leg==='left'?'Left leg':'Right leg'}</span>${LanyardPreview.svg(s,{flat:true,leg,id:`flat-${leg}`})}</div>`).join('')}<p>The same artwork used for your order. ${s.sides==='two-side'?'Repeated on both printed faces.':'Reverse unprinted.'}</p></div>` : LanyardPreview.svg(s,{back:this.back,guides:this.guides});
    this.root.querySelector('.ld-preview-caption').textContent = `${LanyardDesign.name(s.material)} · ${s.width} · ${this.back && s.sides==='one-side'?'Unprinted reverse':LanyardDesign.name(s.type)}`;
    this.root.querySelector('[data-action="front"]').setAttribute('aria-pressed',!this.back&&!this.flat);
    this.root.querySelector('[data-action="back"]').setAttribute('aria-pressed',this.back&&!this.flat);
    this.root.querySelector('[data-action="layout"]').setAttribute('aria-pressed',this.flat);
    this.root.querySelectorAll('[data-key="background"]').forEach(button=>button.setAttribute('aria-pressed',button.dataset.value===s.background));
  }
  money(cents) { return new Intl.NumberFormat('en-GB',{style:'currency',currency:'GBP'}).format(cents/100); }
  renderPrice() {
    const q=this.model.quote(),quantity=this.root.querySelector('#ld-quantity');
    quantity.value=this.model.state.quantity;
    quantity.max=this.model.maxQuantity;
    quantity.disabled=!!this.accountMode || this.busy;
    this.root.querySelector('#ld-unit').textContent=q.available?`${this.money(q.unitCents)} / lanyard`:'Price unavailable';
    this.root.querySelector('#ld-total').textContent=q.available?`${this.money(q.totalCents)} item subtotal`:q.message;
    const next=this.root.querySelector('[data-action="next"]');
    next.textContent=this.busy?'Preparing…':this.accountMode==='address'?'Review order':this.step===4?'Continue to order':'Continue';
    next.disabled=this.busy||!q.available;
    next.hidden=['login','register','checkout'].includes(this.accountMode);
    this.root.querySelector('[data-action="previous"]').hidden=!this.accountMode && this.step===0;
  }
  async upload(key,file) {
    if (!file) return;
    const version=this.uploadVersion[key]=(this.uploadVersion[key]||0)+1;
    if (!['image/png','image/jpeg','image/webp'].includes(file.type)||file.size>1024*1024) return this.message('Choose a PNG, JPEG or WebP image smaller than 1 MB.');
    this.message('Loading image…');
    try {
      const data=await new Promise((resolve,reject)=>{const reader=new FileReader();reader.onload=()=>resolve(reader.result);reader.onerror=reject;reader.readAsDataURL(file);});
      const img=await this.image(data);
      if (!img.naturalWidth||!img.naturalHeight||img.naturalWidth*img.naturalHeight>24000000) throw new Error('Image too large');
      if (this.uploadVersion[key]!==version) return;
      this.choose(key,data);
      this.message('Image added. Its proportions are preserved in the preview.');
    } catch(error) { this.message('This image could not be read. Please choose another PNG, JPEG or WebP.'); }
  }
  image(src) { return new Promise((resolve,reject)=>{const img=new Image();img.onload=()=>resolve(img);img.onerror=reject;img.src=src;}); }
  async png(svg) {
    const url=URL.createObjectURL(new Blob([svg],{type:'image/svg+xml;charset=utf-8'}));
    try {
      const img=await this.image(url),canvas=document.createElement('canvas');
      canvas.width=img.naturalWidth;canvas.height=img.naturalHeight;
      canvas.getContext('2d').drawImage(img,0,0);
      return canvas.toDataURL('image/png');
    } finally { URL.revokeObjectURL(url); }
  }
  download() {
    const svg=LanyardPreview.svg(this.model.state,{id:'download',back:this.back});
    const url=URL.createObjectURL(new Blob([svg],{type:'image/svg+xml'}));
    const link=document.createElement('a');link.href=url;link.download='my-lanyard-preview.svg';link.click();
    setTimeout(()=>URL.revokeObjectURL(url),1000);
  }
  syncOrder() {
    const s=this.model.state,q=this.model.quote();
    if (!q.available||!this.artwork) throw new Error('Design is not ready.');
    material.setMaterialSelected(s.material);oneTwoEndsClass.setTypeLanyardSelected(s.type);widthClass.setWidthSelected(s.width);
    sidePrintedClass.setSidePrintedSelected(s.sides);colourClass.setColourSelected(s.colours);clipClass.setClipSelected(s.clip);
    attachmentClass.setAttachmentSelected(s.attachment);accessoriesClass.setAccessoriesSelected(s.accessory);
    backgroundClass.setBackground(s.background);backgroundClass.setNewColour(true);
    priceClass.setAmountSelected(s.quantity);
    const prices=Object.fromEntries(q.lines.map(l=>[l.key,l.cents/100]));
    priceClass.setPricePerMaterialWithAmount(prices.base);priceClass.setPriceLanyardType(prices.type);
    priceClass.setPriceWidth(0);priceClass.setPriceSidePrinted(0);priceClass.setPriceColour(0);
    priceClass.setPriceClip(prices.clip);priceClass.setPriceAttachment(prices.attachment);priceClass.setPriceAccessory(prices.accessory);
    // Freeze the composed artwork so the order uses the exact layout previewed.
    artworkManualClass.setArtworkManual('artwork');
    artworkClass.setArtworkLeft(this.artwork.artworkLeft);artworkClass.setArtworkRight(this.artwork.artworkRight);
    checkoutClass.setDescription(this.model.description());checkoutClass.setProductDetails(this.artwork);
  }
  showAccount(mode) {
    if (!this.artwork) return this.go(4);
    this.accountMode=mode;
    this.fields.hidden=true;this.account.hidden=false;
    Object.values(this.forms).forEach(form=>{form.style.display='none';});
    this.forms[mode].style.display='block';
    customizeLanyard.setCurrentSectionOpen({login:13,register:13,address:14,checkout:15}[mode]);
    this.root.querySelector('#ld-step-number').textContent='YOUR ORDER';
    this.root.querySelector('#ld-step-title').textContent={login:'Save your design to your account.',register:'Create an account for your design.',address:'Where should we send it?',checkout:'Ready for your cart.'}[mode];
    this.root.querySelector('#ld-step-intro').textContent='Your lanyard design is kept while you complete these details.';
    if(mode==='address') providedInformation.getAddresses();
    if(mode==='checkout') {this.syncOrder();checkoutClass.updateItems();document.getElementById('container_button_boxes_checkout').style.display='flex';}
    this.message('');this.renderPrice();
    this.root.querySelector('.ld-options').scrollTop=0;
    this.root.querySelector('.ld-body').scrollTop=0;
    this.root.querySelector('#ld-step-title').focus({preventScroll:true});
  }
}
var lanyardDesigner;
document.addEventListener('DOMContentLoaded',()=>{lanyardDesigner=new LanyardDesigner();});
