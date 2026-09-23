/* One geometry for the live preview and the artwork sent with the order. */
(function (root, factory) {
  const api = factory(typeof module === 'object' && module.exports ? require('./design-model.js') : root.LanyardDesign);
  if (typeof module === 'object' && module.exports) module.exports = api;
  else root.LanyardPreview = api;
})(typeof window === 'undefined' ? globalThis : window, function (D) {
  'use strict';
  const e = D.escape;
  const raster = value => /^data:image\/(png|jpeg|webp);base64,[A-Za-z0-9+/=]+$/.test(value || '') ? value : '';
  function print(s, length, width, leg, back) {
    if (back && s.sides === 'one-side') return '';
    if (s.mode === 'artwork') {
      const src = raster(leg === 'right' && !s.sameArtwork ? s.artworkRight : s.artworkLeft);
      return src ? `<image href="${src}" x="12" y="${-width / 2 + 2}" width="${length - 24}" height="${width - 4}" preserveAspectRatio="xMidYMid meet"/>` : '';
    }
    const logo = raster(s.logo), cell = (length - 36) / s.repeats;
    const textWidth = cell * (logo ? .63 : .92);
    const fontSize = Math.min(width * s.textScale, textWidth / Math.max(1, s.text.length * .64));
    let content = '';
    for (let i = 0; i < s.repeats; i++) {
      const center = 18 + cell * (i + .5) + s.offset * .3;
      if (logo) {
        const size = Math.min(width * s.logoScale, cell * .3);
        const x = s.text ? center - cell * .4 : center - size / 2;
        content += `<image href="${logo}" x="${x}" y="${-size / 2}" width="${size}" height="${size}" transform="rotate(${s.logoRotation||0} ${x+size/2} 0)" preserveAspectRatio="xMidYMid meet"/>`;
      }
      if (s.text) content += `<text x="${center + (logo ? cell * .13 : 0)}" y="0" dominant-baseline="central" text-anchor="middle" fill="${e(s.ink)}" font-family="${e(s.font)}" font-size="${fontSize}" font-weight="${s.bold ? 700 : 400}" font-style="${s.italic ? 'italic' : 'normal'}" text-decoration="${s.underline?'underline':'none'}">${e(s.text)}</text>`;
    }
    return content;
  }
  function hardware(type, x, y, attachment, colour, id) {
    let part = `<g transform="translate(${x} ${y})" data-clip="${e(type)}">`;
    if (attachment !== 'none') {
      const fill = attachment === 'Metal' ? `url(#${id}-metal)` : attachment === 'Black' ? '#202a34' : colour;
      part += `<path d="M-10 -3v10 M10 -3v10" fill="none" stroke="#7c8b97" stroke-width="3"/>
        <rect x="-14" y="7" width="28" height="34" rx="5" fill="${fill}" stroke="#34424d"/>
        <path d="M-13 20h26 M-6 13v5 M6 13v5 M-6 27v7 M6 27v7" stroke="#ffffff" opacity=".35"/>
        <path d="M-9 40v8h18v-8" fill="none" stroke="#9cabb7" stroke-width="3"/>`;
      part += '<g transform="translate(0 45)">';
    }
    part += `<rect x="-12" y="0" width="24" height="12" rx="4" fill="none" stroke="url(#${id}-metal)" stroke-width="4"/>
      <rect x="-5" y="12" width="10" height="8" rx="3" fill="url(#${id}-metal)"/>`;
    const shapes = {
      dog_clip: '<path d="M-5 20C-17 27-19 45-10 54C0 65 17 56 16 44L9 31"/><path d="M-5 20L9 31L3 48" stroke-width="3"/>',
      swvel_clip: '<path d="M0 20C-17 20-19 38-15 51C-11 65 13 64 16 50L15 35L7 31"/><path d="M0 20L7 31L6 51" stroke-width="3"/>',
      crocodile_clip: '<path d="M-11 22L-8 57L9 57L12 22Z"/><path d="M-5 30h12 M-5 37h12 M-5 44h12 M-5 51h12" stroke-width="2"/>',
      metal_j_hook: '<path d="M0 20V45C0 68 27 62 22 43"/><path d="M22 43L12 30" stroke-width="3"/>',
      crab_hook: '<path d="M0 20C-28 30-24 66 0 64C24 64 27 35 8 31"/><path d="M0 20L8 31L5 51" stroke-width="3"/>',
      slide_clip: '<path d="M-13 22H13V58H-13Z"/><path d="M-13 34H13M-13 47H13" stroke-width="3"/>'
    };
    part += `<g fill="none" stroke="url(#${id}-metal)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">${shapes[type] || shapes.dog_clip}</g>`;
    if (attachment !== 'none') part += '</g>';
    return part + '</g>';
  }
  function accessory(s, y, kind) {
    if (!kind) return '';
    const two = s.type === 'two-end';
    if (kind === 'card' || kind === 'wallet') {
      const wallet = kind === 'wallet';
      const height = s.accessory === '138 x 88mm' ? 124 : 102;
      return `<g data-accessory="${e(s.accessory)}"><rect x="178" y="${y}" width="204" height="${height}" rx="${wallet ? 4 : 8}" fill="${wallet ? '#ffffff' : s.accessory.startsWith('Coloured') ? s.background : '#cfdae2'}" fill-opacity=".8" stroke="#8e9da9" stroke-width="2"/>
        ${two ? `<path d="M210 ${y+3}v8M350 ${y+3}v8" stroke="#738592" stroke-width="4"/>` : `<rect x="262" y="${y+5}" width="36" height="5" rx="2" fill="#8b9ca8"/>`}
        <rect x="189" y="${y+20}" width="182" height="${height-30}" rx="3" fill="#fff"/>
        <circle cx="217" cy="${y+44}" r="12" fill="#e2e9ee"/><path d="M243 ${y+38}h98M243 ${y+49}h72M205 ${y+74}h135" stroke="#d5dfe6" stroke-width="5"/></g>`;
    }
    const xs = two ? [210,350] : [280];
    // The quoted accessory is one item per lanyard, attached to one clip.
    const x = xs[0];
    if (kind === 'reel') return `<g transform="translate(${x} ${y+23})" data-accessory="reel"><circle r="26" fill="#34495c" stroke="#c8d4dc" stroke-width="3"/><circle r="18" fill="#f7f9fb"/><path d="M0 26v22" stroke="#777" stroke-width="2"/><rect x="-8" y="46" width="16" height="12" rx="4" fill="#ccd7df"/></g>`;
    if (kind === 'whistle') return `<path data-accessory="whistle" d="M${x-12} ${y}h26v24h25v17h-40q-18-7-11-24Z" fill="#aebbc5" stroke="#667784" stroke-width="2"/>`;
    return `<g data-accessory="lock" transform="translate(${x} ${y+18})"><rect x="-17" y="-15" width="34" height="29" rx="10" fill="#273744"/><circle cx="-6" r="4" fill="#e2e9ee"/><circle cx="6" r="4" fill="#e2e9ee"/></g>`;
  }
  function svg(s, options = {}) {
    const id = options.id || 'lanyard', back = options.back || false, flat = options.flat || false;
    const width = parseInt(s.width, 10) * 1.4;
    const defs = `<defs><linearGradient id="${id}-metal" x1="0" x2="1"><stop stop-color="#667784"/><stop offset=".32" stop-color="#f5f9fc"/><stop offset=".53" stop-color="#a4b6c4"/><stop offset=".78" stop-color="#e2eaf0"/><stop offset="1" stop-color="#526574"/></linearGradient>
      <pattern id="${id}-weave" width="3" height="3" patternUnits="userSpaceOnUse"><path d="M0 0h3M0 2h3" stroke="#fff" opacity=".09" stroke-width=".6"/><path d="M0 0v3" stroke="#000" opacity=".07" stroke-width=".8"/></pattern></defs>`;
    if (flat) {
      const length = 350, leg = options.leg || 'left';
      return `<svg xmlns="http://www.w3.org/2000/svg" width="1400" height="${width*4}" viewBox="0 ${-width/2} ${length} ${width}" role="img" aria-label="${leg} leg print layout">${defs}<rect x="0" y="${-width/2}" width="${length}" height="${width}" fill="${e(s.background)}"/>${print(s,length,width,leg,back)}</svg>`;
    }
    const two = s.type === 'two-end', leftEnd = two ? [210,465] : [280,465], rightEnd = two ? [350,465] : [280,465];
    const legs = [{name:'left', start:[150,153], end:leftEnd}, {name:'right', start:rightEnd, end:[410,153]}];
    const kind = D.accessories.find(a => a.id === s.accessory).kind;
    const extra = s.attachment !== 'none' ? 45 : 0, accessoryY = 465 + extra + 68;
    const height = kind ? Math.max(670, accessoryY + (s.accessory === '138 x 88mm' ? 140 : 116)) : 600;
    let content = `<path d="M150 158C107 45 453 45 410 158" fill="none" stroke="${e(s.background)}" stroke-width="${width}"/>
      <path d="M150 158C107 45 453 45 410 158" fill="none" stroke="#071b2b" opacity=".24" stroke-width="${width}"/>`;
    legs.forEach(leg => {
      const dx = leg.end[0]-leg.start[0], dy = leg.end[1]-leg.start[1], length = Math.hypot(dx,dy), angle = Math.atan2(dy,dx)*180/Math.PI;
      content += `<g transform="translate(${leg.start.join(' ')}) rotate(${angle})" data-leg="${leg.name}">
        <defs><clipPath id="${id}-${leg.name}"><rect x="0" y="${-width/2}" width="${length}" height="${width}" rx="1"/></clipPath></defs>
        <rect x="0" y="${-width/2}" width="${length}" height="${width}" rx="1" fill="${e(s.background)}" stroke="#071b2b" stroke-opacity=".14"/>
        <rect x="0" y="${-width/2}" width="${length}" height="${width}" fill="url(#${id}-weave)"/>
        <g clip-path="url(#${id}-${leg.name})"><g transform="scale(${length/350} 1)">${print(s,350,width,leg.name,back)}</g></g>
        ${options.guides ? `<rect x="12" y="${-width/2+2}" width="${length-24}" height="${width-4}" fill="none" stroke="#52dcc3" stroke-width="1" stroke-dasharray="3 3"/>` : ''}</g>`;
    });
    for (const x of two ? [210,350] : [280]) {
      content += `<rect x="${x-width/2}" y="451" width="${width}" height="16" rx="2" fill="${e(s.background)}"/><path d="M${x-width/2+2} 456h${width-4}M${x-width/2+2} 463h${width-4}" stroke="#071b2b" stroke-opacity=".3" stroke-dasharray="2 2"/>
        ${hardware(s.clip,x,467,s.attachment,s.background,id)}`;
    }
    content += accessory(s,accessoryY,kind);
    return `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 560 ${height}" role="img" aria-label="${e(`${D.name(s.material)}, ${s.width}, ${D.name(s.type)}, ${back ? 'back' : 'front'} preview`)}">${defs}<ellipse cx="280" cy="${height-20}" rx="115" ry="7" fill="#142d43" opacity=".05"/>${content}</svg>`;
  }
  return {svg, raster};
});
