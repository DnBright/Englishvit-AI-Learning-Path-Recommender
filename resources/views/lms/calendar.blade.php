@extends('layouts.lms-layout')

@section('title', 'Integrated Calendar')
@section('nav_calendar', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center m-b-30">
    <div>
        <h2 class="font-weight-bold primary-text m-b-5">📅 Integrated Calendar</h2>
        <p class="text-muted f-14 mb-0">Sinkronisasi otomatis dengan jadwal Live Zoom & Class Anda.</p>
    </div>
    <div class="d-flex align-items-center bg-white pd-s-15 pd-e-15 pd-t-8 pd-b-8 rounded-pill shadow-sm border">
        <span class="material-icons text-success f-14 m-r-8">sync</span>
        <span class="f-12 font-weight-bold">Terakhir diupdate: Baru saja</span>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="dashboard-card pd-25 m-b-25 bg-gradient-premium text-white border-0">
            <h6 class="text-white font-weight-bold m-b-20 d-flex align-items-center">
                <span class="material-icons f-18 m-r-10">notifications_active</span>
                Mendatang
            </h6>
            <div class="upcoming-item p-3 m-b-15 bg-white-10 rounded-lg border border-white-20 h-lift">
                <div class="d-flex align-items-center m-b-8">
                    <span class="badge badge-info-light text-info p-x-10 p-y-2 f-10 m-r-10">BESOK</span>
                    <span class="f-11 opacity-7">19:00 WIB</span>
                </div>
                <h6 class="text-white font-weight-bold f-14 m-b-0">Live Class: Speaking Fluency</h6>
            </div>
            <div class="upcoming-item p-3 bg-white-10 rounded-lg border border-white-20 h-lift">
                <div class="d-flex align-items-center m-b-8">
                    <span class="badge badge-warning-light text-warning p-x-10 p-y-2 f-10 m-r-10">MINGGU</span>
                    <span class="f-11 opacity-7">08:00 WIB</span>
                </div>
                <h6 class="text-white font-weight-bold f-14 m-b-0">IELTS Full Simulation</h6>
            </div>
        </div>

        <div class="dashboard-card pd-20">
            <h6 class="font-weight-bold m-b-15">Kustomisasi Jadwal</h6>
            <p class="f-12 text-muted">Ingin memindahkan jadwal belajar mandiri? Klik hari di kalender.</p>
            <button class="btn btn-sm btn-outline-primary w-100 font-weight-bold">Atur Ketersediaan Waktu</button>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="dashboard-card pd-30 overflow-hidden">
            <div class="d-flex justify-content-between align-items-center m-b-25">
                <h5 class="font-weight-bold mb-0">Maret 2026</h5>
                <div class="btn-group border shadow-sm rounded-lg overflow-hidden">
                    <button class="btn btn-white btn-sm px-3"><span class="material-icons f-16">chevron_left</span></button>
                    <button class="btn btn-white btn-sm px-3"><span class="material-icons f-16">chevron_right</span></button>
                </div>
            </div>
            
            <div class="calendar-grid border rounded overflow-hidden">
                <!-- Headers -->
                @php $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']; @endphp
                @foreach($days as $day)
                <div class="calendar-day-header bg-light py-3 text-center border-bottom font-weight-bold f-12 text-uppercase letter-spacing-1">{{ $day }}</div>
                @endforeach
                
                <!-- Days -->
                @for($i=1; $i<=35; $i++)
                    @php 
                        $dayNum = $i - 2; // Offset for Mar 2026 starting on Sunday? No, let's just mock
                        $isToday = ($dayNum == 4);
                        $hasEvent = ($dayNum == 5 || $dayNum == 8 || $dayNum == 15);
                    @endphp
                    <div class="calendar-day p-2 border-right border-bottom {{ $dayNum < 1 || $dayNum > 31 ? 'bg-light-soft opacity-3' : '' }} {{ $isToday ? 'bg-info-lighter' : '' }}">
                        <div class="d-flex justify-content-between">
                            <span class="f-12 font-weight-bold {{ $isToday ? 'accent-text' : '' }}">{{ $dayNum > 0 && $dayNum <= 31 ? $dayNum : '' }}</span>
                            @if($isToday) <span class="dot bg-info"></span> @endif
                        </div>
                        @if($hasEvent)
                            <div class="p-1 m-t-5 rounded f-10 font-weight-bold {{ $dayNum == 8 ? 'bg-warning-light text-warning' : 'bg-info-light text-info' }} truncate">
                                @if($dayNum == 5) Live Zoom @elseif($dayNum == 8) Mock Test @else Coaching @endif
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<style>
    .rounded-lg { border-radius: 12px !important; }
    .bg-white-10 { background: rgba(255,255,255,0.1); }
    .border-white-20 { border-color: rgba(255,255,255,0.2) !important; }
    .bg-info-lighter { background: #f0f7ff; }
    .bg-light-soft { background: #fcfcfd; }
    .letter-spacing-1 { letter-spacing: 1px; }
    .h-lift:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.2s; }
    .truncate { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
</style>
@endsection
