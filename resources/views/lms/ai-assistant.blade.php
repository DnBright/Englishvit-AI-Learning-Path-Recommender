@extends('layouts.lms-layout')

@section('title', 'AI Study Mentor')
@section('nav_ai', 'active')

@section('content')
<div class="container-fluid pd-x-30 pd-t-30">
    <div class="row">
        <div class="col-12 m-b-30 p-0">
            <h3 class="font-weight-bold primary-text m-b-8" style="font-family: 'Sora', sans-serif;">🤖 AI Study Mentor</h3>
            <p class="text-muted f-15 mb-0" style="font-family: 'Inter', sans-serif;">Consult with your Englishvit personalized IELTS coach.</p>
        </div>
    </div>

    <div class="row shadow-sm bg-white rounded-12 p-0 overflow-hidden" style="border: 1px solid #edf2f7; min-height: 600px;">
        <!-- Mentor Info Sidebar (Optional but helps neatness) -->
        <div class="col-md-3 border-right p-0 d-none d-md-block bg-light-5">
            <div class="pd-30 text-center border-bottom bg-white">
                <div class="rounded-circle d-inline-flex justify-content-center align-items-center bg-info-1 m-b-20" style="width: 80px; height: 80px;">
                    <span class="material-icons accent-text" style="font-size: 40px;">auto_awesome</span>
                </div>
                <h6 class="font-weight-bold primary-text m-b-5">EV Mentor AI</h6>
                <span class="badge badge-success-light f-11 px-3 py-1">Online & Active</span>
            </div>
            <div class="pd-20">
                <p class="f-11 font-weight-bold text-uppercase text-muted m-b-15">MENTORSHIP TOPICS</p>
                <ul class="list-unstyled">
                    <li class="f-13 m-b-12 d-flex align-items-center text-muted"><span class="material-icons f-16 m-r-10 accent-text">check_circle</span> IELTS Speaking</li>
                    <li class="f-13 m-b-12 d-flex align-items-center text-muted"><span class="material-icons f-16 m-r-10 accent-text">check_circle</span> Writing Task 1 & 2</li>
                    <li class="f-13 m-b-12 d-flex align-items-center text-muted"><span class="material-icons f-16 m-r-10 accent-text">check_circle</span> Grammar Mastery</li>
                </ul>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-md-9 p-0 d-flex flex-column bg-white">
            <div class="chat-header branded-header text-white d-flex align-items-center">
                <div class="avatar-sm m-r-15 d-md-none rounded-circle bg-white-20 d-flex justify-center align-items-center" style="width: 35px; height: 35px;">
                    <span class="material-icons f-18">auto_awesome</span>
                </div>
                <div>
                    <h6 class="mb-0 font-weight-bold f-15">Chat with Mentor</h6>
                    <span class="f-10 opacity-7 d-md-none">Online</span>
                </div>
            </div>

            <div class="chat-body pd-30 flex-fill d-flex flex-column" style="height: 450px; overflow-y: auto; scroll-behavior: smooth;">
                <div id="chat-messages" class="d-flex flex-column">
                    <div class="chat-bubble bubble-ai">
                        Welcome back! I'm your Englishvit Mentor. I've been monitoring your <strong>IELTS Prep</strong> progress. <br><br>
                        Ready to polish your speaking skills today?
                    </div>
                </div>

                <div id="typing-indicator" class="typing-indicator" style="display: none;">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>

            <div class="chat-footer pd-20 border-top bg-light-soft">
                <div class="m-b-15 d-flex flex-wrap gap-10">
                    <button class="btn btn-xs btn-white border rounded-pill f-11 fw-800 text-muted px-3" onclick="quickPrompt('Give me a Speaking Cue Card')">Speaking Cue Card</button>
                    <button class="btn btn-xs btn-white border rounded-pill f-11 fw-800 text-muted px-3" onclick="quickPrompt('Review my Writing Task 1')">Writing Review</button>
                </div>
                <div class="input-group bg-white rounded-pill overflow-hidden border p-1" style="border-color: #e2e8f0 !important;">
                    <input type="text" class="form-control border-0 p-l-25 f-14 bg-transparent" id="chatInput" placeholder="Tanyakan apapun pada Mentor AI Anda...">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-pill px-4 m-1 d-flex-center" onclick="sendMessage()" style="background: #002655; border: none;">
                            <span class="material-icons f-18">send</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rounded-12 { border-radius: 12px !important; }
    .bg-light-5 { background: #f9fbfd; }
    .bg-white-20 { background: rgba(255,255,255,0.2); }
    .badge-success-light { background: #e6fffa; color: #00a3c4; border: 1px solid #b2f5ea; }
    .gap-10 { gap: 10px; }
</style>
@endsection

@section('scripts')
<script>
    function sendMessage() {
        const input = $('#chatInput');
        const container = $('#chat-messages');
        const text = input.val().trim();
        
        if (text) {
            container.append(`<div class="chat-bubble bubble-user shadow-sm animate__animated animate__fadeInUp">${text}</div>`);
            input.val('');
            scrollToBottom();
            
            $('#typing-indicator').fadeIn(200);
            
            setTimeout(() => {
                $('#typing-indicator').fadeOut(200);
                showAIResponse("Thank you for choosing Englishvit! As your mentor, I've analyzed your progress. Let's focus on <strong>linking words</strong> to make your explanation more structured.");
            }, 1500);
        }
    }

    function quickPrompt(text) {
        $('#chatInput').val(text);
        sendMessage();
    }

    function showAIResponse(text) {
        const container = $('#chat-messages');
        container.append(`<div class="chat-bubble bubble-ai shadow-sm animate__animated animate__fadeInUp">${text}</div>`);
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
