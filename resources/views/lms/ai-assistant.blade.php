@extends('layouts.lms-layout')

@section('title', 'AI Mentor | Englishvit')
@section('nav_ai', 'active')

@section('content')
<!-- Professional Ultra-Fidelity AI Assistant -->
<div class="gpt-ux-container">
    <div class="gpt-chat-thread" id="chat-thread">
        <!-- Initial Onboarding Message -->
        <div class="gpt-message-row ai-message">
            <div class="gpt-avatar bg-brand shadow-sm">
                <span class="material-icons">auto_awesome</span>
            </div>
            <div class="gpt-content">
                <h6 class="fw-800 primary-text">Englishvit AI Mentor</h6>
                <p class="mb-0">Halo! Saya adalah Mentor AI Anda. Saya telah memantau progres belajar Anda di **Englishvit Success Path**.</p>
                <div class="bg-white border rounded-12 pd-15 m-t-15 shadow-sm border-left-brand">
                    <p class="mb-0 f-14 text-muted"><span class="material-icons f-16 me-2 text-warning">insights</span>Anda menunjukkan performa luar biasa di modul **Listening**! Mari kita pertahankan.</p>
                </div>
                <p class="mb-0 m-t-15">Ada yang bisa saya bantu terkait persiapan IELTS Anda hari ini?</p>
            </div>
        </div>

        <!-- Dynamic Conversation Thread -->
        <div id="gpt-messages-container"></div>

        <!-- Typing Indicator (Refined) -->
        <div id="gpt-typing" class="gpt-message-row ai-message" style="display: none;">
            <div class="gpt-avatar bg-brand shadow-sm">
                <span class="material-icons">auto_awesome</span>
            </div>
            <div class="gpt-content">
                <div class="typing-dots">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Anchored Input Container -->
    <div class="gpt-input-fixed">
        <div class="container-fluid max-w-850 p-0">
            <!-- Professional Suggestions -->
            <div class="d-flex flex-wrap gap-3 justify-center m-b-20">
                <button class="gpt-quick-suggest" onclick="quickPrompt('Prediksi skor IELTS saya')">Prediksi Skor</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Review roadmap saya')">Review Roadmap</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Tips Speaking Part 2')">Tips Speaking</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Cek kelemahan saya')">Analisis Kelemahan</button>
            </div>

            <!-- Focus-Centered Input Box -->
            <div class="gpt-input-wrapper">
                <textarea id="gpt-input" placeholder="Tanyakan apapun pada Mentor AI Englishvit..." rows="1" autofocus></textarea>
                <button class="gpt-send-btn shadow-sm" id="send-btn" onclick="handleSend()">
                    <span class="material-icons">arrow_upward</span>
                </button>
            </div>
            <div class="d-flex justify-center align-items-center m-t-15 opacity-40">
                <span class="material-icons f-12 me-1">info</span>
                <p class="text-center f-10 mb-0">Englishvit AI Mentor dapat membuat kesalahan. Mohon tinjau informasi penting.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .max-w-850 { max-width: 850px; margin: 0 auto; }
    .bg-brand { background: #002655 !important; }
    .bg-user { background: #64748b !important; }
    .border-left-brand { border-left: 3px solid #002655 !important; }
    .rounded-12 { border-radius: 12px; }
    .m-t-15 { margin-top: 15px; }
    .fw-800 { font-weight: 800; }
    .pd-15 { padding: 15px; }
</style>
@endsection

@section('scripts')
<script>
    const chatInput = document.getElementById('gpt-input');
    const container = document.getElementById('gpt-messages-container');
    const typingIndicator = document.getElementById('gpt-typing');
    const thread = document.getElementById('chat-thread');

    // Smooth auto-grow textarea
    chatInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    function handleSend() {
        const text = chatInput.value.trim();
        if(!text) return;

        // User Message Render
        appendMessage('user', text);
        chatInput.value = '';
        chatInput.style.height = 'auto';
        
        // AI Engagement Feedback
        typingIndicator.style.display = 'flex';
        scrollToBottom();

        // High-Quality Simulation
        setTimeout(() => {
            typingIndicator.style.display = 'none';
            const responses = [
                "Pertanyaan yang sangat strategis! Berdasarkan data Anda, saya sarankan Anda fokus pada **skimming** dan **scanning** untuk modul IELTS Reading.",
                "Terima kasih atas pertanyaannya. Tips utama untuk Speaking Part 2 adalah memperluas **lexical resource** Anda dengan idiom yang natural.",
                "Prediksi skor IELTS Anda saat ini berada di nilai **Band 6.5 - 7.0**. Dengan sedikit polesan di Writing, Anda pasti bisa mencapai target 7.5!"
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
                <h6 class="fw-800 ${role === 'ai' ? 'primary-text' : 'text-muted'}">${role === 'ai' ? 'Englishvit AI Mentor' : 'You'}</h6>
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
