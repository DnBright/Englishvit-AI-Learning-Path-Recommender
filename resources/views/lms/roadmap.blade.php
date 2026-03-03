@extends('layouts.lms-layout')

@section('title', 'Core Roadmap')
@section('nav_roadmap', 'active')

@section('content')
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
            <div class="radar-chart-container" style="height: 300px;">
                <canvas id="skillRadar"></canvas>
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
