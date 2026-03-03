<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>My Success Path — Englishvit</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
<style>
/* ── RESET & ROOT ── */
*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

:root {
  --navy:    #0B1D45;
  --navy2:   #122259;
  --yellow:  #F5C500;
  --yellow2: #E8B400;
  --orange:  #FF7A00;
  --green:   #58CC02;
  --green2:  #46A302;
  --blue:    #1CB0F6;
  --blue2:   #0B87C0;
  --red:     #FF4B4B;
  --purple:  #CE82FF;
  --white:   #FFFFFF;
  --bg:      #F7F9FF;
  --muted:   #AFAFAF;
  --locked-bg: #E5E5E5;
  --locked-border: #CECECE;
  --font-game: 'Nunito', sans-serif;
  --font-body: 'Plus Jakarta Sans', sans-serif;
}

html, body {
  height: 100%;
  background: var(--bg);
  font-family: var(--font-body);
  overflow-x: hidden;
}

/* ── TOP BAR ── */
.topbar {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 200;
  background: var(--white);
  border-bottom: 2px solid #E8EDF5;
  padding: 0 16px;
  height: 56px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 2px 12px rgba(0,0,0,.06);
}

.tb-logo {
  display: flex;
  align-items: center;
  gap: 8px;
}
.tb-logo-mark {
  width: 36px; height: 36px;
  background: var(--yellow);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-game);
  font-weight: 900; font-size: 14px;
  color: var(--navy);
  box-shadow: 0 3px 0 var(--yellow2);
}
.tb-logo-text {
  font-family: var(--font-game);
  font-weight: 900;
  font-size: 18px;
  color: var(--navy);
}
.tb-logo-text span { color: var(--yellow2); }

.tb-stats {
  display: flex;
  align-items: center;
  gap: 14px;
}
.tb-stat {
  display: flex;
  align-items: center;
  gap: 5px;
  font-family: var(--font-game);
  font-weight: 800;
  font-size: 15px;
}
.tb-stat .ic { font-size: 18px; }
.tb-stat.fire  { color: var(--orange); }
.tb-stat.gem   { color: var(--blue); }
.tb-stat.life  { color: var(--red); }

/* ── SECTION BANNER ── */
.section-banner {
  position: fixed;
  top: 56px; left: 0; right: 0;
  z-index: 190;
  background: linear-gradient(135deg, #0F2860, #1A3A8A);
  border-bottom: 3px solid #081840;
  padding: 12px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 4px 16px rgba(0,0,0,.15);
}
.sb-left {}
.sb-section {
  font-size: 11px;
  font-weight: 700;
  color: rgba(255,255,255,.6);
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 2px;
}
.sb-title {
  font-family: var(--font-game);
  font-size: 17px;
  font-weight: 900;
  color: var(--white);
}
.sb-notes-btn {
  width: 38px; height: 38px;
  border-radius: 10px;
  background: rgba(255,255,255,.15);
  border: 2px solid rgba(255,255,255,.2);
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
  cursor: pointer;
  transition: all .15s;
}
.sb-notes-btn:hover { background: rgba(255,255,255,.25); }

/* ── SCROLL CONTAINER ── */
.scroll-area {
  padding-top: 130px;
  padding-bottom: 100px;
  min-height: 100vh;
  position: relative;
}

/* ── PATH TRACK ── */
.path-track {
  position: relative;
  width: 100%;
  max-width: 420px;
  margin: 0 auto;
  padding: 20px 0 40px;
}

/* SVG connector line */
.path-svg {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  pointer-events: none;
  z-index: 0;
}

/* ── NODE ROW SYSTEM ── */
.node-row {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 1;
  margin: 0;
  height: 110px;
}
.node-row.left  { justify-content: flex-start; padding-left: 40px; }
.node-row.right { justify-content: flex-end;  padding-right: 40px; }
.node-row.center{ justify-content: center; }

/* ── NODE BASE ── */
.node {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  user-select: none;
  transition: transform .15s;
}
.node:active { transform: scale(.93); }

.node-btn {
  width: 72px; height: 72px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  position: relative;
  transition: all .2s;
  border: none;
  outline: none;
  cursor: pointer;
}

/* DONE nodes */
.node-done .node-btn {
  background: var(--green);
  box-shadow: 0 5px 0 var(--green2);
}
.node-done:hover .node-btn { transform: translateY(-2px); }
.node-done:hover .node-btn { box-shadow: 0 7px 0 var(--green2); }

/* PROGRESS (current) node */
.node-progress .node-btn {
  background: var(--yellow);
  box-shadow: 0 5px 0 var(--yellow2);
  animation: bobble 2s ease-in-out infinite;
}
@keyframes bobble {
  0%,100% { transform: translateY(0); box-shadow: 0 5px 0 var(--yellow2); }
  50%      { transform: translateY(-5px); box-shadow: 0 10px 0 var(--yellow2); }
}

/* LOCKED nodes */
.node-locked .node-btn {
  background: var(--locked-bg);
  box-shadow: 0 5px 0 var(--locked-border);
  cursor: not-allowed;
}
.node-locked .node-btn .node-icon { filter: grayscale(1) opacity(.5); }

/* CHECKPOINT nodes */
.node-checkpoint .node-btn {
  background: #FFD900;
  box-shadow: 0 5px 0 #C9A800;
  width: 76px; height: 76px;
}
.node-checkpoint .node-btn .node-icon { font-size: 32px; }

/* BOSS / FINAL nodes */
.node-boss .node-btn {
  background: linear-gradient(135deg, var(--navy), #1A3A8A);
  box-shadow: 0 5px 0 #070F26;
  width: 80px; height: 80px;
  border: 3px solid var(--yellow);
}

/* Stars under node */
.node-stars {
  display: flex;
  gap: 3px;
  margin-top: 5px;
}
.star {
  font-size: 14px;
  line-height: 1;
  filter: grayscale(1) opacity(.3);
  transition: all .3s;
}
.star.filled { filter: none; }

.node-label {
  font-family: var(--font-game);
  font-size: 11px;
  font-weight: 800;
  color: #5E7094;
  margin-top: 3px;
  text-align: center;
  max-width: 85px;
  line-height: 1.3;
}
.node-done .node-label   { color: var(--green2); }
.node-progress .node-label { color: #C29000; font-size: 12px; }
.node-checkpoint .node-label { color: #9A7500; }

/* ── TOOLTIP POPUP ── */
.tooltip-overlay {
  position: fixed;
  inset: 0;
  z-index: 500;
  pointer-events: none;
}
.tooltip-overlay.active { pointer-events: all; }

.tooltip {
  position: absolute;
  background: var(--white);
  border-radius: 20px;
  padding: 18px 20px;
  width: 260px;
  box-shadow: 0 8px 40px rgba(0,0,0,.18);
  border: 2px solid #E8EDF5;
  transform: translateY(8px);
  opacity: 0;
  transition: all .22s cubic-bezier(.34,1.56,.64,1);
  pointer-events: none;
}
.tooltip.visible {
  transform: translateY(0);
  opacity: 1;
  pointer-events: all;
}
/* Arrow up */
.tooltip::before {
  content: '';
  position: absolute;
  top: -10px; left: 50%;
  transform: translateX(-50%);
  border: 10px solid transparent;
  border-top: none;
  border-bottom: 10px solid #E8EDF5;
}
.tooltip::after {
  content: '';
  position: absolute;
  top: -8px; left: 50%;
  transform: translateX(-50%);
  border: 8px solid transparent;
  border-top: none;
  border-bottom: 8px solid var(--white);
}
.tooltip.below::before { top:auto; bottom:-10px; border-bottom:none; border-top:10px solid #E8EDF5; }
.tooltip.below::after  { top:auto; bottom:-8px;  border-bottom:none; border-top:8px solid var(--white); }

.tt-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.tt-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  flex-shrink: 0;
}
.tt-title {
  font-family: var(--font-game);
  font-size: 15px;
  font-weight: 900;
  color: var(--navy);
  line-height: 1.2;
}
.tt-subtitle {
  font-size: 11px;
  color: var(--muted);
  font-weight: 600;
  margin-top: 1px;
}
.tt-desc {
  font-size: 12px;
  color: #5E7094;
  line-height: 1.5;
  margin-bottom: 14px;
}
.tt-stars-row {
  display: flex;
  gap: 4px;
  margin-bottom: 14px;
}
.tt-star { font-size: 20px; filter: grayscale(1) opacity(.25); }
.tt-star.lit { filter: none; }

.tt-btn {
  width: 100%;
  padding: 13px;
  border-radius: 14px;
  border: none;
  font-family: var(--font-game);
  font-size: 14px;
  font-weight: 900;
  cursor: pointer;
  transition: all .15s;
  letter-spacing: .3px;
}
.tt-btn-start {
  background: var(--yellow);
  color: var(--navy);
  box-shadow: 0 4px 0 var(--yellow2);
}
.tt-btn-start:hover { transform: translateY(-2px); box-shadow: 0 6px 0 var(--yellow2); }
.tt-btn-start:active { transform: translateY(2px); box-shadow: 0 2px 0 var(--yellow2); }
.tt-btn-review {
  background: #EEF0F5;
  color: #5E7094;
  box-shadow: 0 4px 0 #D5D8E0;
  margin-top: 8px;
}
.tt-btn-locked {
  background: var(--locked-bg);
  color: var(--muted);
  box-shadow: 0 4px 0 var(--locked-border);
  cursor: not-allowed;
}

/* ── SECTION DIVIDER ── */
.section-divider {
  position: relative;
  z-index: 1;
  text-align: center;
  margin: 16px 20px 8px;
}
.sd-inner {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(135deg, #0F2860, #1A3A8A);
  border-radius: 40px;
  padding: 10px 22px;
  box-shadow: 0 4px 0 #070F26, 0 6px 20px rgba(11,29,69,.3);
}
.sd-num {
  font-size: 10px;
  font-weight: 700;
  color: rgba(255,255,255,.5);
  text-transform: uppercase;
  letter-spacing: 1px;
}
.sd-title {
  font-family: var(--font-game);
  font-size: 14px;
  font-weight: 900;
  color: var(--white);
}

/* ── PROGRESS TRACKER (top sticky) ── */
.progress-tracker {
  background: var(--white);
  border-bottom: 2px solid #E8EDF5;
  padding: 8px 20px 10px;
}
.pt-label {
  display: flex;
  justify-content: space-between;
  font-size: 11px;
  font-weight: 700;
  color: #5E7094;
  margin-bottom: 5px;
}
.pt-label .pct { color: var(--navy); font-family: var(--font-game); font-size: 13px; }
.pt-bar {
  height: 10px;
  background: #E8EDF5;
  border-radius: 10px;
  overflow: hidden;
}
.pt-fill {
  height: 100%;
  border-radius: 10px;
  background: linear-gradient(90deg, var(--green), #8AE000);
  transition: width 1s cubic-bezier(.34,1.3,.64,1);
  position: relative;
}
.pt-fill::after {
  content: '';
  position: absolute;
  right: 0; top: 1px;
  width: 8px; height: 8px;
  border-radius: 50%;
  background: rgba(255,255,255,.6);
}

/* ── BOTTOM NAV ── */
.bottom-nav {
  position: fixed;
  bottom: 0; left: 0; right: 0;
  z-index: 200;
  background: var(--white);
  border-top: 2px solid #E8EDF5;
  display: flex;
  align-items: center;
  padding: 8px 0 10px;
}
.bn-item {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 3px;
  cursor: pointer;
  padding: 4px 0;
  transition: all .15s;
}
.bn-icon { font-size: 22px; }
.bn-label {
  font-size: 10px;
  font-weight: 700;
  color: var(--muted);
  font-family: var(--font-game);
}
.bn-item.active .bn-label { color: var(--navy); }
.bn-item.active .bn-icon  { filter: none; }

/* ── MASCOT CHARACTER ── */
.mascot-wrap {
  position: relative;
  z-index: 1;
  display: flex;
  justify-content: center;
  margin: -10px 0 -10px;
}
.mascot {
  width: 90px; height: 90px;
  position: relative;
  animation: mascot-float 3s ease-in-out infinite;
}
@keyframes mascot-float {
  0%,100% { transform: translateY(0) rotate(-3deg); }
  50%      { transform: translateY(-8px) rotate(3deg); }
}
.mascot-body {
  width: 70px; height: 70px;
  background: var(--yellow);
  border-radius: 50%;
  position: absolute;
  bottom: 0; left: 10px;
  box-shadow: 0 5px 0 var(--yellow2), 0 8px 20px rgba(245,197,0,.4);
  display: flex; align-items: center; justify-content: center;
  font-size: 36px;
  overflow: visible;
}
.mascot-glow {
  position: absolute;
  width: 80px; height: 20px;
  background: rgba(245,197,0,.25);
  border-radius: 50%;
  bottom: -6px; left: 5px;
  filter: blur(6px);
}

/* ── CELEBRATION PARTICLES ── */
.confetti {
  position: fixed;
  pointer-events: none;
  z-index: 1000;
  top: 0; left: 0; width: 100%; height: 100%;
  display: none;
}
.confetti.active { display: block; }
.cp {
  position: absolute;
  width: 10px; height: 10px;
  border-radius: 2px;
  animation: fall linear forwards;
}
@keyframes fall {
  0%   { transform: translateY(-20px) rotate(0deg); opacity: 1; }
  100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
}

/* ── STREAK BADGE ── */
.streak-badge {
  position: fixed;
  top: 80px; right: 16px;
  z-index: 300;
  background: var(--white);
  border-radius: 16px;
  padding: 10px 14px;
  box-shadow: 0 4px 20px rgba(0,0,0,.1);
  border: 2px solid #FFE066;
  display: flex; align-items: center; gap: 6px;
  animation: badge-in .4s cubic-bezier(.34,1.56,.64,1);
  display: none;
}
@keyframes badge-in {
  from { transform: scale(.5) translateX(60px); opacity: 0; }
  to   { transform: scale(1) translateX(0); opacity: 1; }
}
.streak-badge.show { display: flex; }
.sb-fire { font-size: 22px; }
.sb-text { font-family: var(--font-game); font-size: 13px; font-weight: 900; color: var(--orange); }

/* ── XP POPUP ── */
.xp-popup {
  position: fixed;
  z-index: 600;
  font-family: var(--font-game);
  font-size: 18px;
  font-weight: 900;
  color: var(--yellow2);
  text-shadow: 0 2px 8px rgba(245,197,0,.4);
  pointer-events: none;
  opacity: 0;
  animation: none;
}
.xp-popup.pop {
  animation: xp-rise .8s ease forwards;
}
@keyframes xp-rise {
  0%   { opacity: 1; transform: translateY(0) scale(1); }
  60%  { opacity: 1; transform: translateY(-40px) scale(1.2); }
  100% { opacity: 0; transform: translateY(-80px) scale(.8); }
}

/* ── CONNECTOR DOTS ── */
.conn-dots {
  position: relative;
  z-index: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  margin: -4px 0;
}
.conn-dot {
  width: 10px; height: 10px;
  border-radius: 50%;
  background: #D0D8E8;
}
.conn-dot.done { background: var(--green); }
.conn-dot.half { background: var(--yellow); }

</style>
</head>
<body>

<!-- ── CONFETTI ── -->
<div class="confetti" id="confetti"></div>

<!-- ── XP POPUP ── -->
<div class="xp-popup" id="xpPopup">+10 XP ⚡</div>

<!-- ── TOP BAR ── -->
<div class="topbar">
  <div class="tb-logo">
    <div class="tb-logo-mark">Ev</div>
    <div class="tb-logo-text">english<span>vit</span></div>
  </div>
  <div class="tb-stats">
    <div class="tb-stat fire"><span class="ic">🔥</span><span id="streakCount">12</span></div>
    <div class="tb-stat gem"><span class="ic">💎</span><span id="gemCount">5653</span></div>
    <div class="tb-stat life"><span class="ic">❤️</span><span id="lifeCount">5</span></div>
  </div>
</div>

<!-- ── SECTION BANNER ── -->
<div class="section-banner">
  <div class="sb-left">
    <div class="sb-section">Section 1 · My Success Path</div>
    <div class="sb-title">Foundation English</div>
  </div>
  <div class="sb-notes-btn">📋</div>
</div>

<!-- ── SCROLL AREA ── -->
<div class="scroll-area">

  <!-- PROGRESS BAR -->
  <div style="max-width:420px;margin:0 auto;padding:0 20px 16px;">
    <div class="progress-tracker" style="background:transparent;border:none;padding:0;">
      <div class="pt-label">
        <span>Section 1 Progress</span>
        <span class="pct" id="progPct">4 / 12 Unit</span>
      </div>
      <div class="pt-bar"><div class="pt-fill" id="progFill" style="width:33%"></div></div>
    </div>
  </div>

  <!-- ── SECTION 1: FOUNDATION ── -->
  <div class="section-divider">
    <div class="sd-inner">
      <span>🏁</span>
      <div>
        <div class="sd-num">Section 1</div>
        <div class="sd-title">Foundation English</div>
      </div>
    </div>
  </div>

  <div class="path-track" id="pathTrack">
    <!-- JS renders nodes here -->
  </div>

  <!-- ── SECTION 2: SKILL BUILDING ── -->
  <div class="section-divider">
    <div class="sd-inner">
      <span>⚡</span>
      <div>
        <div class="sd-num">Section 2</div>
        <div class="sd-title">Skill Building</div>
      </div>
    </div>
  </div>

  <div class="path-track" id="pathTrack2">
  </div>

</div><!-- /scroll-area -->

<!-- ── TOOLTIP OVERLAY ── -->
<div class="tooltip-overlay" id="tooltipOverlay" onclick="closeTooltip()">
  <div class="tooltip" id="tooltip">
    <div class="tt-header">
      <div class="tt-icon" id="ttIcon"></div>
      <div>
        <div class="tt-title" id="ttTitle"></div>
        <div class="tt-subtitle" id="ttSubtitle"></div>
      </div>
    </div>
    <div class="tt-desc" id="ttDesc"></div>
    <div class="tt-stars-row" id="ttStars"></div>
    <button class="tt-btn" id="ttBtn" onclick="event.stopPropagation(); handleNodeAction()"></button>
    <button class="tt-btn tt-btn-review" id="ttReview" onclick="event.stopPropagation();" style="display:none">🔁 Practice Again</button>
  </div>
</div>

<!-- ── BOTTOM NAV ── -->
<div class="bottom-nav">
  <a href="/dashboard-study/roadmap" class="bn-item active" style="text-decoration:none;">
    <div class="bn-icon">🏠</div>
    <div class="bn-label" style="color:var(--navy)">Learn</div>
  </a>
  <div class="bn-item">
    <div class="bn-icon">🏆</div>
    <div class="bn-label">Leaderboard</div>
  </div>
  <a href="/dashboard-study/calendar" class="bn-item" style="text-decoration:none;">
    <div class="bn-icon">📅</div>
    <div class="bn-label">Calendar</div>
  </a>
  <a href="/dashboard-study/clan" class="bn-item" style="text-decoration:none;">
    <div class="bn-icon">👥</div>
    <div class="bn-label">Clan</div>
  </a>
  <a href="/dashboard-study/ai-assistant" class="bn-item" style="text-decoration:none;">
    <div class="bn-icon">🤖</div>
    <div class="bn-label">AI Assist</div>
  </a>
</div>

<script>
/* ============================================================
   DATA
============================================================ */
const SEC1_NODES = [
  { id:1,  type:'done',       icon:'✅', label:'Assessment',      title:'Placement Test',         subtitle:'Foundation · Completed',  desc:'Kamu sudah menyelesaikan placement test! Skor awal: B1.',                stars:3, xp:50  },
  { id:2,  type:'done',       icon:'📗', label:'Vocab Basics',    title:'Vocabulary Basics',      subtitle:'Unit 1 · Foundation',     desc:'Pelajari 200 vocab penting untuk IELTS preparation.',                    stars:3, xp:40  },
  { id:3,  type:'done',       icon:'🎤', label:'Pronunciation',   title:'Pronunciation 101',      subtitle:'Unit 2 · Foundation',     desc:'Latihan pengucapan kata-kata yang sering salah diucapkan.',             stars:2, xp:40  },
  { id:4,  type:'checkpoint', icon:'⭐', label:'Checkpoint 1',   title:'Checkpoint — Mini Test', subtitle:'Evaluasi · Section 1',    desc:'Validasi pemahamanmu di Unit 1–2. Skor minimum 70% untuk lanjut.',      stars:3, xp:80  },
  { id:5,  type:'done',       icon:'📖', label:'Reading Intro',   title:'Reading Strategies',     subtitle:'Unit 3 · Foundation',     desc:'Teknik skimming dan scanning untuk IELTS Reading section.',             stars:1, xp:40  },
  { id:6,  type:'progress',   icon:'✏️', label:'Grammar',         title:'Grammar Fundamentals',   subtitle:'Unit 4 · In Progress 60%',desc:'Kamu sedang di sini! Pelajari tenses, articles, dan prepositions.',     stars:0, xp:40  },
  { id:7,  type:'locked',     icon:'🔒', label:'Listening',       title:'Listening Strategies',   subtitle:'Unit 5 · Locked',         desc:'Unlock setelah menyelesaikan Unit 4 Grammar Fundamentals.',             stars:0, xp:40  },
  { id:8,  type:'checkpoint', icon:'⭐', label:'Checkpoint 2',   title:'Checkpoint — Mock Test', subtitle:'Evaluasi · Section 1',    desc:'Mini mock test mencakup Unit 3–5. Butuh 75% untuk unlock Section 2.',   stars:0, xp:100 },
];

const SEC2_NODES = [
  { id:9,  type:'locked',     icon:'🔒', label:'Speaking',        title:'Speaking Fluency',       subtitle:'Unit 6 · Locked',         desc:'Latihan berbicara untuk IELTS Part 1, 2, dan 3.',                       stars:0, xp:50  },
  { id:10, type:'locked',     icon:'🔒', label:'Writing T1',      title:'Writing Task 1',         subtitle:'Unit 7 · Locked',         desc:'Cara mendeskripsikan grafik, chart, dan diagram dengan efektif.',       stars:0, xp:50  },
  { id:11, type:'locked',     icon:'🔒', label:'Writing T2',      title:'Writing Task 2',         subtitle:'Unit 8 · Locked',         desc:'Essay writing dengan formula PEEL dan advanced arguments.',             stars:0, xp:50  },
  { id:12, type:'locked',     icon:'🏆', label:'IELTS 6.5',       title:'IELTS Final Target',     subtitle:'Goal · Section 2',        desc:'Ini tujuan akhirmu! Selesaikan semua unit untuk mencapai IELTS 6.5.', stars:0, xp:500 },
];

/* ============================================================
   RENDER PATH
============================================================ */
const POSITIONS = ['center','right','center','left','right','center','left','center'];

function renderPath(nodes, containerId) {
  const track = document.getElementById(containerId);
  track.innerHTML = '';

  nodes.forEach((n, i) => {
    // Connector dots between nodes
    if (i > 0) {
      const conn = document.createElement('div');
      conn.className = 'conn-dots';
      const prevDone = nodes[i-1].type === 'done';
      const curDone  = n.type === 'done';
      [0,1,2].forEach(j => {
        const dot = document.createElement('div');
        dot.className = 'conn-dot' + (prevDone && curDone ? ' done' : prevDone && j < 1 ? ' half' : '');
        conn.appendChild(dot);
      });
      track.appendChild(conn);
    }

    // Row
    const pos = POSITIONS[i % POSITIONS.length];
    const row = document.createElement('div');
    row.className = \`node-row \${pos}\`;

    const nodeEl = document.createElement('div');
    nodeEl.className = \`node node-\${n.type}\`;
    nodeEl.dataset.id = n.id;

    const btn = document.createElement('div');
    btn.className = 'node-btn';
    btn.innerHTML = \`<span class="node-icon">\${n.icon}</span>\`;

    const starsEl = document.createElement('div');
    starsEl.className = 'node-stars';
    if (n.type !== 'locked') {
      for (let s = 0; s < 3; s++) {
        const star = document.createElement('span');
        star.className = 'star' + (s < n.stars ? ' filled' : '');
        star.textContent = '⭐';
        starsEl.appendChild(star);
      }
    }

    const lbl = document.createElement('div');
    lbl.className = 'node-label';
    lbl.textContent = n.label;

    nodeEl.appendChild(btn);
    nodeEl.appendChild(starsEl);
    nodeEl.appendChild(lbl);
    row.appendChild(nodeEl);
    track.appendChild(row);

    // Click handler
    if (n.type !== 'locked') {
      nodeEl.addEventListener('click', (e) => {
        e.stopPropagation();
        openTooltip(n, nodeEl);
      });
    } else {
      nodeEl.addEventListener('click', (e) => {
        e.stopPropagation();
        shakeNode(nodeEl);
      });
    }
  });
}

renderPath(SEC1_NODES, 'pathTrack');
renderPath(SEC2_NODES, 'pathTrack2');

/* ============================================================
   NODE SHAKE (locked)
============================================================ */
function shakeNode(el) {
  el.style.animation = 'shake .4s ease';
  el.style.setProperty('--shake', '1');
  const style = document.createElement('style');
  style.textContent = \`@keyframes shake{0%,100%{transform:translateX(0)}20%{transform:translateX(-8px)}40%{transform:translateX(8px)}60%{transform:translateX(-5px)}80%{transform:translateX(5px)}}\`;
  document.head.appendChild(style);
  el.style.animation = 'shake .4s ease';
  setTimeout(() => { el.style.animation = ''; }, 400);
}

/* ============================================================
   TOOLTIP
============================================================ */
let activeNodeData = null;
let activeNodeEl = null;

const BG_COLORS = {
  done:       '#E8FAEA', progress: '#FFF8E0',
  checkpoint: '#FFFBE0', boss:     '#E8EDF5', locked: '#F0F0F0'
};
const ICON_COLORS = {
  done: '#58CC02', progress: '#F5C500', checkpoint: '#FFD900', locked: '#CECECE'
};

function openTooltip(data, el) {
  activeNodeData = data;
  activeNodeEl = el;

  const tt = document.getElementById('tooltip');
  const ov = document.getElementById('tooltipOverlay');

  document.getElementById('ttIcon').textContent  = data.icon;
  document.getElementById('ttIcon').style.background = BG_COLORS[data.type] || '#F5F5F5';
  document.getElementById('ttTitle').textContent    = data.title;
  document.getElementById('ttSubtitle').textContent = data.subtitle;
  document.getElementById('ttDesc').textContent     = data.desc;

  // Stars
  const starsRow = document.getElementById('ttStars');
  starsRow.innerHTML = '';
  for (let s = 0; s < 3; s++) {
    const star = document.createElement('span');
    star.className = 'tt-star' + (s < data.stars ? ' lit' : '');
    star.textContent = '⭐';
    starsRow.appendChild(star);
  }

  // Button
  const btn = document.getElementById('ttBtn');
  const rev = document.getElementById('ttReview');
  if (data.type === 'progress') {
    btn.textContent = '▶ Lanjutkan Belajar';
    btn.className   = 'tt-btn tt-btn-start';
    rev.style.display = 'none';
  } else if (data.type === 'done') {
    btn.textContent = '✅ Sudah Selesai';
    btn.className   = 'tt-btn tt-btn-start';
    rev.style.display = 'block';
    rev.textContent = '🔁 Ulangi untuk +XP';
  } else if (data.type === 'checkpoint') {
    btn.textContent = data.stars > 0 ? '⭐ Lihat Hasil' : '🚀 Mulai Checkpoint';
    btn.className   = 'tt-btn tt-btn-start';
    rev.style.display = 'none';
  } else {
    btn.textContent = '🔒 Selesaikan unit sebelumnya';
    btn.className   = 'tt-btn tt-btn-locked';
    rev.style.display = 'none';
  }

  // Position tooltip
  const rect = el.getBoundingClientRect();
  const ttW = 260;
  const winW = window.innerWidth;
  let left = rect.left + rect.width/2 - ttW/2;
  if (left < 10) left = 10;
  if (left + ttW > winW - 10) left = winW - ttW - 10;

  let top = rect.bottom + 12;
  tt.classList.remove('below');
  if (top + 300 > window.innerHeight) {
    top = rect.top - 280;
    tt.classList.add('below');
  }

  tt.style.left = left + 'px';
  tt.style.top  = top + 'px';

  ov.classList.add('active');
  requestAnimationFrame(() => tt.classList.add('visible'));
}

function closeTooltip() {
  const tt = document.getElementById('tooltip');
  const ov = document.getElementById('tooltipOverlay');
  tt.classList.remove('visible');
  setTimeout(() => ov.classList.remove('active'), 220);
}

function handleNodeAction() {
  if (!activeNodeData) return;
  if (activeNodeData.type === 'locked') return;
  closeTooltip();
  showXP(activeNodeData.xp);
  if (activeNodeData.type === 'progress') {
    triggerConfetti();
  }
}

/* ============================================================
   XP POPUP
============================================================ */
function showXP(amount) {
  const el = document.getElementById('xpPopup');
  el.textContent = \`+\${amount} XP ⚡\`;
  const cx = window.innerWidth / 2;
  const cy = window.innerHeight / 2 - 60;
  el.style.left = (cx - 50) + 'px';
  el.style.top  = cy + 'px';
  el.classList.remove('pop');
  void el.offsetWidth;
  el.classList.add('pop');

  // update gems
  const gems = document.getElementById('gemCount');
  gems.textContent = (parseInt(gems.textContent.replace(',','')) + amount).toLocaleString();
}

/* ============================================================
   CONFETTI
============================================================ */
function triggerConfetti() {
  const cv = document.getElementById('confetti');
  cv.innerHTML = '';
  cv.classList.add('active');
  const colors = ['#F5C500','#FF7A00','#58CC02','#1CB0F6','#CE82FF','#FF4B4B'];
  for (let i = 0; i < 60; i++) {
    const p = document.createElement('div');
    p.className = 'cp';
    p.style.cssText = \`
      left: \${Math.random()*100}%;
      background: \${colors[Math.floor(Math.random()*colors.length)]};
      width: \${6+Math.random()*8}px;
      height: \${6+Math.random()*8}px;
      border-radius: \${Math.random()>0.5 ? '50%' : '2px'};
      animation: fall \${1+Math.random()*2}s \${Math.random()*0.5}s linear forwards;
    \`;
    cv.appendChild(p);
  }
  setTimeout(() => {
    cv.classList.remove('active');
    cv.innerHTML = '';
  }, 3000);
}

/* ============================================================
   CLOSE TOOLTIP ON SCROLL
============================================================ */
document.querySelector('.scroll-area').addEventListener('scroll', closeTooltip);

/* ============================================================
   KEYBOARD
============================================================ */
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeTooltip();
});
</script>
</body>
</html>
