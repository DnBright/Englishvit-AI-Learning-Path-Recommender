@extends('layouts.lms-layout')
@section('title', '🎓 Class Menu')
@section('nav_classes', 'active')
@section('topbar_title', '🎓 Class Menu')

@section('content')

<div class="class-tabs">
  <div class="ctab active" onclick="switchTab(this,'tab-jadwal')">📅 Jadwal Aktif</div>
  <div class="ctab" onclick="switchTab(this,'tab-rekaman')">▶ Rekaman</div>
  <div class="ctab" onclick="switchTab(this,'tab-materi')">📚 Materi</div>
  <div class="ctab" onclick="switchTab(this,'tab-absensi')">✔ Absensi</div>
</div>

<!-- TAB: JADWAL -->
<div id="tab-jadwal" class="tab-content">
  <div class="grid-3" id="classCards"></div>
</div>

<!-- TAB: REKAMAN -->
<div id="tab-rekaman" class="tab-content" style="display:none">
  <div class="grid-3">
    <div class="card card-sm">
      <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 4 Mar 2026</div>
      <div style="font-weight:700;margin-bottom:4px;">Speaking Practice — IELTS Part 1 & 2</div>
      <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 45 menit · Mr. Aryo · Zoom</div>
      <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
    </div>
    <div class="card card-sm">
      <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 28 Feb 2026</div>
      <div style="font-weight:700;margin-bottom:4px;">Grammar Masterclass — Tenses & Articles</div>
      <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 60 menit · Ms. Rina · Zoom</div>
      <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
    </div>
    <div class="card card-sm">
      <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 25 Feb 2026</div>
      <div style="font-weight:700;margin-bottom:4px;">IELTS Writing Q&A Live — Task 2 Essay</div>
      <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 50 menit · Ms. Rina · Zoom</div>
      <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
    </div>
    <div class="card card-sm">
      <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 21 Feb 2026</div>
      <div style="font-weight:700;margin-bottom:4px;">Reading Strategies — Skimming & Scanning</div>
      <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 55 menit · Mr. Bayu · Live</div>
      <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
    </div>
    <div class="card card-sm">
      <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 18 Feb 2026</div>
      <div style="font-weight:700;margin-bottom:4px;">Vocabulary Foundation — IELTS Tier-1</div>
      <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 40 menit · Self-Study · Recording</div>
      <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
    </div>
  </div>
</div>

<!-- TAB: MATERI -->
<div id="tab-materi" class="tab-content" style="display:none">
  <div style="display:flex;flex-direction:column;gap:10px;">
    <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
      <div style="font-size:28px;">🎯</div>
      <div style="flex:1">
        <div style="font-weight:700;">Grammar Fundamentals — Unit 4 Slide Deck</div>
        <div style="font-size:12px;color:var(--muted);">Unit 4 · 52 slide · 4.8 MB · Ms. Rina</div>
      </div>
      <button class="btn-sm btn-sm-yellow">⬇ Download</button>
    </div>
    <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
      <div style="font-size:28px;">📚</div>
      <div style="flex:1">
        <div style="font-weight:700;">IELTS Reading Strategies — Guide PDF</div>
        <div style="font-size:12px;color:var(--muted);">Unit 3 · 28 halaman · 2.3 MB · Mr. Bayu</div>
      </div>
      <button class="btn-sm btn-sm-yellow">⬇ Download</button>
    </div>
    <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
      <div style="font-size:28px;">📝</div>
      <div style="flex:1">
        <div style="font-weight:700;">IELTS Writing Task 2 — Formula PEEL PDF</div>
        <div style="font-size:12px;color:var(--muted);">Unit 8 · 24 halaman · 2.1 MB · Ms. Rina</div>
      </div>
      <button class="btn-sm btn-sm-ghost">🔒 Locked (Unit 8)</button>
    </div>
    <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
      <div style="font-size:28px;">🎧</div>
      <div style="flex:1">
        <div style="font-weight:700;">IELTS Listening Practice Pack — MP3</div>
        <div style="font-size:12px;color:var(--muted);">Unit 5 · 12 audio · 45 MB · Official IELTS</div>
      </div>
      <button class="btn-sm btn-sm-ghost">🔒 Locked (Unit 5)</button>
    </div>
    <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
      <div style="font-size:28px;">📊</div>
      <div style="flex:1">
        <div style="font-weight:700;">Vocabulary Foundation — 200 IELTS Tier-1 Wordlist</div>
        <div style="font-size:12px;color:var(--muted);">Unit 1 · Excel + PDF · 1.2 MB</div>
      </div>
      <button class="btn-sm btn-sm-yellow">⬇ Download</button>
    </div>
  </div>
</div>

<!-- TAB: ABSENSI -->
<div id="tab-absensi" class="tab-content" style="display:none">
  <div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
      <div>
        <div style="font-family:var(--font-disp);font-size:22px;font-weight:800;">92% <span style="font-size:14px;color:var(--muted);font-weight:400">Kehadiran</span></div>
        <div style="font-size:12px;color:var(--text-2);margin-top:2px;">22 dari 24 sesi hadir</div>
      </div>
      <span class="tag tag-green">Sangat Baik ✓</span>
    </div>
    <div id="absenList"></div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   CLASS CARDS
=========================================================== */
const classData = [
  { emoji:'🎤', bg:'linear-gradient(135deg,#1A2D60,#0F1E45)',  title:'IELTS Speaking Practice — Part 1 & 2',    tags:['tag-orange','Intermediate'],  meta:'Zoom · Mr. Aryo',    next:'Hari ini, 10:00', active:true  },
  { emoji:'✏️', bg:'linear-gradient(135deg,#1A3A2A,#0F2015)',  title:'Grammar Fundamentals — Unit 4',          tags:['tag-blue','Semua Level'],     meta:'Self-paced · Online', next:'Setiap hari',     active:true  },
  { emoji:'📝', bg:'linear-gradient(135deg,#2A1A0A,#1A0A05)',  title:'IELTS Writing Live Q&A — Task 2',       tags:['tag-yellow','All Levels'],    meta:'Zoom · Ms. Rina',   next:'Hari ini, 14:00', active:true  },
  { emoji:'📖', bg:'linear-gradient(135deg,#3A2A0A,#201505)',  title:'IELTS Reading Strategies',               tags:['tag-green','Semua Level'],    meta:'Live · Mr. Bayu',   next:'Rabu, 10:00',     active:true  },
  { emoji:'🎮', bg:'linear-gradient(135deg,#1A2D60,#0F1E45)', title:'Clan Group Study — IELTS Warriors 6.5',  tags:['tag-yellow','Members Only'],  meta:'Zoom · Clan Leader', next:'Hari ini, 20:00', active:true  },
  { emoji:'🎧', bg:'linear-gradient(135deg,#2A1A3A,#160F20)',  title:'IELTS Listening Drills — Unit 5',        tags:['tag-muted','Intermediate'],   meta:'Self-paced · Online', next:'Buka setelah CP-2', active:false },
  { emoji:'📊', bg:'linear-gradient(135deg,#1A2A3A,#0F1520)',  title:'IELTS Writing Task 2 Masterclass',        tags:['tag-blue','Advanced'],        meta:'Zoom · Ms. Rina',   next:'Buka setelah U5',  active:false },
  { emoji:'🧪', bg:'linear-gradient(135deg,#2A0A0A,#1A0505)',  title:'Full Mock Test — Slot Tersedia',         tags:['tag-green','Semua Level'],    meta:'Solo · Timed · 2.5 jam', next:'Buka setelah CP-3', active:false },
];
function renderClasses(){
  const c=document.getElementById('classCards');
  c.innerHTML='';
  classData.forEach(cl=>{
    const card=document.createElement('div');
    card.className='class-card';
    card.innerHTML=`
      <div class="class-thumb" style="background:${cl.bg}">
        <span style="position:relative;z-index:1;font-size:40px">${cl.emoji}</span>
      </div>
      <div class="class-body">
        <div class="class-title">${cl.title}</div>
        <div class="class-meta">
          <span class="tag ${cl.tags[0]}">${cl.tags[1]}</span>
          ${cl.active?'<span class="tag tag-green">Aktif</span>':'<span class="tag tag-muted">Segera</span>'}
        </div>
        <div style="font-size:11px;color:var(--muted);margin-bottom:12px">🕐 ${cl.next} · ${cl.meta}</div>
        <div class="class-actions">
          ${cl.active?'<button class="btn-sm btn-sm-yellow">🔗 Join Zoom</button>':'<button class="btn-sm btn-sm-ghost">🔔 Remind Me</button>'}
          <button class="btn-sm btn-sm-ghost">📄 Materi</button>
        </div>
      </div>
    `;
    c.appendChild(card);
  });
}
renderClasses();

/* ABSENSI */
const absensi = [
  { date:'4 Mar 2026',  class:'Speaking Practice — IELTS Part 1 & 2', status:'Hadir', cls:'tag-green' },
  { date:'3 Mar 2026',  class:'Grammar Unit 4 Self-Study',              status:'Hadir', cls:'tag-green' },
  { date:'28 Feb 2026', class:'IELTS Writing Q&A Live — Task 2',        status:'Hadir', cls:'tag-green' },
  { date:'25 Feb 2026', class:'Grammar Masterclass — Tenses & Articles', status:'Hadir', cls:'tag-green' },
  { date:'21 Feb 2026', class:'Reading Strategies — Live Session',       status:'Absen', cls:'tag-red'   },
  { date:'18 Feb 2026', class:'Speaking Practice — IELTS Part 2',        status:'Hadir', cls:'tag-green' },
  { date:'14 Feb 2026', class:'Vocabulary Foundation — Unit 1',          status:'Hadir', cls:'tag-green' },
  { date:'11 Feb 2026', class:'Placement Test & Diagnostic',              status:'Hadir', cls:'tag-green' },
];
function renderAbsensi(){
  const c=document.getElementById('absenList');
  if(!c)return;
  c.innerHTML='';
  absensi.forEach(a=>{
    const row=document.createElement('div');
    row.className='attend-row';
    row.innerHTML=`
      <div class="att-ico" style="background:${a.status==='Hadir'?'rgba(61,214,140,.15)':'rgba(255,90,90,.15)'}">
        ${a.status==='Hadir'?'✅':'❌'}
      </div>
      <div style="flex:1">
        <div style="font-size:13px;font-weight:700">${a.class}</div>
        <div style="font-size:11px;color:var(--muted)">${a.date}</div>
      </div>
      <span class="tag ${a.cls}">${a.status}</span>
    `;
    c.appendChild(row);
  });
}
renderAbsensi();

/* CLASS TABS */
function switchTab(el,tabId){
  document.querySelectorAll('.ctab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(t=>t.style.display='none');
  el.classList.add('active');
  document.getElementById(tabId).style.display='block';
}
</script>
@endsection
