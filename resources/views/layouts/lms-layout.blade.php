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
    <style>
        .lms-wrapper {
            display: flex !important;
            min-height: calc(100vh - 70px) !important;
            background-color: #f7f9fc !important;
            width: 100%;
        }
        .lms-content {
            flex-grow: 1 !important;
            padding: 40px !important;
            background-color: #f7f9fc !important;
            min-width: 0;
        }
        .lms-sidebar {
            flex-shrink: 0 !important;
        }
    </style>
</head>
<body class="bg-light">

<!-- Minimalist Professional Header -->
<header class="main-header bg-white border-bottom sticky-top" style="z-index: 1050; height: 70px;">
    <div class="container-fluid px-4 h-100 d-flex justify-content-between align-items-center">
        <!-- Logo Section -->
        <div class="d-flex align-items-center">
            <a href="/" class="d-flex align-items-center text-decoration-none">
                <img src="https://englishvit.com/img/logo.png" alt="Englishvit" height="32" class="me-2">
            </a>
        </div>

        <!-- Profile Section -->
        <div class="d-flex align-items-center">
            <div class="user-profile-dock d-flex align-items-center py-2 px-3 rounded-pill bg-light border cursor-pointer hover-shadow">
                <div class="text-right me-3 d-none d-sm-block">
                    <p class="f-12 fw-800 primary-text mb-0 line-height-1">Student Name</p>
                    <p class="f-10 text-muted mb-0">Independent Study</p>
                </div>
                <div class="profile-avatar shadow-sm border border-white">S</div>
                <span class="material-icons f-18 text-muted ms-2">expand_more</span>
            </div>
        </div>
    </div>
</header>

<style>
    .gap-32 { gap: 32px; }
    .header-nav-link { 
        font-family: 'Sora', sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: #4b5563;
        text-decoration: none;
        transition: all 0.2s;
        position: relative;
    }
    .header-nav-link:hover, .header-nav-link.active {
        color: #002655;
    }
    .header-nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -24px;
        left: 0;
        right: 0;
        height: 2px;
        background: #002655;
    }
    .btn-lms-nav {
        background: #002655;
        color: white !important;
        font-size: 11px;
        font-weight: 800;
        padding: 10px 18px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        text-decoration: none;
        letter-spacing: 0.5px;
    }
    .header-divider {
        width: 1px;
        height: 30px;
        background: #e5e7eb;
        margin: 0 24px;
    }
    .user-profile-dock {
        transition: all 0.2s ease;
    }
    .profile-avatar {
        width: 32px;
        height: 32px;
        background: #002655;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 12px;
    }
</style>

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
