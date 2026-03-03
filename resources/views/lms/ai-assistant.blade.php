@extends('layouts.lms-layout')

@section('title', 'AI Study Assistant')
@section('nav_ai', 'active')

@section('content')
<h2 class="font-weight-bold primary-text m-b-20">🤖 AI Study Assistant</h2>
<div class="ai-assistant-view">
    <div class="chat-header pd-s-20 pd-t-15 pd-b-15">
        <span class="material-icons">psychology</span>
        <span class="m-l-10">Contextual Learning Mentor</span>
    </div>
    <div class="chat-body pd-30 bg-light flex-fill" style="min-height: 400px; overflow-y: auto;">
        <div class="chat-bubble bubble-ai m-b-20">
            Halo! Saya sudah menganalisis progress Roadmap Anda. Progress Writing Anda sedikit melambat di minggu ini. Ingin fokus latihan Essay hari ini?
        </div>
    </div>
    <div class="chat-footer pd-20 border-top bg-white">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tanya sesuatu tentang roadmap mu...">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="sendMessage()">Kirim</button>
            </div>
        </div>
    </div>
</div>
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
