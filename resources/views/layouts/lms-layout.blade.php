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
      <div class="sb-avatar">{{ substr(Auth::user()->name ?? 'Student', 0, 1) }}</div>
      <div>
        <div class="sb-user-name">{{ Auth::user()->name ?? 'Student Name' }}</div>
        <div class="sb-user-tag">IELTS 6.5 Target</div>
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
</script>
@yield('scripts')
</body>
</html>
