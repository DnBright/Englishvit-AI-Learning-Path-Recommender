@extends('layouts.lms-layout')

@section('title', 'Clan System')
@section('nav_clan', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center m-b-30">
    <div>
        <h2 class="font-weight-bold primary-text m-b-5">👥 Clan System</h2>
        <p class="text-muted f-14 mb-0">Belajar lebih semangat bersama komunitas yang satu visi.</p>
    </div>
    <div class="text-right">
        <span class="f-12 font-weight-bold d-block">Clan: <span class="accent-text">Target IELTS 6.5</span></span>
        <span class="f-10 text-muted">24 Members Active</span>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="dashboard-card pd-30">
            <div class="d-flex justify-content-between align-items-center m-b-25">
                <h5 class="font-weight-bold mb-0">Weekly Leaderboard</h5>
                <button class="btn btn-xs btn-link accent-text font-weight-bold">Lihat Semua</button>
            </div>
            
            <div class="clan-board p-0 shadow-none">
                <!-- Rank 1 -->
                <div class="clan-item hover-bg-light rounded-lg transition-300">
                    <div class="clan-rank bg-warning text-white shadow-sm">1</div>
                    <div class="avatar-sm rounded-circle bg-primary-light text-primary d-flex-center justify-center font-weight-bold">B</div>
                    <div class="flex-fill">
                        <h6 class="m-b-5 font-weight-bold f-14">Budi Santoso</h6>
                        <div class="progress" style="height: 4px; width: 60%;">
                            <div class="progress-bar bg-success" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold primary-text">450 XP</span>
                        <p class="f-10 text-muted mb-0">🔥 5 Day Streak</p>
                    </div>
                </div>

                <!-- Rank 2 -->
                <div class="clan-item hover-bg-light rounded-lg transition-300">
                    <div class="clan-rank">2</div>
                    <div class="avatar-sm rounded-circle bg-info-light text-info d-flex-center justify-center font-weight-bold">S</div>
                    <div class="flex-fill">
                        <h6 class="m-b-5 font-weight-bold f-14">Siti Aminah</h6>
                        <div class="progress" style="height: 4px; width: 60%;">
                            <div class="progress-bar bg-success" style="width: 90%;"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold primary-text">410 XP</span>
                    </div>
                </div>

                <!-- Rank 3 -->
                <div class="clan-item hover-bg-light rounded-lg transition-300">
                    <div class="clan-rank">3</div>
                    <div class="avatar-sm rounded-circle bg-warning-light text-warning d-flex-center justify-center font-weight-bold">A</div>
                    <div class="flex-fill">
                        <h6 class="m-b-5 font-weight-bold f-14">Agus Pratama</h6>
                        <div class="progress" style="height: 4px; width: 60%;">
                            <div class="progress-bar bg-success" style="width: 82%;"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold primary-text">380 XP</span>
                    </div>
                </div>

                <!-- You -->
                <div class="clan-item bg-info-lighter rounded-lg m-t-15 border border-info-light">
                    <div class="clan-rank bg-info text-white">4</div>
                    <div class="avatar-sm rounded-circle bg-info text-white d-flex-center justify-center font-weight-bold">Y</div>
                    <div class="flex-fill">
                        <h6 class="m-b-5 font-weight-bold f-14">You (Student)</h6>
                        <div class="progress" style="height: 4px; width: 60%;">
                            <div class="progress-bar bg-info" style="width: 70%;"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold accent-text">320 XP</span>
                        <p class="f-10 text-muted mb-0">+20 XP to Rank Up</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-card pd-25 bg-gradient-premium text-white border-0 shadow-lg position-relative overflow-hidden">
            <div class="pos-rel" style="z-index: 2;">
                <h6 class="text-white font-weight-bold m-b-15 d-flex align-items-center">
                    <span class="material-icons m-r-10 text-warning">workspace_premium</span>
                    Elite Challenge
                </h6>
                <p class="f-13 opacity-8 m-b-20">Selesaikan 1 jam belajar mandiri berturut-turut hari ini untuk mendapatkan Badge "Elite Warrior".</p>
                <div class="bg-white-10 p-3 rounded-lg border border-white-20 m-b-20">
                    <div class="d-flex justify-content-between f-11 m-b-5">
                        <span>Progress Mingguan</span>
                        <span>2/3 Hari</span>
                    </div>
                    <div class="progress" style="height: 6px; background: rgba(255,255,255,0.1);">
                        <div class="progress-bar bg-warning" style="width: 66%;"></div>
                    </div>
                </div>
                <button class="btn btn-sm btn-info w-100 font-weight-bold shadow-sm">Ikuti Challenge</button>
            </div>
            <span class="material-icons position-absolute" style="bottom: -20px; right: -20px; font-size: 120px; opacity: 0.1; color: white;">military_tech</span>
        </div>
    </div>
</div>

<style>
    .avatar-sm { width: 35px; height: 35px; font-size: 14px; }
    .bg-primary-light { background: #eef2ff; }
    .bg-info-light { background: #e0f2fe; }
    .bg-warning-light { background: #fef3c7; }
    .hover-bg-light:hover { background: #f8fafc; }
    .transition-300 { transition: all 0.3s ease; }
    .bg-info-lighter { background: #f0f9ff; }
    .border-info-light { border-color: #bae6fd !important; }
</style>
@endsection
