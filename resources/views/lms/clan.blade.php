@extends('layouts.lms-layout')

@section('title', 'Clan System')
@section('nav_clan', 'active')

@section('content')
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
                <div class="clan-item">
                    <div class="clan-rank">4</div>
                    <div class="flex-fill">You (Student)</div>
                    <div class="badge badge-info">320 XP</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-card pd-20 bg-primary-8 text-white">
            <h6 class="text-white font-weight-bold">Accountability Challenge</h6>
            <p class="f-12 opacity-8">Selesaikan 1 jam belajar mandiri berturut-turut hari ini untuk mendapatkan Badge "Elite Warrior".</p>
            <button class="btn btn-sm btn-info w-100 font-weight-bold">Ikuti Challenge</button>
        </div>
    </div>
</div>
@endsection
