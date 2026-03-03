@extends('layouts.lms-layout')
@section('title', '👥 Clan System')
@section('nav_clan', 'active')
@section('topbar_title', '👥 Clan System')

@section('content')
<h2 class="page-title">Clan System</h2>
<p class="page-sub">Belajar lebih semangat bersama kelompok dengan target yang sama.</p>

<div class="clan-banner">
  <div>
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
      <span class="tag tag-blue">Clan Aktif</span>
      <span class="tag tag-muted">32 Anggota</span>
    </div>
    <div class="clan-name">⚔️ IELTS Warriors 6.5</div>
    <div style="font-size:13px;color:var(--text-2);">Target bersama: IELTS 6.5 · Deadline: Juli 2026</div>
    <div class="clan-stats">
      <div class="cs-item">
        <div class="cs-num">32</div>
        <div class="cs-lbl">Anggota</div>
      </div>
      <div class="cs-item">
        <div class="cs-num">94%</div>
        <div class="cs-lbl">Aktif minggu ini</div>
      </div>
      <div class="cs-item">
        <div class="cs-num">#12</div>
        <div class="cs-lbl">Rank kamu</div>
      </div>
    </div>
  </div>
  <div class="clan-shield">⚔️</div>
</div>

<div class="grid-2">
  <div>
    <div class="section-label" style="margin-bottom:14px">🏆 Weekly Leaderboard</div>
    <div class="leaderboard" id="leaderboard"></div>
  </div>
  <div>
    <div class="section-label" style="margin-bottom:14px">🔥 Weekly Challenge</div>
    <div class="card card-sm" style="margin-bottom:12px;border-color:rgba(245,200,66,.2);background:var(--yellow-dim)">
      <div style="font-weight:700;margin-bottom:6px;">🗣 Speaking Marathon</div>
      <div style="font-size:12px;color:var(--text-2);line-height:1.6;margin-bottom:12px;">
        Record 3 speaking answers (2 menit tiap satu) dan submit sebelum Minggu jam 23:59.
      </div>
      <div class="prog-bar"><div class="prog-fill" style="width:33%"></div></div>
      <div style="display:flex;justify-content:space-between;margin-top:6px;">
        <div style="font-size:11px;color:var(--muted)">1 dari 3 selesai</div>
        <div style="font-size:11px;color:var(--yellow)">Sisa 4 hari</div>
      </div>
    </div>

    <div class="section-label" style="margin-bottom:14px">💬 Forum Diskusi</div>
    <div class="card card-sm" style="margin-bottom:10px;">
      <div style="display:flex;gap:10px;align-items:flex-start;">
        <div class="lb-avatar" style="background:linear-gradient(135deg,#F5C842,#F5842A);color:var(--navy);font-size:11px;">DS</div>
        <div>
          <div style="font-size:13px;font-weight:600;">Dini Sari</div>
          <div style="font-size:12px;color:var(--text-2);margin-top:2px;">"Ada yang sudah coba PEEL structure untuk Task 2? Hasilnya gimana?"</div>
          <div style="font-size:10px;color:var(--muted);margin-top:6px;">2 jam lalu · 8 replies</div>
        </div>
      </div>
    </div>
    <div class="card card-sm" style="margin-bottom:10px;">
      <div style="display:flex;gap:10px;align-items:flex-start;">
        <div class="lb-avatar" style="background:linear-gradient(135deg,var(--blue-acc),#7BAEFF);color:#fff;font-size:11px;">BW</div>
        <div>
          <div style="font-size:13px;font-weight:600;">Bagas W.</div>
          <div style="font-size:12px;color:var(--text-2);margin-top:2px;">"Checkpoint 1 besok — ada yang mau group study malam ini?"</div>
          <div style="font-size:10px;color:var(--muted);margin-top:6px;">5 jam lalu · 14 replies</div>
        </div>
      </div>
    </div>
    <button class="btn-yellow" style="width:100%;font-family:var(--font-body);font-size:13px;padding:12px;">+ Buat Post Diskusi</button>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   LEADERBOARD
=========================================================== */
const lbData=[
  {rank:1,name:'Siti Rahma',pts:1240,pct:100,color:'#F5C842,#F5842A',initials:'SR'},
  {rank:2,name:'Bima Kusuma',pts:1185,pct:96,color:'#4F7BFF,#7BAEFF',initials:'BK'},
  {rank:3,name:'Laila Nur',pts:1102,pct:89,color:'#3DD68C,#7DFFC9',initials:'LN'},
  {rank:4,name:'Reza Fauzi',pts:980,pct:79,color:'#FF8A4F,#FFB27A',initials:'RF'},
  {rank:5,name:'Maya Putri',pts:860,pct:69,color:'#A78BFA,#C4B5FD',initials:'MP'},
  {rank:6,name:'{{ Auth::user()->name ?? "Aryo Rahmat" }} ★',pts:745,pct:60,color:'#F5C842,#F5842A',initials:'{{ substr(Auth::user()->name ?? "S", 0, 1) }}',me:true},
  {rank:7,name:'Dani Syahri',pts:680,pct:55,color:'#4F7BFF,#7BAEFF',initials:'DS'},
];
function renderLB(){
  const c=document.getElementById('leaderboard');
  c.innerHTML='';
  const rankClass=['','gold','silver','bronze'];
  lbData.forEach(u=>{
    const row=document.createElement('div');
    row.className='lb-row'+(u.me?' me':'');
    row.innerHTML=`
      <div class="lb-rank ${rankClass[u.rank]||''}">${u.rank}</div>
      <div class="lb-avatar" style="background:linear-gradient(135deg,${u.color});color:${u.rank<=3?'#0B1B3E':'#fff'}">${u.initials}</div>
      <div class="lb-info">
        <div class="lb-name">${u.name}</div>
        <div class="lb-bar-wrap"><div class="lb-bar"><div class="lb-fill" style="width:${u.pct}%"></div></div></div>
      </div>
      <div class="lb-pts">${u.pts.toLocaleString()}</div>
    `;
    c.appendChild(row);
  });
}
renderLB();
</script>
@endsection
