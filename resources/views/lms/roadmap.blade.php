@section('content')
<div class="d-flex justify-content-between align-items-center m-b-30">
    <div>
        <h2 class="font-weight-bold primary-text m-b-5">🗺️ Core Roadmap</h2>
        <p class="text-muted f-14 mb-0">Rencana personal Anda untuk mencapai target IELTS 6.5</p>
    </div>
    <div class="text-right">
        <span class="badge badge-pill badge-primary p-x-15 p-y-10">Fase 1: Foundation</span>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Next Action Highlight -->
        <div class="dashboard-card pd-25 m-b-30 bg-gradient-premium text-white border-0 shadow-lg">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="text-white font-weight-bold m-b-10">Misi Berikutnya: Reading Mastery</h5>
                    <p class="opacity-8 f-13 m-b-20">Selesaikan 3 modul Reading Task 1 untuk membuka akses ke simulasi Full Mock Test.</p>
                    <button class="btn btn-sm btn-info font-weight-bold p-x-20">Lanjutkan Belajar Sekarang</button>
                </div>
                <div class="col-md-4 text-center d-none d-md-block">
                    <span class="material-icons" style="font-size: 80px; opacity: 0.3;">rocket_launch</span>
                </div>
            </div>
        </div>

        <div class="dashboard-card pd-30">
            <div class="d-flex justify-content-between align-items-center m-b-25">
                <h5 class="font-weight-bold mb-0">Progress Milestone</h5>
                <h6 class="font-weight-bold accent-text mb-0">42% Selesai</h6>
            </div>
            
            <div class="progress m-b-30" style="height: 12px; border-radius: 10px; background: #edf2f7;">
                <div class="progress-bar bg-info shadow-sm" style="width: 42%;"></div>
            </div>

            <div class="timeline-path m-b-30">
                <div class="timeline-step active" title="Bulan 1">M1</div>
                <div class="timeline-step" title="Bulan 2">M2</div>
                <div class="timeline-step" title="Bulan 3">M3</div>
                <div class="timeline-step" title="Bulan 4">M4</div>
            </div>

            <div class="bg-light p-4 rounded-xl border-left-blue">
                <h6 class="font-weight-bold m-b-10">Bulan Ini: Grammar & Structure Focus</h6>
                <p class="f-13 text-muted m-b-0">
                    Fokus pada penggunaan tenses untuk Writing Task 1. <br>
                    <strong>Target:</strong> Memahami 12 tenses dasar dalam 2 minggu pertama.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="dashboard-card pd-25 m-b-30">
            <h6 class="font-weight-bold m-b-20 d-flex align-items-center">
                <span class="material-icons f-18 m-r-10 text-primary">analytics</span>
                Skill Radar
            </h6>
            <div class="radar-chart-container" style="height: 280px; position: relative;">
                <canvas id="skillRadar"></canvas>
            </div>
            <div class="m-t-20 text-center">
                <p class="f-12 text-muted italic">"Writing Anda butuh perhatian lebih minggu ini!"</p>
            </div>
        </div>

        <div class="dashboard-card pd-20">
            <h6 class="font-weight-bold m-b-15">Kelemahan Utama</h6>
            <div class="d-flex align-items-center m-b-10">
                <span class="badge badge-warning-soft text-warning m-r-10">Writing</span>
                <div class="progress flex-fill" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 45%;"></div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="badge badge-danger-soft text-danger m-r-10">Speaking</span>
                <div class="progress flex-fill" style="height: 6px;">
                    <div class="progress-bar bg-danger" style="width: 35%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('skillRadar').getContext('2d');
    new Chart(ctx, {
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
            maintainAspectRatio: false,
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
</script>
@endsection
