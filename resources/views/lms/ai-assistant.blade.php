@extends('layouts.lms-layout')

@section('title', 'AI Study Assistant')
@section('nav_ai', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center m-b-30">
    <div>
        <h2 class="font-weight-bold primary-text m-b-5">🤖 AI Study Assistant</h2>
        <p class="text-muted f-14 mb-0">Mentor pribadi yang memantau setiap langkah belajar Anda.</p>
    </div>
</div>

<div class="ai-assistant-view">
    <div class="chat-header pd-s-25 pd-t-20 pd-b-20 bg-gradient-premium text-white d-flex align-items-center shadow-sm">
        <div class="avatar-ring m-r-15">
            <span class="material-icons" style="font-size: 32px;">smart_toy</span>
        </div>
        <div>
            <h6 class="mb-0 font-weight-bold text-white">Englishvit AI Mentor</h6>
            <div class="d-flex align-items-center">
                <span class="dot bg-success m-r-5"></span>
                <span class="f-10 opacity-7">Online | Siap Membantu</span>
            </div>
        </div>
    </div>
    
    <div class="chat-body pd-30 flex-fill d-flex flex-column" style="background: #fdfdfe; overflow-y: auto;">
        <div class="chat-bubble bubble-ai shadow-sm m-b-20">
            Halo! Saya melihat Anda baru saja menyelesaikan kuis Grammar. Skor Anda meningkat 15%! <br><br>
            Ada yang ingin Anda tanyakan mengenai hasil kuis tersebut atau ingin lanjut ke target Reading berikutnya?
        </div>
        
        <div id="chat-messages" class="d-flex flex-column"></div>
        
        <!-- Quick Prompts -->
        <div class="m-t-auto p-t-20">
            <p class="f-12 text-muted m-b-10 align-center d-flex"><span class="material-icons f-14 m-r-5">tips_and_updates</span> Coba tanya ini:</p>
            <div class="d-flex flex-wrap gap-10">
                <button class="btn btn-xs btn-outline-primary f-11 p-x-15 rounded-pill" onclick="quickPrompt('Berapa skor prediksi IELTS saya saat ini?')">Prediksi Skor Saya</button>
                <button class="btn btn-xs btn-outline-primary f-11 p-x-15 rounded-pill" onclick="quickPrompt('Berikan tips Writing Task 1')">Tips Writing Task 1</button>
                <button class="btn btn-xs btn-outline-primary f-11 p-x-15 rounded-pill" onclick="quickPrompt('Apa jadwal saya besok?')">Jadwal Besok</button>
            </div>
        </div>
    </div>

    <div class="chat-footer pd-25 border-top bg-white">
        <div class="input-group shadow-sm rounded-pill overflow-hidden border">
            <input type="text" class="form-control border-0 p-l-25" id="chatInput" placeholder="Ketik pesan Anda di sini...">
            <div class="input-group-append">
                <button class="btn btn-primary p-x-25 border-0" onclick="sendMessage()" style="border-radius: 0;">
                    <span class="material-icons f-20">send</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
    .rounded-pill { border-radius: 50px !important; }
    .btn-xs { padding: 4px 12px; font-size: 11px; }
    .gap-10 { gap: 10px; }
</style>
@endsection

@section('scripts')
<script>
    function sendMessage() {
        const input = $('#chatInput');
        const container = $('#chat-messages');
        const text = input.val();
        if (text) {
            container.append(`<div class="chat-bubble bubble-user shadow-sm align-self-end m-b-20">${text}</div>`);
            input.val('');
            scrollToBottom();
            
            // AI Response Simulation
            setTimeout(() => {
                showAIResponse("Menarik! Saya sedang menganalisis data Anda... Mohon tunggu sebentar.");
            }, 800);
        }
    }

    function quickPrompt(text) {
        $('#chatInput').val(text);
        sendMessage();
    }

    function showAIResponse(text) {
        const container = $('#chat-messages');
        container.append(`<div class="chat-bubble bubble-ai shadow-sm m-b-20">${text}</div>`);
        scrollToBottom();
    }

    function scrollToBottom() {
        const body = $('.chat-body');
        body.scrollTop(body[0].scrollHeight);
    }

    $('#chatInput').on('keypress', function(e) {
        if(e.which == 13) sendMessage();
    });
</script>
@endsection

@section('scripts')
<script>
    function sendMessage() {
        const input = $('input');
        const container = $('.chat-body');
        if (input.val()) {
            container.append(`<div class="chat-bubble bubble-user m-b-20">${input.val()}</div>`);
            input.val('');
            container.scrollTop(container[0].scrollHeight);
            
            setTimeout(() => {
                container.append(`<div class="chat-bubble bubble-ai m-b-20">Menganalisis permintaan Anda... Saya akan terus memantau progress Anda di roadmap.</div>`);
                container.scrollTop(container[0].scrollHeight);
            }, 1000);
        }
    }
    $('input').on('keypress', function(e) {
        if(e.which == 13) sendMessage();
    });
</script>
@endsection
