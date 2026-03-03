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
            <!-- Left Column: Content Blocks -->
            <div class="col-lg-8">
                
                <!-- [Block 1] Summary Profil User -->
                <div class="dashboard-card border-left-blue">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons accent-text">person_search</span>
                            Summary Profil Anda
                        </h5>
                    </div>
                    <div class="card-body-ai">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="m-b-15 d-flex align-items-center">
                                        <span class="material-icons m-r-10 f-18 text-muted">bar_chart</span>
                                        <span>Level: <strong>Intermediate (B1)</strong></span>
                                    </li>
                                    <li class="m-b-15 d-flex align-items-center">
                                        <span class="material-icons m-r-10 f-18 text-muted">track_changes</span>
                                        <span>Target: <strong>IELTS 6.5 (4 Bulan)</strong></span>
                                    </li>
                                    <li class="m-b-15 d-flex align-items-center">
                                        <span class="material-icons m-r-10 f-18 text-muted">schedule</span>
                                        <span>Waktu: <strong>1 Jam / Hari</strong></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 border-left">
                                <div class="bg-gradient-soft p-3 rounded">
                                    <p class="f-14 m-b-0"><strong>🤖 AI Insight:</strong></p>
                                    <p class="f-13 italic text-muted">"Anda memiliki dasar Grammar yang kuat, namun perlu fokus intensif pada <strong>Speaking Fluency</strong> untuk mencapai target Band 6.5."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- [Block 2] Rekomendasi Utama (Primary Path) -->
                <div class="dashboard-card">
                    <div class="card-header-ai d-flex justify-between align-items-center">
                        <h5 class="card-title-ai">
                            <span class="material-icons text-warning">local_fire_department</span>
                            🔥 Recommended Path: Direct to Success
                        </h5>
                        <div class="success-badge success-high">
                            Probability: 88%
                        </div>
                    </div>
                    <div class="card-body-ai">
                        <div class="timeline-path">
                            <div class="timeline-step active" title="Bulan 1: Foundation">1</div>
                            <div class="timeline-step" title="Bulan 2: Skill Focus">2</div>
                            <div class="timeline-step" title="Bulan 3: Intensive Practice">3</div>
                            <div class="timeline-step" title="Bulan 4: Exam Simulation">4</div>
                        </div>
                        <div class="row m-t-20 text-center">
                            <div class="col-3 f-12 font-weight-bold primary-text">Foundation</div>
                            <div class="col-3 f-12 text-muted">Skill Focus</div>
                            <div class="col-3 f-12 text-muted">Practice</div>
                            <div class="col-3 f-12 text-muted">Exam Mode</div>
                        </div>
                        <div class="m-t-30 p-3 border rounded bg-light">
                            <h6 class="font-weight-bold m-b-5">Fase Saat Ini: Bulan 1 (Foundation)</h6>
                            <p class="f-13 m-0">Fokus pada pemantapan kosakata akademik dan pola kalimat kompleks.</p>
                        </div>
                    </div>
                </div>

                <!-- [Block 3] Alternatif Cara Belajar (Flexible Path) -->
                <div class="dashboard-card">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons accent-text">Tune</span>
                            Flexible Paths: Pilih Sesuai Kondisi
                        </h5>
                    </div>
                    <div class="card-body-ai">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="flex-option-card p-3 rounded border text-center m-b-10 active" onclick="updatePath('balanced')">
                                    <h6 class="font-weight-bold">Seimbang</h6>
                                    <p class="f-12 text-muted m-b-5">Standard Pace</p>
                                    <div class="f-14 accent-text font-weight-bold">Normal Price</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flex-option-card p-3 rounded border text-center m-b-10" onclick="updatePath('budget')">
                                    <h6 class="font-weight-bold">Hemat</h6>
                                    <p class="f-12 text-muted m-b-5">Slow Pace</p>
                                    <div class="f-14 accent-text font-weight-bold">-20% Cost</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="flex-option-card p-3 rounded border text-center m-b-10" onclick="updatePath('fast')">
                                    <h6 class="font-weight-bold">Intensif</h6>
                                    <p class="f-12 text-muted m-b-5">Turbo Pace</p>
                                    <div class="f-14 accent-text font-weight-bold">+15% Success</div>
                                </div>
                            </div>
                        </div>
                        <div id="path-note" class="f-13 text-center m-t-15 text-muted italic">
                            *Setiap pilihan akan menyesuaikan durasi belajar dan tingkat intensitas materi.
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Stats & Actions -->
            <div class="col-lg-4">
                
                <!-- [Block 4] Breakdown Timeline & Outcome -->
                <div class="dashboard-card">
                    <div class="card-header-ai">
                        <h5 class="card-title-ai">
                            <span class="material-icons text-success">analytics</span>
                            Outcome Breakdown
                        </h5>
                    </div>
                    <div class="card-body-ai">
                        <div class="m-b-30">
                            <p class="f-14 font-weight-bold m-b-5">Completion Progress</p>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 12%;" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="f-12 text-right m-t-5 text-muted">12% dari target 100%</p>
                        </div>

                        <div class="radar-chart-container">
                            <canvas id="skillRadar"></canvas>
                        </div>
                        <div class="text-center m-t-20">
                            <p class="f-12 text-muted">Visualisasi penguasaan skill Anda saat ini vs Target.</p>
                        </div>
                    </div>
                </div>

                <!-- [Block 5] Call to Action (Upsell) -->
                <div class="dashboard-card bg-primary-8 text-white" style="border: none;">
                    <div class="card-body-ai">
                        <h5 class="text-white font-weight-bold m-b-10">🚀 Tingkatkan Kecepatan!</h5>
                        <p class="f-13 opacity-8">Dapatkan <strong>One-on-One Coaching</strong> untuk feedback menulis essay secara real-time.</p>
                        
                        <div class="upsell-strip m-t-20">
                            <div>
                                <h6 class="text-white m-0">+12.5% Success</h6>
                                <p class="f-11 m-0 opacity-8">AI-Guided Mentoring</p>
                            </div>
                            <button class="btn btn-sm btn-white text-primary font-weight-bold">Upgrade Now</button>
                        </div>
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
