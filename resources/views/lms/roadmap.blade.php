@extends('layouts.lms-layout')

@section('title', 'Success Path | Englishvit')
@section('nav_roadmap', 'active')

@section('content')
<div class="row">
    <div class="col-12 m-b-30">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="font-weight-bold primary-text m-b-5" style="font-family: 'Sora', sans-serif;">🏆 My Success Path</h3>
                <p class="text-muted f-15 mb-0" style="font-family: 'Inter', sans-serif;">Your interactive journey to IELTS mastery.</p>
            </div>
            <div class="text-right">
                <div class="badge badge-primary px-3 py-2 rounded-pill f-12 fw-800">25% COMPLETED</div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-20 shadow-sm border pd-40" style="min-height: 800px; position: relative; overflow-x: hidden;">
    <!-- Snake Path Background (Dots) -->
    <div class="duo-roadmap-wrapper">
        <!-- Milestone 1 -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node completed">
                    <span class="material-icons">check</span>
                    <div class="duo-node-tooltip text-center">
                        <p class="mb-1 font-weight-bold text-success">Selesai</p>
                        <h6 class="mb-2 f-13">IELTS Foundation 1</h6>
                        <small class="text-muted">Mastering Basics</small>
                    </div>
                </div>
                <div class="duo-label">Unit 1</div>
            </div>
        </div>

        <!-- Milestone 2 -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node active">
                    <span class="material-icons">play_arrow</span>
                    <div class="duo-node-tooltip text-center">
                        <p class="mb-1 font-weight-bold text-primary f-11">SEDANG BERJALAN</p>
                        <h6 class="mb-2 f-14 fw-800">IELTS Foundation 2</h6>
                        <p class="text-muted f-11 mb-2">Listening Strategies Part 1</p>
                        <button class="btn btn-sm btn-primary rounded-pill px-4 f-11 fw-bold">LANJUTKAN</button>
                    </div>
                </div>
                <div class="duo-label">Unit 2</div>
            </div>
        </div>

        <!-- Milestone 3 -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node locked">
                    <span class="material-icons">lock</span>
                    <div class="duo-node-tooltip text-center">
                        <p class="mb-1 font-weight-bold text-muted f-11">TERKUNCI</p>
                        <h6 class="mb-1 f-13">IELTS Foundation 3</h6>
                        <small class="text-muted">Reading Skimming</small>
                    </div>
                </div>
                <div class="duo-label">Unit 3</div>
            </div>
        </div>

        <!-- Special Checkpoint -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node locked" style="background: #f1f5f9; border: 2px dashed #cbd5e1;">
                    <span class="material-icons">stars</span>
                    <div class="duo-node-tooltip text-center">
                        <p class="mb-1 font-weight-bold text-warning f-11">CHECKPOINT</p>
                        <h6 class="mb-0 f-13">Pre-IELTS Simulation</h6>
                    </div>
                </div>
                <div class="duo-label">Checkpoint</div>
            </div>
        </div>

        <!-- Milestone 4 -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node locked">
                    <span class="material-icons">lock</span>
                    <div class="duo-node-tooltip text-center">
                        <h6 class="mb-0 f-13">IELTS Intermediate 1</h6>
                    </div>
                </div>
                <div class="duo-label">Unit 4</div>
            </div>
        </div>
        
        <!-- Goal -->
        <div class="duo-node-row">
            <div class="duo-node-wrapper">
                <div class="duo-node locked" style="transform: scale(1.2); border: 3px double #cbd5e1;">
                    <span class="material-icons">military_tech</span>
                    <div class="duo-node-tooltip text-center">
                        <p class="mb-1 font-weight-bold text-muted f-11">TUJUAN AKHIR</p>
                        <h6 class="mb-0 f-13">IELTS Success (Target 7.0+)</h6>
                    </div>
                </div>
                <div class="duo-label">Success!</div>
            </div>
        </div>
    </div>
</div>

<style>
    .rounded-20 { border-radius: 20px; }
    .bg-info-1 { background: rgba(0, 38, 85, 0.05); }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const activeNode = document.querySelector('.duo-node.active');
        if(activeNode) {
            activeNode.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection
