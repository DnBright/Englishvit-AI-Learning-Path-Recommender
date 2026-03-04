<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'My Success Path — Englishvit')</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
<!-- Fonts & Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Custom Ecosystem CSS -->
<link rel="stylesheet" href="{{ asset('css/my-success-path.css') }}">

@yield('styles')
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<nav class="sidebar" id="sidebar">
  <div class="sb-logo" style="display:block; padding-top:12px;">
    <img src="{{ asset('images/logo-white.svg') }}" alt="Englishvit Logo" style="height: 26px; margin-bottom: 8px;">
    <div class="sb-logo-sub" style="display:block;">My Success Path</div>
  </div>

  <div class="sb-section">Learning</div>
  <a href="/dashboard-study/roadmap" class="sb-item @yield('nav_map')">
    <div class="sb-icon">🗺</div> My Map
  </a>
  <a href="/dashboard-study/core-roadmap" class="sb-item @yield('nav_roadmap')">
    <div class="sb-icon">📘</div> Core Roadmap
  </a>
  <a href="/dashboard-study/ai-assistant" class="sb-item @yield('nav_ai')">
    <div class="sb-icon">🤖</div> AI Assistant
    <span class="sb-badge">3</span>
  </a>

  <div class="sb-section">Schedule</div>
  <a href="/dashboard-study/calendar" class="sb-item @yield('nav_calendar')">
    <div class="sb-icon">📅</div> Calendar
  </a>

  <div class="sb-section">Community</div>
  <a href="/dashboard-study/clan" class="sb-item @yield('nav_clan')">
    <div class="sb-icon">👥</div> Clan
  </a>
  <a href="/dashboard-study/classes" class="sb-item @yield('nav_classes')">
    <div class="sb-icon">🎓</div> Class Menu
  </a>

  <div class="sb-bottom">
    <div class="sb-user">
      <div class="sb-avatar">R</div>
      <div>
        <div class="sb-user-name">Rina</div>
        <div class="sb-user-tag">TOEFL 580 Target</div>
      </div>
    </div>
  </div>
</nav>

<!-- ===== MAIN ===== -->
<div class="main">

  <!-- TOP BAR -->
  <div class="topbar">
    <div class="topbar-title" id="topbar-title">@yield('topbar_title', '🗺 My Success Path')</div>
    <div class="topbar-actions">
      <!-- Leaderboard Dropdown -->
      <div class="leaderboard-dropdown" style="position:relative;">
        <button class="btn-ghost" style="padding:8px 12px; display:flex; gap:6px; align-items:center;" onclick="document.getElementById('lbDropdown').classList.toggle('show')">
          <span style="font-size:16px;">🏆</span>
          <span style="font-weight:600; font-size:13px;">Rank</span>
        </button>
        
        <div id="lbDropdown" style="position:absolute; top:45px; right:0; width:280px; background:var(--bg-card); border:1px solid rgba(255,255,255,0.05); border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.5); display:none; flex-direction:column; z-index:100; overflow:hidden;">
          <!-- Tabs -->
          <div style="display:flex; border-bottom:1px solid rgba(255,255,255,0.05);">
            <div class="lb-tab active" onclick="switchLbTab('clan')" id="tab-lb-clan" style="flex:1; padding:12px; text-align:center; font-size:13px; font-weight:600; cursor:pointer; background:rgba(255,255,255,0.05); color:var(--white);">🛡️ Clan Rank</div>
            <div class="lb-tab" onclick="switchLbTab('personal')" id="tab-lb-personal" style="flex:1; padding:12px; text-align:center; font-size:13px; font-weight:600; cursor:pointer; color:var(--text-2);">👤 Global Rank</div>
          </div>
          
          <!-- Content: Clan -->
          <div id="content-lb-clan" style="display:block; padding:12px;">
            <div style="font-size:11px; color:var(--text-2); margin-bottom:12px; text-align:center;">Top 3 Clan Minggu Ini</div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:rgba(255,215,0,0.1); border-radius:8px; margin-bottom:8px;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:14px;">🥇</span> <span style="font-size:13px; font-weight:600; color:var(--yellow);">IELTS Knights</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--white);">12.5k XP</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:var(--surface); border-radius:8px; margin-bottom:8px;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:14px; opacity:0.8">🥈</span> <span style="font-size:13px; font-weight:600; color:var(--white);">Grammar Police</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--text-2);">11.2k XP</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:var(--surface); border-radius:8px;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:14px; opacity:0.6">🥉</span> <span style="font-size:13px; font-weight:600; color:var(--white);">Speaking Masters</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--text-2);">9.8k XP</span>
            </div>
          </div>
          
          <!-- Content: Personal -->
          <div id="content-lb-personal" style="display:none; padding:12px;">
            <div style="font-size:11px; color:var(--text-2); margin-bottom:12px; text-align:center;">Posisi Anda di Global Leaderboard</div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:var(--surface); border-radius:8px; margin-bottom:8px; opacity:0.5;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:12px; color:var(--text-2); width:16px;">42</span>
                <span style="font-size:13px; font-weight:600; color:var(--white);">Budi S.</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--text-2);">8,450 XP</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:rgba(var(--blue-rgb), 0.15); border:1px solid rgba(var(--blue-rgb), 0.3); border-radius:8px; margin-bottom:8px;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:12px; color:var(--blue-acc); width:16px; font-weight:700;">43</span>
                <span style="font-size:13px; font-weight:600; color:var(--white);">Anda</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--blue-acc);">8,420 XP</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:8px 12px; background:var(--surface); border-radius:8px; opacity:0.5;">
              <div style="display:flex; align-items:center; gap:8px;">
                <span style="font-size:12px; color:var(--text-2); width:16px;">44</span>
                <span style="font-size:13px; font-weight:600; color:var(--white);">Sarah F.</span>
              </div>
              <span style="font-size:12px; font-weight:700; color:var(--text-2);">8,390 XP</span>
            </div>
          </div>
          
          <a href="/dashboard-study/clan" style="display:block; padding:12px; text-align:center; font-size:12px; color:var(--blue-acc); text-decoration:none; border-top:1px solid rgba(255,255,255,0.05); background:rgba(0,0,0,0.2);">Lihat Selengkapnya &rarr;</a>
        </div>
      </div>
      
      <button class="btn-ghost" onclick="toggleSidebar()">☰ Menu</button>
      <button class="btn-yellow">+ Tambah Sesi</button>
    </div>
  </div>
  
  <div class="page active">
      @yield('content')
  </div>

</div>

<script>
function toggleSidebar() {
  const sb = document.getElementById('sidebar');
  sb.classList.toggle('open');
}

// Close Dropdown when clicking outside
document.addEventListener('click', function(event) {
  const dropdown = document.getElementById('lbDropdown');
  const button = dropdown.previousElementSibling;
  
  if (!dropdown.contains(event.target) && !button.contains(event.target)) {
    dropdown.classList.remove('show');
  }
});

function switchLbTab(tab) {
  // Update Buttons
  document.getElementById('tab-lb-clan').className = 'lb-tab' + (tab === 'clan' ? ' active' : '');
  document.getElementById('tab-lb-personal').className = 'lb-tab' + (tab === 'personal' ? ' active' : '');
  
  // Custom active styling
  document.getElementById('tab-lb-clan').style.background = tab === 'clan' ? 'rgba(255,255,255,0.05)' : 'transparent';
  document.getElementById('tab-lb-clan').style.color = tab === 'clan' ? 'var(--white)' : 'var(--text-2)';
  document.getElementById('tab-lb-personal').style.background = tab === 'personal' ? 'rgba(255,255,255,0.05)' : 'transparent';
  document.getElementById('tab-lb-personal').style.color = tab === 'personal' ? 'var(--white)' : 'var(--text-2)';

  // Update Content
  document.getElementById('content-lb-clan').style.display = tab === 'clan' ? 'block' : 'none';
  document.getElementById('content-lb-personal').style.display = tab === 'personal' ? 'block' : 'none';
}
</script>
@yield('scripts')
</body>
</html>
