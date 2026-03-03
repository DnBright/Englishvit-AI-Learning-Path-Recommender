<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Success Path') | Englishvit</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Base CSS -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom Ecosystem CSS -->
    <link rel="stylesheet" href="{{ asset("css/ai-recommender.css") }}">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="ecosystem-theme">

<div class="ecosystem-wrapper">
    <!-- Global Ecosystem Sidebar (ChatGPT Style) -->
    <aside class="ecosystem-sidebar" id="global-sidebar">
        <!-- Brand Header -->
        <div class="eco-sidebar-header">
            <span class="eco-brand">My Success Path</span>
            <button class="eco-sidebar-btn d-md-none" onclick="toggleSidebar()"><span class="material-icons">close</span></button>
        </div>

        <!-- Ecosystem Navigation Modules -->
        <div class="eco-nav-group mt-3">
            <a href="/dashboard-study/roadmap" class="eco-nav-item @yield('nav_map')">
                <span class="material-icons">map</span>
                <span>The Map</span>
            </a>
            <a href="/dashboard-study/core-roadmap" class="eco-nav-item @yield('nav_roadmap')">
                <span class="material-icons">flag</span>
                <span>Core Roadmap</span>
            </a>
            <a href="/dashboard-study/ai-assistant" class="eco-nav-item @yield('nav_ai')">
                <span class="material-icons">chat_bubble_outline</span>
                <span>AI Assistant</span>
            </a>
            <a href="/dashboard-study/calendar" class="eco-nav-item @yield('nav_calendar')">
                <span class="material-icons">calendar_month</span>
                <span>Calendar</span>
            </a>
            <a href="/dashboard-study/clan" class="eco-nav-item @yield('nav_clan')">
                <span class="material-icons">groups</span>
                <span>Clan System</span>
            </a>
            <a href="/dashboard-study/classes" class="eco-nav-item @yield('nav_classes')">
                <span class="material-icons">school</span>
                <span>Class Menu</span>
            </a>
        </div>

        <!-- Sidebar Sub-Content (Dynamic via Yield if needed) -->
        @yield('sidebar_extensions')

        <!-- User Footer Container -->
        <div class="eco-user-dock mt-auto">
            <div class="eco-avatar">SN</div>
            <div style="flex:1;">
                <div class="f-13 font-weight-bold" style="color:#ececec; line-height: 1.2;">Student Name</div>
                <div class="f-10 text-muted">IELTS 6.5 Target</div>
            </div>
            <span class="material-icons text-muted f-16">more_horiz</span>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ecosystem-main">
        <!-- Contextual Topbar -->
        <header class="eco-topbar">
            <div class="d-flex align-items-center">
                <button class="eco-sidebar-btn d-md-none me-2" onclick="toggleSidebar()">
                    <span class="material-icons">menu</span>
                </button>
                <div class="eco-topbar-title">
                    @yield('topbar_title', 'My Success Path')
                </div>
            </div>
            <div class="d-flex gap-3">
                @yield('topbar_actions')
            </div>
        </header>

        <!-- Dynamic Module Content -->
        <div class="eco-content-area" id="eco-content">
            @yield('content')
        </div>
    </main>
</div>

<!-- Global Scripts -->
<script>
    function toggleSidebar() {
        const sb = document.getElementById('global-sidebar');
        sb.classList.toggle('open');
    }
</script>
@yield('scripts')

</body>
</html>
