@extends('layouts.lms-layout')
@section('title', '🗺 My Success Path')
@section('nav_map', 'active')
@section('topbar_title', '🗺 My Success Path')

@section('content')
<h2 class="page-title">My Success Path</h2>
<p class="page-sub">Visualisasi perjalanan belajarmu dari awal hingga target IELTS 6.5 tercapai.</p>

<div class="map-prog-banner">
  <div class="map-prog-left">
    <h3>🎯 IELTS Target: 6.5</h3>
    <p>Timeline: 4 Bulan &nbsp;·&nbsp; Estimasi selesai: <strong>Juli 2026</strong></p>
    <div class="prog-bar" style="width:260px;margin-top:12px">
      <div class="prog-fill" style="width:32%"></div>
    </div>
    <div style="font-size:12px;color:var(--muted);margin-top:6px">Unit 4 dari 12 selesai</div>
  </div>
  <div class="map-prog-right">
    <div class="big-pct">32<span>%</span></div>
    <div style="font-size:12px;color:var(--muted)">Completed</div>
  </div>
</div>

<div class="card" style="padding:32px 20px;">
  <div class="path-container" id="pathContainer"></div>
</div>

<div class="grid-3" style="margin-top:20px;">
  <div class="card card-sm">
    <div class="section-label">Status Saat Ini</div>
    <div style="font-size:15px;font-weight:700;margin-bottom:4px">📖 Foundation — Unit 4</div>
    <div style="font-size:12px;color:var(--muted)">Grammar Fundamentals</div>
    <div class="prog-bar"><div class="prog-fill" style="width:60%"></div></div>
    <div style="font-size:11px;color:var(--muted);margin-top:6px">60% selesai</div>
  </div>
  <div class="card card-sm">
    <div class="section-label">Checkpoint Berikutnya</div>
    <div style="font-size:15px;font-weight:700;margin-bottom:4px">⭐ Checkpoint 1</div>
    <div style="font-size:12px;color:var(--muted)">Mini Test — 8 Maret 2026</div>
    <div style="margin-top:10px"><span class="tag tag-orange">3 hari lagi</span></div>
  </div>
  <div class="card card-sm">
    <div class="section-label">Unit Selanjutnya</div>
    <div style="font-size:15px;font-weight:700;margin-bottom:4px">🔒 Unit 5</div>
    <div style="font-size:12px;color:var(--muted)">Listening Strategies</div>
    <div style="margin-top:10px"><span class="tag tag-muted">Terkunci</span></div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   MAP — PATH NODES
=========================================================== */
const nodes = [
  {label:'Assessment',type:'done',icon:'✅'},
  {label:'Unit 1\nVocab Basics',type:'done',icon:'📗'},
  {label:'Unit 2\nPronunciation',type:'done',icon:'🎤'},
  {label:'Checkpoint 1',type:'checkpoint',icon:'⭐'},
  {label:'Unit 3\nReading Intro',type:'done',icon:'📖'},
  {label:'Unit 4\nGrammar',type:'progress',icon:'✏️'},
  {label:'Checkpoint 2',type:'checkpoint',icon:'⭐'},
  {label:'Unit 5\nListening',type:'locked',icon:'🔒'},
  {label:'Unit 6\nSpeaking',type:'locked',icon:'🔒'},
  {label:'Checkpoint 3',type:'checkpoint',icon:'⭐'},
  {label:'Unit 7\nWriting',type:'locked',icon:'🔒'},
  {label:'Mock Test 1',type:'locked',icon:'🔒'},
  {label:'🎯 IELTS 6.5',type:'locked',icon:'🏆'},
];

function renderMap(){
  const c=document.getElementById('pathContainer');
  c.innerHTML='';
  const row=document.createElement('div');
  row.style.cssText='display:flex;flex-wrap:wrap;justify-content:center;gap:16px 0;width:100%;';
  nodes.forEach((n,i)=>{
    const nd=document.createElement('div');
    nd.className=`path-node node-${n.type}`;
    nd.style.cssText='display:flex;flex-direction:column;align-items:center;margin:12px 18px;';
    const circ=document.createElement('div');
    circ.className='node-circle';
    circ.style.cssText='width:60px;height:60px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:22px;';
    circ.textContent=n.icon;
    const lbl=document.createElement('div');
    lbl.className='node-label';
    lbl.style.cssText='margin-top:8px;text-align:center;font-size:11px;font-weight:700;max-width:80px;line-height:1.3;white-space:pre-line;';
    lbl.textContent=n.label;
    nd.appendChild(circ);nd.appendChild(lbl);
    row.appendChild(nd);
  });
  c.appendChild(row);
}
renderMap();
</script>
@endsection
