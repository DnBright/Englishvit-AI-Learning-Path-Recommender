@extends('layouts.lms-layout')
@section('title', '🗺 My Success Path')
@section('nav_map', 'active')
@section('topbar_title', '🗺 My Success Path')

@section('styles')
<style>
/* ============================================================
   FONTS
============================================================ */
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&display=swap');

/* ============================================================
   PAGE WRAPPER
============================================================ */
.map-page-wrapper {
  max-width: 520px;
  margin: 0 auto;
  padding: 0 0 60px;
}

/* ============================================================
   PROGRESS BANNER
============================================================ */
.map-header-banner {
  background: linear-gradient(135deg, rgba(245,200,66,.12), rgba(245,132,42,.08));
  border: 1px solid rgba(245,200,66,.22);
  border-radius: 18px;
  padding: 20px 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
  flex-wrap: wrap;
  gap: 14px;
}
.map-header-banner h3 {
  font-family: 'Syne', var(--font-disp, sans-serif);
  font-size: 18px;
  font-weight: 800;
  margin-bottom: 4px;
}
.map-header-banner p {
  font-size: 12px;
  color: var(--muted, #8090B8);
}
.map-big-pct {
  font-family: 'Syne', var(--font-disp, sans-serif);
  font-size: 42px;
  font-weight: 800;
  color: var(--yellow, #F5C842);
  letter-spacing: -2px;
  line-height: 1;
  text-align: right;
}
.map-big-pct span { font-size: 18px; color: var(--muted, #8090B8); }

/* ============================================================
   SECTION DIVIDER (Duolingo banner style)
============================================================ */
.path-section-divider {
  display: flex;
  justify-content: center;
  margin: 8px 0 4px;
  position: relative;
  z-index: 1;
}
.psd-inner {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(135deg, #0F2860, #1A3A8A);
  border-radius: 40px;
  padding: 10px 22px;
  box-shadow: 0 4px 0 #070F26, 0 6px 20px rgba(11,29,69,.25);
}
.psd-num  { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.5); letter-spacing: 1px; text-transform: uppercase; }
.psd-title{ font-family: 'Nunito', sans-serif; font-size: 14px; font-weight: 900; color: #fff; }

/* ============================================================
   PATH TRACK
============================================================ */
.path-track {
  position: relative;
  width: 100%;
  padding: 8px 0 16px;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}

/* ── CONNECTOR DOTS ── */
.conn-dots {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 5px;
  margin: -2px 0;
  position: relative;
  z-index: 0;
}
.conn-dot {
  width: 9px; height: 9px;
  border-radius: 50%;
  background: #D0D8E8;
  transition: background .3s;
}
.conn-dot.done { background: #58CC02; }
.conn-dot.half { background: #F5C500; }

/* ── NODE ROW ── */
.node-row {
  display: flex;
  align-items: center;
  position: relative;
  z-index: 1;
  height: 112px;
}
.node-row.pos-left   { justify-content: flex-start; padding-left: 36px; }
.node-row.pos-right  { justify-content: flex-end;   padding-right: 36px; }
.node-row.pos-center { justify-content: center; }

/* ── NODE ── */
.path-node {
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  user-select: none;
  transition: transform .15s;
  position: relative;
}
.path-node:active { transform: scale(.92); }

.node-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-size: 28px;
  transition: all .2s;
  position: relative;
}

/* DONE */
.node-done .node-btn {
  width: 72px; height: 72px;
  background: #58CC02;
  box-shadow: 0 5px 0 #46A302;
}
.node-done:hover .node-btn { transform: translateY(-2px); box-shadow: 0 7px 0 #46A302; }

/* IN PROGRESS */
.node-progress .node-btn {
  width: 72px; height: 72px;
  background: #F5C500;
  box-shadow: 0 5px 0 #D4AA00;
  animation: node-bobble 2s ease-in-out infinite;
}
@keyframes node-bobble {
  0%,100% { transform: translateY(0);   box-shadow: 0 5px 0 #D4AA00; }
  50%      { transform: translateY(-6px); box-shadow: 0 11px 0 #D4AA00; }
}

/* LOCKED */
.node-locked .node-btn {
  width: 72px; height: 72px;
  background: #E5E5E5;
  box-shadow: 0 5px 0 #CECECE;
  cursor: not-allowed;
}
.node-locked .node-btn .node-icon { filter: grayscale(1) opacity(.45); }

/* CHECKPOINT */
.node-checkpoint .node-btn {
  width: 78px; height: 78px;
  background: #FFD900;
  box-shadow: 0 5px 0 #C9A800;
}
.node-checkpoint:hover .node-btn { transform: translateY(-2px); box-shadow: 0 7px 0 #C9A800; }
.node-checkpoint .node-btn .node-icon { font-size: 32px; }

/* BOSS / FINAL */
.node-boss .node-btn {
  width: 82px; height: 82px;
  background: linear-gradient(135deg, var(--navy, #0B1D45), #1A3A8A);
  box-shadow: 0 5px 0 #060F24;
  border: 3px solid #F5C500;
}

/* Stars */
.node-stars {
  display: flex;
  gap: 3px;
  margin-top: 5px;
}
.node-star {
  font-size: 13px;
  filter: grayscale(1) opacity(.25);
  transition: filter .3s;
}
.node-star.on { filter: none; }

/* Label */
.node-label-text {
  font-family: 'Nunito', sans-serif;
  font-size: 11px;
  font-weight: 800;
  color: #5E7094;
  margin-top: 3px;
  text-align: center;
  max-width: 88px;
  line-height: 1.3;
  white-space: pre-line;
}
.node-done .node-label-text       { color: #46A302; }
.node-progress .node-label-text   { color: #C29000; font-size: 12px; }
.node-checkpoint .node-label-text { color: #9A7500; }

/* ============================================================
   TOOLTIP POPUP
============================================================ */
.map-tooltip-overlay {
  position: fixed;
  inset: 0;
  z-index: 9000;
  pointer-events: none;
}
.map-tooltip-overlay.active { pointer-events: all; }

.map-tooltip {
  position: fixed;
  background: #fff;
  border-radius: 20px;
  padding: 18px 20px;
  width: 268px;
  box-shadow: 0 10px 40px rgba(0,0,0,.18);
  border: 2px solid #E8EDF5;
  transform: translateY(10px) scale(.96);
  opacity: 0;
  transition: all .22s cubic-bezier(.34,1.56,.64,1);
  pointer-events: none;
  z-index: 9001;
}
.map-tooltip.visible {
  transform: translateY(0) scale(1);
  opacity: 1;
  pointer-events: all;
}
/* Arrow */
.map-tooltip::before {
  content: '';
  position: absolute;
  top: -10px; left: 50%;
  transform: translateX(-50%);
  border: 10px solid transparent;
  border-top: none;
  border-bottom: 10px solid #E8EDF5;
}
.map-tooltip::after {
  content: '';
  position: absolute;
  top: -8px; left: 50%;
  transform: translateX(-50%);
  border: 8px solid transparent;
  border-top: none;
  border-bottom: 8px solid #fff;
}
.map-tooltip.tt-below::before { top:auto; bottom:-10px; border-bottom:none; border-top:10px solid #E8EDF5; }
.map-tooltip.tt-below::after  { top:auto; bottom:-8px;  border-bottom:none; border-top:8px solid #fff; }

.tt-head {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.tt-head-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  flex-shrink: 0;
}
.tt-head-title    { font-family: 'Nunito', sans-serif; font-size: 15px; font-weight: 900; color: #0B1D45; line-height: 1.2; }
.tt-head-subtitle { font-size: 11px; color: #AFAFAF; font-weight: 600; margin-top: 1px; }
.tt-desc          { font-size: 12px; color: #5E7094; line-height: 1.55; margin-bottom: 12px; }

.tt-stars-row { display: flex; gap: 4px; margin-bottom: 14px; }
.tt-star      { font-size: 20px; filter: grayscale(1) opacity(.25); }
.tt-star.lit  { filter: none; }

.tt-btn-main {
  width: 100%;
  padding: 13px;
  border-radius: 14px;
  border: none;
  font-family: 'Nunito', sans-serif;
  font-size: 14px;
  font-weight: 900;
  cursor: pointer;
  transition: all .15s;
  display: block;
  text-align: center;
}
.tt-btn-main:active { transform: translateY(2px) !important; }

.tt-btn-go {
  background: #F5C500;
  color: #0B1D45;
  box-shadow: 0 4px 0 #D4AA00;
}
.tt-btn-go:hover { transform: translateY(-2px); box-shadow: 0 6px 0 #D4AA00; }

.tt-btn-review {
  margin-top: 8px;
  background: #EEF0F5;
  color: #5E7094;
  box-shadow: 0 4px 0 #D5D8E0;
}
.tt-btn-review:hover { transform: translateY(-1px); }

.tt-btn-locked {
  background: #E5E5E5;
  color: #AFAFAF;
  box-shadow: 0 4px 0 #CECECE;
  cursor: not-allowed;
}

/* ============================================================
   XP POP + CONFETTI
============================================================ */
.xp-popup {
  position: fixed;
  z-index: 9999;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  font-weight: 900;
  color: #D4AA00;
  text-shadow: 0 2px 8px rgba(245,197,0,.3);
  pointer-events: none;
  opacity: 0;
}
.xp-popup.pop { animation: xp-rise .85s ease forwards; }
@keyframes xp-rise {
  0%   { opacity:1; transform:translateY(0) scale(1); }
  60%  { opacity:1; transform:translateY(-44px) scale(1.2); }
  100% { opacity:0; transform:translateY(-90px) scale(.8); }
}

.confetti-wrap {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 9998;
  display: none;
}
.confetti-wrap.active { display: block; }
.cp {
  position: absolute;
  border-radius: 2px;
  animation: cp-fall linear forwards;
}
@keyframes cp-fall {
  0%   { transform: translateY(-20px) rotate(0deg);   opacity: 1; }
  100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
}

/* ============================================================
   SHAKE (locked)
============================================================ */
@keyframes map-shake {
  0%,100% { transform: translateX(0); }
  20%     { transform: translateX(-8px); }
  40%     { transform: translateX(8px); }
  60%     { transform: translateX(-5px); }
  80%     { transform: translateX(5px); }
}
.shake-anim { animation: map-shake .4s ease; }

/* ============================================================
   BOTTOM STATS CARDS
============================================================ */
.map-stats-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 14px;
  margin-top: 24px;
}
@media (max-width: 600px) {
  .map-stats-grid { grid-template-columns: 1fr; }
  .map-header-banner { flex-direction: column; }
}
</style>
@endsection

@section('content')

{{-- ── CONFETTI + XP ── --}}
<div class="confetti-wrap" id="mapConfetti"></div>
<div class="xp-popup" id="mapXpPopup">+10 XP ⚡</div>

{{-- ── TOOLTIP OVERLAY ── --}}
<div class="map-tooltip-overlay" id="mapTooltipOverlay" onclick="mapCloseTooltip()">
  <div class="map-tooltip" id="mapTooltip">
    <div class="tt-head">
      <div class="tt-head-icon" id="ttIcon"></div>
      <div>
        <div class="tt-head-title" id="ttTitle"></div>
        <div class="tt-head-subtitle" id="ttSubtitle"></div>
      </div>
    </div>
    <div class="tt-desc" id="ttDesc"></div>
    <div class="tt-stars-row" id="ttStarsRow"></div>
    <button class="tt-btn-main" id="ttBtnMain" onclick="event.stopPropagation(); mapHandleAction()"></button>
    <button class="tt-btn-main tt-btn-review" id="ttBtnReview" onclick="event.stopPropagation();" style="display:none">🔁 Ulangi untuk +XP</button>
  </div>
</div>

<div class="map-page-wrapper">

  {{-- ── PROGRESS BANNER ── --}}
  <div class="map-header-banner">
    <div class="map-prog-left">
      <h3>🎯 IELTS Target: 6.5</h3>
      <p>Timeline: 4 Bulan &nbsp;·&nbsp; Estimasi selesai: <strong>Juli 2026</strong></p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:8px;margin-bottom:10px;">
        <span class="tag tag-green" style="font-size:10px;">✓ Reading 6.0</span>
        <span class="tag tag-orange" style="font-size:10px;">⚠ Writing 5.5</span>
        <span class="tag tag-blue" style="font-size:10px;">~ Listening 5.5</span>
      <h3 class="fc-white mb-1">Target: TOEFL 580</h3>
      <p class="mb-0">3 Bulan — 📅 Selesai Mei 2026</p>
    </div>
    <div>
      <div class="map-big-pct">480<span>/580</span></div>
      <div style="font-size:12px;color:var(--muted);text-align:right">Completed</div>
    </div>
  </div>

  {{-- ── SECTION 1 ── --}}
  <div class="path-section-divider">
    <div class="psd-inner">
      <span>🏁</span>
      <div>
        <div class="psd-num">Section 1</div>
        <div class="psd-title">Foundation English</div>
      </div>
    </div>
  </div>
  <div class="path-track" id="pathTrackSec1"></div>

  {{-- ── SECTION 2 ── --}}
  <div class="path-section-divider">
    <div class="psd-inner">
      <span>⚡</span>
      <div>
        <div class="psd-num">Section 2</div>
        <div class="psd-title">Skill Building</div>
      </div>
    </div>
  </div>
  <div class="path-track" id="pathTrackSec2"></div>

  {{-- ── SECTION 3 ── --}}
  <div class="path-section-divider">
    <div class="psd-inner">
      <span>🔥</span>
      <div>
        <div class="psd-num">Section 3</div>
        <div class="psd-title">Intensive & Mock</div>
      </div>
    </div>
  </div>
  <div class="path-track" id="pathTrackSec3"></div>

  {{-- ── BOTTOM STATS ── --}}
  <div class="map-stats-grid">
    <div class="card card-sm">
      <div class="section-label">📍 Kamu Sekarang</div>
      <div style="font-size:14px;font-weight:700;margin-bottom:4px">✏️ Grammar Fundamentals</div>
      <div style="font-size:12px;color:var(--muted);margin-bottom:8px">Section 1 · Unit 4 · 60% selesai</div>
      <div class="prog-bar"><div class="prog-fill" style="width:60%"></div></div>
      <div style="font-size:11px;color:var(--muted);margin-top:6px">3 lesson tersisa untuk selesai</div>
    </div>
    <div class="card card-sm">
      <div class="section-label">⭐ Checkpoint Berikutnya</div>
      <div style="font-size:14px;font-weight:700;margin-bottom:4px">Mini Mock Test — Checkpoint 2</div>
      <div style="font-size:12px;color:var(--muted);margin-bottom:8px">Selesaikan Unit 4 & 5 untuk unlock</div>
      <div><span class="tag tag-orange">Butuh 2 Unit Lagi</span></div>
    </div>
    <div class="card card-sm">
      <div class="section-label">🔒 Unit Selanjutnya</div>
      <div style="font-size:14px;font-weight:700;margin-bottom:4px">🎧 Listening Strategies</div>
      <div style="font-size:12px;color:var(--muted);margin-bottom:8px">Buka setelah Grammar 100%</div>
      <div><span class="tag tag-muted">Terkunci</span></div>
    </div>
    <div class="card card-sm">
      <div class="section-label">🏆 Total Progress</div>
      <div style="font-size:14px;font-weight:700;margin-bottom:2px">4 dari 14 Unit Selesai</div>
      <div style="font-size:12px;color:var(--muted);margin-bottom:8px">1.250 XP terkumpul</div>
      <div class="prog-bar"><div class="prog-fill" style="width:29%;background:linear-gradient(90deg,var(--yellow),var(--orange));"></div></div>
    </div>
    <div class="card card-sm">
      <div class="section-label">🎯 Skor Terakhir (Mock)</div>
      <div style="font-size:14px;font-weight:700;margin-bottom:4px">Overall: 5.5</div>
      <div style="display:flex;flex-direction:column;gap:3px;margin-top:4px;">
        <div style="display:flex;justify-content:space-between;font-size:11px;"><span style="color:var(--muted)">Listening</span><span style="font-weight:700;color:var(--blue-acc)">5.5</span></div>
        <div style="display:flex;justify-content:space-between;font-size:11px;"><span style="color:var(--muted)">Reading</span><span style="font-weight:700;color:var(--green-acc)">6.0</span></div>
        <div style="display:flex;justify-content:space-between;font-size:11px;"><span style="color:var(--muted)">Writing</span><span style="font-weight:700;color:var(--orange)">5.5</span></div>
        <div style="display:flex;justify-content:space-between;font-size:11px;"><span style="color:var(--muted)">Speaking</span><span style="font-weight:700;color:var(--orange)">5.5</span></div>
      </div>
    </div>
    <div class="card card-sm">
      <div class="section-label">📅 Estimasi Selesai</div>
      <div style="font-family:var(--font-disp);font-size:20px;font-weight:800;color:var(--yellow);margin-bottom:4px">4 Jul 2026</div>
      <div style="font-size:12px;color:var(--muted);margin-bottom:8px">121 hari lagi · on-track ✓</div>
      <div><span class="tag tag-green">🟢 Sesuai Jadwal</span></div>
    </div>
  </div>

</div>{{-- /map-page-wrapper --}}

@endsection

@section('scripts')
<script>
/* ============================================================
   NODE DATA
   Sesuaikan dengan data dinamis dari controller Laravel
   Contoh: JSON dari $nodes yang di-pass dari controller
============================================================ */
/* ──────────────────────────────────────────────
   SECTION 1 — Foundation English (Unit 1–5)
   Status: Unit 1–3 SELESAI, Unit 4 PROGRESS 60%,
           Unit 5 & Checkpoint 2 LOCKED
────────────────────────────────────────────── */
    title:'Grammar Fundamentals',
    subtitle:'Unit 4 · ⏳ Berjalan — 60%',
    desc:'👈 Kamu sedang di sini! Materi: Past/Present/Future Tenses, Articles (a/an/the), Prepositions, dan Conditional Sentences.',
    stars:0, xp:40
  },
  {
    id:7, type:'locked', icon:'🎧', label:'Listening\nStrategies',
    title:'Listening Strategies',
    subtitle:'Unit 5 · 🔒 Terkunci',
    desc:'Teknik menjawab soal IELTS Listening: prediction, note-taking, dan keyword spotting. Buka setelah Grammar 100% selesai.',
    stars:0, xp:40
  },
  {
    id:8, type:'checkpoint', icon:'🏅', label:'Checkpoint 2',
    title:'Checkpoint 2 — Mini Mock Test',
    subtitle:'Evaluasi · 🔒 Terkunci',
    desc:'Mini mock test mencakup semua materi Unit 3–5. Butuh minimal skor 75% untuk membuka Section 2: Skill Building.',
    stars:0, xp:100
  },
];

/* ──────────────────────────────────────────────
   SECTION 2 — Skill Building (Unit 6–9)
   Status: Semua LOCKED (buka setelah CP-2)
────────────────────────────────────────────── */
const MAP_NODES_SEC2 = [
  {
    id:9, type:'locked', icon:'🎤', label:'Speaking\nFluency',
    title:'Speaking Fluency — Part 1, 2 & 3',
    subtitle:'Unit 6 · 🔒 Terkunci',
    desc:'Teknik menjawab IELTS Speaking Part 1 (personal), Part 2 (cue card 2 menit), dan Part 3 (diskusi akademik). Target band 6.0.',
    stars:0, xp:60
  },
  {
    id:10, type:'locked', icon:'📊', label:'Writing\nTask 1',
    title:'Writing Task 1 — Academic',
    subtitle:'Unit 7 · 🔒 Terkunci',
    desc:'Deskripsikan grafik, tabel, diagram, dan chart secara akademik. Formula: Overview → Key Feature → Detail. Min. 150 kata.',
    stars:0, xp:60
  },
  {
    id:11, type:'locked', icon:'📝', label:'Writing\nTask 2',
    title:'Writing Task 2 — Essay',
    subtitle:'Unit 8 · 🔒 Terkunci',
    desc:'Essay argumentatif dan diskusi dengan formula PEEL. Target: coherence band 7, vocabulary band 6.5. Min. 250 kata dalam 40 menit.',
    stars:0, xp:60
  },
  {
    id:12, type:'locked', icon:'📚', label:'Advanced\nVocab',
    title:'Advanced Vocabulary & Collocations',
    subtitle:'Unit 9 · 🔒 Terkunci',
    desc:'300 kata akademik tier-2 + collocations IELTS. Kata kerja akademik (AWL), frasa transisi, dan idiom formal untuk Writing & Speaking.',
    stars:0, xp:50
  },
  {
    id:13, type:'checkpoint', icon:'🏅', label:'Checkpoint 3',
    title:'Checkpoint 3 — Full Mock Test',
    subtitle:'Evaluasi · 🔒 Terkunci',
    desc:'Full mock test 2.5 jam mencakup semua 4 skills. Target: Overall 6.0 untuk membuka Section 3 Final Intensive.',
    stars:0, xp:150
  },
];

/* ──────────────────────────────────────────────
   SECTION 3 — Intensive & Final (Unit 10–12)
   Status: Semua LOCKED
────────────────────────────────────────────── */
const MAP_NODES_SEC3 = [
  {
    id:14, type:'locked', icon:'🔁', label:'Weak Area\nIntensive',
    title:'Intensive — Weak Area Training',
    subtitle:'Unit 10 · 🔒 Terkunci',
    desc:'Sesi intensif fokus pada area terlemah berdasarkan Mock Test 1. AI akan generate latihan personal untuk Writing dan Speaking.',
    stars:0, xp:70
  },
  {
    id:15, type:'locked', icon:'⏱', label:'Exam\nSimulation',
    title:'Full Exam Simulation × 3',
    subtitle:'Unit 11 · 🔒 Terkunci',
    desc:'3 sesi simulasi ujian IELTS penuh dalam kondisi nyata (timed, no-pause). Analisis mendalam pasca-simulasi oleh AI Coach.',
    stars:0, xp:80
  },
  {
    id:16, type:'locked', icon:'🧘', label:'Pre-Exam\nStrategy',
    title:'Pre-Exam Strategy & Mindset',
    subtitle:'Unit 12 · 🔒 Terkunci',
    desc:'Strategi hari-H: manajemen waktu, teknik anti-panik, mindset positif, dan checklist persiapan 48 jam sebelum ujian.',
    stars:0, xp:50
  },
  {
    id:17, type:'locked', icon:'🏆', label:'IELTS\n6.5 Goal!',
    title:'🏆 IELTS 6.5 — Final Goal',
    subtitle:'Target · Juli 2026',
    desc:'Ini tujuan akhirmu! Selesaikan semua unit dan capai skor IELTS 6.5. Selamat, kamu akan membuka sertifikat digital Englishvit! 🎉',
    stars:0, xp:500
  },
];

/* ============================================================
   POSISI ZIGZAG (Duolingo-style)
   Urutan: center → right → center → left → right → center → left → center
============================================================ */
const ZIGZAG = ['pos-center','pos-right','pos-center','pos-left','pos-right','pos-center','pos-left','pos-center'];

/* ============================================================
   RENDER PATH
============================================================ */
function mapRenderPath(nodes, containerId) {
  const track = document.getElementById(containerId);
  if (!track) return;
  track.innerHTML = '';

  nodes.forEach((n, i) => {

    // ── Connector dots antara node ──
    if (i > 0) {
      const conn = document.createElement('div');
      conn.className = 'conn-dots';
      const prevType = nodes[i - 1].type;
      const curType  = n.type;
      for (let d = 0; d < 3; d++) {
        const dot = document.createElement('div');
        dot.className = 'conn-dot'
          + ((prevType === 'done' && curType === 'done') ? ' done' : '')
          + ((prevType === 'done' && curType === 'progress' && d < 1) ? ' half' : '');
        conn.appendChild(dot);
      }
      track.appendChild(conn);
    }

    // ── Row ──
    const pos   = ZIGZAG[i % ZIGZAG.length];
    const row   = document.createElement('div');
    row.className = `node-row ${pos}`;

    // ── Node ──
    const nodeEl = document.createElement('div');
    nodeEl.className = `path-node node-${n.type}`;
    nodeEl.dataset.nodeId = n.id;

    // Button
    const btn = document.createElement('div');
    btn.className = 'node-btn';
    btn.innerHTML = `<span class="node-icon">${n.icon}</span>`;

    // Stars
    const starsEl = document.createElement('div');
    starsEl.className = 'node-stars';
    if (n.type !== 'locked') {
      for (let s = 0; s < 3; s++) {
        const st = document.createElement('span');
        st.className = 'node-star' + (s < n.stars ? ' on' : '');
        st.textContent = '⭐';
        starsEl.appendChild(st);
      }
    }

    // Label
    const lbl = document.createElement('div');
    lbl.className = 'node-label-text';
    lbl.textContent = n.label;

    nodeEl.appendChild(btn);
    nodeEl.appendChild(starsEl);
    nodeEl.appendChild(lbl);
    row.appendChild(nodeEl);
    track.appendChild(row);

    // ── Event: klik node ──
    if (n.type !== 'locked') {
      nodeEl.addEventListener('click', (e) => {
        e.stopPropagation();
        mapOpenTooltip(n, nodeEl);
      });
    } else {
      nodeEl.addEventListener('click', (e) => {
        e.stopPropagation();
        mapShakeNode(nodeEl);
      });
    }
  });
}

// Render semua section
mapRenderPath(MAP_NODES_SEC1, 'pathTrackSec1');
mapRenderPath(MAP_NODES_SEC2, 'pathTrackSec2');
mapRenderPath(MAP_NODES_SEC3, 'pathTrackSec3');

/* ============================================================
   SHAKE ANIMATION (untuk node locked)
============================================================ */
function mapShakeNode(el) {
  el.classList.remove('shake-anim');
  void el.offsetWidth; // reflow trick
  el.classList.add('shake-anim');
  el.addEventListener('animationend', () => el.classList.remove('shake-anim'), { once: true });
}

/* ============================================================
   TOOLTIP
============================================================ */
let _activeNodeData = null;

const TT_BG = {
  done:'#E8FAEA', progress:'#FFFBE0', checkpoint:'#FFFBE0', locked:'#F0F0F0', boss:'#EEF0F5'
};

function mapOpenTooltip(data, el) {
  _activeNodeData = data;

  const tt  = document.getElementById('mapTooltip');
  const ov  = document.getElementById('mapTooltipOverlay');
  const btn = document.getElementById('ttBtnMain');
  const rev = document.getElementById('ttBtnReview');

  // Isi konten
  const icon    = document.getElementById('ttIcon');
  icon.textContent    = data.icon;
  icon.style.background = TT_BG[data.type] || '#F5F5F5';

  document.getElementById('ttTitle').textContent    = data.title;
  document.getElementById('ttSubtitle').textContent = data.subtitle;
  document.getElementById('ttDesc').textContent     = data.desc;

  // Stars
  const sr = document.getElementById('ttStarsRow');
  sr.innerHTML = '';
  for (let s = 0; s < 3; s++) {
    const sp = document.createElement('span');
    sp.className = 'tt-star' + (s < data.stars ? ' lit' : '');
    sp.textContent = '⭐';
    sr.appendChild(sp);
  }

  // Button state
  rev.style.display = 'none';
  if (data.type === 'progress') {
    btn.textContent = '▶ Lanjutkan Belajar';
    btn.className   = 'tt-btn-main tt-btn-go';
  } else if (data.type === 'done') {
    btn.textContent = '✅ Sudah Selesai';
    btn.className   = 'tt-btn-main tt-btn-go';
    rev.style.display = 'block';
  } else if (data.type === 'checkpoint') {
    btn.textContent = data.stars > 0 ? '⭐ Lihat Hasil' : '🚀 Mulai Checkpoint';
    btn.className   = 'tt-btn-main tt-btn-go';
  } else {
    btn.textContent = '🔒 Selesaikan unit sebelumnya';
    btn.className   = 'tt-btn-main tt-btn-locked';
  }

  // Posisi tooltip
  const rect = el.getBoundingClientRect();
  const ttW  = 268;
  const winW = window.innerWidth;

  let left = rect.left + rect.width / 2 - ttW / 2;
  left = Math.max(10, Math.min(left, winW - ttW - 10));

  let top = rect.bottom + 14;
  tt.classList.remove('tt-below');

  if (top + 320 > window.innerHeight) {
    top = rect.top - 300;
    tt.classList.add('tt-below');
  }

  tt.style.left = left + 'px';
  tt.style.top  = top + 'px';

  ov.classList.add('active');
  requestAnimationFrame(() => tt.classList.add('visible'));
}

function mapCloseTooltip() {
  const tt = document.getElementById('mapTooltip');
  const ov = document.getElementById('mapTooltipOverlay');
  tt.classList.remove('visible');
  setTimeout(() => ov.classList.remove('active'), 220);
}

/* ============================================================
   ACTION (klik tombol di tooltip)
   → Di sini Anda bisa redirect ke halaman unit/checkpoint
============================================================ */
function mapHandleAction() {
  if (!_activeNodeData || _activeNodeData.type === 'locked') return;

  mapCloseTooltip();
  mapShowXP(_activeNodeData.xp);

  if (_activeNodeData.type === 'progress' || _activeNodeData.type === 'checkpoint') {
    mapTriggerConfetti();
  }

  /*
   * TODO: Redirect ke halaman unit
   * Contoh:
   *   window.location.href = '/unit/' + _activeNodeData.id;
   *
   * Atau untuk AJAX / SPA:
   *   loadUnit(_activeNodeData.id);
   */
}

/* ============================================================
   XP POPUP
============================================================ */
function mapShowXP(amount) {
  const el = document.getElementById('mapXpPopup');
  el.textContent = `+${amount} XP ⚡`;
  el.style.left  = (window.innerWidth / 2 - 55) + 'px';
  el.style.top   = (window.innerHeight / 2 - 80) + 'px';
  el.classList.remove('pop');
  void el.offsetWidth;
  el.classList.add('pop');
}

/* ============================================================
   CONFETTI
============================================================ */
function mapTriggerConfetti() {
  const cv = document.getElementById('mapConfetti');
  cv.innerHTML = '';
  cv.classList.add('active');

  const colors = ['#F5C500','#FF7A00','#58CC02','#1CB0F6','#CE82FF','#FF4B4B','#fff'];

  for (let i = 0; i < 55; i++) {
    const p = document.createElement('div');
    p.className = 'cp';
    const size = 6 + Math.random() * 9;
    p.style.cssText = `
      left: ${Math.random() * 100}%;
      top: 0;
      width: ${size}px;
      height: ${size}px;
      background: ${colors[Math.floor(Math.random() * colors.length)]};
      border-radius: ${Math.random() > .5 ? '50%' : '2px'};
      animation: cp-fall ${1 + Math.random() * 2}s ${Math.random() * .5}s linear forwards;
    `;
    cv.appendChild(p);
  }

  setTimeout(() => {
    cv.classList.remove('active');
    cv.innerHTML = '';
  }, 3000);
}

/* ============================================================
   TUTUP TOOLTIP SAAT SCROLL / ESC
============================================================ */
document.addEventListener('scroll', mapCloseTooltip, true);
document.addEventListener('keydown', e => { if (e.key === 'Escape') mapCloseTooltip(); });
</script>
@endsection