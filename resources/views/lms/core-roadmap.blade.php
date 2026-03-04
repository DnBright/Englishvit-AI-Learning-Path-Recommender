@extends('layouts.lms-layout')
@section('title', '📘 Core Roadmap')
@section('nav_roadmap', 'active')
@section('topbar_title', '📘 Core Roadmap')

@section('content')

{{-- ───── HEADER SUMMARY ───── --}}
<div class="roadmap-header">
  <div style="flex:1;">
    <div class="section-label">Target Summary</div>
    <div style="font-family:var(--font-disp);font-size:22px;font-weight:800;margin-bottom:10px;">
      IELTS 6.5 &nbsp;<span style="color:var(--muted);font-size:16px;">dalam 4 bulan</span>
    </div>
    {{-- Skill target chips --}}
    <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:14px;">
      <span class="tag" style="background:rgba(61,214,140,.1);color:var(--green-acc);">🎯 Reading → 6.5</span>
      <span class="tag" style="background:rgba(245,132,42,.15);color:var(--orange);">⚠ Writing → 6.5 (fokus)</span>
      <span class="tag" style="background:rgba(79,123,255,.12);color:var(--blue-acc);">~ Listening → 6.5</span>
      <span class="tag" style="background:rgba(245,132,42,.15);color:var(--orange);">⚠ Speaking → 6.5 (fokus)</span>
    </div>
    {{-- Current scores vs target --}}
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;max-width:420px;">
      @foreach([
        ['Listening','5.5','6.5','var(--blue-acc)',60],
        ['Reading',  '6.0','6.5','var(--green-acc)',80],
        ['Writing',  '5.5','6.5','var(--orange)',   60],
        ['Speaking', '5.5','6.5','var(--orange)',   60],
      ] as $sk)
      <div style="text-align:center;background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:10px;padding:10px 6px;">
        <div style="font-size:9px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.8px;margin-bottom:4px;">{{ $sk[0] }}</div>
        <div style="font-family:var(--font-disp);font-size:18px;font-weight:800;color:{{ $sk[3] }};line-height:1;">{{ $sk[1] }}</div>
        <div style="font-size:9px;color:var(--muted);margin-top:2px;">target {{ $sk[2] }}</div>
        <div style="height:3px;background:rgba(255,255,255,.06);border-radius:3px;overflow:hidden;margin-top:6px;">
          <div style="height:100%;width:{{ $sk[4] }}%;background:{{ $sk[3] }};border-radius:3px;"></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- Probability Ring --}}
  <div style="text-align:center;flex-shrink:0;">
    <div class="section-label" style="justify-content:center;margin-bottom:10px;">Peluang Sukses</div>
    <div class="probability-ring">
      <div class="prob-inner">
        <div class="prob-num">78%</div>
        <div class="prob-lbl">chance</div>
      </div>
    </div>
    <div style="font-size:11px;color:var(--muted);margin-top:8px;max-width:100px;">Naik ke <strong style="color:var(--green-acc)">85%</strong> jika konsisten</div>
  </div>
</div>

{{-- ───── PHASE CARDS ───── --}}
<div class="timeline-phases" id="timelinePhases"></div>

{{-- ───── SCORE TRAJECTORY ───── --}}
<div class="card" style="margin-bottom:0;">
  <div class="section-label" style="margin-bottom:16px;">📈 Proyeksi Skor — Berdasarkan Pace Saat Ini</div>
  <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border);border-radius:12px;overflow:hidden;margin-bottom:16px;">
    @foreach([
      ['Sekarang','5.5','5.5','5.5','5.5','var(--muted)'],
      ['April 2026','5.5','6.0','5.5','5.5','var(--blue-acc)'],
      ['Juni 2026', '6.0','6.5','6.0','6.0','var(--yellow)'],
      ['Juli 2026', '6.5','6.5','6.5','6.5','var(--green-acc)'],
    ] as $row)
    <div style="background:rgba(255,255,255,.025);padding:12px 8px;text-align:center;">
      <div style="font-size:9px;font-weight:700;color:{{ $row[5] }};text-transform:uppercase;letter-spacing:.8px;margin-bottom:8px;">{{ $row[0] }}</div>
      <div style="font-size:11px;font-weight:700;color:var(--text-2);line-height:1.9;">
        L {{ $row[1] }}<br>R {{ $row[2] }}<br>W {{ $row[3] }}<br>S {{ $row[4] }}
      </div>
      <div style="font-family:var(--font-disp);font-size:14px;font-weight:800;margin-top:6px;color:{{ $row[5] }};">
        {{ number_format((floatval($row[1])+floatval($row[2])+floatval($row[3])+floatval($row[4]))/4,1) }}
      </div>
    </div>
    @endforeach
  </div>
  <div style="font-size:12px;color:var(--muted);line-height:1.6;">
    ⚠️ Proyeksi ini berdasarkan pace belajar 5 hari/minggu. Jika ada minggu yang terlewat, AI Coach akan menyesuaikan jadwal otomatis.
  </div>
</div>

{{-- ───── AI NOTE ───── --}}
<div class="card" style="background:linear-gradient(135deg,rgba(61,214,140,.08),rgba(79,123,255,.05));border-color:rgba(61,214,140,.2);">
  <div style="display:flex;gap:14px;align-items:flex-start;">
    <div style="font-size:28px;flex-shrink:0;">🤖</div>
    <div>
      <div style="font-weight:700;margin-bottom:6px;font-size:15px;">Catatan AI Coach — Aryo Rahmat</div>
      <div style="font-size:13px;color:var(--text-2);line-height:1.65;">
        Progress minggu ini sangat baik — kamu berada <strong style="color:var(--yellow);">on-track</strong> menuju target Juli 2026.
        Namun, <strong style="color:var(--orange);">Writing Task 2</strong> butuh perhatian ekstra.
        Roadmap telah disesuaikan dengan menambahkan <strong>2 sesi latihan tambahan</strong> di Phase 2 Minggu 3.
        Jika kamu mempertahankan konsistensi ini 3 minggu ke depan, peluang suksesmu naik ke
        <strong style="color:var(--green-acc);">85%</strong>.
        Kamu bisa! 💪
      </div>
      <div style="display:flex;gap:8px;margin-top:12px;flex-wrap:wrap;">
        <span class="tag tag-green">✅ Vocabulary — On Track</span>
        <span class="tag tag-orange">⚠ Writing Task 2 — Perlu Fokus</span>
        <span class="tag tag-blue">📅 Update: 4 Mar 2026</span>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
/* ============================================================
   ROADMAP — 4 PHASES — Data lengkap & relevan
   Sesuai profil: Aryo Rahmat · IELTS 6.5 · Juli 2026
============================================================ */
const phases = [
  {
    title: 'Phase 1 — Foundation English',
    period: 'Maret – April 2026',
    color: 'var(--yellow)',
    progress: 40,
    progressLabel: '2 dari 5 task selesai',
    tasks: [
      { icon:'✅', name:'Placement Test & Diagnostic',         status:'done',     cls:'tag-green'  },
      { icon:'✅', name:'Vocabulary Foundation (200 kata)',     status:'done',     cls:'tag-green'  },
      { icon:'⏳', name:'Grammar Fundamentals',                 status:'progress', cls:'tag-orange' },
      { icon:'⏳', name:'Pronunciation & Fluency 101',         status:'progress', cls:'tag-orange' },
      { icon:'📅', name:'Checkpoint 1 — Mini Quiz (8 Mar)',    status:'upcoming', cls:'tag-blue'   },
      { icon:'🔒', name:'Reading & Listening Strategies',      status:'locked',   cls:'tag-muted'  },
      { icon:'🔒', name:'Checkpoint 2 — Mini Mock Test',       status:'locked',   cls:'tag-muted'  },
    ]
  },
  {
    title: 'Phase 2 — Skill Building',
    period: 'April – Mei 2026',
    color: 'var(--orange)',
    progress: 0,
    progressLabel: 'Belum dimulai · Buka setelah Checkpoint 2',
    tasks: [
      { icon:'🔒', name:'Speaking Fluency — Part 1, 2 & 3',           status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Writing Task 1 — Academic (grafik & tabel)',  status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Writing Task 2 — Essay PEEL Formula',         status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Advanced Vocabulary & Collocations (300 kata)',status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Listening Practice Sets (IELTS Official)',    status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Checkpoint 3 — Full Mock Test (target 6.0)',  status:'locked', cls:'tag-muted' },
    ]
  },
  {
    title: 'Phase 3 — Intensive Practice',
    period: 'Mei – Juni 2026',
    color: 'var(--blue-acc)',
    progress: 0,
    progressLabel: 'Belum dimulai · Buka setelah Mock Test 6.0',
    tasks: [
      { icon:'🔒', name:'Weak Area Intensive (AI-generated drills)', status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Full Exam Simulation × 3 (timed)',          status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Performance Analysis & Gap Review',         status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Speaking Mock — Graded by AI Coach',        status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Writing Portfolio Review',                  status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'Final Checkpoint — Pre-exam Validation',    status:'locked', cls:'tag-muted' },
    ]
  },
  {
    title: 'Phase 4 — Final Preparation',
    period: 'Juni – Juli 2026',
    color: 'var(--green-acc)',
    progress: 0,
    progressLabel: 'Belum dimulai · Buka setelah Phase 3',
    tasks: [
      { icon:'🔒', name:'Pre-Exam Strategy & Mindset Training',  status:'locked', cls:'tag-muted' },
      { icon:'🔒', name:'48-Jam Sebelum Ujian — Checklist',      status:'locked', cls:'tag-muted' },
      { icon:'🏆', name:'IELTS Exam Day — 4 Juli 2026',          status:'locked', cls:'tag-muted' },
    ]
  },
];

/* ── RENDER ── */
function renderRoadmap() {
  const c = document.getElementById('timelinePhases');
  c.innerHTML = '';
  const statusText = { done:'Selesai', progress:'Berjalan', upcoming:'Segera', locked:'Terkunci' };

  phases.forEach((ph, pi) => {
    const pc  = document.createElement('div');
    pc.className = 'phase-card';

    const tasks = ph.tasks.map(t => `
      <div class="task-row">
        <div class="task-icon">${t.icon}</div>
        <div class="task-name">${t.name}</div>
        <span class="tag ${t.cls} task-status">${statusText[t.status] || t.status}</span>
      </div>
    `).join('');

    pc.innerHTML = `
      <div class="phase-header" onclick="togglePhase(${pi})">
        <div class="phase-title-row">
          <div class="phase-num" style="background:${ph.color}20;color:${ph.color}">0${pi+1}</div>
          <div style="flex:1;">
            <div style="font-weight:700;font-size:14px">${ph.title}</div>
            <div style="font-size:12px;color:var(--muted)">${ph.period}</div>
            <div style="margin-top:6px;">
              <div style="height:4px;background:rgba(255,255,255,.06);border-radius:4px;overflow:hidden;max-width:180px;">
                <div style="height:100%;width:${ph.progress}%;background:${ph.color};border-radius:4px;transition:width .8s ease;"></div>
              </div>
              <div style="font-size:10px;color:var(--muted);margin-top:3px;">${ph.progressLabel}</div>
            </div>
          </div>
        </div>
        <div class="phase-expand" id="exp-${pi}">▼</div>
      </div>
      <div class="phase-tasks ${pi === 0 ? 'open' : ''}" id="tasks-${pi}">
        ${tasks}
      </div>
    `;
    c.appendChild(pc);
  });
}

renderRoadmap();

function togglePhase(i) {
  const t    = document.getElementById('tasks-' + i);
  const e    = document.getElementById('exp-'   + i);
  const open = t.classList.contains('open');
  t.classList.toggle('open', !open);
  e.classList.toggle('open', !open);
}
</script>
@endsection
