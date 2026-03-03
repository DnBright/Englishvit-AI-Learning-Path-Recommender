<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, shrink-to-fit=no">
    <title>Independent Study Dashboard | Englishvit Recommender</title>
    
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link href="{{ asset("css/argon-dashboard.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/englishvit-v3.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/ai-recommender.css") }}">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Sora:400,600,700,800&display=swap" rel="stylesheet">
    
    <!-- Chart.js for Radar Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Sora', sans-serif; }
        .navbar-top { background-color: #002655 !important; }
        .primary-text { color: #002655; }
        .accent-text { color: #007bff; }
        .bg-gradient-soft { background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%); }
    </style>
</head>
<body>

<!-- Navigation Header -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark bg-primary-8" id="navbar-main">
    <div class="container">
        <a class="h4 mb-0 text-white text-uppercase" href="https://englishvit.com">
            <img src="{{ asset('images/englishvit-white.webp') }}" alt="Englishvit" style="height: 35px;">
        </a>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
            <li class="nav-item"><a class="nav-link btn bg-info-7" href="#">Dashboard Study</a></li>
        </ul>
    </div>
</nav>

<main class="dashboard-container">
<div class="lms-wrapper">
    <!-- Sidebar Navigation -->
    <aside class="lms-sidebar">
        <div class="m-b-30 pd-s-25">
            <h6 class="text-white opacity-5 font-weight-bold f-12 text-uppercase">Study Menu</h6>
        </div>
        <nav>
            <a class="lms-nav-item active" onclick="switchMenu('roadmap')">
                <span class="material-icons">map</span>
                <span>Core Roadmap</span>
            </a>
            <a class="lms-nav-item" onclick="switchMenu('ai')">
                <span class="material-icons">smart_toy</span>
                <span>AI Assistant</span>
            </a>
            <a class="lms-nav-item" onclick="switchMenu('calendar')">
                <span class="material-icons">calendar_month</span>
                <span>Integrated Calendar</span>
            </a>
            <a class="lms-nav-item" onclick="switchMenu('clan')">
                <span class="material-icons">groups</span>
                <span>Clan System</span>
            </a>
            <a class="lms-nav-item" onclick="switchMenu('class')">
                <span class="material-icons">school</span>
                <span>Class Menu</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="lms-content">
        
        <!-- [Menu: Core Roadmap] -->
        <section id="menu-roadmap" class="menu-section active">
            <h2 class="font-weight-bold primary-text m-b-20">🗺️ Core Roadmap</h2>
            <div class="row">
                <div class="col-lg-8">
                    <div class="dashboard-card pd-30">
                        <div class="d-flex justify-between m-b-20">
                            <h5 class="font-weight-bold">Progress Target IELTS 6.5</h5>
                            <span class="badge badge-success">On Track</span>
                        </div>
                        <div class="progress m-b-30" style="height: 15px; border-radius: 10px;">
                            <div class="progress-bar bg-info" style="width: 42%;">42%</div>
                        </div>
                        <div class="timeline-path m-b-30">
                            <div class="timeline-step active">M1</div>
                            <div class="timeline-step">M2</div>
                            <div class="timeline-step">M3</div>
                            <div class="timeline-step">M4</div>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <h6 class="font-weight-bold">Bulan Ini: Foundation & Grammar</h6>
                            <p class="f-13 text-muted">Aksi selanjutnya: Selesaikan 5 quiz reading untuk membuka milestone berikutnya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dashboard-card pd-20">
                        <h6 class="font-weight-bold m-b-15">Skill Balance</h6>
                        <div class="radar-chart-container">
                            <canvas id="skillRadar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- [Menu: AI Assistant] -->
        <section id="menu-ai" class="menu-section">
            <h2 class="font-weight-bold primary-text m-b-20">🤖 AI Study Assistant</h2>
            <div class="ai-assistant-view">
                <div class="chat-header pd-s-20 pd-t-15 pd-b-15">
                    <span class="material-icons">psychology</span>
                    <span class="m-l-10">Contextual Learning Mentor</span>
                </div>
                <div class="chat-body pd-30 bg-light flex-fill">
                    <div class="chat-bubble bubble-ai m-b-20">
                        Halo! Saya sudah menganalisis progress Roadmap Anda. Progress Writing Anda sedikit melambat di minggu ini. Ingin fokus latihan Essay hari ini?
                    </div>
                </div>
                <div class="chat-footer pd-20">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tanya sesuatu tentang roadmap mu...">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- [Menu: Integrated Calendar] -->
        <section id="menu-calendar" class="menu-section">
            <h2 class="font-weight-bold primary-text m-b-20">📅 Integrated Calendar</h2>
            <div class="dashboard-card pd-30">
                <div class="row">
                    <div class="col-md-4">
                        <div class="pd-20 bg-gradient-soft rounded">
                            <h6 class="font-weight-bold"><span class="material-icons f-16 m-r-5">event</span> Upcoming</h6>
                            <hr>
                            <div class="p-2 m-b-10 border-left-blue bg-white rounded">
                                <span class="f-12 font-weight-bold">Besok, 19:00</span>
                                <p class="f-13 m-b-0">Live Class #4: Listening Tips</p>
                            </div>
                            <div class="p-2 m-b-10 border-left-warning bg-white rounded">
                                <span class="f-12 font-weight-bold">8 Mar, 08:00</span>
                                <p class="f-13 m-b-0">Mock Test #1 (Full Simulation)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="calendar-grid">
                            <!-- Simplified Grid -->
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Sen</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Sel</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Rab</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Kam</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Jum</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Sab</div>
                            <div class="calendar-day font-weight-bold text-center bg-light" style="min-height: auto;">Min</div>
                            <!-- Days -->
                            <div class="calendar-day text-muted f-12">1</div>
                            <div class="calendar-day text-muted f-12">2</div>
                            <div class="calendar-day text-muted f-12">3</div>
                            <div class="calendar-day">
                                <span class="f-12 font-weight-bold">4</span>
                                <div class="badge badge-info f-10 d-block m-t-5">Live Zoom</div>
                            </div>
                            <div class="calendar-day text-muted f-12">5</div>
                            <div class="calendar-day text-muted f-12">6</div>
                            <div class="calendar-day text-muted f-12">7</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- [Menu: Clan System] -->
        <section id="menu-clan" class="menu-section">
            <h2 class="font-weight-bold primary-text m-b-20">👥 Clan System</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="dashboard-card pd-30">
                        <h5 class="font-weight-bold m-b-20">Leaderboard: Clan Target 6.5</h5>
                        <div class="clan-board p-0 shadow-none">
                            <div class="clan-item">
                                <div class="clan-rank">1</div>
                                <div class="flex-fill font-weight-bold">Budi Santoso</div>
                                <div class="badge badge-success">450 XP</div>
                            </div>
                            <div class="clan-item">
                                <div class="clan-rank">2</div>
                                <div class="flex-fill">Siti Aminah</div>
                                <div class="badge badge-secondary">410 XP</div>
                            </div>
                            <div class="clan-item">
                                <div class="clan-rank">3</div>
                                <div class="flex-fill">Agus Pratama</div>
                                <div class="badge badge-secondary">380 XP</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-card pd-20 bg-primary-8 text-white">
                        <h6 class="text-white font-weight-bold">Accountability Challenge</h6>
                        <p class="f-12 opacity-8">Selesaikan 1 jam belajar mandiri berturut-turut untuk mendapatkan Badge "Elite Warrior".</p>
                        <button class="btn btn-sm btn-info w-100">Ikuti Challenge</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- [Menu: Class Menu] -->
        <section id="menu-class" class="menu-section">
            <h2 class="font-weight-bold primary-text m-b-20">📚 Class Menu & Resources</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-card pd-25">
                        <h6 class="font-weight-bold m-b-20">Sesi Zoom Terjadwal</h6>
                        <div class="class-resource-card">
                            <div class="icon-wrap bg-info-1"><span class="material-icons accent-text">videocam</span></div>
                            <div class="flex-fill">
                                <h6 class="m-b-0 font-weight-bold">Writing Task 2 Deep Dive</h6>
                                <p class="f-12 text-muted m-b-0">4 Maret, 19:00 WIB</p>
                            </div>
                            <button class="btn btn-sm btn-info">Join Link</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-card pd-25">
                        <h6 class="font-weight-bold m-b-20">Materi & PDF</h6>
                        <div class="class-resource-card">
                            <div class="icon-wrap bg-warning-1"><span class="material-icons text-warning">picture_as_pdf</span></div>
                            <div class="flex-fill">
                                <h6 class="m-b-0 font-weight-bold">IELTS Pattern Handbook</h6>
                                <p class="f-12 text-muted m-b-0">E-Book Eksklusif</p>
                            </div>
                            <button class="btn btn-sm btn-outline-warning">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-primary-8 text-white p-t-60 p-b-20 mt-5">
    <div class="container text-center">
        <p class="f-14">&copy; 2026 Englishvit.com - Your Personal AI Learning Partner.</p>
    </div>
</footer>

<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>

<script>
    // Initialize Skill Radar Chart (Mini Version)
    const ctx = document.getElementById('skillRadar').getContext('2d');
    const skillRadar = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['LIS', 'REA', 'WRI', 'SPE'],
            datasets: [{
                label: 'Current',
                data: [65, 59, 45, 40],
                fill: true,
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: '#007bff',
                pointRadius: 2
            }, {
                label: 'Target',
                data: [80, 80, 75, 75],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.05)',
                borderColor: 'rgba(255, 99, 132, 0.4)',
                borderDash: [2, 2],
                pointRadius: 0
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 10 } } }
            },
            scales: {
                r: {
                    ticks: { display: false },
                    grid: { color: '#f0f0f0' },
                    suggestedMin: 0,
                    suggestedMax: 100
                }
            }
        }
    });

    // Chatbox Toggle / Interactivity (Optional)
    function sendMessage() {
        const input = $('.ai-chat-box input');
        if (input.val()) {
            $('.chat-body').append(`<div class="chat-bubble bubble-user">${input.val()}</div>`);
            input.val('');
            $('.chat-body').scrollTop($('.chat-body')[0].scrollHeight);
            
            // Fake AI Response
            setTimeout(() => {
                $('.chat-body').append(`<div class="chat-bubble bubble-ai">Mengerti. Saya akan segera menyesuaikan roadmap Anda.</div>`);
                $('.chat-body').scrollTop($('.chat-body')[0].scrollHeight);
            }, 1000);
        }
    }

    $('.ai-chat-box button').on('click', sendMessage);
    $('.ai-chat-box input').on('keypress', function(e) {
        if(e.which == 13) sendMessage();
    });
</script>

</body>
</html>
