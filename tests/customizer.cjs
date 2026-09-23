const assert = require('node:assert/strict');
const fs = require('node:fs');
const path = require('node:path');
const vm = require('node:vm');
const { execFileSync } = require('node:child_process');
const root = path.resolve(__dirname, '..');
const nodes = new Map();
function element(id) {
  if (!nodes.has(id)) nodes.set(id, {
    value: '', max: '25000', innerHTML: '', style: {}, children: [],
    addEventListener() {},
  });
  return nodes.get(id);
}
let catalogue = [];
let fetchCalls = 0;
let reply;
let opened = 0;
const loading = [];
const alerts = [];
const noop = () => {};
const context = vm.createContext({
  document: { getElementById: element, querySelectorAll: () => [] },
  fetch: () => { fetchCalls++; return new Promise(resolve => { reply = resolve; }); },
  alert: message => alerts.push(message),
  chargingClass: { hideShowchargin: active => loading.push(active) },
  customizeLanyard: {
    getJsonLanyards: () => catalogue, setJsonLanyards: data => { catalogue = data; },
    openCustomizeLanyard: active => { if (active) opened++; },
    setCurrentSectionOpen: noop, setStateVisibilityPanelCustomeLanyard: noop,
  },
  oneTwoEndsClass: { refreshLanyardType: noop, setTypeLanyardSelected: noop },
  widthClass: { refreshWidth: noop, setWidthSelected: noop },
  sidePrintedClass: { refreshSidePrintedData: noop, setSidePrintedSelected: noop },
  colourClass: { refreshColourQuantity: noop, setColourSelected: noop },
  clipClass: { refreshClip: noop, setClipSelected: noop },
  artworkManualClass: { refreshArtkworkManual: noop },
  backgroundClass: { refreshBackgroundColour: noop },
  attachmentClass: { refreshAttachment: noop },
  previewTemplate: { activateTemplate: noop },
  previewManual: { refreshTextLanyard: noop, refreshImageLanyard: noop },
  menuClass: { getActiveSession: () => false },
});
function load(relative) {
  vm.runInContext(fs.readFileSync(path.join(root, relative), 'utf8'), context, { filename: relative });
}
load('views/assets/js/customize-lanyard/sections/price.js');
load('views/assets/js/customize-lanyard/sections/material.js');
load('views/assets/js/home/app.js');
const price = vm.runInContext('priceClass', context);
const material = vm.runInContext('material', context);
const home = vm.runInContext('homeClass', context);
material.refreshMaterial = noop; // Price rendering is exercised in the browser.

(async () => {
  price.setAmountSelected(250);
  assert.equal(element('amountLanyards').value, 250);
  assert.equal(element('amountLanyardsRange').value, 250);
  price.setAmountSelected(99999);
  assert.equal(price.getAmountSelected(), 25000);
  price.setAmountSelected(0);
  assert.equal(price.getAmountSelected(), 1);

  // A click during initial loading must share the request and wait before opening.
  const initialRequest = material.makeAjaxRequestGetAllMaterials();
  const opening = home.openLanyard();
  assert.equal(fetchCalls, 1);
  assert.equal(opened, 0);
  reply({ ok: true, text: async () => JSON.stringify({ lanyards: [{ materials: { material: 'Tubular' } }] }) });
  assert.equal(await initialRequest, true);
  assert.equal(await opening, true);
  assert.equal(opened, 1);
  assert.equal(element('amountLanyards').value, 1000);
  assert.equal(element('amountLanyardsRange').value, 1000);
  assert.equal(alerts.length, 0);
  assert.deepEqual(loading, [true, false]);

  // A failed request must leave the editor closed and allow a later retry.
  catalogue = [];
  const failing = home.openLanyard();
  reply({ ok: false });
  assert.equal(await failing, false);
  assert.equal(opened, 1);
  assert.equal(alerts.length, 1);
  const retrying = home.openLanyardFromBestSeller();
  reply({ ok: true, text: async () => JSON.stringify({ lanyards: [{ materials: { material: 'Tubular' } }] }) });
  assert.equal(await retrying, true);
  assert.equal(fetchCalls, 3);
  assert.equal(opened, 2);

  // Render from a subdirectory installation and resolve every customizer asset.
  const php = process.env.PHP_BINARY || '/Applications/XAMPP/xamppfiles/bin/php';
  const html = execFileSync(php, ['-d', 'output_buffering=4096', 'index.php'], { cwd: path.join(root, 'views/home'), encoding: 'utf8' });
  let checked = 0;
  for (const match of html.matchAll(/(?:src|href)="([^"<>]*customize-lanyard[^"<>]*)"/g)) {
    const url = new URL(match[1], 'http://localhost/Lanyards_v1/views/home/index.php');
    assert.ok(url.pathname.startsWith('/Lanyards_v1/'), `Asset escaped the project: ${url.pathname}`);
    assert.ok(fs.existsSync(path.join(root, url.pathname.slice('/Lanyards_v1/'.length))), `Missing asset: ${url.pathname}`);
    checked++;
  }
  assert.ok(checked > 50);
  console.log(`PASS: loading/retry, quantity synchronization, and ${checked} customizer assets.`);
})().catch(error => { console.error(error); process.exitCode = 1; });
