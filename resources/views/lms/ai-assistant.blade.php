@extends('layouts.lms-layout')

@section('title', 'AI Mentor | Englishvit')
@section('nav_ai', 'active')

@section('content')
<div class="gpt-full-wrapper">
    <!-- ChatGPT Sidebar Layout with Englishvit Context -->
    <aside class="gpt-sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="sidebar-btn"><span class="material-icons">side_navigation</span></button>
            <button class="sidebar-btn"><span class="material-icons">edit_note</span></button>
        </div>
        
        <div class="search-box">
            <span class="material-icons f-16 text-muted">search</span>
            <input type="text" placeholder="Search chats">
        </div>

        <div class="history-list">
            <div class="nav-item">
                <span class="material-icons f-18">chat_bubble_outline</span>
                <span>AI Mentor</span>
            </div>
            <div class="nav-item">
                <span class="material-icons f-18">school</span>
                <span>Study Path</span>
            </div>
            <div class="nav-item">
                <span class="material-icons f-18">add_circle_outline</span>
                <span>New session</span>
            </div>

            <div class="history-label">Recent Sessions</div>
            <div class="history-item active">Review Speaking Part 2</div>
            <div class="history-item">Analisis Grammar B2</div>
            <div class="history-item">Prediksi Skor IELTS</div>
            <div class="history-item">Tips Listening Section 3</div>
            <div class="history-item">Koreksi Essay Task 1</div>
            <div class="history-item">Vocabulary for Academic</div>
            <div class="history-item">Jadwal Live Class Minggu Ini</div>
        </div>

        <div class="mt-auto nav-item p-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-center text-white font-weight-bold" style="width: 28px; height: 28px; font-size: 10px; background: #002655 !important;">SN</div>
                <span class="font-weight-bold">Student Name</span>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="gpt-main">
        <header class="gpt-header-top">
            <div class="gpt-model-selector">
                Englishvit AI <span class="material-icons f-16 ms-1">expand_more</span>
            </div>
            <div class="d-flex gap-3">
                <button class="sidebar-btn"><span class="material-icons">ios_share</span></button>
                <button class="sidebar-btn"><span class="material-icons">content_copy</span></button>
            </div>
        </header>

        <div class="gpt-thread-v3" id="chat-thread">
            <!-- Initial Contextual Message -->
            <div class="msg-row-v3">
                <div class="ai-content-v3">
                    Halo! Saya adalah Mentor AI Anda dari Englishvit. Saya telah memantau progres belajar Anda di <strong>Englishvit Success Path</strong>. <br><br>
                    Anda menunjukkan performa yang cukup stabil di modul <strong>Listening</strong>. Mari kita pertahankan konsistensi ini! <br><br>
                    Ada yang bisa saya bantu terkait persiapan IELTS atau materi bahasa Inggris Anda hari ini?
                </div>
                <div class="ai-actions">
                    <span class="material-icons action-btn">thumb_down_off_alt</span>
                    <span class="material-icons action-btn">volume_up</span>
                    <span class="material-icons action-btn">thumb_up_off_alt</span>
                    <span class="material-icons action-btn">refresh</span>
                    <span class="material-icons action-btn">more_horiz</span>
                </div>
            </div>

            <div id="dynamic-messages"></div>
        </div>

        <!-- Floating Centered Input Container -->
        <div class="gpt-input-fixed-v3">
            <div class="input-container-v3">
                <div class="input-icon-btn"><span class="material-icons">add</span></div>
                <div class="input-icon-btn"><span class="material-icons">public</span></div>
                <div class="input-icon-btn"><span class="material-icons">psychology</span></div>
                <div class="input-icon-btn"><span class="material-icons">text_fields</span></div>
                
                <textarea id="gpt-input-v3" placeholder="Tanyakan apapun pada Mentor AI..." rows="1"></textarea>
                
                <div class="input-icon-btn"><span class="material-icons">mic</span></div>
                <button class="input-icon-btn send-btn-v3" id="send-v3"><span class="material-icons">arrow_upward</span></button>
            </div>
            <div class="d-flex justify-center align-items-center mt-2 opacity-50" style="color: #676767;">
                <p class="text-center f-10 mb-0">AI Mentor dapat membuat kesalahan. Harap tinjau informasi krusial terkait ujian.</p>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
<script>
    const input = document.getElementById('gpt-input-v3');
    const thread = document.getElementById('chat-thread');
    const container = document.getElementById('dynamic-messages');
    const sendBtn = document.getElementById('send-v3');

    input.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    function handleSend() {
        const text = input.value.trim();
        if(!text) return;

        // User Message
        const uMsg = document.createElement('div');
        uMsg.className = 'msg-row-v3';
        uMsg.innerHTML = `<div class="user-pill-right">${text}</div>`;
        container.appendChild(uMsg);

        input.value = '';
        input.style.height = 'auto';
        scrollToBottom();

        // Simulated AI Response with Englishvit Context
        setTimeout(() => {
            const aiMsg = document.createElement('div');
            aiMsg.className = 'msg-row-v3 animate__animated animate__fadeIn';
            
            const responses = [
                "Berdasarkan analisis performa Anda, untuk meningkatkan skor, saya sarankan fokus pada penguasaan **Complex Sentences** dalam writing.",
                "Tips yang bagus! Dalam konteks IELTS Speaking Part 2, penting untuk menggunakan idiom secara natural. Mari kita coba satu latihan seputar topik tersebut.",
                "Sesuai dengan Roadmap Anda, materi ini akan dibahas secara mendalam pada Live Class minggu depan. Apakah Anda ingin berlatih simulasi singkat sekarang?"
            ];
            const reply = responses[Math.floor(Math.random() * responses.length)];

            aiMsg.innerHTML = `
                <div class="ai-content-v3">${reply}</div>
                <div class="ai-actions">
                    <span class="material-icons action-btn">thumb_down_off_alt</span>
                    <span class="material-icons action-btn">volume_up</span>
                    <span class="material-icons action-btn">thumb_up_off_alt</span>
                    <span class="material-icons action-btn">refresh</span>
                    <span class="material-icons action-btn">more_horiz</span>
                </div>
            `;
            container.appendChild(aiMsg);
            scrollToBottom();
        }, 1200);
    }

    sendBtn.addEventListener('click', handleSend);
    input.addEventListener('keypress', (e) => {
        if(e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            handleSend();
        }
    });

    function scrollToBottom() {
        thread.scrollTo({ top: thread.scrollHeight, behavior: 'smooth' });
    }
</script>
@endsection
