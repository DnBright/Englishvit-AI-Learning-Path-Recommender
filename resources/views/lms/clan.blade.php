@extends('layouts.lms-layout')
@section('title', '👥 Clan System')
@section('nav_clan', 'active')
@section('topbar_title', '👥 Clan System')

@section('styles')
<style>
/* ──────────────────────────────────────────────────────
   CLAN PAGE — LOCAL STYLES
   (Menggunakan variabel global dari lms-layout)
────────────────────────────────────────────────────── */

/* Hero Banner */
.clan-name  { font-family:var(--font-disp);font-weight:800;letter-spacing:-.5px;line-height:1.15; }
.clan-shield{ width:76px;height:76px;border-radius:20px;background:rgba(245,200,66,.1);border:2px solid rgba(245,200,66,.25);display:flex;align-items:center;justify-content:center;font-size:38px;flex-shrink:0; }
@keyframes shield-glow { 0%,100%{box-shadow:0 8px 28px rgba(245,200,66,.12);}50%{box-shadow:0 8px 40px rgba(245,200,66,.28);} }

/* Clan Board Grid (4 stat boxes inside card) */
.clan-board-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border);border-radius:12px;overflow:hidden;margin-bottom:18px;}
.cb-card    { background:rgba(255,255,255,.025);padding:14px 10px;text-align:center;transition:background .15s; }
.cb-card:hover{ background:rgba(255,255,255,.05); }
.cb-val     { font-family:var(--font-disp);font-size:22px;font-weight:800;line-height:1;margin-bottom:4px; }
.cb-lbl     { font-size:9px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.8px; }

/* Leaderboard rows */
.lb-avatar  { width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;flex-shrink:0; }
.lb-row     { display:flex;align-items:center;gap:12px;padding:10px 14px;border-radius:12px;background:rgba(255,255,255,.03);border:1px solid var(--border);margin-bottom:8px;transition:all .18s;cursor:pointer; }
.lb-row:hover{ background:rgba(255,255,255,.06); }
.lb-row.me  { background:var(--yellow-dim);border-color:rgba(245,200,66,.25); }
.lb-rank    { font-family:var(--font-disp);font-size:18px;font-weight:800;color:var(--muted);width:28px;text-align:center;flex-shrink:0; }
.lb-rank.gold  { color:var(--yellow); }
.lb-rank.silver{ color:#C0C8D8; }
.lb-rank.bronze{ color:#CD7F32; }
.lb-info    { flex:1; }
.lb-name    { font-size:13px;font-weight:700;margin-bottom:3px; }
.lb-bar-wrap{ max-width:90px; }
.lb-bar     { height:4px;background:rgba(255,255,255,.06);border-radius:4px;overflow:hidden; }
.lb-fill    { height:100%;border-radius:4px;background:linear-gradient(90deg,var(--yellow),var(--orange)); }
.lb-pts     { font-family:var(--font-disp);font-size:16px;font-weight:800;color:var(--yellow); }

/* Clan War Banner */
.clan-war-banner { background:linear-gradient(135deg,#1A0B2E,#2A1260,#0F1E45);border-radius:16px;padding:22px;position:relative;overflow:hidden;display:flex;flex-direction:column;align-items:center; }
.cw-glow    { position:absolute;top:-60px;left:50%;transform:translateX(-50%);width:300px;height:200px;border-radius:50%;background:radial-gradient(circle,rgba(167,139,250,.15) 0%,transparent 65%);pointer-events:none; }

/* Tab buttons */
.ctab       { padding:7px 14px;border-radius:40px;font-size:12px;font-weight:700;cursor:pointer;white-space:nowrap;border:1px solid var(--border);color:var(--muted);background:transparent;transition:all .18s;flex-shrink:0; }
.ctab:hover { border-color:rgba(255,255,255,.2);color:var(--white); }
.ctab.active{ background:rgba(255,255,255,.08);color:var(--white);border-color:rgba(255,255,255,.15); }

/* Feed animations */
@keyframes feed-in { from{opacity:0;transform:translateX(-6px);}to{opacity:1;transform:translateX(0);} }
@keyframes fade-up  { from{opacity:0;transform:translateY(12px);}to{opacity:1;transform:translateY(0);} }

/* Responsive */
@media(max-width:800px){
  .grid-2         { grid-template-columns:1fr; }
  .clan-board-grid{ grid-template-columns:repeat(2,1fr); }
}
</style>
@endsection

@section('content')
<div style="display:flex;flex-direction:column;gap:20px;padding-bottom:40px;">

  {{-- ══════════════════════════════
       1. CLAN HERO
  ══════════════════════════════════ --}}
  <div style="background:linear-gradient(135deg,rgba(255,255,255,.05),rgba(255,255,255,.02));border:1px solid var(--border);border-radius:20px;padding:0;overflow:hidden;position:relative;">
    <div style="position:absolute;top:-80px;right:-80px;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(245,200,66,.12),transparent 65%);pointer-events:none;"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:220px;height:220px;border-radius:50%;background:radial-gradient(circle,rgba(79,123,255,.1),transparent 65%);pointer-events:none;"></div>

    <div style="position:relative;z-index:1;padding:28px;">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap;">
        <div>
          <div style="display:flex;gap:6px;margin-bottom:10px;flex-wrap:wrap;">
            <span class="tag tag-yellow">⚡ Rank #4 Global</span>
            <span class="tag tag-muted">32 Members</span>
            <span class="tag" style="background:rgba(61,214,140,.1);color:var(--green-acc);">🟢 Aktif</span>
          </div>
          <div class="clan-name" style="font-size:26px;margin-bottom:6px;">⚔️ IELTS Warriors 6.5</div>
          <div style="font-size:13px;color:var(--text-2);">Target Bersama: <b style="color:var(--white);">IELTS 6.5</b> · 4 Month Intensive Program</div>
        </div>
        <div class="clan-shield" style="animation:shield-glow 3s ease-in-out infinite;">⚔️</div>
      </div>

      {{-- Stats Row --}}
      <div style="display:flex;margin-top:22px;border-top:1px solid var(--border);">
        @foreach([['32','Anggota'],['94%','Aktif Minggu Ini'],['6.1','Avg Skor'],['248','Unit Selesai'],['#12','Posisimu']] as $s)
        <div style="flex:1;padding:14px 10px;text-align:center;{{ !$loop->last ? 'border-right:1px solid var(--border);' : '' }}">
          <div style="font-family:var(--font-disp);font-size:20px;font-weight:800;color:var(--yellow);line-height:1;margin-bottom:3px;">{{ $s[0] }}</div>
          <div style="font-size:10px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">{{ $s[1] }}</div>
        </div>
        @endforeach
      </div>
    </div>

    {{-- Countdown --}}
    <div style="display:flex;justify-content:center;gap:8px;padding:14px 28px 22px;position:relative;z-index:1;">
      @foreach([['cdDay','Hari'],['cdHour','Jam'],['cdMin','Menit'],['cdSec','Detik']] as $c)
        @if(!$loop->first)
        <div style="font-family:var(--font-disp);font-size:22px;color:rgba(255,255,255,.2);align-self:flex-start;padding-top:10px;">:</div>
        @endif
        <div style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:10px;padding:10px 14px;text-align:center;min-width:56px;">
          <div style="font-family:var(--font-disp);font-size:20px;font-weight:800;color:var(--white);line-height:1;" id="{{ $c[0] }}">—</div>
          <div style="font-size:9px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-top:3px;">{{ $c[1] }}</div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- ══════════════════════════════
       2. PROGRESS BOARD + LEADERBOARD
  ══════════════════════════════════ --}}
  <div class="grid-2">
    <div class="card">
      <div class="section-label">📊 Clan Progress Board <span class="tag tag-blue" style="margin-left:auto;letter-spacing:0;text-transform:none;font-size:10px;">Minggu Ini</span></div>
      <div class="clan-board-grid">
        <div class="cb-card"><div class="cb-val" style="color:var(--blue-acc)">142</div><div class="cb-lbl">Unit Selesai</div><div style="font-size:10px;color:var(--green-acc);font-weight:700;margin-top:3px;">↑ +28</div></div>
        <div class="cb-card"><div class="cb-val" style="color:var(--orange)">38</div><div class="cb-lbl">Challenges</div><div style="font-size:10px;color:var(--green-acc);font-weight:700;margin-top:3px;">↑ +12</div></div>
        <div class="cb-card"><div class="cb-val" style="color:var(--green-acc)">6.1</div><div class="cb-lbl">Avg Mock</div><div style="font-size:10px;color:var(--green-acc);font-weight:700;margin-top:3px;">↑ +0.3</div></div>
        <div class="cb-card"><div class="cb-val" style="color:var(--yellow)">94%</div><div class="cb-lbl">Aktif</div><div style="font-size:10px;color:var(--green-acc);font-weight:700;margin-top:3px;">↑ +4%</div></div>
      </div>
      <div class="section-label" style="font-size:10px;">Kontribusi Anggota</div>
      <div id="memberRings" style="display:flex;flex-direction:column;gap:10px;"></div>
    </div>

    <div class="card">
      <div class="section-label">🏆 Weekly Leaderboard</div>
      <div id="leaderboardList"></div>
    </div>
  </div>

  {{-- ══════════════════════════════
       3. WEEKLY CHALLENGE
  ══════════════════════════════════ --}}
  <div class="card">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
      <div class="section-label" style="margin-bottom:0;">🔥 Weekly Challenge</div>
      <div style="font-family:var(--font-disp);font-size:13px;font-weight:800;color:var(--orange);">⏱ <span id="challengeTimer">—</span> tersisa</div>
    </div>
    <div style="background:rgba(79,123,255,.06);border:1px solid rgba(79,123,255,.12);border-radius:12px;padding:14px 16px;margin-bottom:16px;">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
        <div style="font-size:13px;font-weight:700;">🏅 Progress Clan Minggu Ini</div>
        <div style="font-family:var(--font-disp);font-size:16px;font-weight:800;color:var(--blue-acc);">67%</div>
      </div>
      <div class="prog-bar"><div class="prog-fill" style="width:67%;background:linear-gradient(90deg,var(--blue-acc),#7BAEFF);"></div></div>
      <div style="display:flex;justify-content:space-between;margin-top:7px;font-size:11px;color:var(--muted);font-weight:600;">
        <span>18 dari 32 anggota selesai</span>
        <span style="color:var(--blue-acc);font-weight:700;">+240 Clan XP</span>
      </div>
    </div>
    <div id="challengeList" style="display:flex;flex-direction:column;gap:10px;"></div>
  </div>

  {{-- ══════════════════════════════
       4. ACTIVITY FEED + DISCUSSION
  ══════════════════════════════════ --}}
  <div class="grid-2">
    <div class="card">
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
        <div class="section-label" style="margin-bottom:0;">⚡ Activity Feed</div>
        <span class="tag" style="background:rgba(61,214,140,.1);color:var(--green-acc);font-size:10px;">● Live</span>
      </div>
      <div id="activityFeed"></div>
    </div>

    <div class="card">
      <div class="section-label" style="margin-bottom:12px;">💬 Discussion Room <span class="tag tag-blue" style="margin-left:auto;letter-spacing:0;text-transform:none;font-size:10px;">12 Online</span></div>
      <div style="display:flex;gap:6px;margin-bottom:14px;overflow-x:auto;scrollbar-width:none;">
        <div class="ctab active" onclick="switchDiscTab(this,'grammar')">📝 Grammar</div>
        <div class="ctab" onclick="switchDiscTab(this,'tips')">💡 Tips</div>
        <div class="ctab" onclick="switchDiscTab(this,'mock')">📊 Mock Test</div>
        <div class="ctab" onclick="switchDiscTab(this,'general')">🗣 General</div>
      </div>
      <div id="discList" style="display:flex;flex-direction:column;gap:8px;margin-bottom:12px;"></div>
      <div style="display:flex;gap:8px;align-items:center;">
        <input class="chat-input" id="discInput" placeholder="Tulis pertanyaan atau diskusi..." onkeydown="if(event.key==='Enter')postDisc()" style="flex:1;">
        <button class="chat-send" onclick="postDisc()">➤</button>
      </div>
    </div>
  </div>

  {{-- ══════════════════════════════
       5. CLAN WAR
  ══════════════════════════════════ --}}
  <div class="card">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
      <div class="section-label" style="margin-bottom:0;">⚔️ Clan War — Season 4</div>
      <div style="display:flex;gap:6px;">
        <span class="tag tag-purple">Aktif</span>
        <span class="tag tag-orange">Berakhir 8 Mar</span>
      </div>
    </div>

    <div class="clan-war-banner">
      <div class="cw-glow"></div>
      <div style="position:relative;z-index:1;display:flex;justify-content:space-between;align-items:center;width:100%;gap:16px;margin-bottom:16px;">
        <div style="text-align:center;flex:1;">
          <div style="font-family:var(--font-disp);font-size:13px;color:rgba(255,255,255,.8);margin-bottom:6px;">⚔️ IELTS Warriors 6.5</div>
          <div style="font-family:var(--font-disp);font-size:32px;font-weight:800;color:var(--yellow);line-height:1;">2,840</div>
          <div style="font-size:10px;color:rgba(255,255,255,.35);margin-top:4px;">Klan Kamu</div>
        </div>
        <div style="font-family:var(--font-disp);font-size:18px;font-weight:800;color:rgba(255,255,255,.2);padding:0 10px;">VS</div>
        <div style="text-align:center;flex:1;">
          <div style="font-family:var(--font-disp);font-size:13px;color:rgba(255,255,255,.8);margin-bottom:6px;">🔥 English Blazers</div>
          <div style="font-family:var(--font-disp);font-size:32px;font-weight:800;color:rgba(255,255,255,.4);line-height:1;">1,740</div>
          <div style="font-size:10px;color:rgba(255,255,255,.35);margin-top:4px;">Lawan</div>
        </div>
      </div>
      <div style="position:relative;z-index:1;width:100%;">
        <div style="height:10px;background:rgba(255,255,255,.08);border-radius:10px;overflow:hidden;">
          <div style="height:100%;width:62%;background:linear-gradient(90deg,var(--yellow),var(--orange));border-radius:10px;transition:width 1.2s ease;"></div>
        </div>
        <div style="display:flex;justify-content:space-between;margin-top:6px;font-size:11px;font-weight:700;color:rgba(255,255,255,.4);">
          <span style="color:rgba(245,200,66,.7);">Warriors 62%</span>
          <span>Blazers 38%</span>
        </div>
      </div>
    </div>

    <div class="section-label" style="font-size:10px;margin:16px 0 10px;">War Tasks — Selesaikan untuk +Poin Clan</div>
    <div id="warTasks" style="display:flex;flex-direction:column;gap:8px;"></div>
  </div>

</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   DATA
============================================================ */
const MEMBERS = [
  { name:'Siti Rahma',    initials:'SR', color:'#F5C500,#FF7A00', pct:100, pts:1240 },
  { name:'Bima Kusuma',   initials:'BK', color:'#4F7BFF,#7BAEFF', pct:96,  pts:1185 },
  { name:'Laila Nur',     initials:'LN', color:'#3DD68C,#7DFFC9', pct:89,  pts:1102 },
  { name:'Reza Fauzi',    initials:'RF', color:'#FF8A4F,#FFB27A', pct:79,  pts:980  },
  { name:'Maya Putri',    initials:'MP', color:'#A78BFA,#C4B5FD', pct:69,  pts:860  },
  { name:'Rina ★', initials:'R', color:'#F5C500,#FF7A00', pct:60,  pts:745, me:true },
  { name:'Dani Syahri',   initials:'DS', color:'#4F7BFF,#7BAEFF', pct:55,  pts:680  },
];

const CHALLENGES = [
  { icon:'🗣', name:'Speaking Marathon',         meta:'Record 3 jawaban 2 menit · Submit sebelum Minggu',    pts:'+80 XP',  pct:33,  done:false },
  { icon:'✏️', name:'Writing Task 2 Submission', meta:'Tulis 1 essay IELTS Task 2 min. 250 kata',            pts:'+100 XP', pct:60,  done:false },
  { icon:'🎧', name:'Listening Mock Test',        meta:'Selesaikan 1 full listening test dalam sekali duduk', pts:'+60 XP',  pct:100, done:true  },
  { icon:'📖', name:'20 Vocabulary Practice',    meta:'Selesaikan 20 soal vocab dari bank soal IELTS',       pts:'+40 XP',  pct:0,   done:false },
];

const FEED_DATA = [
  { initials:'SR', color:'#F5C500,#FF7A00', text:'<b>Siti Rahma</b> menyelesaikan Unit 5 — Listening Strategies',      badge:'✅ Unit',      badgeColor:'var(--green-acc)', time:'2 mnt lalu'  },
  { initials:'🏅', system:true,             text:'<b>Clan mencapai 50% Weekly Challenge!</b> Mari kita kejar sisanya!',  badge:'Milestone',   badgeColor:'var(--blue-acc)', time:'15 mnt lalu' },
  { initials:'BK', color:'#4F7BFF,#7BAEFF', text:'<b>Bima Kusuma</b> dapat skor <b>6.5</b> di Mock Test Listening',    badge:'🎯 Mock',      badgeColor:'var(--orange)',    time:'32 mnt lalu' },
  { initials:'LN', color:'#3DD68C,#7DFFC9', text:'<b>Laila Nur</b> selesaikan Writing Task 2 Submission',              badge:'🔥 Challenge', badgeColor:'var(--yellow)',    time:'1 jam lalu'  },
  { initials:'⚔️', system:true,             text:'<b>Clan War:</b> IELTS Warriors unggul 1,100 poin dari English Blazers!', badge:'⚔️ War', badgeColor:'#a78bfa',          time:'2 jam lalu'  },
  { initials:'RF', color:'#FF8A4F,#FFB27A', text:'<b>Reza Fauzi</b> bergabung dan selesaikan Placement Test',          badge:'👋 Join',      badgeColor:'var(--muted)',     time:'3 jam lalu'  },
];

const DISCUSSIONS = {
  grammar: [
    { initials:'DS', color:'#4F7BFF,#7BAEFF', author:'Dani Syahri',  time:'10 mnt', text:'"Beda Present Perfect vs Past Simple untuk IELTS Writing?"',    replies:8,  likes:14, pinned:false },
    { initials:'SR', color:'#F5C500,#FF7A00', author:'Siti Rahma',   time:'1 jam',  text:'"Tips pakai articles (a/an/the) yang benar di Writing Task 2?"', replies:12, likes:22, pinned:true  },
  ],
  tips: [
    { initials:'LN', color:'#3DD68C,#7DFFC9', author:'Laila Nur',   time:'20 mnt', text:'"Baca 1 artikel BBC setiap hari — sudah 2 bulan dan reading speed meningkat!"', replies:18, likes:31, pinned:true  },
    { initials:'BK', color:'#4F7BFF,#7BAEFF', author:'Bima Kusuma', time:'2 jam',  text:'"Speaking Part 2: gunakan framework STAR (Situation, Task, Action, Result)."',  replies:7,  likes:15, pinned:false },
  ],
  mock: [
    { initials:'RF', color:'#FF8A4F,#FFB27A', author:'Reza Fauzi',  time:'5 jam',  text:'"Mock Test 1 selesai! L6.5 R6.0 W5.5 S5.5. Ada yang mau group review besok?"', replies:10, likes:8, pinned:false },
  ],
  general: [
    { initials:'AR', color:'#F5C500,#FF7A00', author:'Aryo Rahmat', time:'1 jam',  text:'"Group study malam ini jam 20.00 WIB — siapa yang ikut? Link Zoom di Calendar!"', replies:14, likes:20, pinned:true },
  ],
};

const WAR_TASKS = [
  { icon:'🗣', name:'50 Speaking Minutes Kolektif', meta:'Progress: 32/50 menit · 18 anggota berkontribusi', pts:'+200 War XP',   color:'var(--yellow)'   },
  { icon:'✏️', name:'15 Writing Submissions',       meta:'Progress: 9/15 submission · Deadline: 8 Mar',     pts:'+300 War XP',   color:'var(--blue-acc)' },
  { icon:'📊', name:'Rata-rata Mock Test > 6.0',    meta:'Current: 6.1 ✓ — Target sudah tercapai!',          pts:'+150 War XP ✓', color:'var(--green-acc)'},
];

/* ============================================================
   RENDER: MEMBER RINGS
============================================================ */
function renderMemberRings() {
  const c = document.getElementById('memberRings');
  MEMBERS.slice(0, 5).forEach((m, i) => {
    const nameStyle = m.me ? 'color:var(--yellow);' : '';
    const row = document.createElement('div');
    row.style.cssText = 'display:flex;align-items:center;gap:10px;';
    row.innerHTML = `
      <div class="lb-avatar" style="background:linear-gradient(135deg,${m.color});color:${i<3?'#0B1B3E':'#fff'};font-size:11px;">${m.initials}</div>
      <div style="font-size:13px;font-weight:700;min-width:108px;${nameStyle}">${m.name}</div>
      <div style="flex:1;height:6px;background:rgba(255,255,255,.06);border-radius:6px;overflow:hidden;">
        <div style="height:100%;width:${m.pct}%;background:linear-gradient(90deg,var(--blue-acc),#7BAEFF);border-radius:6px;transition:width .8s ease;"></div>
      </div>
      <div style="font-size:12px;font-weight:700;min-width:34px;text-align:right;${nameStyle}">${m.pct}%</div>
    `;
    c.appendChild(row);
  });
}

/* ============================================================
   RENDER: LEADERBOARD
============================================================ */
function renderLeaderboard() {
  const c = document.getElementById('leaderboardList');
  const medals = ['🥇','🥈','🥉'];
  MEMBERS.forEach((m, i) => {
    const row = document.createElement('div');
    row.className = 'lb-row' + (m.me ? ' me' : '');
    row.innerHTML = `
      <div class="lb-rank ${i===0?'gold':i===1?'silver':i===2?'bronze':''}">${medals[i]||i+1}</div>
      <div class="lb-avatar" style="background:linear-gradient(135deg,${m.color});color:${i<3?'#0B1B3E':'#fff'};font-size:11px;">${m.initials}</div>
      <div class="lb-info">
        <div class="lb-name">${m.name}</div>
        <div class="lb-bar-wrap"><div class="lb-bar"><div class="lb-fill" style="width:${m.pct}%"></div></div></div>
      </div>
      <div class="lb-pts">${m.pts.toLocaleString()}</div>
    `;
    c.appendChild(row);
  });
}

/* ============================================================
   RENDER: CHALLENGES
============================================================ */
function renderChallenges() {
  const c = document.getElementById('challengeList');
  CHALLENGES.forEach(ch => {
    const el = document.createElement('div');
    el.style.cssText = `display:flex;align-items:center;gap:12px;padding:14px 16px;border-radius:12px;border:1px solid ${ch.done?'rgba(61,214,140,.2)':'var(--border)'};background:${ch.done?'rgba(61,214,140,.04)':'rgba(255,255,255,.02)'};transition:all .2s;cursor:pointer;`;
    el.innerHTML = `
      <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">${ch.icon}</div>
      <div style="flex:1;">
        <div style="font-size:14px;font-weight:700;margin-bottom:4px;color:${ch.done?'var(--green-acc)':'var(--white)'};">${ch.name}</div>
        <div style="font-size:12px;color:var(--muted);margin-bottom:${ch.done?'0':'6px'};">${ch.meta}</div>
        ${!ch.done
          ? `<div style="font-size:11px;font-weight:700;color:var(--blue-acc);margin-bottom:4px;">${ch.pct}% selesai</div>
             <div class="prog-bar" style="max-width:200px;height:5px;"><div class="prog-fill" style="width:${ch.pct}%;"></div></div>`
          : `<div style="font-size:11px;font-weight:700;color:var(--green-acc);">✅ Challenge Selesai!</div>`}
      </div>
      <div style="font-family:var(--font-disp);font-size:13px;font-weight:800;color:${ch.done?'var(--green-acc)':'var(--orange)'};flex-shrink:0;">${ch.pts}</div>
    `;
    if (!ch.done) {
      el.addEventListener('mouseenter', () => el.style.borderColor = 'rgba(79,123,255,.3)');
      el.addEventListener('mouseleave', () => el.style.borderColor = 'var(--border)');
      el.addEventListener('click', () => {
        el.style.borderColor = 'rgba(61,214,140,.2)';
        el.style.background  = 'rgba(61,214,140,.04)';
        el.querySelector('div:nth-child(2) div:first-child').style.color = 'var(--green-acc)';
        el.querySelector('div:last-child').style.color = 'var(--green-acc)';
        el.querySelector('div:nth-child(2)').lastElementChild.outerHTML =
          '<div style="font-size:11px;font-weight:700;color:var(--green-acc);">✅ Challenge Selesai!</div>';
      });
    }
    c.appendChild(el);
  });
}

/* ============================================================
   RENDER: ACTIVITY FEED
============================================================ */
function renderFeed() {
  const c = document.getElementById('activityFeed');
  FEED_DATA.forEach((f, i) => {
    const el = document.createElement('div');
    el.style.cssText = 'display:flex;align-items:flex-start;gap:10px;padding:10px 0;border-bottom:1px solid var(--border);animation:feed-in .35s ease both;';
    el.style.animationDelay = (i * 0.07) + 's';
    const avStyle = f.system
      ? 'background:rgba(79,123,255,.1);font-size:16px;'
      : `background:linear-gradient(135deg,${f.color});color:#0B1B3E;font-size:11px;`;
    el.innerHTML = `
      <div class="lb-avatar" style="${avStyle}flex-shrink:0;margin-top:2px;">${f.initials}</div>
      <div style="flex:1;">
        <div style="font-size:13px;color:var(--white);line-height:1.55;">${f.text}</div>
        <div style="font-size:10px;color:var(--muted);margin-top:3px;">${f.time}</div>
      </div>
      <span style="background:rgba(255,255,255,.05);border:1px solid var(--border);border-radius:20px;padding:2px 9px;font-size:10px;font-weight:700;color:${f.badgeColor};white-space:nowrap;align-self:flex-start;margin-top:3px;">${f.badge}</span>
    `;
    c.appendChild(el);
  });
}

/* ============================================================
   RENDER: DISCUSSIONS
============================================================ */
function renderDiscussions(tab) {
  const c = document.getElementById('discList');
  c.innerHTML = '';
  (DISCUSSIONS[tab] || []).forEach(t => {
    const el = document.createElement('div');
    el.style.cssText = `display:flex;gap:10px;align-items:flex-start;padding:12px 14px;border-radius:12px;cursor:pointer;border:1px solid ${t.pinned?'rgba(245,200,66,.2)':'var(--border)'};background:${t.pinned?'rgba(245,200,66,.04)':'rgba(255,255,255,.02)'};transition:all .18s;`;
    el.innerHTML = `
      <div class="lb-avatar" style="background:linear-gradient(135deg,${t.color});color:#0B1B3E;font-size:11px;margin-top:2px;">${t.initials}</div>
      <div style="flex:1;">
        <div style="display:flex;align-items:center;gap:6px;margin-bottom:4px;flex-wrap:wrap;">
          <span style="font-size:13px;font-weight:700;">${t.author}</span>
          ${t.pinned ? '<span style="font-size:9px;background:rgba(245,200,66,.15);color:var(--yellow);border-radius:20px;padding:1px 7px;font-weight:700;">📌 Pinned</span>' : ''}
          <span style="font-size:10px;color:var(--muted);">${t.time} lalu</span>
        </div>
        <div style="font-size:12px;color:var(--text-2);line-height:1.55;margin-bottom:6px;">${t.text}</div>
        <div style="display:flex;gap:10px;">
          <span style="font-size:11px;font-weight:700;color:var(--blue-acc);">💬 ${t.replies} balasan</span>
          <span style="font-size:11px;color:var(--muted);">❤️ ${t.likes} suka</span>
        </div>
      </div>
    `;
    el.addEventListener('mouseenter', () => el.style.borderColor = 'rgba(79,123,255,.25)');
    el.addEventListener('mouseleave', () => el.style.borderColor = t.pinned ? 'rgba(245,200,66,.2)' : 'var(--border)');
    c.appendChild(el);
  });
}

function switchDiscTab(el, tab) {
  document.querySelectorAll('.ctab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  renderDiscussions(tab);
}

function postDisc() {
  const inp = document.getElementById('discInput');
  const txt = inp.value.trim();
  if (!txt) return;
  const c = document.getElementById('discList');
  const el = document.createElement('div');
  el.style.cssText = 'display:flex;gap:10px;align-items:flex-start;padding:12px 14px;border-radius:12px;border:1px solid rgba(245,200,66,.2);background:rgba(245,200,66,.04);animation:feed-in .3s ease;';
  el.innerHTML = `
    <div class="lb-avatar" style="background:linear-gradient(135deg,#F5C500,#FF7A00);color:#0B1B3E;font-size:11px;margin-top:2px;">AR</div>
    <div style="flex:1;">
      <div style="display:flex;align-items:center;gap:6px;margin-bottom:4px;">
        <span style="font-size:13px;font-weight:700;">Aryo Rahmat ★</span>
        <span style="font-size:10px;color:var(--muted);">Baru saja</span>
      </div>
      <div style="font-size:12px;color:var(--text-2);">"${txt}"</div>
      <div style="display:flex;gap:10px;margin-top:5px;">
        <span style="font-size:11px;font-weight:700;color:var(--blue-acc);">💬 0 balasan</span>
        <span style="font-size:11px;color:var(--muted);">❤️ 0 suka</span>
      </div>
    </div>
  `;
  c.insertBefore(el, c.firstChild);
  inp.value = '';
}

/* ============================================================
   RENDER: WAR TASKS
============================================================ */
function renderWarTasks() {
  const c = document.getElementById('warTasks');
  WAR_TASKS.forEach(t => {
    const el = document.createElement('div');
    el.style.cssText = 'display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:12px;border:1px solid var(--border);background:rgba(255,255,255,.02);';
    el.innerHTML = `
      <div style="width:40px;height:40px;border-radius:10px;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;">${t.icon}</div>
      <div style="flex:1;">
        <div style="font-size:13px;font-weight:700;margin-bottom:3px;">${t.name}</div>
        <div style="font-size:11px;color:var(--muted);">${t.meta}</div>
      </div>
      <div style="font-family:var(--font-disp);font-size:13px;font-weight:800;color:${t.color};flex-shrink:0;">${t.pts}</div>
    `;
    c.appendChild(el);
  });
}

/* ============================================================
   COUNTDOWN
============================================================ */
function updateCountdown() {
  const diff = new Date('2026-07-04T00:00:00') - new Date();
  if (diff <= 0) return;
  const d = Math.floor(diff/86400000);
  const h = Math.floor((diff%86400000)/3600000);
  const m = Math.floor((diff%3600000)/60000);
  const s = Math.floor((diff%60000)/1000);
  const p = n => String(n).padStart(2,'0');
  document.getElementById('cdDay').textContent  = d;
  document.getElementById('cdHour').textContent = p(h);
  document.getElementById('cdMin').textContent  = p(m);
  document.getElementById('cdSec').textContent  = p(s);

  // Challenge timer → hitung ke Senin berikutnya
  const now = new Date();
  const nextMon = new Date(now);
  const daysUntilMon = (1 + 7 - now.getDay()) % 7 || 7;
  nextMon.setDate(now.getDate() + daysUntilMon);
  nextMon.setHours(0,0,0,0);
  const cd  = nextMon - now;
  const ch2 = Math.floor(cd/3600000);
  const cm2 = Math.floor((cd%3600000)/60000);
  document.getElementById('challengeTimer').textContent = `${ch2}j ${p(cm2)}m`;
}

/* ── INIT ── */
renderMemberRings();
renderLeaderboard();
renderChallenges();
renderFeed();
renderDiscussions('grammar');
renderWarTasks();
updateCountdown();
setInterval(updateCountdown, 1000);
</script>
@endsection