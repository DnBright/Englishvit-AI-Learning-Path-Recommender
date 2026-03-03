@extends('layouts.lms-layout')

@section('title', 'AI Mentor | Englishvit')
@section('nav_ai', 'active')

@section('content')
<!-- High-Fidelity ChatGPT Style UX -->
<div class="gpt-ux-container">
    <div class="gpt-chat-thread" id="chat-thread">
        <div class="gpt-message-row ai-message">
            <div class="gpt-avatar bg-brand shadow-sm">
                <span class="material-icons">auto_awesome</span>
            </div>
            <div class="gpt-content">
                <h6 class="fw-800 primary-text mb-2">Englishvit AI Mentor</h6>
                <p class="mb-0 text-muted">Halo! Saya adalah Mentor AI Anda. Saya telah memantau progress Anda di **Success Path**. Anda menunjukkan performa luar biasa di modul Listening!</p>
                <p class="mb-0 text-muted m-t-10">Ada yang bisa saya bantu terkait persiapan IELTS Anda hari ini?</p>
            </div>
        </div>

        <!-- Dynamic Conversation Thread -->
        <div id="gpt-messages-container"></div>

        <!-- Typing Indicator -->
        <div id="gpt-typing" class="gpt-message-row ai-message" style="display: none;">
            <div class="gpt-avatar bg-brand">
                <span class="material-icons">auto_awesome</span>
            </div>
            <div class="gpt-content">
                <div class="typing-dots">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stationary Input Container -->
    <div class="gpt-input-fixed">
        <div class="max-w-800">
            <!-- Branded Suggestions Pin -->
            <div class="d-flex flex-wrap gap-10 justify-center m-b-20">
                <button class="gpt-quick-suggest" onclick="quickPrompt('Prediksi skor IELTS saya')">Prediksi Skor</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Review progress Roadmap')">Review Roadmap</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Tips Speaking Part 2')">Tips Speaking</button>
            </div>

            <!-- Modern GPT Input Box -->
            <div class="gpt-input-wrapper">
                <textarea id="gpt-input" placeholder="Tanyakan apapun pada Mentor AI Englishvit..." rows="1"></textarea>
                <button class="gpt-send-btn" id="send-btn" onclick="handleSend()">
                    <span class="material-icons">arrow_upward</span>
                </button>
            </div>
            <p class="text-center text-muted f-10 m-t-12 opacity-60">Englishvit AI Mentor dapat membuat kesalahan. Mohon tinjau informasi penting.</p>
        </div>
    </div>
</div>

<style>
    .bg-brand { background: #002655 !important; }
    .bg-user { background: #64748b !important; }
    .m-t-10 { margin-top: 10px; }
    .m-t-12 { margin-top: 12px; }
    .fw-800 { font-weight: 800; }
</style>
@endsection

@section('scripts')
<script>
    const chatInput = document.getElementById('gpt-input');
    const container = document.getElementById('gpt-messages-container');
    const typingIndicator = document.getElementById('gpt-typing');
    const thread = document.getElementById('chat-thread');

    // Auto-grow input
    chatInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    function handleSend() {
        const text = chatInput.value.trim();
        if(!text) return;

        // User Message View
        appendMessage('user', text);
        chatInput.value = '';
        chatInput.style.height = 'auto';
        
        // Show AI Thinking
        typingIndicator.style.display = 'flex';
        scrollToBottom();

        // Simulate Premium AI Mentor Response
        setTimeout(() => {
            typingIndicator.style.display = 'none';
            const responses = [
                "Pertanyaan yang bagus! Mengingat progress Anda, saya sarankan fokus pada **skimming** untuk meningkatkan kecepatan Reading.",
                "Terima kasih atas pertanyaannya. Tips utama untuk Speaking Part 2 adalah menggunakan **linking words** yang bervariasi.",
                "Berdasarkan performa Anda, prediksi skor IELTS Anda saat ini berada di kisaran **Band 6.5 - 7.0**. Mari kita asah lagi!"
            ];
            appendMessage('ai', responses[Math.floor(Math.random() * responses.length)]);
            scrollToBottom();
        }, 1800);
    }

    function appendMessage(role, text) {
        const row = document.createElement('div');
        row.className = `gpt-message-row ${role}-message animate__animated animate__fadeIn`;
        
        const avatar = role === 'ai' ? 
            `<div class="gpt-avatar bg-brand shadow-sm"><span class="material-icons">auto_awesome</span></div>` :
            `<div class="gpt-avatar bg-user shadow-sm"><span class="material-icons">person</span></div>`;

        row.innerHTML = `
            ${avatar}
            <div class="gpt-content">
                ${role === 'ai' ? '<h6 class="fw-800 primary-text mb-2">Englishvit AI Mentor</h6>' : '<h6 class="fw-800 text-muted mb-2">You</h6>'}
                <p class="mb-0">${text}</p>
            </div>
        `;
        container.appendChild(row);
    }

    function quickPrompt(text) {
        chatInput.value = text;
        handleSend();
    }

    function scrollToBottom() {
        thread.scrollTo({ top: thread.scrollHeight, behavior: 'smooth' });
    }

    chatInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            handleSend();
        }
    });
</script>
@endsection
