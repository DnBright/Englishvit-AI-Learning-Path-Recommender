@extends('layouts.lms-layout')

@section('title', 'Your Success Path')
@section('nav_roadmap', 'active')

@section('content')
<div class="ev-path-wrapper">
    <!-- Success Path Progress Header -->
    <div class="ev-progress-nav">
        <div>
            <h4 class="font-weight-bold primary-text mb-0">IELTS Academy Journey</h4>
            <p class="text-muted f-12 mb-0">Progress: 2 / 6 Milestones Completed</p>
        </div>
        <div class="d-flex align-items-center gap-15">
            <div class="text-right d-none d-md-block">
                <span class="f-11 font-weight-bold text-uppercase text-muted d-block">Next Milestone</span>
                <span class="f-13 font-weight-bold accent-text">Reading Mastery</span>
            </div>
            <div class="bg-info-1 pd-10 rounded-circle d-flex-center justify-center" style="width: 45px; height: 45px;">
                <span class="material-icons accent-text">trending_up</span>
            </div>
        </div>
    </div>

    <!-- Success Path Timeline -->
    <div class="ev-path-timeline">
        <!-- Milestone 1: Completed -->
        <div class="ev-milestone" onclick="alert('Stage 1: Placement & Foundation - Completed')">
            <div class="ev-node completed">
                <span class="material-icons">check</span>
            </div>
            <div class="ev-milestone-card">
                <span class="stage-label">Stage 1</span>
                <h5>Placement & Foundation</h5>
                <p>Initial assessment and fundamental grammar preparation.</p>
            </div>
        </div>

        <!-- Milestone 2: Completed -->
        <div class="ev-milestone" onclick="alert('Stage 2: Core Listening Strategies - Completed')">
            <div class="ev-node completed">
                <span class="material-icons">check</span>
            </div>
            <div class="ev-milestone-card">
                <span class="stage-label">Stage 2</span>
                <h5>Core Listening Strategies</h5>
                <p>Mastering accent recognition and data sets.</p>
            </div>
        </div>

        <!-- Milestone 3: Active -->
        <div class="ev-milestone active" onclick="alert('Stage 3: Advanced Reading Task 1 - In Progress')">
            <div class="ev-node active">
                <span class="material-icons">play_arrow</span>
            </div>
            <div class="ev-milestone-card active">
                <span class="stage-label">Stage 3 • Active</span>
                <h5>Advanced Reading Task 1</h5>
                <p>Mastering skimming, scanning, and identifying keywords.</p>
            </div>
        </div>

        <!-- Milestone 4: Locked -->
        <div class="ev-milestone locked">
            <div class="ev-node locked">
                <span class="material-icons">lock</span>
            </div>
            <div class="ev-milestone-card">
                <span class="stage-label">Stage 4</span>
                <h5>Writing Cohesion & Logic</h5>
                <p>Structuring academic essays with clear transitions.</p>
            </div>
        </div>

        <!-- Milestone 5: Locked -->
        <div class="ev-milestone locked">
            <div class="ev-node locked">
                <span class="material-icons">lock</span>
            </div>
            <div class="ev-milestone-card">
                <span class="stage-label">Stage 5</span>
                <h5>Speaking Fluency & Lexical</h5>
                <p>Natural conversation and idiomatic expressions.</p>
            </div>
        </div>

        <!-- Milestone 6: Goal -->
        <div class="ev-milestone locked">
            <div class="ev-node locked" style="border-radius: 12px; border-style: dashed;">
                <span class="material-icons">military_tech</span>
            </div>
            <div class="ev-milestone-card" style="border-style: dashed;">
                <span class="stage-label">Final Goal</span>
                <h5>IELTS Success (Target 7.0+)</h5>
                <p>Full simulation and official test preparation.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Auto-scroll to the active milestone
        const activeNode = $('.ev-milestone.active')[0];
        if (activeNode) {
            activeNode.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection
