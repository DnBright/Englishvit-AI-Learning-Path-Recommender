@extends('layouts.lms-layout')

@section('title', 'Core Roadmap | My Success Path')
@section('nav_roadmap', 'active')
@section('topbar_title', 'Core Roadmap Details')

@section('content')
<!-- Dark Header with AI Badge -->
<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom" style="border-color: rgba(255,255,255,0.05) !important;">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold mb-0 text-white font-sora">Roadmap Target</h4>
            <div class="bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill d-flex align-items-center" style="font-size: 10px; font-weight: 800; border: 1px solid rgba(74, 222, 128, 0.2);">
                <span class="material-icons f-12 me-1">auto_awesome</span> AI GENERATED
            </div>
        </div>
        <p class="text-muted f-14 mb-0">Rencana studi terperinci berdasarkan profil awal Anda.</p>
    </div>
    <div class="text-end d-none d-md-block">
        <p class="mb-0 text-muted f-12">Estimasi Timeline</p>
        <h5 class="fw-bold text-white mb-0">4 Bulan Intensif</h5>
    </div>
</div>

<!-- High-Fidelity Stats Cards (Dark Mode) -->
<div class="row mb-5">
    <div class="col-md-4 mb-3">
        <div class="eco-card h-100 position-relative">
            <div class="d-flex justify-content-between mb-3">
                <h6 class="text-muted fw-bold f-12 text-uppercase mb-0">Completion Rate</h6>
                <span class="material-icons text-success opacity-7">trending_up</span>
            </div>
            <h2 class="fw-bold text-white mb-1">20%</h2>
            <div class="progress mt-3" style="height: 6px; border-radius: 10px; background-color: #333333;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 20%; border-radius: 10px; box-shadow: 0 0 10px rgba(74, 222, 128, 0.4);" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="f-11 text-muted mt-2 mb-0">12 dari 60 sesi terselesaikan</p>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="eco-card h-100 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e1b4b 0%, #0d0d0d 100%);">
            <div class="position-absolute opacity-2" style="right: -20px; top: -20px;">
                <span class="material-icons" style="font-size: 120px; color: #818cf8;">track_changes</span>
            </div>
            <div class="position-relative z-index-1">
                <div class="d-flex justify-content-between mb-3">
                    <h6 class="text-white opacity-50 fw-bold f-12 text-uppercase mb-0">Primary Target</h6>
                </div>
                <h2 class="fw-bold text-white mb-1">IELTS 6.5</h2>
                <div class="mt-3 pt-3 border-top" style="border-color: rgba(255,255,255,0.05) !important;">
                    <p class="f-14 text-white mb-0 opacity-75"><span class="fw-bold text-indigo-300">Fokus Kelemahan:</span> Speaking & Writing Task 2</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="eco-card h-100">
            <div class="d-flex mb-3 align-items-center">
                <div class="bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                    <span class="material-icons f-20 text-warning" style="text-shadow: 0 0 10px rgba(234, 179, 8, 0.5);">lightbulb</span>
                </div>
                <h6 class="fw-bold text-white mb-0">AI Insight & Probability</h6>
            </div>
            <p class="text-muted f-13 mb-0 line-height-normal">Tingkat akurasi Listening meningkat tajam! Disarankan menambah <b>2 sesi ekstra</b> untuk Writing guna mengamankan Band 6.5 Anda. Estimasi peluang sukses: <strong class="text-success">85%</strong>.</p>
        </div>
    </div>
</div>

<style>
    /* Dark Theme Tabs & Tables */
    .eco-nav-pills .nav-link {
        color: #b4b4b4;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 8px;
        padding: 10px 20px;
        margin-right: 8px;
        font-size: 14px;
        transition: all 0.2s ease;
    }
    .eco-nav-pills .nav-link:hover {
        background: #212121;
        color: #fff;
    }
    .eco-nav-pills .nav-link.active {
        background: #212121;
        color: white;
        border-color: rgba(255,255,255,0.2);
    }
    .eco-nav-pills .nav-link.locked {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Dark Table Styles */
    .eco-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    .eco-table th {
        background: #111111;
        color: #676767;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 11px;
        padding: 12px 20px;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .eco-table td {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        vertical-align: middle;
        transition: background 0.2s;
    }
    .eco-table tbody tr:hover td {
        background: rgba(255,255,255,0.02);
    }
    
    .eco-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 4px;
        text-transform: uppercase;
    }
    .eco-badge.live { background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); }
    .eco-badge.video { background: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); }
    .eco-badge.quiz { background: rgba(168, 85, 247, 0.1); color: #a855f7; border: 1px solid rgba(168, 85, 247, 0.2); }
    
    .eco-status { font-size: 12px; font-weight: 600; display: flex; align-items: center; gap: 6px; }
    .eco-status.done { color: #4ade80; }
    .eco-status.active { color: #60a5fa; }
    .eco-status.locked { color: #555555; }

    .eco-btn-sm {
        background: #333333;
        color: #fff;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        transition: background 0.2s;
        text-decoration: none;
    }
    .eco-btn-sm:hover { background: #444444; color: #fff; }
    .eco-btn-primary {
        background: #ffffff;
        color: #000000;
        box-shadow: 0 0 10px rgba(255,255,255,0.1);
    }
    .eco-btn-primary:hover {
        background: #dddddd;
        color: #000000;
    }

    .text-indigo-300 { color: #a5b4fc; }
</style>

<!-- Modern Tab Navigation -->
<ul class="nav nav-pills eco-nav-pills mb-4" id="roadmapTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="month1-tab" data-bs-toggle="pill" data-bs-target="#month1" type="button" role="tab" aria-controls="month1" aria-selected="true">
            <span class="fw-bold">Phase 1: Foundation (Weeks 1-4)</span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="month2-tab" data-bs-toggle="pill" data-bs-target="#month2" type="button" role="tab" aria-controls="month2" aria-selected="false">
            <span class="fw-bold">Phase 2: Core Skills</span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link locked" disabled>
            <span class="fw-bold">Phase 3: Intensive Practice</span>
            <span class="material-icons f-14 ms-1">lock</span>
        </button>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content" id="roadmapTabsContent">
    
    <!-- Phase 1 (ACTIVE) -->
    <div class="tab-pane fade show active" id="month1" role="tabpanel" aria-labelledby="month1-tab">
        <div class="eco-card p-0 overflow-hidden mb-4 border-0">
            <div class="p-4" style="background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.05);">
                <h5 class="fw-bold text-white mb-1">Unit 1 & 2 Task Breakdown</h5>
                <p class="text-muted f-13 mb-0">Rincian aktivitas mingguan berdasarkan Core Roadmap.</p>
            </div>
            
            <div class="table-responsive">
                <table class="eco-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;" class="text-center">#</th>
                            <th>Materi / Aktivitas</th>
                            <th>Tipe</th>
                            <th class="text-center">Status</th>
                            <th class="text-end" style="padding-right: 24px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Completed Item -->
                        <tr>
                            <td class="text-center"><span class="material-icons text-success f-18">check_circle</span></td>
                            <td>
                                <h6 class="fw-bold f-14 mb-1 text-white">Diagnostic Grammar Test</h6>
                                <span class="f-12 text-muted">Test awal 50 soal untuk base-lining.</span>
                            </td>
                            <td><span class="eco-badge quiz">Assessment</span></td>
                            <td class="text-center"><div class="eco-status done justify-content-center">Done</div></td>
                            <td class="text-end" style="padding-right: 24px;">
                                <button class="eco-btn-sm">Review</button>
                            </td>
                        </tr>

                        <!-- In Progress Item -->
                        <tr style="background: rgba(96, 165, 250, 0.05);">
                            <td class="text-center">
                                <span class="material-icons f-18" style="color: #60a5fa; text-shadow: 0 0 10px rgba(96, 165, 250, 0.5);">play_circle</span>
                            </td>
                            <td>
                                <h6 class="fw-bold f-14 mb-1" style="color: #60a5fa;">Live Zoom: Listening Overview</h6>
                                <span class="f-12 text-muted">Akan dimulai hari ini, 19:00 WIB.</span>
                            </td>
                            <td><span class="eco-badge live">Live Class</span></td>
                            <td class="text-center"><div class="eco-status active justify-content-center">Next Up</div></td>
                            <td class="text-end" style="padding-right: 24px;">
                                <a href="/dashboard-study/classes" class="eco-btn-sm eco-btn-primary">Join Zoom</a>
                            </td>
                        </tr>

                        <!-- Pending Item -->
                        <tr>
                            <td class="text-center"><span class="material-icons text-muted f-18 opacity-5">radio_button_unchecked</span></td>
                            <td>
                                <h6 class="fw-bold f-14 mb-1 text-white">Grammar: Complex Sentences</h6>
                                <span class="f-12 text-muted">Materi self-learning video durasi 15 menit.</span>
                            </td>
                            <td><span class="eco-badge video">Video Lesson</span></td>
                            <td class="text-center"><div class="eco-status text-muted justify-content-center">Pending</div></td>
                            <td class="text-end" style="padding-right: 24px;">
                                <a href="/dashboard-study/classes" class="eco-btn-sm">Watch</a>
                            </td>
                        </tr>
                        
                        <!-- Locked Item -->
                        <tr>
                            <td class="text-center"><span class="material-icons text-muted f-18 opacity-2">lock</span></td>
                            <td>
                                <h6 class="fw-bold f-14 mb-1 text-muted opacity-5">Quiz: Identifying Key Information</h6>
                                <span class="f-12 text-muted opacity-25">Selesaikan Live Class sebelumnya untuk membuka tugas ini.</span>
                            </td>
                            <td><span class="eco-badge" style="background:#222; color:#555;">Quiz</span></td>
                            <td class="text-center"><div class="eco-status locked justify-content-center"><span class="material-icons f-14">lock</span></div></td>
                            <td class="text-end" style="padding-right: 24px;">
                                <button class="eco-btn-sm" disabled style="opacity:0.3; cursor:not-allowed;">Locked</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div> 

    <!-- Phase 2 (Empty/Locked State) -->
    <div class="tab-pane fade" id="month2" role="tabpanel" aria-labelledby="month2-tab">
        <div class="eco-card text-center py-5">
            <span class="material-icons text-muted mb-3" style="font-size: 64px; opacity: 0.2;">lock_clock</span>
            <h5 class="fw-bold text-muted mb-2">Phase 2: Core Skills is Locked</h5>
            <p class="f-14 text-muted mx-auto" style="max-width:400px; opacity: 0.7;">Buktikan dedikasi Anda dengan menyelesaikan minimal 80% dari target Phase 1 (Foundation) untuk membuka akses ke modul Core Skills.</p>
        </div>
    </div>

</div>
@endsection
