<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Englishvit LMS</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/ai-recommender.css") }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<!-- Header (Cloned from beranda) -->
<header class="main-header shadow-sm bg-white sticky-top">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <div class="logo">
            <a href="/"><img src="https://englishvit.com/img/logo.png" alt="Englishvit" height="40"></a>
        </div>
        <nav class="d-none d-md-block">
            <ul class="d-flex list-unstyled m-0 gap-4">
                <li><a href="/" class="text-dark font-weight-bold">Home</a></li>
                <li><a href="#" class="text-dark">Program</a></li>
                <li><a href="#" class="text-dark">About</a></li>
            </ul>
        </nav>
        <div class="user-profile d-flex align-items-center gap-2">
            <span class="f-14 font-weight-bold">Student Name</span>
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">S</div>
        </div>
    </div>
</header>

<div class="lms-wrapper">
    <!-- Sidebar Navigation -->
    <aside class="lms-sidebar">
        <div class="m-b-30 pd-s-25">
            <h6 class="text-white opacity-5 font-weight-bold f-12 text-uppercase">Study Menu</h6>
        </div>
        <nav>
            <a href="/dashboard-study/roadmap" class="lms-nav-item @yield('nav_roadmap')">
                <span class="material-icons">map</span>
                <span>Core Roadmap</span>
            </a>
            <a href="/dashboard-study/ai-assistant" class="lms-nav-item @yield('nav_ai')">
                <span class="material-icons">smart_toy</span>
                <span>AI Assistant</span>
            </a>
            <a href="/dashboard-study/calendar" class="lms-nav-item @yield('nav_calendar')">
                <span class="material-icons">calendar_month</span>
                <span>Integrated Calendar</span>
            </a>
            <a href="/dashboard-study/clan" class="lms-nav-item @yield('nav_clan')">
                <span class="material-icons">groups</span>
                <span>Clan System</span>
            </a>
            <a href="/dashboard-study/classes" class="lms-nav-item @yield('nav_classes')">
                <span class="material-icons">school</span>
                <span>Class Menu</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="lms-content">
        @yield('content')
    </main>
</div>

<footer class="bg-white border-top py-4 mt-auto">
    <div class="container text-center text-muted">
        <p class="mb-0 f-12">&copy; 2026 Englishvit. All rights reserved.</p>
    </div>
</footer>

@yield('scripts')

</body>
</html>
