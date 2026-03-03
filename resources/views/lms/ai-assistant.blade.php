@extends('layouts.lms-layout')

@section('title', 'AI Study Assistant')
@section('nav_ai', 'active')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center m-b-30">
            <div>
                <h2 class="font-weight-bold primary-text m-b-5">🤖 AI Study Mentor</h2>
                <p class="text-muted f-14 mb-0">Speak with your personalized IELTS coach.</p>
            </div>
        </div>

        <div class="ai-assistant-view shadow-lg border-0" style="height: 650px;">
            <!-- Glassmorphism Header -->
            <div class="chat-header glass-header pd-s-30 pd-t-20 pd-b-20 d-flex align-items-center text-white">
                <div class="avatar-ring m-r-15 bg-white-20 rounded-circle d-flex-center justify-center p-2" style="width: 45px; height: 45px;">
                    <span class="material-icons" style="font-size: 24px;">auto_awesome</span>
                </div>
                <div>
                    <h6 class="mb-0 font-weight-bold f-15">Englishvit AI Mentor</h6>
                    <div class="d-flex align-items-center">
                        <span class="dot bg-success m-r-8" style="width: 6px; height: 6px;"></span>
                        <span class="f-11 opacity-7">Mentor is thinking...</span>
                    </div>
                </div>
            </div>
            
            <div class="chat-body pd-30 flex-fill d-flex flex-column bg-white" style="overflow-y: auto; scroll-behavior: smooth;">
                <div id="chat-messages" class="d-flex flex-column">
                    <!-- Initial AI Contact -->
                    <div class="chat-bubble bubble-ai">
                        Welcome back! I've been reviewing your <strong>Success Path</strong>. <br><br>
                        Ready to boost your Speaking score today? I can help you with some common part 2 cues.
                    </div>
                </div>

                <!-- Typing Indicator (Hidden by default) -->
                <div id="typing-indicator" class="typing-indicator" style="display: none;">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>

            <!-- Contextual Quick Prompts (Floating above footer) -->
            <div class="pd-x-30 pd-b-15 bg-white">
                <div class="d-flex flex-wrap gap-10">
                    <button class="btn btn-xs btn-light text-primary rounded-pill border f-11 fw-bold p-x-15" onclick="quickPrompt('Give me a Speaking cue card')">Speaking Cue Card</button>
                    <button class="btn btn-xs btn-light text-primary rounded-pill border f-11 fw-bold p-x-15" onclick="quickPrompt('Check my Vocabulary')">Vocab Check</button>
                    <button class="btn btn-xs btn-light text-primary rounded-pill border f-11 fw-bold p-x-15" onclick="quickPrompt('What\'s next?')">Next Goal</button>
                </div>
            </div>

            <div class="chat-footer pd-20 bg-white border-subtle">
                <div class="input-group rounded-pill overflow-hidden bg-light border-0 p-1">
                    <input type="text" class="form-control border-0 bg-transparent p-l-25 f-13" id="chatInput" placeholder="Ask your mentor anything...">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-circle m-1 d-flex-center p-0" style="width: 40px; height: 40px;" onclick="sendMessage()">
                            <span class="material-icons f-20">near_me</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-white-20 { background: rgba(255,255,255,0.2); }
    .border-subtle { border-top: 1px solid #f1f5f9; }
</style>
@endsection

@section('scripts')
<script>
    function sendMessage() {
        const input = $('#chatInput');
        const container = $('#chat-messages');
        const text = input.val().trim();
        
        if (text) {
            // Add user message
            container.append(`<div class="chat-bubble bubble-user shadow-sm animate__animated animate__fadeInUp">${text}</div>`);
            input.val('');
            scrollToBottom();
            
            // Show typing indicator
            $('#typing-indicator').fadeIn(200);
            
            // Simulate AI Mentorship Thinking
            setTimeout(() => {
                $('#typing-indicator').fadeOut(200);
                
                const responses = [
                    "That's a great question! Based on your recent activity, I'd suggest focusing on your <strong>Linking Words</strong> for this task.",
                    "Interesting! Let me pull up a relevant practice scenario for your <strong>IELTS Speaking</strong> goal.",
                    "Nice! You're making progress. Let's look at how we can improve that specific point in your next session."
                ];
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                
                showAIResponse(randomResponse);
            }, 1800);
        }
    }

    function quickPrompt(text) {
        $('#chatInput').val(text);
        sendMessage();
    }

    function showAIResponse(text) {
        const container = $('#chat-messages');
        container.append(`
            <div class="chat-bubble bubble-ai shadow-sm animate__animated animate__fadeInUp">
                ${text}
            </div>
        `);
        scrollToBottom();
    }

    function scrollToBottom() {
        const body = $('.chat-body');
        body.animate({ scrollTop: body[0].scrollHeight }, 500);
    }

    $('#chatInput').on('keypress', function(e) {
        if(e.which == 13) sendMessage();
    });
</script>
@endsection
