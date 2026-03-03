@extends('layouts.lms-layout')
@section('title', '📘 Core Roadmap')
@section('nav_roadmap', 'active')
@section('topbar_title', '📘 Core Roadmap')

@section('content')
<h2 class="page-title">Core Roadmap</h2>
<p class="page-sub">Rencana belajarmu yang dipersonalisasi oleh AI berdasarkan profil dan target.</p>

<div class="roadmap-header">
  <div>
    <div class="section-label">Target Summary</div>
    <div style="font-family:var(--font-disp);font-size:22px;font-weight:800;margin-bottom:8px">
      IELTS 6.5 &nbsp;<span style="color:var(--muted);font-size:16px">dalam 4 bulan</span>
    </div>
    <div class="target-chips">
      <span class="tag tag-orange">⚠ Speaking — Fokus Utama</span>
      <span class="tag tag-orange">⚠ Writing — Fokus Utama</span>
      <span class="tag tag-green">✓ Reading — Baik</span>
      <span class="tag tag-blue">~ Listening — Perlu Latihan</span>
    </div>
  </div>
  <div>
    <div style="text-align:center;margin-bottom:8px">
      <div class="section-label" style="margin:0 0 6px">Peluang Sukses</div>
    </div>
    <div class="probability-ring">
      <div class="prob-inner">
        <div class="prob-num">78%</div>
        <div class="prob-lbl">chance</div>
      </div>
    </div>
  </div>
</div>

<div class="timeline-phases" id="timelinePhases"></div>

<div class="card" style="background:linear-gradient(135deg,rgba(61,214,140,.08),rgba(79,123,255,.05));border-color:rgba(61,214,140,.2);">
  <div style="display:flex;gap:12px;align-items:flex-start;">
    <div style="font-size:24px;">🤖</div>
    <div>
      <div style="font-weight:700;margin-bottom:4px;">Catatan AI Recommender</div>
      <div style="font-size:13px;color:var(--text-2);line-height:1.6;">
        Berdasarkan performamu minggu ini, <strong style="color:var(--yellow)">Writing Task 2</strong> perlu perhatian ekstra. 
        Roadmap telah disesuaikan — 2 sesi latihan tambahan ditambahkan di Minggu 3. 
        Jika kamu mempertahankan konsistensi ini, peluang suksesmu naik ke <strong style="color:var(--green-acc)">85%</strong>.
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   ROADMAP — PHASES
=========================================================== */
const phases=[
  {
    title:'Phase 1 — Foundation',period:'Maret – April 2026',color:'var(--yellow)',
    tasks:[
      {icon:'🎬',name:'Video: Intro to IELTS',status:'done',cls:'tag-green'},
      {icon:'📝',name:'Grammar Fundamentals',status:'done',cls:'tag-green'},
      {icon:'📝',name:'Writing Task 1 Basics',status:'progress',cls:'tag-orange'},
      {icon:'🎤',name:'Speaking Part 1 Practice',status:'progress',cls:'tag-orange'},
      {icon:'⭐',name:'Checkpoint 1 — Mini Test',status:'upcoming',cls:'tag-blue'},
    ]
  },
  {
    title:'Phase 2 — Skill Building',period:'April – Mei 2026',color:'var(--orange)',
    tasks:[
      {icon:'📖',name:'Reading Strategies',status:'locked',cls:'tag-muted'},
      {icon:'🎧',name:'Listening Practice Sets',status:'locked',cls:'tag-muted'},
      {icon:'✏️',name:'Writing Task 2 Advanced',status:'locked',cls:'tag-muted'},
      {icon:'🎤',name:'Speaking Part 2 & 3',status:'locked',cls:'tag-muted'},
      {icon:'⭐',name:'Checkpoint 2 — Mock Test',status:'locked',cls:'tag-muted'},
    ]
  },
  {
    title:'Phase 3 — Intensive Practice',period:'Mei – Juni 2026',color:'var(--blue-acc)',
    tasks:[
      {icon:'🔁',name:'Full Mock Test × 3',status:'locked',cls:'tag-muted'},
      {icon:'📊',name:'Performance Analysis',status:'locked',cls:'tag-muted'},
      {icon:'🎯',name:'Weak Area Intensive',status:'locked',cls:'tag-muted'},
      {icon:'⭐',name:'Final Checkpoint',status:'locked',cls:'tag-muted'},
    ]
  },
  {
    title:'Phase 4 — Final Prep',period:'Juni – Juli 2026',color:'var(--green-acc)',
    tasks:[
      {icon:'🏁',name:'Exam Simulation',status:'locked',cls:'tag-muted'},
      {icon:'🧘',name:'Pre-test Strategy',status:'locked',cls:'tag-muted'},
      {icon:'🏆',name:'IELTS Exam Day',status:'locked',cls:'tag-muted'},
    ]
  },
];

function renderRoadmap(){
  const c=document.getElementById('timelinePhases');
  c.innerHTML='';
  phases.forEach((ph,pi)=>{
    const pc=document.createElement('div');
    pc.className='phase-card';
    const statusText={done:'Selesai',progress:'Berjalan',upcoming:'Segera',locked:'Terkunci'};
    const tasks=ph.tasks.map(t=>`
      <div class="task-row">
        <div class="task-icon">${t.icon}</div>
        <div class="task-name">${t.name}</div>
        <span class="tag ${t.cls} task-status">${statusText[t.status]||t.status}</span>
      </div>
    `).join('');
    pc.innerHTML=`
      <div class="phase-header" onclick="togglePhase(${pi})">
        <div class="phase-title-row">
          <div class="phase-num" style="background:${ph.color}20;color:${ph.color}">0${pi+1}</div>
          <div>
            <div style="font-weight:700;font-size:14px">${ph.title}</div>
            <div style="font-size:12px;color:var(--muted)">${ph.period}</div>
          </div>
        </div>
        <div class="phase-expand" id="exp-${pi}">▼</div>
      </div>
      <div class="phase-tasks ${pi===0?'open':''}" id="tasks-${pi}">
        ${tasks}
      </div>
    `;
    c.appendChild(pc);
  });
}
renderRoadmap();
function togglePhase(i){
  const t=document.getElementById('tasks-'+i);
  const e=document.getElementById('exp-'+i);
  const open=t.classList.contains('open');
  t.classList.toggle('open',!open);
  e.classList.toggle('open',!open);
}
</script>
@endsection
