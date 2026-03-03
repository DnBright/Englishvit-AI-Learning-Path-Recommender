@section('content')
<div class="duo-path-wrapper">
    <!-- Sticky Progress Header -->
    <div class="duo-progress-header">
        <div class="duo-metric" title="Daily Streak">
            <span class="material-icons text-warning">local_fire_department</span>
            <span class="accent-text">5</span>
        </div>
        <div class="duo-metric" title="Gems">
            <span class="material-icons text-info">diamond</span>
            <span class="text-info">420</span>
        </div>
        <div class="duo-metric" title="Hearts">
            <span class="material-icons text-danger">favorite</span>
            <span class="text-danger">3</span>
        </div>
    </div>

    <!-- Interactive Path -->
    <div class="duo-node-container">
        <!-- Milestone 1: Completed -->
        <div class="duo-node completed" onclick="alert('Module 1: Basic Grammar - Done!')" title="Completed">
            <span class="material-icons">check</span>
        </div>

        <!-- Milestone 2: Completed -->
        <div class="duo-node completed" onclick="alert('Module 2: Essential Vocab - Done!')" title="Completed">
            <span class="material-icons">check</span>
        </div>

        <!-- Milestone 3: Active -->
        <div class="duo-node active" onclick="alert('Continuing: Reading Task 1')" title="Current Module">
            <span class="material-icons">play_arrow</span>
        </div>

        <!-- Milestone 4: Locked -->
        <div class="duo-node locked" title="Locked: Complete previous tasks first">
            <span class="material-icons">lock</span>
        </div>

        <!-- Milestone 5: Locked -->
        <div class="duo-node locked" title="Locked">
            <span class="material-icons">lock</span>
        </div>

        <!-- Milestone 6: Goal -->
        <div class="duo-node locked" title="Final Goal: IELTS 6.5" style="border-radius: 20%; width: 100px; height: 90px;">
            <span class="material-icons" style="font-size: 45px; color: #afafaf;">military_tech</span>
        </div>
    </div>
    
    <!-- Next Action Overlay (Optional/Simple) -->
    <div class="text-center m-t-50">
        <p class="text-muted f-14 mb-0">Klik pada node untuk melanjutkan perjalanan belajar Anda!</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Duolingo-style roadmaps usually scroll to the active node on load
    $(document).ready(function() {
        const activeNode = $('.duo-node.active')[0];
        if (activeNode) {
            activeNode.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection
