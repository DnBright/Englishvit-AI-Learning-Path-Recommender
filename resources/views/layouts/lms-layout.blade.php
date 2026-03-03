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

<!-- Header (Optimized for Visibility) -->
<header class="main-header shadow-sm bg-white sticky-top" style="z-index: 1050;">
    <div class="container d-flex justify-content-between align-items-center py-2">
        <div class="logo">
            <a href="/">
                <img src="https://englishvit.com/img/logo.png" alt="Englishvit" height="35">
            </a>
        </div>
        <nav class="d-none d-md-block">
            <ul class="d-flex list-unstyled m-0 gap-4 align-items-center">
                <li><a href="/" class="f-14 font-weight-bold text-dark hover-blue">Beranda</a></li>
                <li><a href="https://englishvit.com/program" class="f-14 text-dark hover-blue">Program</a></li>
                <li><a href="https://englishvit.com/artikel" class="f-14 text-dark hover-blue">Blog</a></li>
                <li><a href="/dashboard-study/roadmap" class="btn btn-sm bg-info-1 accent-text font-weight-bold p-x-15">LMS Dashboard</a></li>
            </ul>
        </nav>
        <div class="user-profile d-flex align-items-center gap-2">
            <div class="d-flex flex-column text-right d-none d-sm-flex">
                <span class="f-12 font-weight-bold mb-0">Student Name</span>
                <span class="f-10 text-muted">Independent Study</span>
            </div>
            <div class="rounded-circle bg-primary text-white d-flex-center justify-center font-weight-bold" style="width: 35px; height: 35px; background: #002655;">S</div>
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
