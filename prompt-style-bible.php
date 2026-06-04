<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>FAB Comics Multiverse Prompt Style Bible v8</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fragment+Mono&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
  html { font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, sans-serif; }
  .mono { font-family: 'Fragment Mono', ui-monospace, SFMono-Regular, Menlo, monospace; }
  [contenteditable="true"]:empty:before { content: attr(data-placeholder); color: #a1a1aa; pointer-events: none; }
  [contenteditable="true"]:focus, input:focus, textarea:focus, select:focus {
    outline: 2px solid #111827; outline-offset: 2px; border-radius: 8px;
  }
  .halftone { background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.055) 1px, transparent 0); background-size: 10px 10px; }
  .field { background:white; border:1px solid rgb(228 228 231); border-radius:14px; padding:10px 12px; min-height:42px; font-size:13px; line-height:1.45; }
  .label { font-size:10px; text-transform:uppercase; letter-spacing:.10em; color:rgb(113 113 122); margin-bottom:6px; font-weight:800; }
  .card { background:rgba(250,250,250,.94); border:1px solid rgb(228 228 231); border-radius:22px; padding:20px; }
  .chip { display:inline-flex; align-items:center; border:1px dashed rgb(212 212 216); border-radius:999px; padding:7px 12px; background:white; font-size:13px; min-width:82px; }
  .btn { padding:8px 12px; border-radius:10px; font-size:12px; border:1px solid #d4d4d8; background:white; transition:.15s; }
  .btn:hover { background:#f4f4f5; }
  .btn-dark { background:#111827; color:white; border-color:#111827; }
  .btn-dark:hover { background:#000; }
  .btn-green { background:#065f46; color:white; border-color:#065f46; }
  .btn-blue { background:#1d4ed8; color:white; border-color:#1d4ed8; }
  .tab-active { background:#111827; color:white; border-color:#111827; }
  .copy-toast { position:fixed; right:18px; bottom:18px; background:#09090b; color:white; padding:10px 14px; border-radius:12px; font-size:13px; opacity:0; pointer-events:none; transform:translateY(8px); transition:.2s ease; z-index:999; }
  .copy-toast.show { opacity:1; transform:translateY(0); }
  .score-good { background:#ecfdf5; border-color:#a7f3d0; color:#047857; }
  .score-mid { background:#fffbeb; border-color:#fde68a; color:#92400e; }
  .score-bad { background:#fef2f2; border-color:#fecaca; color:#b91c1c; }
  .range-meta { font-size:10px; color:#71717a; display:flex; justify-content:space-between; margin-top:4px; }
  .preset-btn { border:1px solid #d4d4d8; border-radius:12px; padding:10px 12px; background:white; font-size:12px; text-align:left; transition:.15s; }
  .preset-btn:hover { background:#f4f4f5; }
  .pill { display:inline-flex; border:1px solid #d4d4d8; border-radius:999px; padding:5px 9px; font-size:11px; background:white; color:#52525b; }

  .ratio-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:8px; }
  .ratio-card {
    border:1px solid #d4d4d8; border-radius:14px; background:white; padding:9px;
    font-size:11px; cursor:pointer; transition:.15s ease; min-height:82px;
  }
  .ratio-card:hover { background:#f4f4f5; transform:translateY(-1px); }
  .ratio-card.active { background:#111827; color:white; border-color:#111827; }
  .ratio-card.active .ratio-icon { border-color:white; background:rgba(255,255,255,.08); }
  .ratio-card.active .ratio-sub { color:#d4d4d8; }
  .ratio-icon-wrap { height:38px; display:flex; align-items:center; justify-content:center; margin-bottom:6px; }
  .ratio-icon { border:2px solid #18181b; border-radius:4px; background:#fafafa; box-shadow:inset 0 0 0 1px rgba(0,0,0,.04); }
  .ratio-icon.ratio-2-3 { width:22px; height:33px; }
  .ratio-icon.ratio-3-2 { width:34px; height:23px; }
  .ratio-icon.ratio-4-5 { width:27px; height:34px; }
  .ratio-icon.ratio-1-1 { width:30px; height:30px; }
  .ratio-icon.ratio-16-9 { width:42px; height:24px; }
  .ratio-icon.ratio-9-16 { width:22px; height:39px; }
  .ratio-icon.ratio-a4 { width:24px; height:34px; border-radius:3px; position:relative; }
  .ratio-icon.ratio-a4:after { content:""; position:absolute; top:-2px; right:-2px; width:9px; height:9px; border-left:2px solid currentColor; border-bottom:2px solid currentColor; background:inherit; }
  .ratio-icon.ratio-comic { width:24px; height:37px; position:relative; }
  .ratio-icon.ratio-comic:before { content:""; position:absolute; left:4px; right:4px; top:5px; height:4px; border-top:1px solid currentColor; border-bottom:1px solid currentColor; opacity:.7; }
  .ratio-icon.ratio-custom { width:36px; height:26px; border-style:dashed; position:relative; }
  .ratio-icon.ratio-custom:after { content:"?"; position:absolute; inset:0; display:grid; place-items:center; font-size:13px; font-weight:900; }
  .ratio-title { font-weight:800; text-align:center; line-height:1.1; }
  .ratio-sub { color:#71717a; text-align:center; margin-top:2px; line-height:1.15; }

  .visual-picker { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:8px; }
  .visual-picker.compact { grid-template-columns:repeat(2,minmax(0,1fr)); }
  .visual-card {
    border:1px solid #d4d4d8; border-radius:14px; background:white; padding:9px;
    font-size:11px; cursor:pointer; transition:.15s ease; min-height:78px;
    display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center;
  }
  .visual-card:hover { background:#f4f4f5; transform:translateY(-1px); }
  .visual-card.active { background:#111827; color:white; border-color:#111827; }
  .visual-icon {
    width:34px; height:34px; border:2px solid currentColor; border-radius:9px; margin-bottom:6px;
    display:grid; place-items:center; font-size:18px; font-weight:900; line-height:1;
  }
  .visual-card.active .visual-sub { color:#d4d4d8; }
  .visual-title { font-weight:850; line-height:1.05; }
  .visual-sub { color:#71717a; margin-top:2px; line-height:1.12; }
  .picker-hint { margin-top:7px; font-size:11px; color:#71717a; line-height:1.3; }
  @media (max-width: 900px) { .visual-picker { grid-template-columns:repeat(2,minmax(0,1fr)); } }
  @media (max-width: 560px) { .visual-picker, .visual-picker.compact { grid-template-columns:repeat(1,minmax(0,1fr)); } }

  @media (max-width: 900px) { .ratio-grid { grid-template-columns:repeat(3,minmax(0,1fr)); } }
  @media (max-width: 560px) { .ratio-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }


  .detector-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:8px; }
  .detector-chip {
    border:1px solid #fecaca; background:#fff1f2; color:#991b1b; border-radius:14px;
    padding:9px 10px; font-size:12px; display:flex; gap:8px; align-items:flex-start;
  }
  .detector-chip input { margin-top:2px; }
  @media (max-width: 680px) { .detector-grid { grid-template-columns:1fr; } }

  @media print {
    @page { size:A4 portrait; margin:0.35in; }
    body { background:white !important; }
    .no-print { display:none !important; }
    .page { box-shadow:none !important; border:none !important; padding:0 !important; margin:0 !important; border-radius:0 !important; max-width:none !important; }
    .print-break { break-before:page; }
    * { -webkit-print-color-adjust:exact; print-color-adjust:exact; }
  }
</style>
</head>
<body class="bg-zinc-100 text-zinc-900 antialiased">
<div class="copy-toast" id="toast">Copied ✅</div>

<div class="no-print sticky top-0 z-40 backdrop-blur border-b border-zinc-200 bg-zinc-100/90">
  <div class="max-w-[1480px] mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
    <div>
      <div class="text-xs text-zinc-500">Auto-adjusting multiverse prompt builder • brush controls • strict negative prompts</div>
      <div class="text-sm font-semibold">FAB Comics Multiverse Prompt Style Bible v8</div>
    </div>
    <div class="flex flex-wrap gap-2">
      <button id="fillDefaultsBtn" class="btn">Fill FAB Defaults</button>
      <button id="autoTuneBtn" class="btn btn-green">Auto-Tune Current Combo</button>
      <button id="preflightBtn" class="btn btn-blue">Run Pre-flight</button>
      <button id="copySelectedBtn" class="btn btn-dark">Copy Selected Prompt</button>
      <button id="copyAllBtn" class="btn">Copy Full Pack</button>
      <button id="exportTxtBtn" class="btn">Export TXT</button>
      <button id="exportJsonBtn" class="btn">Export JSON</button>
      <button id="printBtn" class="btn">Print / Save PDF</button>
      <button id="resetBtn" class="btn" style="border-color:#fecaca;color:#b91c1c;">Reset</button>
    </div>
  </div>
</div>

<main class="px-4 py-8">
  <div class="page relative max-w-[1480px] mx-auto bg-white border border-zinc-200 shadow-2xl rounded-[32px] p-6 sm:p-10 lg:p-12 overflow-hidden">
    <div class="halftone absolute inset-0 opacity-[0.12] pointer-events-none"></div>
    <div class="absolute -top-28 -right-28 w-80 h-80 rounded-full halftone opacity-30 pointer-events-none"></div>

    <div class="relative">
      <header class="flex flex-wrap items-start justify-between gap-5">
        <div>
          <div class="text-xs font-black tracking-[0.34em] uppercase text-zinc-500">Original IP • FAB Multiverse • Prompt Engineering</div>
          <h1 class="text-[32px] sm:text-[52px] font-black tracking-tight leading-none mt-2">FAB Comics Multiverse Prompt Style Bible v8</h1>
          <p class="mt-3 max-w-6xl text-sm text-zinc-600 leading-relaxed">
            Define the final copy-ready prompt using FAB Comics verse lore, art medium, brush language, stroke behaviour, aspect ratio, colour mode, composition, and strict negative controls. 
            Turn on auto-adjust so the page updates related fields when you change Verse, medium, or style combinations.
          </p>
          <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-[13px]">
            <div class="flex gap-1.5"><span class="text-zinc-500">Creator:</span><span data-key="creator" contenteditable="true" class="min-w-[120px] font-semibold"></span></div>
            <div class="flex gap-1.5"><span class="text-zinc-500">Project:</span><span data-key="project" contenteditable="true" class="min-w-[150px] font-semibold"></span></div>
            <div class="flex gap-1.5"><span class="text-zinc-500">Version:</span><span data-key="version" contenteditable="true" class="min-w-[70px] font-semibold"></span></div>
            <div class="flex gap-1.5"><span class="text-zinc-500">Use Case:</span><span data-key="useCase" contenteditable="true" class="min-w-[220px] font-semibold"></span></div>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-2 text-center text-[10px] uppercase tracking-widest font-bold">
          <span class="px-3 py-2 rounded-full bg-zinc-900 text-white">Auto-Adjust</span>
          <span class="px-3 py-2 rounded-full border border-zinc-300 text-zinc-600">Verse Lore</span>
          <span class="px-3 py-2 rounded-full border border-zinc-300 text-zinc-600">Brush System</span>
          <span class="px-3 py-2 rounded-full border border-zinc-300 text-zinc-600">Strict Negative</span>
        </div>
      </header>

      <div class="mt-6 p-4 rounded-2xl border border-zinc-200 bg-zinc-50 flex flex-wrap gap-4 items-center justify-between">
        <div>
          <div class="text-sm font-bold">Auto-adjust behaviour</div>
          <div class="text-xs text-zinc-600">When enabled, changing Verse or medium updates mood, environment, palette, brush language, and anti-intrusion rules.</div>
        </div>
        <label class="flex items-center gap-2 text-sm font-semibold">
          <input id="autoAdjustToggle" type="checkbox" checked>
          Auto-adjust related fields
        </label>
      </div>

      <section class="mt-8 grid grid-cols-12 gap-4 sm:gap-5">
        <div class="card col-span-12 xl:col-span-3">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">01</span><h2 class="text-[12px] font-black uppercase tracking-widest">Style DNA</h2></div>
          <div class="space-y-4">
            <div>
              <div class="label">3 Style Adjectives</div>
              <div class="flex flex-wrap gap-2">
                <span data-key="adj1" contenteditable="true" class="chip"></span>
                <span data-key="adj2" contenteditable="true" class="chip"></span>
                <span data-key="adj3" contenteditable="true" class="chip"></span>
              </div>
            </div>
            <div><div class="label">Style Name</div><div data-key="styleName" contenteditable="true" class="field"></div></div>
            <div><div class="label">Style Definition</div><div data-key="styleDefinition" contenteditable="true" class="field min-h-[112px]"></div></div>
            <div class="flex flex-wrap gap-1.5">
              <span class="pill">Original IP</span><span class="pill">South Asian identity</span><span class="pill">Digital-first</span><span class="pill">Human-directed</span>
            </div>
          </div>
        </div>

        <div class="card col-span-12 xl:col-span-3">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">02</span><h2 class="text-[12px] font-black uppercase tracking-widest">FAB Verse Selector</h2></div>
          <div class="space-y-3">
            <div>
              <div class="label">Verse</div>
              <select id="verseSelect" class="field w-full"></select>
            </div>
            <div>
              <div id="verseCards" class="visual-picker compact"></div>
              <div id="verseCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Genre</div><div id="verseGenre" class="field"></div></div>
            <div><div class="label">Environment</div><div id="verseEnvironment" class="field"></div></div>
            <div><div class="label">Verse Note</div><div id="verseNote" class="field min-h-[110px]"></div></div>
            <div><div class="label">Auto Visual Direction</div><div id="verseVisualDirection" class="field min-h-[92px]"></div></div>
          </div>
        </div>

        <div class="card col-span-12 xl:col-span-3">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">03</span><h2 class="text-[12px] font-black uppercase tracking-widest">Art Medium & Format</h2></div>
          <div class="grid grid-cols-2 gap-3">
            <div>
              <div class="label">Art Medium</div>
              <select id="mediumSelect" class="field w-full">
                <option>Pencil Sketch</option><option>Colourful Comic</option><option>Ink Drawing</option><option>Oil Painting</option><option>Watercolor</option><option>Marker Illustration</option><option>Mixed Media</option>
              </select>
            </div>
            <div class="col-span-2">
              <div id="mediumCards" class="visual-picker"></div>
              <div id="mediumCardsHint" class="picker-hint"></div>
            </div>
            <div>
              <div class="label">Colour Mode</div>
              <select id="colourModeSelect" class="field w-full">
                <option>Mostly Black and White</option><option>Selective Accent Colour</option><option>Muted Minimal Colour</option><option>Colorful</option><option>Monochrome</option>
              </select>
            </div>
            <div class="col-span-2">
              <div id="colourModeCards" class="visual-picker"></div>
              <div id="colourModeCardsHint" class="picker-hint"></div>
            </div>
            <div>
              <div class="label">Aspect Ratio</div>
              <select id="aspectRatioSelect" class="field w-full">
                <option>2:3</option><option>3:2</option><option>4:5</option><option>1:1</option><option>16:9</option><option>9:16</option><option>A4 Portrait</option><option>US Comic Cover</option><option>Custom</option>
              </select>
            </div>
            <div>
              <div class="label">Custom Ratio</div>
              <input id="customAspectInput" class="field w-full" placeholder="e.g. 5:7 or 1000:1414">
            </div>
            <div class="col-span-2">
              <div class="label">Visual Layout Picker</div>
              <div id="aspectRatioCards" class="ratio-grid"></div>
              <div id="aspectRatioHint" class="mt-2 text-[11px] text-zinc-500 leading-snug"></div>
            </div>
            <div>
              <div class="label">Output Type</div>
              <select id="outputTypeSelect" class="field w-full">
                <option>Front Cover</option><option>Interior Comic Panel</option><option>Character Sheet</option><option>Character Portrait</option><option>Poster / Teaser</option><option>Scene Concept</option>
              </select>
            </div>
            <div class="col-span-2">
              <div id="outputTypeCards" class="visual-picker"></div>
              <div id="outputTypeCardsHint" class="picker-hint"></div>
            </div>
            <div>
              <div class="label">Detail Target</div>
              <select id="detailTargetSelect" class="field w-full">
                <option>Very Minimal</option><option>Minimal</option><option>Medium Controlled</option><option>Detailed but Human</option>
              </select>
            </div>
            <div class="col-span-2">
              <div id="detailTargetCards" class="visual-picker"></div>
              <div id="detailTargetCardsHint" class="picker-hint"></div>
            </div>
          </div>
          <div class="mt-4">
            <div class="label">Medium-Specific Prompt Note</div>
            <div id="mediumNote" class="field min-h-[82px]"></div>
          </div>
        </div>

        <div class="card col-span-12 xl:col-span-3">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">04</span><h2 class="text-[12px] font-black uppercase tracking-widest">Brush & Stroke Controls</h2></div>
          <div class="grid grid-cols-2 gap-3">
            <div><div class="label">Brush Style</div><select id="brushStyleSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="brushCards" class="visual-picker"></div>
              <div id="brushCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Stroke Style</div><select id="strokeStyleSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="strokeCards" class="visual-picker"></div>
              <div id="strokeCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Hardness</div><input id="hardnessRange" type="range" min="1" max="10" value="3" class="w-full"><div class="range-meta"><span>soft</span><span>hard</span></div></div>
            <div><div class="label">Intensity</div><input id="intensityRange" type="range" min="1" max="10" value="4" class="w-full"><div class="range-meta"><span>light</span><span>strong</span></div></div>
            <div><div class="label">Roughness</div><input id="roughnessRange" type="range" min="1" max="10" value="9" class="w-full"><div class="range-meta"><span>clean</span><span>rough</span></div></div>
            <div><div class="label">Texture Strength</div><input id="textureRange" type="range" min="1" max="10" value="7" class="w-full"><div class="range-meta"><span>light</span><span>heavy</span></div></div>
            <div><div class="label">Line Weight</div><input id="lineWeightRange" type="range" min="1" max="10" value="4" class="w-full"><div class="range-meta"><span>thin</span><span>thick</span></div></div>
            <div><div class="label">Polish</div><input id="polishRange" type="range" min="1" max="10" value="1" class="w-full"><div class="range-meta"><span>raw</span><span>polished</span></div></div>
          </div>
          <div class="mt-4"><div class="label">Generated Brush Language</div><div id="brushLanguage" class="field min-h-[92px]"></div></div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">05</span><h2 class="text-[12px] font-black uppercase tracking-widest">Character Builder</h2></div>
          <div class="grid grid-cols-2 gap-3">
            <div><div class="label">Name</div><div data-key="characterName" contenteditable="true" class="field"></div></div>
            <div><div class="label">Identity</div><div data-key="characterIdentity" contenteditable="true" class="field"></div></div>
            <div><div class="label">Age / Build</div><div data-key="ageBuild" contenteditable="true" class="field"></div></div>
            <div><div class="label">Expression</div><div data-key="expression" contenteditable="true" class="field"></div></div>
            <div><div class="label">Pose / Action</div><div data-key="pose" contenteditable="true" class="field"></div></div>
            <div><div class="label">Costume</div><div data-key="costume" contenteditable="true" class="field"></div></div>
            <div><div class="label">Scene</div><div data-key="scene" contenteditable="true" class="field"></div></div>
            <div><div class="label">Mood</div><div data-key="mood" contenteditable="true" class="field"></div></div>
          </div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">06</span><h2 class="text-[12px] font-black uppercase tracking-widest">Composition Planner</h2></div>
          <div class="grid grid-cols-2 gap-3">
            <div><div class="label">Camera Angle</div><select id="cameraSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="cameraCards" class="visual-picker"></div>
              <div id="cameraCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Composition</div><select id="compositionSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="compositionCards" class="visual-picker"></div>
              <div id="compositionCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Lighting</div><select id="lightingSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="lightingCards" class="visual-picker"></div>
              <div id="lightingCardsHint" class="picker-hint"></div>
            </div>
            <div><div class="label">Background</div><select id="backgroundSelect" class="field w-full"></select></div>
            <div class="col-span-2">
              <div id="backgroundCards" class="visual-picker"></div>
              <div id="backgroundCardsHint" class="picker-hint"></div>
            </div>
          </div>
          <div class="mt-4">
            <div class="label">Auto Composition Note</div>
            <div id="compositionNote" class="field min-h-[120px]"></div>
          </div>
          <div class="mt-4">
            <div class="label">Palette — 5 Max</div>
            <div class="grid grid-cols-5 gap-2.5" id="palette"></div>
          </div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">07</span><h2 class="text-[12px] font-black uppercase tracking-widest">Strict Negative Prompt Builder</h2></div>
          <div class="space-y-2 text-sm">
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no extra fingers, no extra limbs, no duplicated hands, no anatomy distortion" checked><span>Anatomy errors</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no random background characters, no intrusive props, no unwanted objects, no clutter" checked><span>Random intrusions</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no watermark, no signature, no random text, no accidental letters, no UI elements" checked><span>Watermark / text artifacts</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no glossy 3D look, no plastic skin, no hyper-polished concept art, no photorealism" checked><span>AI-polish / 3D look</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no glowing VFX, no neon aura, no magical spark clutter unless explicitly requested" checked><span>Glow / VFX overload</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no copyrighted logos, no franchise costume elements, no named artist imitation, no publisher style imitation" checked><span>Legal safety</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no extra accessories unless requested, no overdesigned armor patterns, no accidental border decorations" checked><span>Overdesign control</span></label>
            <label class="field flex items-start gap-2"><input type="checkbox" class="strictCheck mt-1" data-neg="no sudden style change, no mixed art styles, no inconsistent costume details, no inconsistent face across panels" checked><span>Style consistency</span></label>
          </div>
          <div class="mt-4"><div class="label">Custom Strict Negative</div><div data-key="customNegative" contenteditable="true" class="field min-h-[100px]"></div></div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">08</span><h2 class="text-[12px] font-black uppercase tracking-widest">Originality & Workflow</h2></div>
          <div class="space-y-3">
            <div><div class="label">FAB Brand / About Note</div><div data-key="brandNote" contenteditable="true" class="field min-h-[110px]"></div></div>
            <div><div class="label">Originality Rules</div><div data-key="originalityRules" contenteditable="true" class="field min-h-[90px]"></div></div>
            <div><div class="label">Manual Edit Plan</div><div data-key="manualEditPlan" contenteditable="true" class="field min-h-[90px]"></div></div>
          </div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">09</span><h2 class="text-[12px] font-black uppercase tracking-widest">Medium Presets</h2></div>
          <div class="grid grid-cols-2 gap-3 no-print">
            <button class="preset-btn" data-preset="pencil"><strong>Pencil Sketch</strong><br><span class="text-zinc-500">rough minimal graphite</span></button>
            <button class="preset-btn" data-preset="colorful"><strong>Colorful Comic</strong><br><span class="text-zinc-500">clean colour but controlled</span></button>
            <button class="preset-btn" data-preset="ink"><strong>Ink Drawing</strong><br><span class="text-zinc-500">bold linework</span></button>
            <button class="preset-btn" data-preset="oil"><strong>Oil Painting</strong><br><span class="text-zinc-500">brushy painterly</span></button>
            <button class="preset-btn" data-preset="watercolor"><strong>Watercolor</strong><br><span class="text-zinc-500">soft wash</span></button>
            <button class="preset-btn" data-preset="poster"><strong>Poster Teaser</strong><br><span class="text-zinc-500">social promo</span></button>
          </div>
          <div class="mt-4">
            <div class="label">Iteration Notes</div>
            <div data-key="iterationNotes" contenteditable="true" class="field min-h-[140px]"></div>
          </div>
        </div>

        <div class="card col-span-12 lg:col-span-4">
          <div class="flex items-center gap-2 mb-3"><span class="mono text-[11px] text-zinc-400">10</span><h2 class="text-[12px] font-black uppercase tracking-widest">Quality & Pre-flight</h2></div>
          <div id="qualityBox" class="field text-xs font-bold mb-3"></div>
          <div id="qualityList" class="text-xs leading-relaxed space-y-2"></div>
          <div class="mt-4"><div class="label">Quick Fix Suggestions</div><div id="quickFixes" class="field text-xs min-h-[110px]"></div></div>
          <div class="mt-4">
            <div class="label">Human Process Note</div>
            <div data-key="processBefore" contenteditable="true" class="field min-h-[58px]"></div>
            <div data-key="processDuring" contenteditable="true" class="field min-h-[58px] mt-2"></div>
            <div data-key="processAfter" contenteditable="true" class="field min-h-[58px] mt-2"></div>
          </div>
        </div>

        <div class="card col-span-12">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
            <div class="flex items-center gap-2"><span class="mono text-[11px] text-zinc-400">11</span><h2 class="text-[12px] font-black uppercase tracking-widest">AI Detector Feedback Optimizer</h2></div>
            <div class="flex gap-2 no-print">
              <button id="applyDetectorFixesBtn" class="btn btn-green">Apply Detector Fixes</button>
              <button id="clearDetectorFixesBtn" class="btn">Clear Detector Checks</button>
            </div>
          </div>
          <div class="grid lg:grid-cols-3 gap-5">
            <div>
              <div class="label">Detector Result / Score</div>
              <div data-key="detectorScore" contenteditable="true" class="field" data-placeholder="Example: 94% AI Generated, high confidence"></div>
              <div class="label mt-3">Detector Reasoning Summary</div>
              <div data-key="detectorReasoning" contenteditable="true" class="field min-h-[125px]" data-placeholder="Paste detector notes here."></div>
            </div>
            <div>
              <div class="label">Detected AI-Look Issues</div>
              <div class="detector-grid">
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="anatomy"><span>Perfect anatomy / pose</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="glow"><span>Artificial glow / energy VFX</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="texture"><span>Synthetic clothing texture</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="shadows"><span>Inconsistent shadow direction</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="saturation"><span>Saturated gradients / colour</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="composition"><span>AI-perfect composition</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="hyperreal"><span>Hyper-real fantasy rendering</span></label>
                <label class="detector-chip"><input type="checkbox" class="detectorIssue" data-fix="background"><span>Character/background mismatch</span></label>
              </div>
            </div>
            <div>
              <div class="label">Auto Fix Strategy Added To Prompt</div>
              <div id="detectorFixStrategy" class="field min-h-[190px] text-xs"></div>
              <div class="label mt-3">Manual Correction Plan</div>
              <div data-key="detectorManualPlan" contenteditable="true" class="field min-h-[105px]" data-placeholder="Example: repaint glow as faint pencil marks, simplify scarf texture, roughen anatomy."></div>
            </div>
          </div>
        </div>

        <div class="card col-span-12 print-break">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <div class="flex items-center gap-2"><span class="mono text-[11px] text-zinc-400">12</span><h2 class="text-[12px] font-black uppercase tracking-widest">Generated Prompt Pack</h2></div>
            <div class="flex flex-wrap gap-2 no-print">
              <button class="btn tab-active promptTab" data-tab="universal">Universal</button>
              <button class="btn promptTab" data-tab="midjourney">Midjourney</button>
              <button class="btn promptTab" data-tab="sd">Stable Diffusion</button>
              <button class="btn promptTab" data-tab="dalle">DALL·E / ChatGPT</button>
              <button class="btn promptTab" data-tab="negative">Negative</button>
              <button class="btn promptTab" data-tab="process">Process Note</button>
            </div>
          </div>

          <div class="grid lg:grid-cols-2 gap-5">
            <div>
              <div class="label">Selected Prompt Output</div>
              <textarea id="selectedPrompt" class="w-full min-h-[460px] field mono text-[12px] resize-y" spellcheck="false"></textarea>
            </div>
            <div>
              <div class="label">Strict Negative Prompt</div>
              <textarea id="negativePrompt" class="w-full min-h-[230px] field mono text-[12px] resize-y" spellcheck="false"></textarea>
              <div class="label mt-4">Pre-flight Report</div>
              <textarea id="preflightReport" class="w-full min-h-[200px] field mono text-[12px] resize-y" spellcheck="false"></textarea>
            </div>
          </div>

          <div class="mt-4 p-4 rounded-2xl border border-zinc-200 bg-zinc-50 text-xs leading-relaxed text-zinc-600">
            <strong class="text-zinc-900">Reminder:</strong> This tool improves prompt control and production consistency. It does not guarantee an AI-detector score or perfect output. Keep rough sketches, notes, prompt versions, rejected generations, and manual edits as your production trail.
          </div>
        </div>
      </section>

      <footer class="mt-6 pt-3 border-t border-dashed border-zinc-300 flex flex-wrap items-center justify-between gap-2 text-[11px] text-zinc-500">
        <span>Workflow: Verse → medium → brush/stroke → composition → strict negative → pre-flight → copy prompt → manual edits.</span>
        <span data-key="footer" contenteditable="true" class="text-right min-w-[220px]"></span>
      </footer>
    </div>
  </div>
</main>

<script>
const STORAGE_KEY = "fab_multiverse_prompt_style_bible_v8";
let activeTab = "universal";

const aspectRatioMeta = {
  "2:3": { icon:"ratio-2-3", title:"2:3", sub:"Cover portrait", hint:"Best for comic covers, character posters, and vertical hero shots." },
  "3:2": { icon:"ratio-3-2", title:"3:2", sub:"Landscape panel", hint:"Best for wide action panels, environments, and cinematic scene moments." },
  "4:5": { icon:"ratio-4-5", title:"4:5", sub:"Social portrait", hint:"Best for Instagram-style portrait posts and character reveals." },
  "1:1": { icon:"ratio-1-1", title:"1:1", sub:"Square post", hint:"Best for profile posts, thumbnails, icons, and balanced social media images." },
  "16:9": { icon:"ratio-16-9", title:"16:9", sub:"Wide screen", hint:"Best for YouTube thumbnails, website banners, and cinematic landscape scenes." },
  "9:16": { icon:"ratio-9-16", title:"9:16", sub:"Story/Reel", hint:"Best for vertical reels, phone wallpapers, story posts, and tall comic teasers." },
  "A4 Portrait": { icon:"ratio-a4", title:"A4", sub:"Printable page", hint:"Best for printable posters, style sheets, pitch pages, and portfolio documents." },
  "US Comic Cover": { icon:"ratio-comic", title:"Comic", sub:"Cover trim", hint:"Best for traditional comic book cover layout and print-style cover mockups." },
  "Custom": { icon:"ratio-custom", title:"Custom", sub:"Manual size", hint:"Use this when a platform requires a specific ratio or pixel canvas." }
};

function renderAspectRatioCards() {
  const wrap = document.getElementById("aspectRatioCards");
  if (!wrap) return;
  wrap.innerHTML = Object.entries(aspectRatioMeta).map(([value, meta]) => `
    <button type="button" class="ratio-card" data-ratio="${value}" aria-label="Aspect ratio ${value}">
      <div class="ratio-icon-wrap"><div class="ratio-icon ${meta.icon}"></div></div>
      <div class="ratio-title">${meta.title}</div>
      <div class="ratio-sub">${meta.sub}</div>
    </button>
  `).join("");
  wrap.querySelectorAll(".ratio-card").forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("aspectRatioSelect").value = btn.dataset.ratio;
      syncAspectRatioCards();
      generateAll();
      saveState();
    });
  });
  syncAspectRatioCards();
}

function syncAspectRatioCards() {
  const selected = getSelect("aspectRatioSelect");
  document.querySelectorAll(".ratio-card").forEach(btn => {
    btn.classList.toggle("active", btn.dataset.ratio === selected);
  });
  const hint = document.getElementById("aspectRatioHint");
  if (hint) {
    const meta = aspectRatioMeta[selected];
    hint.textContent = meta ? meta.hint : "";
  }
}



const pickerMeta = {
  verseSelect: {
    target: "verseCards",
    hint: "verseCardsHint",
    items: {
      "PrimeVerse": { icon:"🌍", title:"Prime", sub:"Core reality", hint:"Balanced heroic/sci-fi world. Best for classic FAB superhero moments and central conflicts." },
      "RoboVerse": { icon:"🤖", title:"Robo", sub:"Machine age", hint:"Cyberpunk, AI, machines, dystopian futures, megacities, and tech-driven conflicts." },
      "StickVerse": { icon:"⚔️", title:"Stick", sub:"Combat zone", hint:"Minimalist battlefields, raw martial action, experimental motion, and arena-style layouts." },
      "ShadowVerse": { icon:"🌑", title:"Shadow", sub:"Dark realm", hint:"Dark fantasy, horror, curses, ancient evils, haunted lands, and heavy shadows." },
      "PhantomVerse": { icon:"👻", title:"Phantom", sub:"Life/death", hint:"Ghostly cities, spirit realms, paranormal mystery, mist, and eerie emotional tone." }
    }
  },
  mediumSelect: {
    target: "mediumCards",
    hint: "mediumCardsHint",
    items: {
      "Pencil Sketch": { icon:"✏️", title:"Pencil", sub:"graphite", hint:"Best for rough human-made sketch energy, visible mistakes, and low AI-polish." },
      "Colourful Comic": { icon:"🎨", title:"Comic", sub:"colour", hint:"Best for cover art and social posts where you need colour but still want hand-drawn control." },
      "Ink Drawing": { icon:"🖊️", title:"Ink", sub:"bold lines", hint:"Best for high-contrast black-and-white pages, shadows, and strong silhouettes." },
      "Oil Painting": { icon:"🖌️", title:"Oil", sub:"painterly", hint:"Best for dramatic posters and mythic covers, but keep polish controlled." },
      "Watercolor": { icon:"💧", title:"Water", sub:"soft wash", hint:"Best for emotional, ethereal, spiritual, or atmospheric scenes." },
      "Marker Illustration": { icon:"▰", title:"Marker", sub:"streaky", hint:"Best for hand-coloured concept sheets and bold but imperfect fills." },
      "Mixed Media": { icon:"✂️", title:"Mixed", sub:"layered", hint:"Best when combining pencil, ink, paper grain, and selective colour texture." }
    }
  },
  colourModeSelect: {
    target: "colourModeCards",
    hint: "colourModeCardsHint",
    items: {
      "Mostly Black and White": { icon:"◐", title:"B/W", sub:"mostly mono", hint:"Best for reducing polish and keeping rough comic sketch credibility." },
      "Selective Accent Colour": { icon:"◆", title:"Accent", sub:"1 colour", hint:"Best for power effects, symbolic costume colour, and clean visual identity." },
      "Muted Minimal Colour": { icon:"◒", title:"Muted", sub:"soft colour", hint:"Best for serious, mature, cinematic, but not glossy images." },
      "Colorful": { icon:"●", title:"Colourful", sub:"full colour", hint:"Best for bright covers and posters, but use strict negatives to avoid AI shine." },
      "Monochrome": { icon:"◌", title:"Mono", sub:"one tone", hint:"Best for horror, noir, mystery, and printable character studies." }
    }
  },
  outputTypeSelect: {
    target: "outputTypeCards",
    hint: "outputTypeCardsHint",
    items: {
      "Front Cover": { icon:"▯", title:"Cover", sub:"title-safe", hint:"Use title space, strong silhouette, and clean focal hierarchy." },
      "Interior Comic Panel": { icon:"▤", title:"Panel", sub:"story frame", hint:"Use readable action, lower detail, speech bubble space, and panel borders." },
      "Character Sheet": { icon:"☷", title:"Sheet", sub:"design refs", hint:"Use front/side/back or notes layout with plain background." },
      "Character Portrait": { icon:"◉", title:"Portrait", sub:"face study", hint:"Use head/shoulders, expression, costume collar, and clean character identity." },
      "Poster / Teaser": { icon:"★", title:"Poster", sub:"promo", hint:"Use dramatic layout, empty text area, and readable branding space." },
      "Scene Concept": { icon:"▱", title:"Scene", sub:"world view", hint:"Use environment, mood, worldbuilding, and lower character emphasis." }
    }
  },
  detailTargetSelect: {
    target: "detailTargetCards",
    hint: "detailTargetCardsHint",
    items: {
      "Very Minimal": { icon:"1", title:"Very Low", sub:"raw", hint:"Best for reducing AI-looking detail and keeping beginner sketch energy." },
      "Minimal": { icon:"2", title:"Minimal", sub:"clean base", hint:"Best for readable characters with simple costume and low clutter." },
      "Medium Controlled": { icon:"3", title:"Medium", sub:"balanced", hint:"Best when you need stronger cover quality without over-rendering." },
      "Detailed but Human": { icon:"4", title:"Human Detail", sub:"controlled", hint:"Use for final covers, but keep roughness and negative prompts strong." }
    }
  },
  brushStyleSelect: {
    target: "brushCards",
    hint: "brushCardsHint",
    items: {
      "Rough Graphite Brush": { icon:"✏️", title:"Graphite", sub:"rough", hint:"Best for pencil sketch, visible construction marks, and human roughness." },
      "Dry Brush": { icon:"≋", title:"Dry", sub:"grainy", hint:"Best for gritty shadows, worn surfaces, and rough indie texture." },
      "Soft Pencil Brush": { icon:"⌁", title:"Soft", sub:"gentle", hint:"Best for light sketching, soft faces, and subtle shading." },
      "Impasto Brush": { icon:"▣", title:"Impasto", sub:"thick", hint:"Best for oil-paint style, visible brush marks, and dramatic texture." },
      "Wet Watercolor Brush": { icon:"💧", title:"Wet", sub:"wash", hint:"Best for watercolor scenes, mist, spiritual tone, and soft edges." },
      "Technical Ink Brush": { icon:"🖊️", title:"Ink", sub:"precise", hint:"Best for black-and-white comic panels and strong line clarity." },
      "Marker Brush": { icon:"▰", title:"Marker", sub:"streaks", hint:"Best for bold hand-coloured concept art with visible marker texture." },
      "Mixed Texture Brush": { icon:"✂️", title:"Mixed", sub:"layered", hint:"Best for hybrid FAB cover experiments with paper, pencil, ink, and colour." }
    }
  },
  strokeStyleSelect: {
    target: "strokeCards",
    hint: "strokeCardsHint",
    items: {
      "Broken and Uneven": { icon:"〰", title:"Broken", sub:"uneven", hint:"Best for human-made roughness and avoiding overly smooth AI output." },
      "Loose and Sketchy": { icon:"⌁", title:"Loose", sub:"sketchy", hint:"Best for concept art, thumbnails, and raw creator sketch style." },
      "Controlled but Hand-Drawn": { icon:"✓", title:"Controlled", sub:"human", hint:"Best for readable covers while retaining hand-made imperfection." },
      "Scratchy Cross-Hatching": { icon:"≋", title:"Hatching", sub:"scratch", hint:"Best for dark shadows, horror, noir, and ink-heavy panels." },
      "Soft Wash Strokes": { icon:"≈", title:"Wash", sub:"soft", hint:"Best for watercolor, ghostly scenes, and atmospheric backgrounds." },
      "Bold Brush Strokes": { icon:"▮", title:"Bold", sub:"strong", hint:"Best for painterly covers and dramatic hero shapes." },
      "Bold Marker Strokes": { icon:"▰", title:"Marker", sub:"fill", hint:"Best for hand-coloured sheets and poster-like colour blocks." },
      "Layered Hand-Drawn Strokes": { icon:"☰", title:"Layered", sub:"mixed", hint:"Best for mixed media with visible process and texture." }
    }
  },
  cameraSelect: {
    target: "cameraCards",
    hint: "cameraCardsHint",
    items: {
      "simple front-facing cover view": { icon:"⬜", title:"Front", sub:"clear", hint:"Best for covers and character reveals with readable costume design." },
      "slight low-angle heroic view": { icon:"↗", title:"Low", sub:"heroic", hint:"Best for power and confidence, but avoid over-cinematic polish." },
      "three-quarter view": { icon:"◧", title:"3/4", sub:"dynamic", hint:"Best for natural character depth and less stiff posing." },
      "side profile": { icon:"◁", title:"Side", sub:"profile", hint:"Best for mystery, quiet mood, and dramatic silhouettes." },
      "close-up portrait": { icon:"◉", title:"Close", sub:"face", hint:"Best for emotion, expression, and character identity." },
      "wide scene composition": { icon:"▭", title:"Wide", sub:"scene", hint:"Best for environments, worldbuilding, and verse atmosphere." },
      "over-the-shoulder story panel": { icon:"↷", title:"OTS", sub:"story", hint:"Best for narrative panels and character viewpoint scenes." },
      "low-detail full-body view": { icon:"♙", title:"Full", sub:"body", hint:"Best for costume sheets and hero stance designs." }
    }
  },
  compositionSelect: {
    target: "compositionCards",
    hint: "compositionCardsHint",
    items: {
      "slightly off-centre framing": { icon:"◔", title:"Off-centre", sub:"human", hint:"Makes image feel less perfectly AI-composed." },
      "simple poster-like layout": { icon:"▯", title:"Poster", sub:"clean", hint:"Good for social posts and clear hero shots." },
      "rule-of-thirds but loose": { icon:"☷", title:"Thirds", sub:"loose", hint:"Balanced but still natural and hand-directed." },
      "rough thumbnail composition": { icon:"▧", title:"Thumb", sub:"raw", hint:"Best for sketchbook and creator process style." },
      "single-panel comic crop": { icon:"▤", title:"Panel", sub:"crop", hint:"Best for comic storytelling frames." },
      "cover-safe layout with title space": { icon:"▱", title:"Cover", sub:"title", hint:"Leaves space for title, logo, credits, and issue information." },
      "wide cinematic panel but low detail": { icon:"▭", title:"Wide", sub:"low detail", hint:"Good for action scenes without over-rendering." }
    }
  },
  lightingSelect: {
    target: "lightingCards",
    hint: "lightingCardsHint",
    items: {
      "flat shading, no digital lighting": { icon:"□", title:"Flat", sub:"safe", hint:"Best for reducing glossy AI render feel." },
      "soft graphite shadows only": { icon:"◒", title:"Soft", sub:"graphite", hint:"Best for pencil sketches and subtle depth." },
      "rough cross-hatching shadows": { icon:"≋", title:"Hatch", sub:"ink", hint:"Best for dramatic shadows and handmade texture." },
      "painted ambient light but restrained": { icon:"◐", title:"Ambient", sub:"muted", hint:"Useful for colour art without over-glossy lighting." },
      "misty diffuse light": { icon:"☁", title:"Misty", sub:"ethereal", hint:"Best for PhantomVerse and spiritual/paranormal scenes." },
      "high contrast ink shadows": { icon:"◑", title:"Contrast", sub:"dark", hint:"Best for ShadowVerse, horror, and dramatic mystery." }
    }
  },
  backgroundSelect: {
    target: "backgroundCards",
    hint: "backgroundCardsHint",
    items: {
      "very loose rough background": { icon:"⌁", title:"Loose", sub:"rough", hint:"Best for low-detail, non-intrusive comic backgrounds." },
      "blank white background with faint sketch marks": { icon:"□", title:"Blank", sub:"study", hint:"Best for character sheets and concept studies." },
      "simple rooftop edge and empty sky": { icon:"▔", title:"Roof", sub:"hero", hint:"Best for superhero cover poses." },
      "low-detail city silhouette only": { icon:"▥", title:"City", sub:"simple", hint:"Best for urban hero scenes without clutter." },
      "unfinished environment with guide lines": { icon:"▧", title:"Guides", sub:"process", hint:"Best for visible creator-process sketch feel." },
      "abstract verse-themed environment": { icon:"◇", title:"Abstract", sub:"verse", hint:"Best for StickVerse, RoboVerse, PhantomVerse, and symbolic layouts." },
      "distant symbolic landscape": { icon:"△", title:"Symbol", sub:"distant", hint:"Best for mythic, dark, or mystery-heavy scenes." }
    }
  }
};

function renderVisualPicker(selectId) {
  const config = pickerMeta[selectId];
  if (!config) return;
  const wrap = document.getElementById(config.target);
  if (!wrap) return;
  const select = document.getElementById(selectId);
  wrap.innerHTML = [...select.options].map(o => {
    const meta = config.items[o.value] || { icon:"?", title:o.value, sub:"option", hint:"" };
    return `<button type="button" class="visual-card" data-select="${selectId}" data-value="${o.value}">
      <div class="visual-icon">${meta.icon}</div>
      <div class="visual-title">${meta.title}</div>
      <div class="visual-sub">${meta.sub}</div>
    </button>`;
  }).join("");
  wrap.querySelectorAll(".visual-card").forEach(btn => {
    btn.addEventListener("click", () => {
      const el = document.getElementById(selectId);
      el.value = btn.dataset.value;
      el.dispatchEvent(new Event("change", { bubbles:true }));
      syncVisualPicker(selectId);
    });
  });
  syncVisualPicker(selectId);
}

function syncVisualPicker(selectId) {
  const config = pickerMeta[selectId];
  if (!config) return;
  const selected = getSelect(selectId);
  document.querySelectorAll(`#${config.target} .visual-card`).forEach(btn => {
    btn.classList.toggle("active", btn.dataset.value === selected);
  });
  const hint = document.getElementById(config.hint);
  if (hint) {
    const meta = config.items[selected];
    hint.textContent = meta ? meta.hint : "";
  }
}

function syncAllVisualPickers() {
  Object.keys(pickerMeta).forEach(syncVisualPicker);
}

const verses = {
  "PrimeVerse": {
    genre: "Superhero, Sci-Fi, Action",
    environment: "Earth-like world, futuristic cities, cosmic threats",
    note: "The PrimeVerse is the central reality and the core of order and structure. It is where the greatest battles and multiversal disruptions often begin.",
    visual: "balanced heroic composition, grounded city environment, clean but not over-polished superhero energy, cosmic tension kept restrained",
    mood: "heroic, urgent, grounded, hopeful",
    scene: "Earth-like city rooftop with futuristic hints and a distant cosmic disturbance",
    palette: [["#0A0A0A","Ink Black"],["#F2EFE9","Paper White"],["#2563EB","Hero Blue"],["#F59E0B","Signal Gold"],["#6B7280","City Grey"]]
  },
  "RoboVerse": {
    genre: "Cyberpunk, Sci-Fi, Dystopian Future",
    environment: "High-tech megacities, AI-controlled societies, cyber wastelands",
    note: "The RoboVerse is a machine-dominated future where technology has surpassed humanity and conflicts emerge between humans, AI, machines, and enhanced beings.",
    visual: "angular machine silhouettes, cyberpunk megacity atmosphere, mechanical textures, restrained neon accents, dystopian technology",
    mood: "tense, futuristic, controlled, mechanical",
    scene: "high-tech megacity edge with AI surveillance towers and rough cyber-wasteland shapes",
    palette: [["#050505","Machine Black"],["#E5E7EB","Steel White"],["#00D4FF","Cyber Cyan"],["#7C3AED","Signal Violet"],["#4B5563","Industrial Grey"]]
  },
  "StickVerse": {
    genre: "Martial Arts, Minimalist Action, Experimental",
    environment: "Abstract landscapes, battle arenas, shifting warzones",
    note: "The StickVerse strips reality down to raw combat, skill, power, and survival. Strength, movement, and impact shape the visual language.",
    visual: "minimalist action shapes, abstract arena space, raw motion lines, simplified bodies, combat-first composition",
    mood: "raw, aggressive, kinetic, experimental",
    scene: "abstract battle arena with shifting ground lines and minimalist impact marks",
    palette: [["#0A0A0A","Combat Black"],["#FFFFFF","Void White"],["#EF4444","Impact Red"],["#FACC15","Strike Yellow"],["#737373","Arena Grey"]]
  },
  "ShadowVerse": {
    genre: "Dark Fantasy, Horror, Supernatural",
    environment: "Haunted wastelands, cursed fortresses, shadowy dominions",
    note: "The ShadowVerse is a cursed realm where darkness feeds on everything. It carries black magic, lost souls, ancient evils, and supernatural horror.",
    visual: "heavy shadow shapes, haunted silhouettes, cursed textures, broken architecture, dark fantasy horror atmosphere",
    mood: "dark, haunted, cursed, dangerous",
    scene: "haunted wasteland near a cursed fortress, shadowy dominion in the distance",
    palette: [["#020202","Void Black"],["#E5E5E5","Ghost White"],["#7F1D1D","Blood Shadow"],["#4C1D95","Dark Violet"],["#525252","Ash Grey"]]
  },
  "PhantomVerse": {
    genre: "Paranormal, Mystery, Ethereal Adventure",
    environment: "Ghostly cities, spirit realms, eerie landscapes",
    note: "The PhantomVerse sits between life and death, where lost souls, spirit realms, forbidden knowledge, and eerie mysteries shape reality.",
    visual: "misty atmosphere, translucent silhouettes, eerie negative space, spirit-realm texture, quiet paranormal mystery",
    mood: "mysterious, quiet, eerie, spiritual",
    scene: "ghostly city edge fading into a misty spirit realm with eerie empty streets",
    palette: [["#0B1020","Night Ink"],["#F8FAFC","Spirit White"],["#A7F3D0","Spectral Mint"],["#93C5FD","Phantom Blue"],["#6B7280","Mist Grey"]]
  }
};

const mediumPresets = {
  "Pencil Sketch": {
    brush: "Rough Graphite Brush", stroke: "Broken and Uneven", colour: "Mostly Black and White",
    note: "Use graphite linework, visible sketch marks, paper grain, smudges, unfinished edges, and minimal shading. Best for human-made rough comic studies.",
    sliders: [3,4,9,8,4,1]
  },
  "Colourful Comic": {
    brush: "Soft Pencil Brush", stroke: "Controlled but Hand-Drawn", colour: "Colorful",
    note: "Use flat comic colour, restrained texture, simple readable shapes, and controlled hand-drawn outlines. Avoid glossy digital rendering.",
    sliders: [4,6,6,5,5,3]
  },
  "Ink Drawing": {
    brush: "Technical Ink Brush", stroke: "Scratchy Cross-Hatching", colour: "Monochrome",
    note: "Use bold ink contours, scratchy shadows, broken hatch marks, expressive black-and-white contrast, and no airbrushed gradients.",
    sliders: [7,7,6,5,7,2]
  },
  "Oil Painting": {
    brush: "Impasto Brush", stroke: "Bold Brush Strokes", colour: "Muted Minimal Colour",
    note: "Use painterly brush texture, visible thick strokes, muted colour masses, and imperfect hand-painted edges. Avoid photo-realistic finish.",
    sliders: [6,7,5,7,5,4]
  },
  "Watercolor": {
    brush: "Wet Watercolor Brush", stroke: "Soft Wash Strokes", colour: "Selective Accent Colour",
    note: "Use translucent washes, soft pigment bleed, paper texture, pale edges, and gentle imperfections. Avoid digital glow and perfect gradients.",
    sliders: [2,3,5,7,2,3]
  },
  "Marker Illustration": {
    brush: "Marker Brush", stroke: "Bold Marker Strokes", colour: "Muted Minimal Colour",
    note: "Use visible marker streaks, simple shape fills, uneven overlap areas, and hand-coloured texture. Avoid smooth digital fill.",
    sliders: [5,6,5,5,5,3]
  },
  "Mixed Media": {
    brush: "Mixed Texture Brush", stroke: "Layered Hand-Drawn Strokes", colour: "Selective Accent Colour",
    note: "Combine pencil, ink, texture overlays, paper grain, and selective colour. Keep the design controlled and not over-rendered.",
    sliders: [5,5,7,8,5,2]
  }
};

const brushOptions = ["Rough Graphite Brush","Dry Brush","Soft Pencil Brush","Impasto Brush","Wet Watercolor Brush","Technical Ink Brush","Marker Brush","Mixed Texture Brush"];
const strokeOptions = ["Broken and Uneven","Loose and Sketchy","Controlled but Hand-Drawn","Scratchy Cross-Hatching","Soft Wash Strokes","Bold Brush Strokes","Bold Marker Strokes","Layered Hand-Drawn Strokes"];
const cameraOptions = ["simple front-facing cover view","slight low-angle heroic view","three-quarter view","side profile","close-up portrait","wide scene composition","over-the-shoulder story panel","low-detail full-body view"];
const compositionOptions = ["slightly off-centre framing","simple poster-like layout","rule-of-thirds but loose","rough thumbnail composition","single-panel comic crop","cover-safe layout with title space","wide cinematic panel but low detail"];
const lightingOptions = ["flat shading, no digital lighting","soft graphite shadows only","rough cross-hatching shadows","painted ambient light but restrained","misty diffuse light","high contrast ink shadows"];
const backgroundOptions = ["very loose rough background","blank white background with faint sketch marks","simple rooftop edge and empty sky","low-detail city silhouette only","unfinished environment with guide lines","abstract verse-themed environment","distant symbolic landscape"];

const defaults = {
  creator: "Tansheet Ali",
  project: "FAB Comics Universe",
  version: "v8.0",
  useCase: "Comic cover / panel / character sheet",
  adj1: "rough",
  adj2: "human",
  adj3: "original",
  styleName: "FAB Rough Graphite Indie Comic Style",
  styleDefinition: "Original FAB Comics house style: rough low-detail comic art, human sketchbook imperfections, uneven linework, visible construction marks, simple heroic anatomy, slightly awkward hands, unfinished edges, and controlled original design language.",
  characterName: "FrostForge",
  characterIdentity: "original Pakistani ice-powered superhero",
  ageBuild: "young adult, lean heroic build, not bodybuilder",
  expression: "calm, guarded, determined, slightly tired eyes",
  pose: "standing in a simple guarded heroic pose, one hand raised slightly",
  costume: "simple flat armour shapes, no complex costume details, no logos, no trademarked elements",
  scene: "rough low-detail rooftop above a loose city sketch",
  mood: "quiet, guarded, hopeful, human and imperfect",
  brandNote: "FAB Comics is an independent Pakistani digital-first comic publisher focused on original characters, South Asian storytelling, interconnected fictional universes, and long-term IP development.",
  originalityRules: "original IP character design, no named artist imitation, no franchise costume elements, no trademarked logos, no publisher-style copying, no protected character resemblance",
  manualEditPlan: "after generation: reduce excessive detail, remove unwanted glow, simplify costume, correct hands, add logo and text manually, crop for final layout",
  iterationNotes: "if output feels too polished, lower polish, increase roughness, simplify background, remove glow/VFX, and strengthen strict negative modules",
  customNegative: "no accidental border decorations, no extra accessories unless requested, no overdesigned armor patterns",
  processBefore: "Before AI: rough thumbnail sketch, character notes, scene idea, verse selection.",
  processDuring: "During AI: prompt generated from this prompt bible, medium and brush controls selected, strict negative prompt attached.",
  processAfter: "After AI: manual cleanup, crop, text placement, logo placement, detail reduction, and final human review.",
  detectorScore: "Example: 94% AI Generated, high confidence",
  detectorReasoning: "Detector flagged perfect anatomy and pose, unnatural lighting effects, synthetic textures, inconsistent shadows, artificial glow, saturated gradients, and AI-perfect composition.",
  detectorManualPlan: "Manual correction plan: remove glowing VFX, repaint energy as faint pencil marks, roughen anatomy, simplify clothing texture, flatten lighting, reduce colour saturation, and add visible handmade sketch imperfections.",
  footer: "fabcomicsuniverse.com • @fab.comics"
};

const paletteEl = document.getElementById("palette");
let suppressAuto = false;

function fillSelect(id, values) {
  const el = document.getElementById(id);
  el.innerHTML = values.map(v => `<option>${v}</option>`).join("");
}
function toast(message="Copied ✅") {
  const el = document.getElementById("toast");
  el.textContent = message; el.classList.add("show");
  setTimeout(() => el.classList.remove("show"), 1500);
}
function getValue(key) { const el = document.querySelector(`[data-key="${key}"]`); return el ? el.textContent.trim() : ""; }
function setValue(key, value) { const el = document.querySelector(`[data-key="${key}"]`); if (el) el.textContent = value || ""; }
function getRange(id) { return Number(document.getElementById(id).value || 0); }
function getSelect(id) { return document.getElementById(id).value || ""; }
function setSelect(id, value) { const el = document.getElementById(id); if ([...el.options].some(o => o.value === value)) el.value = value; }

function renderPalette(data) {
  paletteEl.innerHTML = "";
  data.forEach((c, i) => {
    const wrap = document.createElement("div");
    wrap.className = "group"; wrap.setAttribute("data-palette-index", i);
    wrap.innerHTML = `
      <button class="w-full aspect-square rounded-xl border border-zinc-300 shadow-inner relative overflow-hidden transition hover:scale-[1.02]" style="background:${c[0]}">
        <input type="color" value="${c[0]}" class="absolute opacity-0 pointer-events-none w-0 h-0">
      </button>
      <input type="text" value="${c[0]}" class="mt-1.5 w-full text-center text-[11px] mono bg-transparent outline-none border-0 p-0 focus:ring-0">
      <div contenteditable="true" class="text-[11px] text-center text-zinc-600 leading-tight mt-0.5">${c[1]}</div>`;
    paletteEl.appendChild(wrap);
    const btn = wrap.querySelector("button");
    const colorInput = wrap.querySelector('input[type="color"]');
    const hexInput = wrap.querySelector('input[type="text"]');
    const nameInput = wrap.querySelector('[contenteditable="true"]');
    btn.addEventListener("click", () => colorInput.click());
    const update = val => {
      const v = val.toUpperCase();
      btn.style.background = v; hexInput.value = v; colorInput.value = v;
      generateAll(); saveState();
    };
    colorInput.addEventListener("input", e => update(e.target.value));
    hexInput.addEventListener("change", e => {
      let v = e.target.value.trim(); if(!v.startsWith("#")) v = "#" + v;
      if(/^#([0-9A-F]{3}){1,2}$/i.test(v)) update(v);
    });
    nameInput.addEventListener("input", () => { generateAll(); saveState(); });
  });
}
function getPalette() {
  return [...document.querySelectorAll("[data-palette-index]")].map(wrap => ({
    hex: wrap.querySelector('input[type="text"]').value.trim(),
    name: wrap.querySelector('[contenteditable="true"]').textContent.trim()
  }));
}

function applyVerse(verseName, autoFill=true) {
  const v = verses[verseName] || verses.PrimeVerse;
  document.getElementById("verseGenre").textContent = v.genre;
  document.getElementById("verseEnvironment").textContent = v.environment;
  document.getElementById("verseNote").textContent = v.note;
  document.getElementById("verseVisualDirection").textContent = v.visual;
  if (autoFill && document.getElementById("autoAdjustToggle").checked) {
    setValue("scene", v.scene);
    setValue("mood", v.mood);
    renderPalette(v.palette);
    if (verseName === "RoboVerse") { setSelect("backgroundSelect","abstract verse-themed environment"); setSelect("lightingSelect","painted ambient light but restrained"); }
    if (verseName === "StickVerse") { setSelect("backgroundSelect","abstract verse-themed environment"); setSelect("compositionSelect","wide cinematic panel but low detail"); }
    if (verseName === "ShadowVerse") { setSelect("lightingSelect","high contrast ink shadows"); setSelect("backgroundSelect","distant symbolic landscape"); }
    if (verseName === "PhantomVerse") { setSelect("lightingSelect","misty diffuse light"); setSelect("backgroundSelect","abstract verse-themed environment"); }
  }
}

function applyMedium(medium, autoSliders=true) {
  const p = mediumPresets[medium] || mediumPresets["Pencil Sketch"];
  document.getElementById("mediumNote").textContent = p.note;
  if (autoSliders && document.getElementById("autoAdjustToggle").checked) {
    setSelect("brushStyleSelect", p.brush);
    setSelect("strokeStyleSelect", p.stroke);
    setSelect("colourModeSelect", p.colour);
    const ids = ["hardnessRange","intensityRange","roughnessRange","textureRange","lineWeightRange","polishRange"];
    ids.forEach((id, i) => document.getElementById(id).value = p.sliders[i]);
  }
}

function aspectRatioValue() {
  const ar = getSelect("aspectRatioSelect");
  const custom = document.getElementById("customAspectInput").value.trim();
  if (ar === "Custom" && custom) return custom;
  if (ar === "A4 Portrait") return "A4 portrait";
  if (ar === "US Comic Cover") return "6.625:10.25 comic cover ratio";
  return ar;
}

function rangeLanguage() {
  const hardness = getRange("hardnessRange"), intensity = getRange("intensityRange"), roughness = getRange("roughnessRange"), texture = getRange("textureRange"), lineWeight = getRange("lineWeightRange"), polish = getRange("polishRange");
  return {
    hardness: hardness <= 3 ? "soft brush hardness" : hardness <= 6 ? "medium brush hardness" : "hard brush edges",
    intensity: intensity <= 3 ? "light stroke intensity" : intensity <= 6 ? "moderate stroke intensity" : "strong stroke intensity",
    roughness: roughness <= 3 ? "cleaner handmade finish" : roughness <= 6 ? "noticeable hand-drawn roughness" : "maximum roughness with visible sketchbook imperfections",
    texture: texture <= 3 ? "light surface texture" : texture <= 6 ? "medium texture strength" : "heavy paper/surface texture",
    lineWeight: lineWeight <= 3 ? "thin line weight" : lineWeight <= 6 ? "medium line weight" : "thick expressive line weight",
    polish: polish <= 3 ? "raw unfinished look" : polish <= 6 ? "semi-clean but still handmade" : "cleaner final presentation without digital gloss"
  };
}

function brushLanguage() {
  const r = rangeLanguage();
  return `${getSelect("brushStyleSelect")}; ${getSelect("strokeStyleSelect")}; ${r.hardness}; ${r.intensity}; ${r.roughness}; ${r.texture}; ${r.lineWeight}; ${r.polish}.`;
}
function compositionLanguage() {
  return `${getSelect("cameraSelect")}; ${getSelect("compositionSelect")}; ${getSelect("lightingSelect")}; ${getSelect("backgroundSelect")}.`;
}
function paletteText() {
  return getPalette().filter(c => c.hex || c.name).map(c => `${c.name || "colour"} (${c.hex || "no hex"})`).join(", ");
}
function strictNegativePrompt() {
  const chunks = [...document.querySelectorAll(".strictCheck")].filter(x => x.checked).map(x => x.dataset.neg);
  const custom = getValue("customNegative");
  if (custom) chunks.push(custom);
  const detectorNeg = detectorNegativeLanguage();
  if (detectorNeg) chunks.push(detectorNeg);
  return chunks.join(", ") + ".";
}


const detectorFixMap = {
  anatomy: { prompt: "make anatomy slightly imperfect and human-drawn, avoid perfect heroic proportions, add small asymmetry and natural pose irregularities", negative: "no perfect anatomy, no mannequin-like pose, no flawless heroic body proportions" },
  glow: { prompt: "replace bright magical glow with faint hand-drawn energy marks, subtle pencil strokes, low-intensity aura, no digital bloom", negative: "no artificial glow, no neon energy bloom, no digital VFX light, no luminous particle effects" },
  texture: { prompt: "make clothing and scarf texture rough, simplified, hand-shaded, with uneven pencil/brush marks instead of synthetic fabric detail", negative: "no synthetic fabric texture, no over-rendered cloth, no plastic clothing, no AI-smooth scarf" },
  shadows: { prompt: "use one simple consistent light direction, flat shading, restrained shadows, no cinematic multi-source lighting", negative: "no inconsistent shadows, no dramatic conflicting light sources, no cinematic digital lighting" },
  saturation: { prompt: "reduce saturation, use muted colour, avoid smooth gradients, keep colour accents faint and manually controlled", negative: "no saturated gradients, no neon colour, no artificial colour bloom, no glossy digital colour" },
  composition: { prompt: "make composition slightly off-centre and less perfect, preserve rough thumbnail feeling and uneven margins", negative: "no AI-perfect composition, no overly balanced poster layout, no flawless symmetry" },
  hyperreal: { prompt: "avoid hyper-real fantasy rendering, keep it as comic illustration with rough handmade marks and simplified rendering", negative: "no hyper-real rendering, no polished fantasy concept art, no photorealistic fantasy look" },
  background: { prompt: "make character and background share the same texture, lighting and roughness; use consistent handmade treatment across the whole image", negative: "no mismatch between character and background, no pasted-on figure, no inconsistent style layers" }
};

function detectorFixLanguage() {
  const checked = [...document.querySelectorAll(".detectorIssue:checked")].map(x => x.dataset.fix);
  if (!checked.length) return "";
  return checked.map(k => detectorFixMap[k]?.prompt).filter(Boolean).join("; ") + ".";
}
function detectorNegativeLanguage() {
  const checked = [...document.querySelectorAll(".detectorIssue:checked")].map(x => x.dataset.fix);
  if (!checked.length) return "";
  return checked.map(k => detectorFixMap[k]?.negative).filter(Boolean).join(", ") + ".";
}
function updateDetectorFixStrategy() {
  const box = document.getElementById("detectorFixStrategy");
  if (!box) return;
  const strategy = detectorFixLanguage();
  box.textContent = strategy || "No detector issues selected yet. Tick the issues from the detector report, then the prompt will add targeted corrections automatically.";
}

function universalPrompt() {
  const verse = verses[getSelect("verseSelect")] || verses.PrimeVerse;
  return `${getValue("characterName")}, ${getValue("characterIdentity")}. Verse: ${getSelect("verseSelect")}. Genre: ${verse.genre}. Environment: ${verse.environment}. Verse note: ${verse.note}

Use case: ${getValue("useCase")}. Output type: ${getSelect("outputTypeSelect")}. Aspect ratio: ${aspectRatioValue()}.

Character details: age/build ${getValue("ageBuild")}; expression ${getValue("expression")}; pose/action ${getValue("pose")}; costume ${getValue("costume")}; scene ${getValue("scene")}; mood ${getValue("mood")}.

FAB Comics direction: ${getValue("brandNote")}

Style: ${getValue("styleName")} — ${getValue("styleDefinition")}.

Art medium: ${getSelect("mediumSelect")}. Medium note: ${document.getElementById("mediumNote").textContent}. Colour mode: ${getSelect("colourModeSelect")}. Detail target: ${getSelect("detailTargetSelect")}.

Brush and stroke language: ${brushLanguage()}

Texture, colour and palette: ${document.getElementById("verseVisualDirection").textContent}; ${paletteText()}.

Composition: ${compositionLanguage()} Composition note: ${document.getElementById("compositionNote").textContent}

Originality and safety: ${getValue("originalityRules")}.

Manual finishing plan: ${getValue("manualEditPlan")}.

Detector feedback mitigation: ${detectorFixLanguage()} Manual correction plan: ${getValue("detectorManualPlan")}.

Keep the result original, visually controlled, aligned with ${getSelect("verseSelect")}, and free from unwanted intrusions.`;
}

function promptForTool(tool) {
  const base = universalPrompt();
  const neg = strictNegativePrompt();
  if (tool === "midjourney") {
    return `${base}

Midjourney parameter suggestion:
--ar ${aspectRatioValue()} --stylize 30 --chaos 6

Use restrained stylization. Avoid over-polish, over-rendering, random intrusions, unwanted text, and franchise-like design.`;
  }
  if (tool === "sd") {
    return `POSITIVE PROMPT:
${base}

NEGATIVE PROMPT:
${neg}

Suggested settings:
CFG: 4–6
Steps: 20–30
Style strength: low to medium
Use img2img with your own rough sketch when possible.`;
  }
  if (tool === "dalle") {
    return `${base}

Please follow the selected FAB verse, art medium, brush style, stroke style, aspect ratio, and strict negative direction closely. Do not introduce extra characters, extra props, random text, logos, watermarks, or franchise-style design.`;
  }
  if (tool === "negative") return neg;
  if (tool === "process") return processNote();
  return base;
}

function processNote() {
  return `${getValue("processBefore")}
${getValue("processDuring")}
${getValue("processAfter")}
Iteration notes: ${getValue("iterationNotes")}
This visual direction is based on original creator input, custom FAB Comics verse lore, custom style rules, manual medium/brush selection, and human review/editing.`;
}

function runQualityCheck() {
  const text = (universalPrompt() + " " + strictNegativePrompt()).toLowerCase();
  let score = 60;
  ["original","verse","brush","stroke","aspect ratio","manual finishing","no extra fingers","no random background","no watermark","no named artist"].forEach(x => { if(text.includes(x)) score += 3; });
  score += Math.max(0, getRange("roughnessRange") - 5) * 2;
  score += Math.max(0, getRange("textureRange") - 4);
  score -= Math.max(0, getRange("polishRange") - 4) * 4;
  if (document.querySelectorAll(".strictCheck:checked").length >= 7) score += 8;
  score = Math.max(0, Math.min(100, Math.round(score)));

  const box = document.getElementById("qualityBox");
  box.className = "field text-xs font-bold mb-3";
  if (score >= 82) { box.classList.add("score-good"); box.textContent = `Prompt Readiness: ${score}/100 — strong control and strict safety`; }
  else if (score >= 62) { box.classList.add("score-mid"); box.textContent = `Prompt Readiness: ${score}/100 — good, but can still be tightened`; }
  else { box.classList.add("score-bad"); box.textContent = `Prompt Readiness: ${score}/100 — needs stronger controls before copy-paste`; }

  const bullets = [
    `✅ Verse: ${getSelect("verseSelect")}`,
    `✅ Medium: ${getSelect("mediumSelect")}`,
    `✅ Colour Mode: ${getSelect("colourModeSelect")}`,
    `✅ Aspect Ratio: ${aspectRatioValue()}`,
    `✅ Brush: ${getSelect("brushStyleSelect")}`,
    `✅ Stroke: ${getSelect("strokeStyleSelect")}`,
    `✅ Strict negative modules: ${document.querySelectorAll(".strictCheck:checked").length}/8`
  ];
  document.getElementById("qualityList").innerHTML = bullets.map(b => `<div>${b}</div>`).join("");

  const fixes = [];
  if (getRange("polishRange") > 4) fixes.push("Lower Polish to reduce overly clean AI finish.");
  if (document.querySelectorAll(".strictCheck:checked").length < 6) fixes.push("Enable more strict negative modules to reduce intrusions.");
  if (getSelect("aspectRatioSelect") === "Custom" && !document.getElementById("customAspectInput").value.trim()) fixes.push("Enter a custom aspect ratio.");
  if (!getValue("manualEditPlan")) fixes.push("Add a manual finishing plan.");
  if (getRange("roughnessRange") < 5 && getSelect("mediumSelect") === "Pencil Sketch") fixes.push("Increase Roughness for pencil sketch output.");
  document.getElementById("quickFixes").textContent = fixes.length ? fixes.join(" ") : "Looks ready. Copy the selected prompt and keep your production trail.";

  document.getElementById("preflightReport").value = `PROMPT PREFLIGHT REPORT
Readiness Score: ${score}/100

Verse: ${getSelect("verseSelect")}
Genre: ${(verses[getSelect("verseSelect")] || verses.PrimeVerse).genre}
Medium: ${getSelect("mediumSelect")}
Colour Mode: ${getSelect("colourModeSelect")}
Aspect Ratio: ${aspectRatioValue()}
Output Type: ${getSelect("outputTypeSelect")}
Brush Style: ${getSelect("brushStyleSelect")}
Stroke Style: ${getSelect("strokeStyleSelect")}

Strict Negative Modules Enabled: ${document.querySelectorAll(".strictCheck:checked").length}/8
Detector Issues Selected: ${document.querySelectorAll(".detectorIssue:checked").length}/8
Detector Score Note: ${getValue("detectorScore")}

Quick Fixes:
${fixes.length ? fixes.map(x => "- " + x).join("\n") : "- No major issues detected."}

Reminder:
This tool improves prompt control. It does not guarantee any detector score or perfect output.`;
}

function updateDerivedFields() {
  const v = verses[getSelect("verseSelect")] || verses.PrimeVerse;
  document.getElementById("verseGenre").textContent = v.genre;
  document.getElementById("verseEnvironment").textContent = v.environment;
  document.getElementById("verseNote").textContent = v.note;
  document.getElementById("verseVisualDirection").textContent = v.visual;
  document.getElementById("mediumNote").textContent = mediumPresets[getSelect("mediumSelect")].note;
  document.getElementById("brushLanguage").textContent = brushLanguage();
  document.getElementById("compositionNote").textContent = `${getSelect("outputTypeSelect")} should use ${compositionLanguage()} Keep the background controlled and avoid visual clutter.`;
}

function generateAll() {
  updateDerivedFields();
  updateDetectorFixStrategy();
  syncAspectRatioCards();
  syncAllVisualPickers();
  document.getElementById("selectedPrompt").value = promptForTool(activeTab);
  document.getElementById("negativePrompt").value = strictNegativePrompt();
  runQualityCheck();
}

function autoTune() {
  suppressAuto = true;
  const medium = getSelect("mediumSelect");
  const p = mediumPresets[medium];
  setSelect("brushStyleSelect", p.brush);
  setSelect("strokeStyleSelect", p.stroke);
  setSelect("colourModeSelect", p.colour);
  ["hardnessRange","intensityRange","roughnessRange","textureRange","lineWeightRange","polishRange"].forEach((id, i) => document.getElementById(id).value = p.sliders[i]);

  const v = verses[getSelect("verseSelect")] || verses.PrimeVerse;
  setValue("scene", v.scene);
  setValue("mood", v.mood);
  renderPalette(v.palette);

  if (getSelect("outputTypeSelect") === "Front Cover") setSelect("compositionSelect","cover-safe layout with title space");
  if (getSelect("outputTypeSelect") === "Interior Comic Panel") setSelect("compositionSelect","single-panel comic crop");
  if (getSelect("outputTypeSelect") === "Character Sheet") setSelect("backgroundSelect","blank white background with faint sketch marks");
  if (getSelect("outputTypeSelect") === "Character Portrait") setSelect("cameraSelect","close-up portrait");

  suppressAuto = false;
  generateAll();
  saveState();
  toast("Auto-tuned current combination ✅");
}

function collectState() {
  const state = {};
  document.querySelectorAll("[data-key]").forEach(el => state[el.dataset.key] = el.textContent.trim());
  ["verseSelect","mediumSelect","colourModeSelect","aspectRatioSelect","customAspectInput","outputTypeSelect","detailTargetSelect","brushStyleSelect","strokeStyleSelect","cameraSelect","compositionSelect","lightingSelect","backgroundSelect","hardnessRange","intensityRange","roughnessRange","textureRange","lineWeightRange","polishRange"].forEach(id => state[id] = document.getElementById(id).value);
  state.autoAdjust = document.getElementById("autoAdjustToggle").checked;
  state.palette = getPalette();
  state.strictChecks = [...document.querySelectorAll(".strictCheck")].map(x => x.checked);
  state.detectorIssues = [...document.querySelectorAll(".detectorIssue")].map(x => x.checked);
  return state;
}
function saveState() { localStorage.setItem(STORAGE_KEY, JSON.stringify(collectState())); }

function loadDefaults() {
  Object.entries(defaults).forEach(([k,v]) => setValue(k,v));
  setSelect("verseSelect","PrimeVerse");
  setSelect("mediumSelect","Pencil Sketch");
  setSelect("aspectRatioSelect","2:3");
  setSelect("outputTypeSelect","Front Cover");
  autoTune();
}

function loadState() {
  const raw = localStorage.getItem(STORAGE_KEY);
  if (!raw) { loadDefaults(); return; }
  try {
    const state = JSON.parse(raw);
    Object.entries(defaults).forEach(([k,v]) => setValue(k, state[k] || v));
    ["verseSelect","mediumSelect","colourModeSelect","aspectRatioSelect","customAspectInput","outputTypeSelect","detailTargetSelect","brushStyleSelect","strokeStyleSelect","cameraSelect","compositionSelect","lightingSelect","backgroundSelect","hardnessRange","intensityRange","roughnessRange","textureRange","lineWeightRange","polishRange"].forEach(id => { if(state[id] !== undefined) document.getElementById(id).value = state[id]; });
    document.getElementById("autoAdjustToggle").checked = state.autoAdjust !== false;
    renderPalette(state.palette ? state.palette.map(c => [c.hex, c.name]) : verses.PrimeVerse.palette);
    if (state.strictChecks) [...document.querySelectorAll(".strictCheck")].forEach((x,i) => x.checked = !!state.strictChecks[i]);
    if (state.detectorIssues) [...document.querySelectorAll(".detectorIssue")].forEach((x,i) => x.checked = !!state.detectorIssues[i]);
    generateAll();
  } catch { loadDefaults(); }
}

function fullPack() {
  return `UNIVERSAL PROMPT
${promptForTool("universal")}

MIDJOURNEY PROMPT
${promptForTool("midjourney")}

STABLE DIFFUSION PROMPT
${promptForTool("sd")}

DALL·E / CHATGPT PROMPT
${promptForTool("dalle")}

STRICT NEGATIVE PROMPT
${strictNegativePrompt()}

PROCESS NOTE
${processNote()}`;
}
async function copyText(text) {
  try { await navigator.clipboard.writeText(text); toast(); }
  catch { const t=document.createElement("textarea"); t.value=text; document.body.appendChild(t); t.select(); document.execCommand("copy"); t.remove(); toast(); }
}
function downloadFile(filename, content, type="text/plain") {
  const blob = new Blob([content], {type});
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a"); a.href = url; a.download = filename; a.click();
  URL.revokeObjectURL(url);
}

fillSelect("verseSelect", Object.keys(verses));
fillSelect("brushStyleSelect", brushOptions);
fillSelect("strokeStyleSelect", strokeOptions);
fillSelect("cameraSelect", cameraOptions);
fillSelect("compositionSelect", compositionOptions);
fillSelect("lightingSelect", lightingOptions);
fillSelect("backgroundSelect", backgroundOptions);
renderAspectRatioCards();
Object.keys(pickerMeta).forEach(renderVisualPicker);

document.addEventListener("input", e => {
  if (e.target.matches("[contenteditable='true'], textarea, input")) { generateAll(); saveState(); }
});
document.addEventListener("change", e => {
  if (suppressAuto) return;
  if (e.target.id === "verseSelect" && document.getElementById("autoAdjustToggle").checked) {
    const v = verses[getSelect("verseSelect")] || verses.PrimeVerse;
    setValue("scene", v.scene);
    setValue("mood", v.mood);
    renderPalette(v.palette);
  }
  if (e.target.id === "mediumSelect" && document.getElementById("autoAdjustToggle").checked) {
    const p = mediumPresets[getSelect("mediumSelect")];
    setSelect("brushStyleSelect", p.brush);
    setSelect("strokeStyleSelect", p.stroke);
    setSelect("colourModeSelect", p.colour);
    ["hardnessRange","intensityRange","roughnessRange","textureRange","lineWeightRange","polishRange"].forEach((id, i) => document.getElementById(id).value = p.sliders[i]);
  }
  if (e.target.matches("select, input[type='checkbox'], input[type='range']")) { generateAll(); saveState(); }
});

document.querySelectorAll(".promptTab").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll(".promptTab").forEach(x => x.classList.remove("tab-active"));
    btn.classList.add("tab-active");
    activeTab = btn.dataset.tab;
    generateAll();
  });
});
document.querySelectorAll(".preset-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    const map = { pencil:"Pencil Sketch", colorful:"Colourful Comic", ink:"Ink Drawing", oil:"Oil Painting", watercolor:"Watercolor", poster:"Colourful Comic" };
    setSelect("mediumSelect", map[btn.dataset.preset]);
    if (btn.dataset.preset === "poster") setSelect("outputTypeSelect","Poster / Teaser");
    autoTune();
  });
});


document.getElementById("applyDetectorFixesBtn").addEventListener("click", () => {
  document.querySelectorAll(".detectorIssue").forEach(x => x.checked = true);
  document.getElementById("polishRange").value = 1;
  document.getElementById("roughnessRange").value = 10;
  document.getElementById("textureRange").value = 8;
  document.getElementById("intensityRange").value = 3;
  setSelect("colourModeSelect", "Muted Minimal Colour");
  setSelect("lightingSelect", "flat shading, no digital lighting");
  setSelect("compositionSelect", "slightly off-centre framing");
  generateAll();
  saveState();
  toast("Detector fixes applied ✅");
});

document.getElementById("clearDetectorFixesBtn").addEventListener("click", () => {
  document.querySelectorAll(".detectorIssue").forEach(x => x.checked = false);
  generateAll();
  saveState();
  toast("Detector checks cleared ✅");
});

document.getElementById("fillDefaultsBtn").addEventListener("click", () => { loadDefaults(); toast("FAB defaults loaded ✅"); });
document.getElementById("autoTuneBtn").addEventListener("click", autoTune);
document.getElementById("preflightBtn").addEventListener("click", () => { runQualityCheck(); toast("Pre-flight complete ✅"); });
document.getElementById("copySelectedBtn").addEventListener("click", () => copyText(document.getElementById("selectedPrompt").value));
document.getElementById("copyAllBtn").addEventListener("click", () => copyText(fullPack()));
document.getElementById("exportTxtBtn").addEventListener("click", () => downloadFile("fab-comics-multiverse-prompt-style-bible-v8.txt", fullPack()));
document.getElementById("exportJsonBtn").addEventListener("click", () => downloadFile("fab-comics-multiverse-prompt-style-bible-v8.json", JSON.stringify(collectState(), null, 2), "application/json"));
document.getElementById("printBtn").addEventListener("click", () => window.print());
document.getElementById("resetBtn").addEventListener("click", () => {
  if (confirm("Clear saved fields and reload defaults?")) {
    localStorage.removeItem(STORAGE_KEY);
    loadDefaults();
    document.querySelectorAll(".detectorIssue").forEach(x => x.checked = false);
    toast("Reset complete ✅");
  }
});

loadState();
</script>
</body>
</html>