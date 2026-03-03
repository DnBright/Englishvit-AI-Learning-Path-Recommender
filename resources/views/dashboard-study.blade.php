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
    <div class="container">
        <!-- Dashboard Header -->
        <div class="row m-b-40">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Study Dashboard</li>
                    </ol>
                </nav>
                <h1 class="font-weight-bold primary-text">獨立 Dashboard Workspace 🚀</h1>
                <p class="text-muted">Kelola rencana belajar mandiri Anda yang didukung oleh AI.</p>
            </div>
        </div>

        <div class="row">
            <!-- Left Column: Primary Learning Modules -->
            <div class="col-lg-8">
                
                <!-- [Module 3] Roadmap: Core Execution -->
                <div class="dashboard-card border-top-primary">
                    <div class="card-header-ai d-flex justify-between align-items-center">
                        <h5 class="card-title-ai">
                            <span class="material-icons accent-text">map</span>
                            Learning Roadmap & Progress
                        </h5>
                        <div class="badge badge-pill badge-primary">Fase 1: Foundation</div>
                    </div>
                    <div class="card-body-ai">
                        <div class="progress m-b-20" style="height: 12px; border-radius: 10px;">
                            <div class="progress-bar bg-info" style="width: 42%;">42% Complete</div>
                        </div>
                        
                        <div class="timeline-path m-b-20">
                            <div class="timeline-step active">M1</div>
                            <div class="timeline-step">M2</div>
                            <div class="timeline-step">M3</div>
                            <div class="timeline-step">M4</div>
                        </div>

                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-between align-items-center bg-transparent border-0 pd-s-0">
                                <div>
                                    <h6 class="m-b-0 font-weight-bold">Current Milestone: Academic Vocabulary</h6>
                                    <p class="f-12 text-muted m-b-0">Target: Band 6.5 Requirement</p>
                                </div>
                                <span class="material-icons text-success">check_circle</span>
                            </div>
                            <div class="list-group-item d-flex justify-between align-items-center bg-transparent border-0 pd-s-0">
                                <div>
                                    <h6 class="m-b-0 font-weight-bold">Next: Speaking Simulation #1</h6>
                                    <p class="f-12 text-muted m-b-0">Estimated: 3 Days remaining</p>
                                </div>
                                <span class="material-icons text-muted">radio_button_unchecked</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- [Module 2] Integrated Calendar -->
                <div class="dashboard-card">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons accent-text">calendar_month</span>
                            Jadwal Belajar Terintegrasi
                        </h5>
                    </div>
                    <div class="card-body-ai">
                        <div class="row lms-calendar">
                            <div class="col-md-6 border-right">
                                <h6 class="f-14 font-weight-bold m-b-15">Hari Ini (4 Maret)</h6>
                                <div class="cal-event event-live">09:00 - Self Study: Reading Drill</div>
                                <div class="cal-event event-zoom">19:00 - Live Session: Essay Structure</div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="f-14 font-weight-bold m-b-15">Mendatang</h6>
                                <div class="cal-event event-test">6 Mar - Deadline Writing Assignment</div>
                                <div class="cal-event event-live">7 Mar - Full Mock Test IELTS</div>
                            </div>
                        </div>
                        <div class="text-center m-t-15">
                            <button class="btn btn-sm btn-outline-primary">Buka Kalender Lengkap</button>
                        </div>
                    </div>
                </div>

                <!-- [Module 5] Class Menu & Resources -->
                <div class="dashboard-card">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons accent-text">school</span>
                            Class Menu & Resources
                        </h5>
                    </div>
                    <div class="card-body-ai">
                        <div class="class-resource-card">
                            <div class="icon-wrap bg-info-1"><span class="material-icons accent-text">videocam</span></div>
                            <div class="flex-fill">
                                <h6 class="m-b-0 font-weight-bold">Zoom Session: Academic Writing</h6>
                                <p class="f-12 text-muted m-b-0">Tersedia dalam 4 jam</p>
                            </div>
                            <button class="btn btn-sm btn-info">Join Zoom</button>
                        </div>
                        <div class="class-resource-card">
                            <div class="icon-wrap bg-warning-1"><span class="material-icons text-warning">description</span></div>
                            <div class="flex-fill">
                                <h6 class="m-b-0 font-weight-bold">PDF: Writing Task 2 Guide</h6>
                                <p class="f-12 text-muted m-b-0">Materi Referensi Utama</p>
                            </div>
                            <button class="btn btn-sm btn-outline-warning">Download</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Community & Support -->
            <div class="col-lg-4">
                
                <!-- [Module 4] Clan System: Social Accountability -->
                <div class="dashboard-card">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons text-warning">groups</span>
                            Clan: Target IELTS 6.5
                        </h5>
                    </div>
                    <div class="card-body-ai p-t-10">
                        <p class="f-12 text-muted m-b-15">Belajar bersama 12 siswa dengan target yang sama.</p>
                        
                        <div class="clan-board">
                            <div class="clan-item">
                                <div class="clan-rank">1</div>
                                <div class="flex-fill f-14 font-weight-bold">Budi Santoso</div>
                                <div class="f-12 text-success">98% Streak</div>
                            </div>
                            <div class="clan-item">
                                <div class="clan-rank">2</div>
                                <div class="flex-fill f-14">Siti Aminah</div>
                                <div class="f-12 text-muted">92% Streak</div>
                            </div>
                            <div class="clan-item">
                                <div class="clan-rank">3</div>
                                <div class="flex-fill f-14">Agus Pratama</div>
                                <div class="f-12 text-muted">85% Streak</div>
                            </div>
                        </div>
                        
                        <div class="m-t-20 p-2 bg-gradient-soft rounded text-center">
                            <h6 class="f-14 font-weight-bold m-b-5">Study Challenge!</h6>
                            <p class="f-11 text-muted">Selesaikan 5 Quiz Writing untuk Clan Bonus.</p>
                        </div>
                    </div>
                </div>

                <!-- Skill Summary (Previously Block 4) - Integrated as Mini-Card -->
                <div class="dashboard-card">
                    <div class="card-body-ai p-3">
                        <div class="radar-chart-container" style="max-width: 250px; margin: 0 auto;">
                            <canvas id="skillRadar"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<!-- [Module 1] AI Study Assistant: Contextual Chatbox -->
<div class="ai-chat-box shadow-lg">
    <div class="chat-header">
        <span class="material-icons f-18">smart_toy</span>
        <span>AI Study Assistant</span>
    </div>
    <div class="chat-body d-flex flex-column">
        <div class="chat-bubble bubble-ai">
            Halo! Saya melihat Anda sudah menyelesaikan 40% materi Writing. Ingin menjadwalkan latihan tambahan hari ini?
        </div>
        <div class="chat-bubble bubble-user">
            Iya, bantu aku fokus ke Essay Structure.
        </div>
        <div class="chat-bubble bubble-ai">
            Tentu! Saya telah menambahkan "Deep Dive: Essay Structure" ke Roadmap Anda jam 4 sore nanti.
        </div>
    </div>
    <div class="chat-footer">
        <div class="input-group">
            <input type="text" class="form-control form-control-sm" placeholder="Tanya AI Assistant...">
            <div class="input-group-append">
                <button class="btn btn-sm btn-primary"><span class="material-icons f-14">send</span></button>
            </div>
        </div>
    </div>
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
    // Initialize Skill Radar Chart
    const ctx = document.getElementById('skillRadar').getContext('2d');
    const skillRadar = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Listening', 'Reading', 'Writing', 'Speaking'],
            datasets: [{
                label: 'Current Skill',
                data: [65, 59, 45, 40],
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                pointBorderColor: '#fff'
            }, {
                label: 'IELTS 6.5 Target',
                data: [80, 80, 75, 75],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                borderColor: 'rgba(255, 99, 132, 0.5)',
                borderDash: [5, 5],
                pointBackgroundColor: 'rgba(255, 99, 132, 0.5)',
                pointBorderColor: '#fff'
            }]
        },
        options: {
            elements: { line: { borderWidth: 3 } },
            scales: {
                r: {
                    angleLines: { display: false },
                    suggestedMin: 0,
                    suggestedMax: 100
                }
            },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Interactivity: Update Path
    function updatePath(type) {
        $('.flex-option-card').removeClass('active');
        $(event.currentTarget).addClass('active');

        const badge = $('.success-badge');
        const note = $('#path-note');

        if(type === 'budget') {
            badge.text('Probability: 72%').removeClass('success-high').addClass('success-mid');
            note.text('*Pilihan Hemat: Durasi belajar menjadi 6 bulan dengan sesi mandiri lebih banyak.');
        } else if(type === 'fast') {
            badge.text('Probability: 94%').removeClass('success-mid').addClass('success-high');
            note.text('*Pilihan Intensif: Sesi live class ditambah 2x/minggu untuk progress kilat.');
        } else {
            badge.text('Probability: 88%').removeClass('success-mid').addClass('success-high');
            note.text('*Pilihan Seimbang: Target 4 bulan dengan porsi belajar ideal.');
        }
    }
</script>

</body>
</html>
