@extends('layouts.lms-layout')
@section('title', '👥 Clan System')
@section('nav_clan', 'active')
@section('topbar_title', '👥 Clan System')

@section('styles')
<style>
/* ============================================================
   FONTS & ROOT
============================================================ */
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

:root {
  --c-navy:      #08152E;
  --c-navy2:     #0F1E45;
  --c-navy3:     #162755;
  --c-yellow:    #F5C500;
  --c-yellow2:   #D4AA00;
  --c-orange:    #FF7A00;
  --c-blue:      #4F7BFF;
  --c-blue2:     #3361E0;
  --c-green:     #3DD68C;
  --c-red:       #FF5A5A;
  --c-purple:    #A78BFA;
  --c-white:     #FFFFFF;
  --c-bg:        #F4F7FF;
  --c-card:      #FFFFFF;
  --c-border:    #E4EAF5;
  --c-muted:     #8090B8;
  --c-text2:     #5E6F94;
  --c-radius:    16px;
  --font-d:      'Syne', sans-serif;
  --font-b:      'Plus Jakarta Sans', sans-serif;
}

body { font-family: var(--font-b); background: var(--c-bg); color: var(--c-navy); }

/* ============================================================
   LAYOUT
============================================================ */
.clan-wrap {
  max-width: 1080px;
  margin: 0 auto;
  padding: 28px 20px 80px;
  display: flex;
  flex-direction: column;
  gap: 22px;
}

/* ============================================================
   CARD BASE
============================================================ */
.cc {
  background: var(--c-card);
  border: 1.5px solid var(--c-border);
  border-radius: var(--c-radius);
  overflow: hidden;
}
.cc-pad { padding: 22px 24px; }
.cc-head {
  padding: 18px 24px 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
}
.cc-title {
  font-family: var(--font-d);
  font-size: 15px;
  font-weight: 800;
  color: var(--c-navy);
  display: flex;
  align-items: center;
  gap: 8px;
}
.cc-title .ct-icon {
  width: 30px; height: 30px;
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 15px;
}
.cc-link {
  font-size: 12px; font-weight: 700;
  color: var(--c-blue);
  cursor: pointer;
  transition: color .15s;
}
.cc-link:hover { color: var(--c-blue2); }

/* Tags */
.tag-pill {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 3px 10px; border-radius: 20px;
  font-size: 11px; font-weight: 700;
}
.tp-yellow  { background: rgba(245,197,0,.13);   color: #9A7500; }
.tp-blue    { background: rgba(79,123,255,.12);   color: var(--c-blue); }
.tp-green   { background: rgba(61,214,140,.13);   color: #1A9B5E; }
.tp-orange  { background: rgba(255,122,0,.12);    color: var(--c-orange); }
.tp-red     { background: rgba(255,90,90,.12);    color: var(--c-red); }
.tp-purple  { background: rgba(167,139,250,.15);  color: #7C5CF0; }
.tp-navy    { background: rgba(15,30,69,.08);     color: var(--c-navy3); }
.tp-muted   { background: rgba(128,144,184,.12);  color: var(--c-muted); }

/* Progress bar */
.cbar { height: 8px; background: var(--c-border); border-radius: 8px; overflow: hidden; }
.cbar-fill { height: 100%; border-radius: 8px; background: linear-gradient(90deg, var(--c-yellow), var(--c-orange)); transition: width .9s cubic-bezier(.34,1.3,.64,1); }
.cbar-fill.blue   { background: linear-gradient(90deg, var(--c-blue), #7BAEFF); }
.cbar-fill.green  { background: linear-gradient(90deg, var(--c-green), #7DFFC9); }
.cbar-fill.purple { background: linear-gradient(90deg, var(--c-purple), #C4B5FD); }

/* Avatar */
.av {
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-weight: 800; flex-shrink: 0;
}

/* ============================================================
   1. CLAN OVERVIEW HERO
============================================================ */
.clan-hero {
  background: linear-gradient(135deg, #0B1D45 0%, #162755 50%, #1A3080 100%);
  border-radius: 22px;
  padding: 0;
  overflow: hidden;
  position: relative;
  border: none;
}
/* bg decoration */
.clan-hero::before {
  content: '';
  position: absolute;
  top: -80px; right: -80px;
  width: 320px; height: 320px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(245,197,0,.18) 0%, transparent 65%);
  pointer-events: none;
}
.clan-hero::after {
  content: '';
  position: absolute;
  bottom: -60px; left: -60px;
  width: 240px; height: 240px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(79,123,255,.15) 0%, transparent 65%);
  pointer-events: none;
}
.hero-inner {
  position: relative; z-index: 1;
  padding: 28px 28px 0;
}
.hero-top {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 16px;
  flex-wrap: wrap;
}
.hero-badges { display: flex; gap: 6px; margin-bottom: 10px; flex-wrap: wrap; }
.hero-name {
  font-family: var(--font-d);
  font-size: 26px; font-weight: 800;
  color: #fff;
  letter-spacing: -.5px;
  line-height: 1.15;
  margin-bottom: 6px;
}
.hero-sub { font-size: 13px; color: rgba(255,255,255,.55); }

/* Shield / clan icon */
.clan-shield {
  width: 76px; height: 76px;
  border-radius: 20px;
  background: rgba(245,197,0,.15);
  border: 2px solid rgba(245,197,0,.3);
  display: flex; align-items: center; justify-content: center;
  font-size: 38px;
  flex-shrink: 0;
  box-shadow: 0 8px 28px rgba(245,197,0,.2);
  animation: shield-glow 3s ease-in-out infinite;
}
@keyframes shield-glow {
  0%,100% { box-shadow: 0 8px 28px rgba(245,197,0,.2); }
  50%      { box-shadow: 0 8px 40px rgba(245,197,0,.35); }
}

/* Stats row */
.hero-stats {
  display: flex;
  gap: 0;
  margin-top: 22px;
  border-top: 1px solid rgba(255,255,255,.08);
}
.hs-item {
  flex: 1;
  padding: 16px 12px;
  text-align: center;
  border-right: 1px solid rgba(255,255,255,.08);
}
.hs-item:last-child { border-right: none; }
.hs-num {
  font-family: var(--font-d);
  font-size: 22px; font-weight: 800;
  color: var(--c-yellow);
  line-height: 1;
  margin-bottom: 3px;
}
.hs-lbl {
  font-size: 10px; font-weight: 700;
  color: rgba(255,255,255,.4);
  text-transform: uppercase; letter-spacing: 1px;
}

/* Countdown */
.clan-countdown {
  display: flex;
  justify-content: center;
  gap: 8px;
  padding: 18px 28px 24px;
  position: relative; z-index: 1;
}
.cd-unit {
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 12px;
  padding: 10px 14px;
  text-align: center;
  min-width: 60px;
}
.cd-num {
  font-family: var(--font-d);
  font-size: 22px; font-weight: 800;
  color: #fff;
  line-height: 1;
}
.cd-lbl {
  font-size: 9px; font-weight: 700;
  color: rgba(255,255,255,.4);
  text-transform: uppercase; letter-spacing: 1px;
  margin-top: 3px;
}
.cd-sep {
  font-family: var(--font-d);
  font-size: 22px; font-weight: 800;
  color: rgba(255,255,255,.3);
  align-self: flex-start;
  padding-top: 10px;
}

/* ============================================================
   2. PROGRESS BOARD
============================================================ */
.prog-board-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1px;
  background: var(--c-border);
  border-radius: 14px;
  overflow: hidden;
  margin: 0 24px 20px;
}
.pb-item {
  background: #fff;
  padding: 16px 14px;
  display: flex; flex-direction: column; align-items: center;
  gap: 4px;
  transition: background .15s;
}
.pb-item:hover { background: #F9FBFF; }
.pb-num {
  font-family: var(--font-d);
  font-size: 24px; font-weight: 800;
  line-height: 1;
}
.pb-lbl {
  font-size: 10px; font-weight: 700;
  color: var(--c-muted);
  text-transform: uppercase; letter-spacing: .8px;
  text-align: center;
  line-height: 1.3;
}
.pb-trend {
  font-size: 10px; font-weight: 700;
}

/* Member activity ring */
.activity-rings {
  padding: 0 24px 20px;
  display: flex; flex-direction: column; gap: 10px;
}
.ar-row {
  display: flex; align-items: center; gap: 12px;
}
.ar-av {
  width: 32px; height: 32px; font-size: 12px;
  flex-shrink: 0;
}
.ar-name { font-size: 13px; font-weight: 700; min-width: 100px; }
.ar-bar-wrap { flex: 1; }
.ar-pct { font-size: 12px; font-weight: 700; min-width: 36px; text-align: right; }

/* ============================================================
   3. WEEKLY CHALLENGE
============================================================ */
.challenge-header {
  background: linear-gradient(135deg, rgba(245,197,0,.1), rgba(255,122,0,.06));
  border-bottom: 1.5px solid var(--c-border);
  padding: 18px 24px;
  display: flex; align-items: center; justify-content: space-between;
}
.ch-meta { font-size: 12px; color: var(--c-muted); font-weight: 600; }
.ch-timer {
  display: flex; align-items: center; gap: 6px;
  font-family: var(--font-d);
  font-size: 14px; font-weight: 800;
  color: var(--c-orange);
}

.challenge-list { padding: 16px 24px 20px; display: flex; flex-direction: column; gap: 10px; }
.chall-item {
  display: flex; align-items: center; gap: 14px;
  padding: 14px 16px;
  border-radius: 14px;
  border: 1.5px solid var(--c-border);
  background: #FAFBFF;
  transition: all .2s;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.chall-item:hover { border-color: rgba(79,123,255,.3); background: #F5F8FF; transform: translateX(2px); }
.chall-item.done  { border-color: rgba(61,214,140,.35); background: rgba(61,214,140,.04); }
.chall-item.done::after {
  content: '✓';
  position: absolute;
  right: 16px;
  font-size: 18px;
  font-weight: 900;
  color: var(--c-green);
}
.ci-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}
.ci-body { flex: 1; }
.ci-name { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
.ci-meta { font-size: 12px; color: var(--c-muted); margin-bottom: 6px; }
.ci-pct  { font-size: 11px; font-weight: 700; color: var(--c-blue); margin-bottom: 3px; }
.ci-pts  { font-size: 11px; font-weight: 700; flex-shrink: 0; }

/* Challenge clan total bar */
.chall-total {
  margin: 0 24px 20px;
  padding: 14px 18px;
  background: rgba(79,123,255,.06);
  border: 1.5px solid rgba(79,123,255,.18);
  border-radius: 14px;
}
.ct-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
.ct-label { font-size: 13px; font-weight: 700; color: var(--c-navy); }
.ct-pct   { font-family: var(--font-d); font-size: 16px; font-weight: 800; color: var(--c-blue); }

/* ============================================================
   4. ACTIVITY FEED
============================================================ */
.feed-list { padding: 0 24px 20px; display: flex; flex-direction: column; gap: 0; }
.feed-item {
  display: flex; align-items: flex-start; gap: 12px;
  padding: 12px 0;
  border-bottom: 1px solid var(--c-border);
  animation: feed-in .35s ease both;
}
.feed-item:last-child { border-bottom: none; }
@keyframes feed-in {
  from { opacity: 0; transform: translateX(-8px); }
  to   { opacity: 1; transform: translateX(0); }
}
.feed-av {
  width: 36px; height: 36px; font-size: 13px;
  flex-shrink: 0; margin-top: 2px;
}
.feed-av.system {
  background: rgba(79,123,255,.12);
  font-size: 18px;
}
.feed-body { flex: 1; }
.feed-text { font-size: 13px; line-height: 1.5; color: var(--c-navy); }
.feed-text strong { color: var(--c-navy); }
.feed-text .accent { color: var(--c-blue); font-weight: 700; }
.feed-time { font-size: 11px; color: var(--c-muted); font-weight: 600; margin-top: 2px; }
.feed-badge {
  flex-shrink: 0;
  padding: 3px 9px; border-radius: 20px;
  font-size: 10px; font-weight: 700;
  align-self: flex-start; margin-top: 4px;
}

/* ============================================================
   5. DISCUSSION ROOM
============================================================ */
.disc-tabs {
  display: flex;
  gap: 6px;
  padding: 0 24px;
  margin-bottom: 16px;
  overflow-x: auto;
  scrollbar-width: none;
}
.disc-tabs::-webkit-scrollbar { display: none; }
.dtab {
  padding: 7px 16px;
  border-radius: 40px;
  font-size: 12px; font-weight: 700;
  cursor: pointer; white-space: nowrap;
  border: 1.5px solid var(--c-border);
  color: var(--c-muted);
  background: #fff;
  transition: all .18s;
  flex-shrink: 0;
}
.dtab:hover { border-color: var(--c-blue); color: var(--c-blue); }
.dtab.active { background: var(--c-navy); color: #fff; border-color: var(--c-navy); }

.disc-list { padding: 0 24px; display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px; }
.disc-thread {
  display: flex; gap: 12px; align-items: flex-start;
  padding: 14px 16px;
  border-radius: 14px;
  border: 1.5px solid var(--c-border);
  background: #FAFBFF;
  cursor: pointer;
  transition: all .18s;
}
.disc-thread:hover { border-color: rgba(79,123,255,.3); background: #F5F8FF; }
.disc-thread.pinned { border-color: rgba(245,197,0,.35); background: rgba(245,197,0,.04); }
.dt-av { width: 38px; height: 38px; font-size: 14px; flex-shrink: 0; }
.dt-body { flex: 1; }
.dt-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 4px; flex-wrap: wrap; }
.dt-author { font-size: 13px; font-weight: 700; color: var(--c-navy); }
.dt-time   { font-size: 11px; color: var(--c-muted); }
.dt-title  { font-size: 13px; color: var(--c-text2); line-height: 1.5; margin-bottom: 5px; }
.dt-footer { display: flex; align-items: center; gap: 10px; }
.dt-replies { font-size: 11px; font-weight: 700; color: var(--c-blue); }
.dt-likes   { font-size: 11px; color: var(--c-muted); font-weight: 600; }

/* Post input */
.disc-input-area {
  margin: 0 24px 20px;
  display: flex; gap: 10px; align-items: center;
}
.disc-input {
  flex: 1;
  padding: 12px 16px;
  border-radius: 12px;
  border: 1.5px solid var(--c-border);
  font-family: var(--font-b);
  font-size: 13px;
  color: var(--c-navy);
  background: #fff;
  outline: none;
  transition: border .18s;
}
.disc-input:focus { border-color: var(--c-blue); }
.disc-input::placeholder { color: var(--c-muted); }
.disc-send-btn {
  width: 42px; height: 42px;
  border-radius: 12px;
  background: var(--c-yellow);
  border: none;
  color: var(--c-navy);
  font-size: 16px;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: all .18s;
  box-shadow: 0 3px 0 var(--c-yellow2);
  flex-shrink: 0;
}
.disc-send-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 0 var(--c-yellow2); }
.disc-send-btn:active { transform: translateY(1px); box-shadow: 0 1px 0 var(--c-yellow2); }

/* ============================================================
   LEADERBOARD
============================================================ */
.lb-list { padding: 0 24px 20px; display: flex; flex-direction: column; gap: 8px; }
.lb-row {
  display: flex; align-items: center; gap: 12px;
  padding: 12px 14px;
  border-radius: 14px;
  border: 1.5px solid var(--c-border);
  background: #FAFBFF;
  transition: all .18s;
  cursor: pointer;
}
.lb-row:hover { background: #F0F4FF; border-color: rgba(79,123,255,.2); }
.lb-row.me    { background: rgba(245,197,0,.07); border-color: rgba(245,197,0,.35); }
.lb-rank {
  font-family: var(--font-d);
  font-size: 16px; font-weight: 800;
  color: var(--c-muted);
  width: 26px; text-align: center; flex-shrink: 0;
}
.lb-rank.gold   { color: #D4AA00; }
.lb-rank.silver { color: #8899BB; }
.lb-rank.bronze { color: #B87333; }
.lb-av { width: 36px; height: 36px; font-size: 13px; flex-shrink: 0; }
.lb-info { flex: 1; }
.lb-name { font-size: 13px; font-weight: 700; margin-bottom: 3px; }
.lb-stat { font-size: 11px; color: var(--c-muted); }
.lb-right { text-align: right; }
.lb-pts {
  font-family: var(--font-d);
  font-size: 16px; font-weight: 800;
  color: var(--c-yellow2);
  line-height: 1;
}
.lb-pts-lbl { font-size: 9px; color: var(--c-muted); font-weight: 700; text-transform: uppercase; letter-spacing: .8px; }

/* ============================================================
   CLAN WAR
============================================================ */
.war-banner {
  background: linear-gradient(135deg, #1A0B2E, #2A1260, #0F1E45);
  border-radius: 18px;
  padding: 24px;
  position: relative;
  overflow: hidden;
  margin-bottom: 14px;
}
.war-banner::before {
  content: '⚔️';
  position: absolute;
  font-size: 120px;
  opacity: .06;
  right: -20px; top: -20px;
  line-height: 1;
}
.war-vs {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  position: relative; z-index: 1;
}
.war-team {
  flex: 1;
  text-align: center;
}
.war-team-name {
  font-family: var(--font-d);
  font-size: 14px; font-weight: 800;
  color: #fff;
  margin-bottom: 4px;
}
.war-team-pts {
  font-family: var(--font-d);
  font-size: 30px; font-weight: 800;
  color: var(--c-yellow);
  line-height: 1;
}
.war-sep {
  font-family: var(--font-d);
  font-size: 20px; font-weight: 800;
  color: rgba(255,255,255,.25);
  padding: 0 8px;
}
.war-bar-wrap {
  margin-top: 16px;
  position: relative; z-index: 1;
}
.war-bar {
  height: 10px;
  background: rgba(255,255,255,.1);
  border-radius: 10px;
  overflow: hidden;
}
.war-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--c-yellow), var(--c-orange));
  border-radius: 10px;
  width: 62%;
  transition: width 1.2s cubic-bezier(.34,1.3,.64,1);
}
.war-bar-labels {
  display: flex;
  justify-content: space-between;
  margin-top: 6px;
  font-size: 11px; font-weight: 700;
  color: rgba(255,255,255,.45);
}

.war-tasks { display: flex; flex-direction: column; gap: 8px; padding: 0 24px 20px; }
.wt-row {
  display: flex; align-items: center; gap: 12px;
  padding: 12px 14px;
  border-radius: 12px;
  border: 1.5px solid var(--c-border);
  background: #FAFBFF;
}
.wt-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
.wt-info { flex: 1; }
.wt-name { font-size: 13px; font-weight: 700; margin-bottom: 2px; }
.wt-meta { font-size: 11px; color: var(--c-muted); }
.wt-pts  { font-family: var(--font-d); font-size: 14px; font-weight: 800; color: var(--c-orange); }

/* ============================================================
   GRID LAYOUT (2-col on desktop)
============================================================ */
.clan-grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 22px;
}
.clan-grid-3 {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 22px;
}

/* ============================================================
   SECTION LABEL
============================================================ */
.s-label {
  font-size: 10px; font-weight: 700;
  letter-spacing: 1.3px; text-transform: uppercase;
  color: var(--c-muted);
  margin-bottom: 12px;
  display: flex; align-items: center; gap: 6px;
}
.s-label::after {
  content: '';
  flex: 1; height: 1px;
  background: var(--c-border);
}

/* ============================================================
   ANIMATIONS
============================================================ */
@keyframes fade-up {
  from { opacity: 0; transform: translateY(14px); }
  to   { opacity: 1; transform: translateY(0); }
}
.clan-wrap > * {
  animation: fade-up .4s ease both;
}
.clan-wrap > *:nth-child(1) { animation-delay: .00s; }
.clan-wrap > *:nth-child(2) { animation-delay: .06s; }
.clan-wrap > *:nth-child(3) { animation-delay: .12s; }
.clan-wrap > *:nth-child(4) { animation-delay: .18s; }
.clan-wrap > *:nth-child(5) { animation-delay: .24s; }
.clan-wrap > *:nth-child(6) { animation-delay: .30s; }

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 760px) {
  .clan-grid-2, .clan-grid-3 { grid-template-columns: 1fr; }
  .prog-board-grid { grid-template-columns: repeat(2,1fr); }
  .hero-stats { flex-wrap: wrap; }
  .hs-item { min-width: 50%; border-right: none; border-bottom: 1px solid rgba(255,255,255,.08); }
}
</style>
@endsection

@section('content')
<div class="clan-wrap">

  <!-- ══════════════════════════════════════════════════════
       1. CLAN OVERVIEW HERO
  ═══════════════════════════════════════════════════════ -->
  <div class="clan-hero">
    <div class="hero-inner">
      <div class="hero-top">
        <div>
          <div class="hero-badges">
            <span class="tag-pill tp-yellow">⚡ Rank #4 Global</span>
            <span class="tag-pill" style="background:rgba(255,255,255,.1);color:rgba(255,255,255,.7);">32 Anggota</span>
            <span class="tag-pill tp-green">🟢 Aktif</span>
          </div>
          <div class="hero-name">⚔️ IELTS Warriors 6.5</div>
          <div class="hero-sub">Target Bersama: IELTS 6.5 &nbsp;·&nbsp; 4 Month Intensive Program</div>
        </div>
        <div class="clan-shield">⚔️</div>
      </div>

      <div class="hero-stats">
        <div class="hs-item">
          <div class="hs-num">32</div>
          <div class="hs-lbl">Anggota</div>
        </div>
        <div class="hs-item">
          <div class="hs-num">94%</div>
          <div class="hs-lbl">Aktif Minggu Ini</div>
        </div>
        <div class="hs-item">
          <div class="hs-num">6.1</div>
          <div class="hs-lbl">Rata-rata Skor</div>
        </div>
        <div class="hs-item">
          <div class="hs-num">248</div>
          <div class="hs-lbl">Unit Selesai</div>
        </div>
        <div class="hs-item">
          <div class="hs-num">#12</div>
          <div class="hs-lbl">Posisimu</div>
        </div>
      </div>
    </div>

    <!-- Countdown -->
    <div class="clan-countdown">
      <div class="cd-unit"><div class="cd-num" id="cdDay">118</div><div class="cd-lbl">Hari</div></div>
      <div class="cd-sep">:</div>
      <div class="cd-unit"><div class="cd-num" id="cdHour">14</div><div class="cd-lbl">Jam</div></div>
      <div class="cd-sep">:</div>
      <div class="cd-unit"><div class="cd-num" id="cdMin">32</div><div class="cd-lbl">Menit</div></div>
      <div class="cd-sep">:</div>
      <div class="cd-unit"><div class="cd-num" id="cdSec">09</div><div class="cd-lbl">Detik</div></div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════
       2. PROGRESS BOARD + LEADERBOARD
  ═══════════════════════════════════════════════════════ -->
  <div class="clan-grid-2">

    <!-- Progress Board -->
    <div class="cc">
      <div class="cc-head">
        <div class="cc-title">
          <div class="ct-icon" style="background:rgba(79,123,255,.1)">📊</div>
          Clan Progress Board
        </div>
        <span class="tag-pill tp-blue">Minggu Ini</span>
      </div>

      <div class="prog-board-grid">
        <div class="pb-item">
          <div class="pb-num" style="color:var(--c-blue)">142</div>
          <div class="pb-lbl">Unit Selesai</div>
          <div class="pb-trend" style="color:var(--c-green)">↑ +28</div>
        </div>
        <div class="pb-item">
          <div class="pb-num" style="color:var(--c-orange)">38</div>
          <div class="pb-lbl">Challenge Done</div>
          <div class="pb-trend" style="color:var(--c-green)">↑ +12</div>
        </div>
        <div class="pb-item">
          <div class="pb-num" style="color:var(--c-green)">6.1</div>
          <div class="pb-lbl">Rata-rata Mock</div>
          <div class="pb-trend" style="color:var(--c-green)">↑ +0.3</div>
        </div>
        <div class="pb-item">
          <div class="pb-num" style="color:var(--c-yellow2)">94%</div>
          <div class="pb-lbl">Anggota Aktif</div>
          <div class="pb-trend" style="color:var(--c-green)">↑ +4%</div>
        </div>
      </div>

      <div class="s-label" style="margin:0 24px 10px">Kontribusi Anggota</div>
      <div class="activity-rings" id="memberRings"></div>
    </div>

    <!-- Leaderboard -->
    <div class="cc">
      <div class="cc-head">
        <div class="cc-title">
          <div class="ct-icon" style="background:rgba(245,197,0,.1)">🏆</div>
          Weekly Leaderboard
        </div>
        <span class="cc-link">Lihat Semua →</span>
      </div>
      <div class="lb-list" id="leaderboardList"></div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════
       3. WEEKLY CHALLENGE
  ═══════════════════════════════════════════════════════ -->
  <div class="cc">
    <div class="challenge-header">
      <div>
        <div class="cc-title" style="margin-bottom:4px">
          <div class="ct-icon" style="background:rgba(255,122,0,.1)">🔥</div>
          Weekly Challenge
        </div>
        <div class="ch-meta">Reset setiap Senin 00:00 WIB &nbsp;·&nbsp; Terhubung ke roadmap & kalender</div>
      </div>
      <div class="ch-timer">
        ⏱ <span id="challengeTimer">3h 24m</span> tersisa
      </div>
    </div>

    <!-- Clan total progress -->
    <div class="chall-total">
      <div class="ct-row">
        <div class="ct-label">🏅 Progress Clan Minggu Ini</div>
        <div class="ct-pct">67%</div>
      </div>
      <div class="cbar"><div class="cbar-fill blue" style="width:67%"></div></div>
      <div style="display:flex;justify-content:space-between;margin-top:6px;font-size:11px;color:var(--c-muted);font-weight:600;">
        <span>18 dari 32 anggota menyelesaikan challenge</span>
        <span style="color:var(--c-blue);font-weight:700">+240 Clan XP</span>
      </div>
    </div>

    <div class="challenge-list" id="challengeList"></div>
  </div>

  <!-- ══════════════════════════════════════════════════════
       4 + 5. ACTIVITY FEED + DISCUSSION ROOM
  ═══════════════════════════════════════════════════════ -->
  <div class="clan-grid-2">

    <!-- Activity Feed -->
    <div class="cc">
      <div class="cc-head">
        <div class="cc-title">
          <div class="ct-icon" style="background:rgba(61,214,140,.1)">⚡</div>
          Clan Activity Feed
        </div>
        <span class="tag-pill tp-green" style="animation:ping 2s ease-in-out infinite">● Live</span>
      </div>
      <div class="feed-list" id="activityFeed"></div>
    </div>

    <!-- Discussion Room -->
    <div class="cc">
      <div class="cc-head">
        <div class="cc-title">
          <div class="ct-icon" style="background:rgba(167,139,250,.1)">💬</div>
          Discussion Room
        </div>
        <span class="tag-pill tp-purple">12 Online</span>
      </div>

      <div class="disc-tabs">
        <div class="dtab active" onclick="switchDiscTab(this,'grammar')">📝 Grammar</div>
        <div class="dtab" onclick="switchDiscTab(this,'tips')">💡 Tips & Tricks</div>
        <div class="dtab" onclick="switchDiscTab(this,'mock')">📊 Mock Test</div>
        <div class="dtab" onclick="switchDiscTab(this,'general')">🗣 General</div>
      </div>

      <div class="disc-list" id="discList"></div>

      <div class="disc-input-area">
        <input class="disc-input" placeholder="Tulis pertanyaan atau diskusi..." id="discInput" onkeydown="if(event.key==='Enter')postDisc()">
        <button class="disc-send-btn" onclick="postDisc()">➤</button>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════
       6. CLAN WAR
  ═══════════════════════════════════════════════════════ -->
  <div class="cc">
    <div class="cc-head">
      <div class="cc-title">
        <div class="ct-icon" style="background:rgba(167,139,250,.15)">⚔️</div>
        Clan War
      </div>
      <div style="display:flex;align-items:center;gap:8px;">
        <span class="tag-pill tp-purple">Aktif</span>
        <span class="tag-pill tp-orange">Berakhir 8 Mar</span>
      </div>
    </div>

    <div style="padding:0 24px 14px;">
      <div class="war-banner">
        <div class="war-vs">
          <div class="war-team">
            <div class="war-team-name">⚔️ IELTS Warriors 6.5</div>
            <div class="war-team-pts">2,840</div>
            <div style="font-size:11px;color:rgba(255,255,255,.4);margin-top:3px">Klan Kamu</div>
          </div>
          <div class="war-sep">VS</div>
          <div class="war-team">
            <div class="war-team-name">🔥 English Blazers</div>
            <div class="war-team-pts" style="color:rgba(255,255,255,.55)">1,740</div>
            <div style="font-size:11px;color:rgba(255,255,255,.4);margin-top:3px">Lawan</div>
          </div>
        </div>
        <div class="war-bar-wrap">
          <div class="war-bar"><div class="war-fill"></div></div>
          <div class="war-bar-labels">
            <span style="color:rgba(245,197,0,.7)">Warriors 62%</span>
            <span>Blazers 38%</span>
          </div>
        </div>
      </div>

      <div class="s-label">War Tasks — Selesaikan untuk +Poin Clan</div>
    </div>

    <div class="war-tasks" id="warTasks"></div>
  </div>

</div><!-- /clan-wrap -->
@endsection

@section('scripts')
<script>
/* ============================================================
   DATA
============================================================ */
const MEMBERS = [
  { name:'Siti Rahma',   initials:'SR', color:'#F5C500,#FF7A00', pct:100, pts:1240 },
  { name:'Bima Kusuma',  initials:'BK', color:'#4F7BFF,#7BAEFF', pct:96,  pts:1185 },
  { name:'Laila Nur',    initials:'LN', color:'#3DD68C,#7DFFC9', pct:89,  pts:1102 },
  { name:'Reza Fauzi',   initials:'RF', color:'#FF8A4F,#FFB27A', pct:79,  pts:980  },
  { name:'Maya Putri',   initials:'MP', color:'#A78BFA,#C4B5FD', pct:69,  pts:860  },
  { name:'Aryo Rahmat ★',initials:'AR', color:'#F5C500,#FF7A00', pct:60,  pts:745, me:true },
  { name:'Dani Syahri',  initials:'DS', color:'#4F7BFF,#7BAEFF', pct:55,  pts:680  },
];

const CHALLENGES = [
  { icon:'🗣', bg:'rgba(245,197,0,.1)', name:'Speaking Marathon',       meta:'Record 3 jawaban 2 menit · Submit sebelum Minggu',     pts:'+80 Clan XP', pct:33, done:false, color:'yellow' },
  { icon:'✏️', bg:'rgba(79,123,255,.1)', name:'Writing Task 2 Submission', meta:'Tulis 1 essay IELTS Task 2 min. 250 kata',             pts:'+100 Clan XP', pct:60, done:false, color:'blue'  },
  { icon:'🎧', bg:'rgba(61,214,140,.1)', name:'Listening Mock Test',      meta:'Selesaikan 1 full listening test dalam sekali duduk',   pts:'+60 Clan XP', pct:100, done:true, color:'green' },
  { icon:'📖', bg:'rgba(255,122,0,.1)', name:'20 Vocabulary Practice',   meta:'Selesaikan 20 soal vocab dari bank soal IELTS',         pts:'+40 Clan XP', pct:0, done:false, color:'orange'},
];

const FEED_DATA = [
  { initials:'SR', color:'#F5C500,#FF7A00', text:'<strong>Siti Rahma</strong> menyelesaikan <span class="accent">Unit 5 — Listening Strategies</span>', badge:'✅ Unit', badgeCls:'tp-green', time:'2 menit lalu' },
  { initials:'🏅', system:true,             text:'<strong>Clan mencapai 50% Weekly Challenge!</strong> Target minggu ini masih bisa tercapai!', badge:'Milestone', badgeCls:'tp-blue', time:'15 menit lalu' },
  { initials:'BK', color:'#4F7BFF,#7BAEFF', text:'<strong>Bima Kusuma</strong> mendapat skor <span class="accent">6.5</span> di Mock Test Listening', badge:'🎯 Mock', badgeCls:'tp-orange', time:'32 menit lalu' },
  { initials:'LN', color:'#3DD68C,#7DFFC9', text:'<strong>Laila Nur</strong> menyelesaikan <span class="accent">Writing Task 2 Submission</span>', badge:'🔥 Challenge', badgeCls:'tp-yellow', time:'1 jam lalu' },
  { initials:'⚔️', system:true,             text:'<strong>Clan War:</strong> IELTS Warriors memimpin dengan keunggulan <span class="accent">1,100 poin</span> atas English Blazers!', badge:'⚔️ War', badgeCls:'tp-purple', time:'2 jam lalu' },
  { initials:'RF', color:'#FF8A4F,#FFB27A', text:'<strong>Reza Fauzi</strong> bergabung dan menyelesaikan <span class="accent">Placement Test</span>', badge:'👋 Join', badgeCls:'tp-navy', time:'3 jam lalu' },
];

const DISCUSSIONS = {
  grammar: [
    { initials:'DS', color:'#4F7BFF,#7BAEFF', author:'Dani Syahri',  time:'10 mnt', text:'"Ada yang bisa jelaskan perbedaan Present Perfect vs Past Simple untuk IELTS Writing?"', replies:8,  likes:14, pinned:false },
    { initials:'SR', color:'#F5C500,#FF7A00', author:'Siti Rahma',   time:'1 jam',  text:'"Tips untuk tidak bingung pakai articles (a/an/the) dalam IELTS Writing Task 2?"',       replies:12, likes:22, pinned:true  },
    { initials:'MP', color:'#A78BFA,#C4B5FD', author:'Maya Putri',   time:'3 jam',  text:'"Conditional sentence type 2 vs type 3 — mana yang lebih sering keluar di IELTS?"',     replies:5,  likes:9,  pinned:false },
  ],
  tips: [
    { initials:'LN', color:'#3DD68C,#7DFFC9', author:'Laila Nur',   time:'20 mnt', text:'"Share tip saya: baca 1 artikel BBC setiap hari untuk improve reading speed. Sudah bulan 2!"', replies:18, likes:31, pinned:true  },
    { initials:'BK', color:'#4F7BFF,#7BAEFF', author:'Bima Kusuma', time:'2 jam',  text:'"Untuk Speaking Part 2, gunakan framework STAR: Situation, Task, Action, Result. Jelas banget!"', replies:7, likes:15, pinned:false },
  ],
  mock: [
    { initials:'RF', color:'#FF8A4F,#FFB27A', author:'Reza Fauzi',  time:'5 jam',  text:'"Mock Test 1 selesai! Skor: L6.5 R6.0 W5.5 S5.5. Ada yang mau group review besok malam?"', replies:10, likes:8, pinned:false },
  ],
  general: [
    { initials:'AR', color:'#F5C500,#FF7A00', author:'Aryo Rahmat', time:'1 jam',  text:'"Group study session malam ini jam 20.00 WIB — siapa yang ikut? Link Zoom di Calendar!"', replies:14, likes:20, pinned:true  },
  ],
};

let activeDiscTab = 'grammar';

const WAR_TASKS = [
  { icon:'🗣', bg:'rgba(245,197,0,.1)', name:'50 Speaking Minutes Kolektif',  meta:'Progress: 32/50 menit · 18 anggota berkontribusi', pts:'+200 War XP', color:'#C29000' },
  { icon:'✏️', bg:'rgba(79,123,255,.1)', name:'15 Writing Submissions',        meta:'Progress: 9/15 submission · Deadline: 8 Mar',     pts:'+300 War XP', color:'var(--c-blue)' },
  { icon:'📊', bg:'rgba(61,214,140,.1)', name:'Rata-rata Mock Test > 6.0',     meta:'Current: 6.1 ✓ — Target sudah tercapai!',          pts:'+150 War XP ✓', color:'#1A9B5E' },
];

/* ============================================================
   RENDER: MEMBER CONTRIBUTION RINGS
============================================================ */
function renderMemberRings() {
  const c = document.getElementById('memberRings');
  MEMBERS.slice(0, 5).forEach((m, i) => {
    const row = document.createElement('div');
    row.className = 'ar-row';
    const nameColor = m.me ? 'color:var(--c-yellow2);' : '';
    row.innerHTML = `
      <div class="av ar-av" style="background:linear-gradient(135deg,${m.color});color:${i<3?'#0B1D45':'#fff'};font-size:12px;font-weight:800;">${m.initials}</div>
      <div class="ar-name" style="${nameColor}">${m.name}</div>
      <div class="ar-bar-wrap">
        <div class="cbar" style="height:6px">
          <div class="cbar-fill ${i<2?'blue':i===2?'green':''}" style="width:${m.pct}%;transition-delay:${i*0.1}s"></div>
        </div>
      </div>
      <div class="ar-pct" style="${nameColor}">${m.pct}%</div>
    `;
    c.appendChild(row);
  });
}

/* ============================================================
   RENDER: LEADERBOARD
============================================================ */
function renderLeaderboard() {
  const c = document.getElementById('leaderboardList');
  const rankClass = ['','gold','silver','bronze'];
  MEMBERS.forEach((m, i) => {
    const row = document.createElement('div');
    row.className = 'lb-row' + (m.me ? ' me' : '');
    const medalEmoji = i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : '';
    row.innerHTML = `
      <div class="lb-rank ${rankClass[i+1]||''}">${medalEmoji || (i+1)}</div>
      <div class="av lb-av" style="background:linear-gradient(135deg,${m.color});color:${i<3?'#0B1D45':'#fff'};font-size:12px;font-weight:800;">${m.initials}</div>
      <div class="lb-info">
        <div class="lb-name">${m.name}</div>
        <div class="lb-stat">${m.pct}% aktivitas minggu ini</div>
      </div>
      <div class="lb-right">
        <div class="lb-pts">${m.pts.toLocaleString()}</div>
        <div class="lb-pts-lbl">pts</div>
      </div>
    `;
    c.appendChild(row);
  });
}

/* ============================================================
   RENDER: WEEKLY CHALLENGES
============================================================ */
function renderChallenges() {
  const c = document.getElementById('challengeList');
  CHALLENGES.forEach(ch => {
    const item = document.createElement('div');
    item.className = 'chall-item' + (ch.done ? ' done' : '');
    item.innerHTML = `
      <div class="ci-icon" style="background:${ch.bg}">${ch.icon}</div>
      <div class="ci-body">
        <div class="ci-name">${ch.name}</div>
        <div class="ci-meta">${ch.meta}</div>
        ${!ch.done ? `
          <div class="ci-pct">${ch.pct}% selesai</div>
          <div class="cbar" style="height:5px;max-width:220px">
            <div class="cbar-fill ${ch.color}" style="width:${ch.pct}%"></div>
          </div>
        ` : '<div style="font-size:12px;color:var(--c-green);font-weight:700;">✅ Challenge Selesai!</div>'}
      </div>
      <div class="ci-pts" style="color:${ch.done?'var(--c-green)':'var(--c-orange)'}">${ch.pts}</div>
    `;
    if (!ch.done) {
      item.addEventListener('click', () => {
        item.classList.add('done');
        item.querySelector('.ci-body').lastElementChild.outerHTML = '<div style="font-size:12px;color:var(--c-green);font-weight:700;">✅ Challenge Selesai!</div>';
      });
    }
    c.appendChild(item);
  });
}

/* ============================================================
   RENDER: ACTIVITY FEED
============================================================ */
function renderFeed() {
  const c = document.getElementById('activityFeed');
  FEED_DATA.forEach((f, i) => {
    const item = document.createElement('div');
    item.className = 'feed-item';
    item.style.animationDelay = (i * 0.07) + 's';
    const avStyle = f.system
      ? `class="av feed-av system"`
      : `class="av feed-av" style="background:linear-gradient(135deg,${f.color});color:#0B1D45;font-size:12px;font-weight:800;"`;
    item.innerHTML = `
      <div ${avStyle}>${f.initials}</div>
      <div class="feed-body">
        <div class="feed-text">${f.text}</div>
        <div class="feed-time">${f.time}</div>
      </div>
      <span class="feed-badge tag-pill ${f.badgeCls}">${f.badge}</span>
    `;
    c.appendChild(item);
  });
}

/* ============================================================
   RENDER: DISCUSSIONS
============================================================ */
function renderDiscussions(tab) {
  const c = document.getElementById('discList');
  c.innerHTML = '';
  const threads = DISCUSSIONS[tab] || [];
  threads.forEach(t => {
    const el = document.createElement('div');
    el.className = 'disc-thread' + (t.pinned ? ' pinned' : '');
    const initColor = t.color;
    el.innerHTML = `
      <div class="av dt-av" style="background:linear-gradient(135deg,${initColor});color:#0B1D45;font-size:13px;font-weight:800;">${t.initials}</div>
      <div class="dt-body">
        <div class="dt-meta">
          <span class="dt-author">${t.author}</span>
          ${t.pinned ? '<span class="tag-pill tp-yellow" style="font-size:9px;padding:2px 7px;">📌 Pinned</span>' : ''}
          <span class="dt-time">${t.time} yang lalu</span>
        </div>
        <div class="dt-title">${t.text}</div>
        <div class="dt-footer">
          <span class="dt-replies">💬 ${t.replies} balasan</span>
          <span class="dt-likes">❤️ ${t.likes} suka</span>
        </div>
      </div>
    `;
    c.appendChild(el);
  });
}

function switchDiscTab(el, tab) {
  document.querySelectorAll('.dtab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  activeDiscTab = tab;
  renderDiscussions(tab);
}

function postDisc() {
  const inp = document.getElementById('discInput');
  const txt = inp.value.trim();
  if (!txt) return;
  const c = document.getElementById('discList');
  const el = document.createElement('div');
  el.className = 'disc-thread';
  el.style.animation = 'feed-in .3s ease';
  el.innerHTML = `
    <div class="av dt-av" style="background:linear-gradient(135deg,#F5C500,#FF7A00);color:#0B1D45;font-size:13px;font-weight:800;">AR</div>
    <div class="dt-body">
      <div class="dt-meta"><span class="dt-author">Aryo Rahmat ★</span><span class="dt-time">Baru saja</span></div>
      <div class="dt-title">"${txt}"</div>
      <div class="dt-footer"><span class="dt-replies">💬 0 balasan</span><span class="dt-likes">❤️ 0 suka</span></div>
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
    el.className = 'wt-row';
    el.innerHTML = `
      <div class="wt-icon" style="background:${t.bg}">${t.icon}</div>
      <div class="wt-info">
        <div class="wt-name">${t.name}</div>
        <div class="wt-meta">${t.meta}</div>
      </div>
      <div class="wt-pts" style="color:${t.color}">${t.pts}</div>
    `;
    c.appendChild(el);
  });
}

/* ============================================================
   COUNTDOWN TIMER
============================================================ */
function updateCountdown() {
  const target = new Date('2026-07-04T00:00:00');
  const now    = new Date();
  const diff   = target - now;
  if (diff <= 0) return;
  const days  = Math.floor(diff / 86400000);
  const hours = Math.floor((diff % 86400000) / 3600000);
  const mins  = Math.floor((diff % 3600000) / 60000);
  const secs  = Math.floor((diff % 60000) / 1000);
  const pad   = n => String(n).padStart(2, '0');
  document.getElementById('cdDay').textContent  = days;
  document.getElementById('cdHour').textContent = pad(hours);
  document.getElementById('cdMin').textContent  = pad(mins);
  document.getElementById('cdSec').textContent  = pad(secs);
}

/* ============================================================
   INIT
============================================================ */
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
