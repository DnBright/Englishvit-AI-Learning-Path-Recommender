@extends('layouts.lms-layout')

@section('title', 'High-Fidelity Calendar')
@section('nav_calendar', 'active')

@section('content')
<div class="calendar-premium-wrapper">
    <!-- Header V2 -->
    <div class="calendar-header-v2">
        <button class="calendar-nav-btn"><span class="material-icons">chevron_left</span></button>
        <h1 class="calendar-title-large">March <span>2026</span></h1>
        <button class="calendar-nav-btn"><span class="material-icons">chevron_right</span></button>
    </div>

    <!-- Legend -->
    <div class="calendar-legend">
        <div class="legend-item"><span class="legend-dot" style="background: #ff7a2d;"></span>Speaking Class</div>
        <div class="legend-item"><span class="legend-dot" style="background: #3c50e0;"></span>Grammar</div>
        <div class="legend-item"><span class="legend-dot" style="background: #10b981;"></span>TOEFL Prep</div>
        <div class="legend-item"><span class="legend-dot" style="background: #f8d030;"></span>Live Session</div>
    </div>

    <!-- Calendar Grid -->
    <div class="grid-v2">
        @php $days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']; @endphp
        @foreach($days as $day)
            <div class="grid-day-label">{{ $day }}</div>
        @endforeach

        @for($i=1; $i<=31; $i++)
            @php 
                $isToday = ($i == 4);
                $hasDot = in_array($i, [2, 4, 5, 7, 8, 9, 11, 14, 16, 18, 21, 23, 25, 28, 30]);
                $events = [];
                if($i == 2) { $events = [['type'=>'speaking', 'name'=>'Speaking'], ['type'=>'grammar', 'name'=>'Grammar']]; }
                if($i == 4) { $events = [['type'=>'speaking', 'name'=>'Speaking'], ['type'=>'toefl', 'name'=>'TOEFL Prep']]; }
                if($i == 5) { $events = [['type'=>'live', 'name'=>'Live Session']]; }
                if($i == 7) { $events = [['type'=>'grammar', 'name'=>'Grammar']]; }
                if($i == 8) { $events = [['type'=>'toefl', 'name'=>'TOEFL Mock']]; }
                if($i == 9) { $events = [['type'=>'speaking', 'name'=>'Speaking']]; }
                if($i == 11) { $events = [['type'=>'live', 'name'=>'Live Q&A'], ['type'=>'grammar', 'name'=>'Grammar']]; }
                if($i == 14) { $events = [['type'=>'speaking', 'name'=>'Speaking']]; }
                if($i == 16) { $events = [['type'=>'toefl', 'name'=>'TOEFL Prep']]; }
                if($i == 18) { $events = [['type'=>'live', 'name'=>'Live Session']]; }
                if($i == 21) { $events = [['type'=>'speaking', 'name'=>'Speaking'], ['type'=>'grammar', 'name'=>'Grammar']]; }
                if($i == 23) { $events = [['type'=>'toefl', 'name'=>'TOEFL Exam']]; }
                if($i == 25) { $events = [['type'=>'live', 'name'=>'Live Q&A']]; }
                if($i == 28) { $events = [['type'=>'speaking', 'name'=>'Speaking']]; }
                if($i == 30) { $events = [['type'=>'grammar', 'name'=>'Grammar'], ['type'=>'toefl', 'name'=>'TOEFL']]; }
            @endphp
            <div class="calendar-tile {{ $isToday ? 'today' : '' }}">
                <span class="tile-num">{{ $i }}</span>
                @if($hasDot) <span class="today-dot"></span> @endif
                
                <div class="event-stack">
                    @foreach($events as $event)
                        <div class="event-pill pill-{{ $event['type'] }}">{{ $event['name'] }}</div>
                    @endforeach
                </div>
            </div>
        @endfor
    </div>

    <!-- Bottom Row -->
    <div class="row">
        <div class="col-lg-7">
            <div class="schedule-section shadow-sm">
                <div class="schedule-header">
                    <span class="legend-dot" style="background: #ff7a2d; width: 12px; height: 12px;"></span>
                    <h4>Today's Schedule — <span>4 March 2026</span></h4>
                </div>
                <div class="schedule-list">
                    <div class="schedule-item">
                        <div class="schedule-time">07:00</div>
                        <div class="schedule-bar" style="background: #ff7a2d;"></div>
                        <div class="schedule-content">
                            <h6>Morning Speaking Session</h6>
                            <p>Intermediate B2 · Zoom · Mr. Aryo</p>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">09:30</div>
                        <div class="schedule-bar" style="background: #3c50e0;"></div>
                        <div class="schedule-content">
                            <h6>Grammar Mastery — Unit 5</h6>
                            <p>All Levels · Self-paced · Online Module</p>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">13:00</div>
                        <div class="schedule-bar" style="background: #10b981;"></div>
                        <div class="schedule-content">
                            <h6>TOEFL Reading & Listening</h6>
                            <p>Focus: Scimming & Scanning techniques</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="stats-card-yellow shadow-sm">
                <p class="stat-label">Classes this month</p>
                <h2 class="stat-value">18</h2>
                <p class="mb-0 f-12">+4 from last month</p>
                <div class="stat-progress">
                    <div class="progress-fill" style="width: 70%;"></div>
                </div>
            </div>
            <div class="stats-card-dark shadow-sm">
                <p class="stat-label" style="color: #94a3b8;">Hours Studied</p>
                <h2 class="stat-value">26</h2>
                <p class="mb-0 f-12" style="color: #94a3b8;">Focused Learning Time</p>
            </div>
        </div>
    </div>
</div>
@endsection
