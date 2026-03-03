@extends('layouts.lms-layout')

@section('title', 'Integrated Calendar')
@section('nav_calendar', 'active')

@section('content')
<h2 class="font-weight-bold primary-text m-b-20">📅 Integrated Calendar</h2>
<div class="dashboard-card pd-30">
    <div class="row">
        <div class="col-md-4">
            <div class="pd-20 bg-gradient-soft rounded">
                <h6 class="font-weight-bold"><span class="material-icons f-16 m-r-5">event</span> Upcoming</h6>
                <hr>
                <div class="p-2 m-b-10 border-left-blue bg-white rounded shadow-sm">
                    <span class="f-12 font-weight-bold">Besok, 19:00</span>
                    <p class="f-13 m-b-0">Live Class #4: Listening Tips</p>
                </div>
                <div class="p-2 m-b-10 border-left-warning bg-white rounded shadow-sm">
                    <span class="f-12 font-weight-bold">8 Mar, 08:00</span>
                    <p class="f-13 m-b-0">Mock Test #1 (Full Simulation)</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="calendar-grid">
                <!-- Headers -->
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Sen</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Sel</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Rab</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Kam</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Jum</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Sab</div>
                <div class="calendar-day font-weight-bold text-center bg-light py-2" style="min-height: auto;">Min</div>
                <!-- Days -->
                @for($i=1; $i<=28; $i++)
                <div class="calendar-day @if($i > 7 && $i < 30) bg-white @else bg-light text-muted @endif">
                    <span class="f-12 font-weight-bold">{{ $i % 31 + 1 }}</span>
                    @if($i == 10)
                        <div class="badge badge-info f-10 d-block m-t-5">Live Zoom</div>
                    @endif
                    @if($i == 15)
                        <div class="badge badge-warning f-10 d-block m-t-5">Mock Test</div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
