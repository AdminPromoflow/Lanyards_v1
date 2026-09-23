/* Shared, DOM-independent selection and pricing rules for the designer. */
(function (root, factory) {
  const api = factory();
  if (typeof module === 'object' && module.exports) module.exports = api;
  else root.LanyardDesign = api;
})(typeof window === 'undefined' ? globalThis : window, function () {
  'use strict';
  const labels = {
    'one-end': 'Single ended', 'two-end': 'Double ended',
    'one-side': 'Front only', 'two-side': 'Both sides',
    'one-colour': '1 print colour', 'two-colour': '2 print colours', 'full-colour': 'Full colour',
    dog_clip: 'Standard dog clip', swvel_clip: 'Swivel clip', crocodile_clip: 'Crocodile clip',
    metal_j_hook: 'Metal J hook', crab_hook: 'Crab hook', slide_clip: 'Slide clip',
    'Dye Sub polyester': 'Dye-sublimation polyester', 'Dye Sub RPET': 'Dye-sublimation RPET'
  };
  const attachments = [
    {id: 'none', label: 'No quick release', price: 0},
    {id: 'Black', label: 'Black quick release', price: .6},
    {id: 'Metal', label: 'Metal quick release', price: .2},
    {id: 'Plastic colour', label: 'Coloured quick release', price: .65}
  ];
  const accessories = [
    {id: 'none', label: 'No accessory', price: 0},
    {id: 'Clear Plastic (closed face)', label: 'Clear rigid card holder', price: .3, kind: 'card'},
    {id: 'Coloured Plastic (closed face)', label: 'Coloured rigid card holder', price: .3, kind: 'card'},
    {id: 'Coloured Plastic (open face)', label: 'Open-face card holder', price: .25, kind: 'card'},
    {id: '86 x 56mm', label: 'Plastic wallet · 86 × 56 mm', price: .12, kind: 'wallet'},
    {id: '103 x 70mm', label: 'Plastic wallet · 103 × 70 mm', price: .13, kind: 'wallet'},
    {id: '138 x 88mm', label: 'Plastic wallet · 138 × 88 mm', price: .14, kind: 'wallet'},
    {id: 'Retractable Reel Plastic', label: 'Plastic retractable reel', price: .5, kind: 'reel'},
    {id: 'Retractable Reel Round', label: 'Round retractable reel', price: .85, kind: 'reel'},
    {id: 'Retractable Reel Oval', label: 'Oval retractable reel', price: .85, kind: 'reel'},
    {id: 'Retractable Reel Metal', label: 'Metal retractable reel', price: 1.1, kind: 'reel'},
    {id: 'Cord Lock', label: 'Cord lock', price: .08, kind: 'lock'},
    {id: 'Whistle', label: 'Whistle', price: .1, kind: 'whistle'}
  ];
  const name = value => labels[value] || value;
  const clamp = (value, min, max) => Math.min(max, Math.max(min, Number(value) || min));
  const cents = value => Math.round(Number(value) * 100);
  const escape = value => String(value).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
  class Model {
    constructor(catalogue, initial = {}) {
      this.catalogue = catalogue.map(row => row.materials).filter(m => m && m.width && m.width.length);
      if (!this.catalogue.length) throw new Error('The material catalogue is empty.');
      this.state = Object.assign({
        material: this.catalogue[0].material, type: 'one-end', width: '20mm', sides: 'one-side',
        colours: 'one-colour', clip: 'dog_clip', attachment: 'none', accessory: 'none', quantity: 100,
        background: '#173f61', text: '', ink: '#ffffff', font: 'Arial', bold: true, italic: false, underline: false,
        textScale: .54, repeats: 3, offset: 0, logo: '', logoScale: .8, logoRotation: 0,
        mode: 'manual', artworkLeft: '', artworkRight: '', sameArtwork: true
      }, initial);
      this.normalize();
    }
    get material() { return this.catalogue.find(m => m.material === this.state.material); }
    get width() { return this.material.width.find(w => w.width === this.state.width); }
    get sides() { return this.width.sidePrinted.find(s => s.noSides === this.state.sides); }
    get colours() { return this.sides.noColours.find(c => c.noColour === this.state.colours); }
    get maxQuantity() { return Math.max(...this.colours.amount.map(a => Number(a['max-amount']))); }
    normalize() {
      const s = this.state;
      const choose = (items, key, value, fallback) => (items.find(x => x[key] === value) || items.find(x => x[key] === fallback) || items[0])[key];
      s.material = choose(this.catalogue, 'material', s.material);
      s.type = choose(this.material.lanyardType, 'type', s.type, 'one-end');
      s.width = choose(this.material.width, 'width', s.width, '20mm');
      s.sides = choose(this.width.sidePrinted, 'noSides', s.sides, 'one-side');
      s.colours = choose(this.sides.noColours, 'noColour', s.colours);
      s.clip = choose(this.width.clips, 'name', s.clip, 'dog_clip');
      s.attachment = choose(attachments, 'id', s.attachment, 'none');
      s.accessory = choose(accessories, 'id', s.accessory, 'none');
      s.quantity = Math.floor(clamp(s.quantity, 1, this.maxQuantity));
      s.text = String(s.text).slice(0, 80);
      s.repeats = Math.floor(clamp(s.repeats, 1, 6));
      s.textScale = clamp(s.textScale, .25, .8);
      s.logoScale = clamp(s.logoScale, .3, .9);
      s.logoRotation = Math.round(clamp(s.logoRotation, 0, 360) / 90) * 90;
      s.offset = clamp(Number(s.offset) + 10, 0, 20) - 10;
      for (const key of ['background', 'ink']) if (!/^#[0-9a-f]{6}$/i.test(s[key])) s[key] = key === 'ink' ? '#ffffff' : '#173f61';
      if (!['Arial','Verdana','Georgia','Trebuchet MS'].includes(s.font)) s.font = 'Arial';
      if (!['manual','artwork'].includes(s.mode)) s.mode = 'manual';
      return this;
    }
    update(key, value) { this.state[key] = value; return this.normalize(); }
    quote() {
      const s = this.state;
      const matches = this.colours.amount.filter(a => s.quantity >= Number(a['min-amount']) && s.quantity <= Number(a['max-amount']));
      const tier = matches[0];
      // Never substitute a cheaper tier for a gap in the catalogue.
      if (!tier) return {available: false, message: 'No catalogue price for this quantity. Please choose another quantity or contact us.'};
      if (matches.some(a => cents(a.price) !== cents(tier.price))) return {available: false, message: 'A price needs confirming for this quantity. Please choose another quantity or contact us.'};
      const ends = s.type === 'two-end' ? 2 : 1;
      const lines = [
        {key: 'base', label: 'Material, width & printing', cents: cents(tier.price)},
        {key: 'type', label: name(s.type), cents: cents(this.material.lanyardType.find(t => t.type === s.type).price)},
        {key: 'clip', label: `${ends} × ${name(s.clip)}`, cents: ends * cents(this.width.clips.find(c => c.name === s.clip).price)},
        {key: 'attachment', label: `${ends} × ${attachments.find(a => a.id === s.attachment).label}`, cents: ends * cents(attachments.find(a => a.id === s.attachment).price)},
        {key: 'accessory', label: accessories.find(a => a.id === s.accessory).label, cents: cents(accessories.find(a => a.id === s.accessory).price)}
      ];
      const unitCents = lines.reduce((sum, line) => sum + line.cents, 0);
      return {available: true, lines, unitCents, totalCents: unitCents * s.quantity};
    }
    designError() {
      if (this.state.mode === 'artwork' && (!this.state.artworkLeft || (!this.state.sameArtwork && !this.state.artworkRight))) return 'Upload artwork for both legs, or use the same artwork on both.';
      return '';
    }
    description() {
      const s = this.state, quote = this.quote();
      if (!quote.available) throw new Error(quote.message);
      const prices = Object.fromEntries(quote.lines.map(l => [l.key, l.cents / 100]));
      return {
        material: {type: s.material, additional_price: prices.base},
        lanyard_type: {type: s.type, additional_price: prices.type},
        width: {value: s.width, additional_price: 0},
        side_printed: {side: s.sides, additional_price: 0},
        colour_quantity: {type: s.colours, additional_price: 0},
        clip: {type: s.clip, additional_price: prices.clip},
        attachment: {type: s.attachment, additional_price: prices.attachment},
        accessories: {type: s.accessory, additional_price: prices.accessory},
        background: {type: s.background, additional_price: 0}
      };
    }
  }
  return {Model, labels, name, attachments, accessories, clamp, escape};
});
