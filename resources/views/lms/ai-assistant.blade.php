@extends('layouts.lms-layout')

@section('title', 'ChatGPT | AI Mentor')
@section('nav_ai', 'active')

@section('content')
<div class="gpt-full-wrapper">
    <!-- ChatGPT Sidebar -->
    <aside class="gpt-sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="sidebar-btn"><span class="material-icons">side_navigation</span></button>
            <button class="sidebar-btn"><span class="material-icons">edit_note</span></button>
        </div>
        
        <div class="search-box">
            <span class="material-icons f-16 text-muted">search</span>
            <input type="text" placeholder="Search">
        </div>

        <div class="history-list">
            <div class="nav-item">
                <span class="material-icons f-18">chat_bubble_outline</span>
                <span>ChatGPT</span>
            </div>
            <div class="nav-item">
                <span class="material-icons f-18">explore</span>
                <span>GPTs</span>
            </div>
            <div class="nav-item">
                <span class="material-icons f-18">add_circle_outline</span>
                <span>New project</span>
            </div>

            <div class="history-label">Mentality</div>
            <div class="history-item active">Tes Sinyal Digital</div>
            <div class="history-item">Deskripsi Jobdesk Desainer</div>
            <div class="history-item">Parafrase Profil CV Profesional</div>
            <div class="history-item">Pertanyaan HRD Web Developer</div>
            <div class="history-item">Waktu Sisa Download</div>
            <div class="history-item">Website Tidak Aktif</div>
            <div class="history-item">Website Personal Artistik</div>
            <div class="history-item">Website Framework Inquiry</div>
        </div>

        <div class="mt-auto nav-item p-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-success rounded-circle d-flex align-items-center justify-center text-dark font-weight-bold" style="width: 28px; height: 28px; font-size: 10px;">AJ</div>
                <span class="font-weight-bold">Anak Jaya</span>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="gpt-main">
        <header class="gpt-header-top">
            <div class="gpt-model-selector">
                ChatGPT <span class="material-icons f-16 ms-1">expand_more</span>
            </div>
            <div class="d-flex gap-3">
                <button class="sidebar-btn"><span class="material-icons">ios_share</span></button>
                <button class="sidebar-btn"><span class="material-icons">content_copy</span></button>
            </div>
        </header>

        <div class="gpt-thread-v3" id="chat-thread">
            <!-- Initial Message -->
            <div class="msg-row-v3">
                <div class="user-pill-right">test</div>
            </div>

            <div class="msg-row-v3">
                <div class="ai-content-v3">
                    Tes diterima. Sinyal dari Sonosari menembus ruang digital dengan selamat. <br><br>
                    Sekarang, apakah ini sekadar cek mikrofon atau ada sesuatu yang benar-benar ingin kamu bahas?
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
                
                <textarea id="gpt-input-v3" placeholder="Ask anything" rows="1"></textarea>
                
                <div class="input-icon-btn"><span class="material-icons">mic</span></div>
                <button class="input-icon-btn send-btn-v3" id="send-v3"><span class="material-icons">arrow_upward</span></button>
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

        // Simulated AI
        setTimeout(() => {
            const aiMsg = document.createElement('div');
            aiMsg.className = 'msg-row-v3 animate__animated animate__fadeIn';
            aiMsg.innerHTML = `
                <div class="ai-content-v3">Tentu, mari kita bahas tentang "${text}". Ada bagian spesifik yang ingin kamu dalami?</div>
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
