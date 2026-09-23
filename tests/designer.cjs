const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');
const path = require('node:path');
const D = require('../views/assets/js/customize-lanyard/design-model.js');
const P = require('../views/assets/js/customize-lanyard/design-preview.js');
const root = path.resolve(__dirname, '..');
const tiers = [{ 'min-amount':1, 'max-amount':100, price:'1.06' }, { 'min-amount':101, 'max-amount':1000, price:'.55' }];
function material(name, widths, print) {
  return {materials:{material:name,lanyardType:[{type:'one-end',price:'0.00'},{type:'two-end',price:'2.00'}],
    width:widths.map(width=>({width,clips:[{name:'dog_clip',price:0},{name:'swvel_clip',price:'.17'}],
      sidePrinted:print.map(([noSides,noColour])=>({noSides,noColours:[{noColour,amount:tiers}]}))}))}};
}
const catalogue = [material('Tubular',['10mm','15mm','20mm'],[['one-side','one-colour'],['two-side','two-colour']]),material('Dye Sub polyester',['10mm','15mm','20mm','25mm','30mm'],[['two-side','full-colour']])];
const m = new D.Model(catalogue,{material:'Dye Sub polyester',width:'30mm',quantity:100});
assert.equal(m.state.sides,'two-side');
assert.equal(m.state.colours,'full-colour');
m.update('material','Tubular');
assert.equal(m.state.width,'20mm');
assert.equal(m.state.colours,'two-colour'); // Preserve a compatible face selection.
m.update('quantity',101);
assert.equal(m.quote().unitCents,55);
assert.equal(m.quote().totalCents,5555);
m.update('quantity',100).update('type','two-end').update('clip','swvel_clip').update('attachment','Black').update('accessory','Clear Plastic (closed face)');
assert.equal(m.quote().unitCents,490); // 1.06 + 2.00 + 2 × .17 + 2 × .60 + .30
assert.equal(m.quote().totalCents,49000);
assert.equal(m.description().accessories.type,'Clear Plastic (closed face)');
assert.equal(m.description().side_printed.additional_price,0); // Printing is already in the base tier.
m.update('quantity',25000);
assert.equal(m.state.quantity,1000);
m.update('quantity','');
assert.equal(m.state.quantity,1);
const gap = JSON.parse(JSON.stringify(catalogue));
gap[0].materials.width[0].sidePrinted[0].noColours[0].amount[1]['min-amount']=111;
const gapModel = new D.Model(gap,{material:'Tubular',width:'10mm',quantity:105});
assert.equal(gapModel.quote().available,false);
assert.throws(()=>gapModel.description(),/No catalogue price/);
const overlap = JSON.parse(JSON.stringify(catalogue));
overlap[0].materials.width[0].sidePrinted[0].noColours[0].amount[1]['min-amount']=90;
assert.equal(new D.Model(overlap,{width:'10mm',quantity:95}).quote().available,false);
overlap[0].materials.width[0].sidePrinted[0].noColours[0].amount[1].price='1.06';
assert.equal(new D.Model(overlap,{width:'10mm',quantity:95}).quote().unitCents,106);
m.update('mode','artwork');
assert.ok(m.designError());
m.update('artworkLeft','data:image/png;base64,AAAA');
assert.equal(m.designError(),'');
m.update('sameArtwork',false);
assert.ok(m.designError());
m.update('artworkRight','data:image/png;base64,BBBB');
assert.equal(m.designError(),'');
m.update('mode','manual').update('text','<script>alert("x")</script>').update('sides','one-side');
const svg=P.svg(m.state),back=P.svg(m.state,{back:true});
assert.ok(svg.includes('&lt;script&gt;'));
assert.ok(!svg.includes('<script>'));
assert.ok(!back.includes('&lt;script&gt;'));
assert.equal((svg.match(/data-clip=/g)||[]).length,2);
assert.equal((P.svg({...m.state,type:'one-end'}).match(/data-clip=/g)||[]).length,1);
assert.equal(P.raster('javascript:alert(1)'), '');
assert.equal(P.raster('data:image/svg+xml;base64,AAAA'), '');
for(const width of ['10mm','15mm','20mm','25mm','30mm']) for(const type of ['one-end','two-end']) for(const attachment of D.attachments) {
  const out=P.svg({...m.state,width,type,attachment:attachment.id});
  assert.ok(!/NaN|undefined|Infinity/.test(out));
  assert.equal((out.match(/data-leg=/g)||[]).length,2);
}

// Exercise the handoff into the site's existing order controller, without
// submitting an order or needing browser-only globals.
const saved={};
const setter=(name)=>new Proxy({}, {get:(_,key)=>(...args)=>{saved[`${name}.${key}`]=args[0];}});
const context=vm.createContext({document:{addEventListener(){}},console});
for(const name of ['material','oneTwoEndsClass','widthClass','sidePrintedClass','colourClass','clipClass','attachmentClass','accessoriesClass','backgroundClass','priceClass','artworkManualClass','artworkClass','checkoutClass']) context[name]=setter(name);
vm.runInContext(fs.readFileSync(path.join(root,'views/assets/js/customize-lanyard/designer.js'),'utf8'),context);
context.testModel=m;context.testArtwork={artworkLeft:'data:image/png;base64,AAAA',artworkRight:'data:image/png;base64,BBBB'};
vm.runInContext('const testDesigner=Object.create(LanyardDesigner.prototype); testDesigner.model=testModel; testDesigner.artwork=testArtwork; testDesigner.syncOrder();',context);
assert.equal(saved['accessoriesClass.setAccessoriesSelected'],m.state.accessory);
assert.equal(saved['priceClass.setPricePerMaterialWithAmount'],m.quote().lines[0].cents/100);
assert.equal(saved['priceClass.setPriceSidePrinted'],0);
assert.equal(saved['priceClass.setAmountSelected'],m.state.quantity);
assert.equal(saved['artworkClass.setArtworkRight'],'data:image/png;base64,BBBB');
assert.deepEqual(saved['checkoutClass.setDescription'],m.description());
assert.throws(()=>{context.testModel=gapModel;vm.runInContext('testDesigner.model=testModel; testDesigner.syncOrder();',context);},/Design is not ready/);
console.log('PASS: compatible options, tier boundaries/gaps/overlaps, fitting counts, totals, SVG variants, escaped artwork and order handoff.');
