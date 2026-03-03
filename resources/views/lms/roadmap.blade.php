@extends('layouts.lms-layout')

@section('title', 'The Map | My Success Path')
@section('nav_map', 'active')
@section('topbar_title', 'My Success Path Map')

@section('content')
<style>
    /* ChatGPT-Style Map Aesthetic */
    .map-container {
        max-width: 800px;
        margin: 0 auto;
        padding-bottom: 60px;
    }
    
    .map-progress-panel {
        background: #212121;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.05);
        padding: 24px;
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .map-progress-bar-bg {
        flex: 1;
        height: 8px;
        background: #333333;
        border-radius: 10px;
        margin: 0 30px;
        overflow: hidden;
    }

    .map-progress-fill {
        height: 100%;
        background: #4ade80; /* Success green */
        width: 25%;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(74, 222, 128, 0.4);
    }

    /* Vertical Timeline */
    .timeline-wrapper {
        position: relative;
        padding-left: 40px;
    }

    .timeline-line {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 55px;
        width: 2px;
        background: #333333;
        z-index: 1;
    }

    .map-node {
        position: relative;
        z-index: 2;
        display: flex;
        margin-bottom: 40px;
        cursor: pointer;
        opacity: 1;
        transition: all 0.3s ease;
    }

    .map-node:hover {
        transform: translateX(5px);
    }

    .node-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #212121;
        border: 2px solid #555555;
        color: #b4b4b4;
        margin-right: 30px;
        box-shadow: 0 0 0 6px #0d0d0d;
        flex-shrink: 0;
    }

    .node-content {
        background: #212121;
        border: 1px solid rgba(255,255,255,0.05);
        padding: 20px;
        border-radius: 12px;
        flex: 1;
        transition: border 0.2s;
    }

    .map-node:hover .node-content {
        border-color: rgba(255,255,255,0.2);
    }

    /* Node States */
    .node-completed .node-icon {
        background: rgba(74, 222, 128, 0.1);
        border-color: #4ade80;
        color: #4ade80;
    }

    .node-completed .node-content {
        border-left: 3px solid #4ade80;
    }

    .node-active .node-icon {
        background: rgba(96, 165, 250, 0.1);
        border-color: #60a5fa;
        color: #60a5fa;
        box-shadow: 0 0 0 6px #0d0d0d, 0 0 15px rgba(96, 165, 250, 0.5);
    }

    .node-active .node-content {
        border-left: 3px solid #60a5fa;
        background: #252528;
    }

    .node-locked {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .node-locked:hover {
        transform: none;
    }

    .node-locked .node-icon {
        background: #111111;
        border-color: #333333;
        color: #555555;
    }

    .node-checkpoint {
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .node-checkpoint .node-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        transform: rotate(45deg);
        background: #d97706; /* Warning yellow/orange */
        border: none;
        color: white;
        margin-left: -6px;
        box-shadow: 0 0 0 6px #0d0d0d, 0 0 20px rgba(217, 119, 6, 0.4);
    }

    .node-checkpoint .node-icon .material-icons {
        transform: rotate(-45deg);
    }

    .node-checkpoint .node-content {
        border: 1px solid rgba(217, 119, 6, 0.3);
        background: rgba(217, 119, 6, 0.05);
    }

    .tag-status {
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 20px;
        letter-spacing: 0.5px;
    }

    .tag-completed { background: rgba(74, 222, 128, 0.15); color: #4ade80; }
    .tag-active { background: rgba(96, 165, 250, 0.15); color: #60a5fa; }
    .tag-locked { background: rgba(255,255,255,0.05); color: #676767; }

</style>

<div class="map-container animate__animated animate__fadeIn">
    
    <!-- Overall Progress -->
    <div class="map-progress-panel">
        <div>
            <h5 class="fw-bold mb-0 text-white font-sora">IELTS 6.5 Journey</h5>
            <span class="text-muted f-12">Target completion in 4 Months</span>
        </div>
        <div class="map-progress-bar-bg">
            <div class="map-progress-fill"></div>
        </div>
        <div class="text-end">
            <h3 class="fw-bold mb-0" style="color: #4ade80;">25%</h3>
            <span class="text-muted f-12 text-uppercase">Completed</span>
        </div>
    </div>

    <!-- Timeline Journey -->
    <div class="timeline-wrapper">
        <div class="timeline-line"></div>

        <!-- Node 1: Completed -->
        <a href="/dashboard-study/core-roadmap" class="map-node node-completed text-decoration-none">
            <div class="node-icon"><span class="material-icons f-16">done</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="tag-status tag-completed">Completed</span>
                    <span class="text-muted f-12">Week 1</span>
                </div>
                <h6 class="text-white fw-bold mb-1">Unit 1: Diagnostic & Foundation</h6>
                <p class="text-muted f-13 mb-0">Understand your current level and build core vocabulary.</p>
            </div>
        </a>

        <!-- Node 2: Completed -->
        <a href="/dashboard-study/core-roadmap" class="map-node node-completed text-decoration-none">
            <div class="node-icon"><span class="material-icons f-16">done</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="tag-status tag-completed">Completed</span>
                    <span class="text-muted f-12">Week 2-3</span>
                </div>
                <h6 class="text-white fw-bold mb-1">Unit 2: Listening & Reading Basics</h6>
                <p class="text-muted f-13 mb-0">Mastering skimming, scanning, and identifying keywords.</p>
            </div>
        </a>

        <!-- Node 3: Active -->
        <a href="/dashboard-study/core-roadmap" class="map-node node-active text-decoration-none">
            <div class="node-icon"><span class="material-icons f-16">play_arrow</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="tag-status tag-active">In Progress</span>
                    <span class="text-muted f-12">Week 4</span>
                </div>
                <h6 class="text-white fw-bold mb-1">Unit 3: Speaking Part 1 & Grammar</h6>
                <p class="text-muted f-13 mb-0">Focus on fluency, coherence, and avoiding common grammar mistakes.</p>
                <div class="mt-3 pt-3 border-top" style="border-color: rgba(255,255,255,0.05) !important;">
                    <span class="f-12" style="color:#60a5fa;"><span class="material-icons f-14 me-1" style="vertical-align:text-bottom;">auto_awesome</span>AI Analysis: You need 2 more exercises to complete this unit.</span>
                </div>
            </div>
        </a>

        <!-- Checkpoint -->
        <div class="map-node node-locked node-checkpoint">
            <div class="node-icon"><span class="material-icons">flag</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-warning f-12 fw-bold text-uppercase"><span class="material-icons f-14 me-1" style="vertical-align:text-bottom;">emoji_events</span> Phase 1 Checkpoint</span>
                    <span class="text-muted f-12">Mock Test</span>
                </div>
                <h6 class="text-white fw-bold mb-1">Foundation Assessment</h6>
                <p class="text-muted f-13 mb-0">A mini IELTS mock test to validate your readiness for advanced modules. Passing this updates your AI Roadmap.</p>
            </div>
        </div>

        <!-- Node 4: Locked -->
        <div class="map-node node-locked">
            <div class="node-icon"><span class="material-icons f-16">lock</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="tag-status tag-locked">Locked</span>
                    <span class="text-muted f-12">Week 5-6</span>
                </div>
                <h6 class="mb-1" style="color:#888888;">Unit 4: Writing Task 1</h6>
                <p class="text-muted f-13 mb-0">Analyzing charts, graphs, and formatting academic reports.</p>
            </div>
        </div>

        <!-- Node 5: Locked -->
        <div class="map-node node-locked">
            <div class="node-icon"><span class="material-icons f-16">lock</span></div>
            <div class="node-content">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="tag-status tag-locked">Locked</span>
                    <span class="text-muted f-12">Week 7-8</span>
                </div>
                <h6 class="mb-1" style="color:#888888;">Unit 5: Reading Advanced</h6>
                <p class="text-muted f-13 mb-0">Tackling T/F/NG questions and complex academic texts.</p>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    // Add simple entrance stagger animation
    document.addEventListener("DOMContentLoaded", () => {
        const nodes = document.querySelectorAll('.map-node');
        nodes.forEach((node, index) => {
            node.classList.add('animate__animated', 'animate__fadeInUp');
            node.style.animationDelay = `${index * 0.15}s`;
        });
    });
</script>
@endsection
