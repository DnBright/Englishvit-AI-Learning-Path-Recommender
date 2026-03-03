@extends('layouts.lms-layout')
@section('title', '👥 Clan System')
@section('nav_clan', 'active')
@section('topbar_title', '👥 Clan System')

@section('content')

{{-- ── CLAN OVERVIEW ── --}}
<div class="clan-banner">
  <div style="flex:1">
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
      <span class="tag tag-blue" style="background:rgba(59,130,246,0.15);color:#60a5fa;border:1px solid rgba(59,130,246,0.2)">🛡️ Official Clan</span>
      <span class="tag tag-muted" id="memberCount">32 Members</span>
      <span class="tag tag-orange" id="countdownTimer">⏳ 12 Hari lagi</span>
    </div>
    <div class="clan-name" style="font-size:32px;margin-bottom:8px;">⚔️ IELTS Warriors 6.5</div>
    <div style="font-size:14px;color:var(--text-2);max-width:500px;line-height:1.6">
        Target bersama: <b>IELTS 6.5 Intensive</b> · Progress Kolektif: <span style="color:var(--yellow)">64%</span>
    </div>
  </div>
  <div class="clan-shield">🛡️</div>
</div>

{{-- ── CLAN PROGRESS BOARD ── --}}
<div class="section-label" style="margin-bottom:16px">📊 Clan Progress Board</div>
<div class="clan-board-grid">
    <div class="cb-card">
        <div class="cb-val">124</div>
        <div class="cb-lbl">Unit Selesai</div>
    </div>
    <div class="cb-card">
        <div class="cb-val">42</div>
        <div class="cb-lbl">Challenges</div>
    </div>
    <div class="cb-card">
        <div class="cb-val">7.2</div>
        <div class="cb-lbl">Avg Mock Test</div>
    </div>
    <div class="cb-card">
        <div class="cb-val">96%</div>
        <div class="cb-lbl">Anggota Aktif</div>
    </div>
</div>

<div class="grid-2">
    {{-- ── LEFT COLUMN: Challenges & Feed ── --}}
    <div>
        {{-- Weekly Challenge --}}
        <div class="section-label" style="margin-bottom:16px">🔥 Weekly Challenge</div>
        <div class="card card-sm" style="margin-bottom:24px; border-color: rgba(245, 200, 66, 0.15);">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:12px;">
                <div>
                    <div style="font-weight:700; font-size:15px; margin-bottom:4px;">🚀 Sprint Vocabulary Practice</div>
                    <div style="font-size:12px; color:var(--muted)">Selesaikan 20 latihan vocab mingguan</div>
                </div>
                <div class="tag tag-yellow">+500 Clan Pts</div>
            </div>
            <div class="prog-bar"><div class="prog-fill" style="width:75%"></div></div>
            <div style="display:flex; justify-content:space-between; margin-top:8px;">
                <div style="font-size:11px; color:var(--muted)">15 dari 20 orang selesai</div>
                <div style="font-size:11px; color:var(--yellow); font-weight:700">75% Complete</div>
            </div>
        </div>

        {{-- Activity Feed --}}
        <div class="section-label" style="margin-bottom:16px; display:flex; justify-content:space-between;">
            <span>⚡ Clan Activity Feed</span>
            <span style="font-size:10px; color:var(--muted); font-weight:normal">LIVE UPDATE</span>
        </div>
        <div class="feed-container" id="clanActivityFeed">
            {{-- Rendered by JS --}}
        </div>
    </div>

    {{-- ── RIGHT COLUMN: Discussion & War ── --}}
    <div>
        {{-- Discussion Room --}}
        <div class="section-label" style="margin-bottom:16px">💬 Discussion & Peer Support</div>
        <div class="thread-list">
            <div class="thread-card">
                <div class="tc-meta">
                    <div class="lb-avatar" style="background:var(--yellow); color:var(--navy); font-size:10px;">AR</div>
                    <div style="font-size:12px; font-weight:600">Aryo Rahmat</div>
                    <div style="font-size:10px; color:var(--muted)">• 2 jam lalu</div>
                </div>
                <div class="tc-title">Tips Skimming di Reading Task 2?</div>
                <div class="tc-preview">Guys, ada yang punya trik cepat untuk nemuin keyword di teks panjang? Skimming saya masih berantakan...</div>
                <div style="margin-top:10px; display:flex; gap:12px;">
                    <span style="font-size:11px; color:var(--muted)">💬 12 Replies</span>
                    <span style="font-size:11px; color:var(--muted)">👏 8 Helpful</span>
                </div>
            </div>

            <div class="thread-card">
                <div class="tc-meta">
                    <div class="lb-avatar" style="background:var(--blue-acc); color:#fff; font-size:10px;">SR</div>
                    <div style="font-size:12px; font-weight:600">Siti Rahma</div>
                    <div style="font-size:10px; color:var(--muted)">• 5 jam lalu</div>
                </div>
                <div class="tc-title">Group Study: Writing Task 1</div>
                <div class="tc-preview">Nanti malam jam 20:00 kita bahas cara deskripsiin chart bareng di Zoom yuk? Link saya taruh di pinned post.</div>
                <div style="margin-top:10px; display:flex; gap:12px;">
                    <span style="font-size:11px; color:var(--muted)">💬 24 Replies</span>
                    <span style="font-size:11px; color:var(--muted)">👏 15 Joiners</span>
                </div>
            </div>
        </div>
        <button class="btn-yellow" style="width:100%; margin-top:16px; padding:12px; font-size:13px; font-family:var(--font-body)">+ Buat Pertanyaan Baru</button>

        {{-- Clan War Hook --}}
        <div class="clan-war-banner">
            <div class="cw-glow"></div>
            <div style="position:relative; z-index:2">
                <div class="cw-title">⚔️ Clan War: Season 4</div>
                <div class="cw-desc">Clan kita saat ini berada di posisi <b>ke-3</b> se-regional. Satu langkah lagi menuju Diamond League!</div>
            </div>
            <button class="cw-btn" style="position:relative; z-index:2">LIHAT WAR</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
/* ============================================================
   CLAN ACTIVITY FEED (Simulated Live Data)
============================================================ */
const ACTIVITIES = [
    { type: 'achievement', icon: '🏆', ctx: '<b>Siti Rahma</b> baru saja menyelesaikan Unit 4 Grammar', time: '5 menit lalu' },
    { type: 'progress',    icon: '📈', ctx: '<b>Budi</b> menyelesaikan Weekly Challenge Vocabulary', time: '12 menit lalu' },
    { type: 'achievement', icon: '⭐', ctx: 'Clan kita baru saja mencapai <b>50% target bulanan</b>', time: '1 jam lalu' },
    { type: 'progress',    icon: '📝', ctx: '<b>Rina</b> mengirimkan Writing Submission pertama', time: '2 jam lalu' },
    { type: 'achievement', icon: '🔥', ctx: '<b>Aryo Rahmat</b> mencapai 7 hari streak belajar!', time: '3 jam lalu' },
    { type: 'progress',    icon: '🎯', ctx: '<b>Maya</b> mengerjakan Mock Test dengan skor 7.5', time: '4 jam lalu' },
];

function renderFeed() {
    const container = document.getElementById('clanActivityFeed');
    if (!container) return;
    
    container.innerHTML = '';
    ACTIVITIES.forEach(act => {
        const item = document.createElement('div');
        item.className = `feed-item ${act.type}`;
        item.innerHTML = `
            <div class="feed-icon">${act.icon}</div>
            <div class="feed-ctx">${act.ctx}</div>
            <div class="feed-time">${act.time}</div>
        `;
        container.appendChild(item);
    });
}

// Simulated real-time update
setInterval(() => {
    // In real app, this would be a WebSocket event
    // For prototype, let's just re-render or add a pulse
    console.log("Updating clan activity feed...");
}, 30000);

document.addEventListener('DOMContentLoaded', () => {
    renderFeed();
});
</script>
@endsection
