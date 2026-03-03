@extends('layouts.lms-layout')
@section('title', '🤖 AI Coach')
@section('nav_ai', 'active')
@section('topbar_title', '🤖 AI Coach (Strategic Strategist)')

@section('content')

<div class="ai-layout">
  {{-- ── CHAT AREA ── --}}
  <div class="chat-area" style="position:relative;">
    {{-- Proactive Celebration Toast (Hidden by default) --}}
    <div id="aiCelebration" class="celebration-toast" style="display:none;">
        <span>🏆</span> <b>Unit 4 Milestone Reached!</b> +50 XP
    </div>

    <div class="chat-messages" id="chatMessages">
      <div class="msg msg-ai">
        <div class="msg-avatar" style="background:transparent;"><img src="{{ asset('images/logo-white.svg') }}" style="width: 24px; object-fit: contain;"></div>
        <div>
          <div class="msg-bubble">
            Halo {{ explode(' ', Auth::user()->name ?? 'Student')[0] }}! 👋 Saya Coach AI-mu.<br><br>
            Saya melihat <b>Reading Skor-mu naik 0.5 poin</b> minggu ini! Luar biasa. Tapi, <i>Writing Task 2</i> masih menjadi gap terbesar untuk mencapai <b>Target IELTS 6.5</b>. 
            <br><br>
            Mau kita bedah strategi Writing hari ini?
          </div>
          <span class="msg-time">09:00 · AI Coach</span>
        </div>
      </div>
    </div>

    {{-- ── QUICK ACTION CHIPS ── --}}
    <div class="action-chips">
        <div class="chip primary" onclick="handleChip('Bantu strategi Writing')">✍️ Strategi Writing</div>
        <div class="chip" onclick="handleChip('Simulasi Skor IELTS')">📊 Simulasi Skor</div>
        <div class="chip" onclick="handleChip('Feedback Latihan Terakhir')">🔍 Feedback Terakhir</div>
        <div class="chip" onclick="handleChip('Review Jadwal Clan')">🫂 Jadwal Clan</div>
    </div>

    <div class="chat-input-area">
      <input class="chat-input" id="chatInput" placeholder="Ketik pesan atau klik chip aksi di atas..." onkeydown="if(event.key==='Enter')sendMsg()">
      <button class="chat-send" onclick="sendMsg()">➤</button>
    </div>
  </div>

  {{-- ── STRATEGIC SIDEBAR ── --}}
  <div class="ai-sidebar">
    {{-- Score Strategist Card --}}
    <div class="coach-sidebar-item">
      <div class="strategist-header">
        <div class="sh-label">Score Strategist</div>
        <div class="sh-val">5.5</div>
      </div>
      <div class="sh-target">Overall Est. · Target: <b>6.5</b></div>
      
      <div class="simulation-box">
        <div class="sim-row">
            <span class="sim-label">Jika Writing 5.0 → 6.0</span>
            <span class="sim-impact">+0.25 Overall</span>
        </div>
        <div style="height:1px; background:var(--border); margin:8px 0;"></div>
        <div class="sim-row">
            <span class="sim-label">Probabilitas Target</span>
            <span class="sim-impact" style="color:var(--orange)">Low (42%)</span>
        </div>
      </div>
    </div>

    {{-- Goal Reinforcement --}}
    <div class="coach-sidebar-item">
        <div class="section-label" style="font-size:10px; margin-bottom:12px;">🎯 Goal Reinforcement</div>
        <div style="font-size:13px; font-weight:700; color:var(--white); margin-bottom:6px;">Target: IELTS 6.5</div>
        <div style="font-size:12px; color:var(--muted); line-height:1.5;">
            Kamu butuh <b>+1.0 poin</b> di Writing dan <b>+0.5 poin</b> di Speaking untuk aman di target 6.5.
        </div>
    </div>

    {{-- Performance Patterns --}}
    <div class="coach-sidebar-item">
        <div class="section-label" style="font-size:10px; margin-bottom:12px;">🧠 Learning Patterns</div>
        <div class="pattern-card">
            <div class="p-icon">🌙</div>
            <div class="p-info">
                <div class="p-title">Night Owl Habit</div>
                <div class="p-desc">Retensi belajarmu 24% lebih tinggi di jam 20:00 - 22:00.</div>
            </div>
        </div>
    </div>

    {{-- Clan Context --}}
    <div class="coach-sidebar-item" style="border-color:rgba(239,68,68,0.2); background:rgba(239,68,68,0.03)">
        <div class="section-label" style="font-size:10px; margin-bottom:8px; color:#ef4444">🫂 Clan Alert</div>
        <div style="font-size:12px; color:#fca5a5; line-height:1.5;">
            Clan <b>IELTS Warriors</b> tertinggal 150 poin dari rival! Kontribusimu sangat dibutuhkan malam ini.
        </div>
        <button class="escalation-btn" style="background:rgba(239,68,68,0.1); border-color:rgba(239,68,68,0.3); color:#fca5a5; margin-top:10px;" onclick="window.location.href='/dashboard-study/clan'">BANTU CLAN SEKARANG</button>
    </div>

    {{-- Escalation Path --}}
    <div class="coach-sidebar-item" style="background:var(--yellow-dim); border-color:rgba(245,200,66,0.2)">
        <div class="section-label" style="font-size:10px; margin-bottom:8px; color:var(--yellow)">🚀 Escalation Path</div>
        <div style="font-size:12px; color:var(--text-2); line-height:1.5;">
            Butuh feedback lebih detail untuk Writing-mu?
        </div>
        <button class="escalation-btn" style="background:var(--yellow); color:var(--navy); border:none;">
            BOOK 1-ON-1 COACHING
        </button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   AI COACH CORE LOGIC
=========================================================== */
function handleChip(txt) {
    addMsg(txt, 'user');
    processAIResponse(txt);
}

function sendMsg() {
    const inp = document.getElementById('chatInput');
    const txt = inp.value.trim();
    if (!txt) return;
    addMsg(txt, 'user');
    inp.value = '';
    processAIResponse(txt);
}

function processAIResponse(userTxt) {
    // Show "Typing..." state if needed
    setTimeout(() => {
        let response = "";
        
        if (userTxt.includes('Writing')) {
            response = "Bagus! Mari kita fokus ke <b>Writing Task 2</b>. Berdasarkan pola belajarmu, Kamu sering kesulitan di <i>Conclusion</i>. Mau saya tunjukkan formula 'Final Punch' untuk menutup essay-mu?";
        } else if (userTxt.includes('Simulasi')) {
            response = "Tentu! Saat ini skor Writing-mu (5.0) menarik turun rata-rata. Jika kita naikkan ke 6.0, <b>Overall skor-mu akan menjadi 5.75</b>. Kita cuma butuh 0.25 poin lagi dari Speaking untuk mencapai 6.0!";
        } else if (userTxt.includes('Clan')) {
            response = "Clan kamu sedang berjuang! <b>Siti Rahma</b> tadi baru saja menyelesaikan 2 unit. Kalau kamu selesaikan 1 latihan Writing sekarang, kamu akan menyumbang <b>50 poin kontribusi</b>.";
        } else {
            response = "Saya mengerti. Mari kita kerjakan step-by-step. Apakah kamu merasa lelah? Ingat, <b>Target IELTS 6.5</b> tinggal beberapa bulan lagi! 🔥";
        }

        addMsg(response, 'ai');
        
        // Randomly trigger celebration for engagement
        if (Math.random() > 0.7) {
            triggerCelebration();
        }
    }, 1200);
}

function addMsg(txt, role) {
    const c = document.getElementById('chatMessages');
    const d = document.createElement('div');
    d.className = `msg msg-${role}`;
    
    const now = new Date();
    const time = now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0');
    
    d.innerHTML = `
        <div class="msg-avatar" ${role === 'ai' ? 'style="background:transparent;"' : ''}>
            ${role === 'ai' 
                ? '<img src="{{ asset("images/logo-white.svg") }}" style="width: 24px; object-fit: contain;">' 
                : '{{ substr(Auth::user()->name ?? "S", 0, 1) }}'}
        </div>
        <div>
            <div class="msg-bubble">${txt}</div>
            <span class="msg-time" ${role === 'user' ? 'style="text-align:right;display:block;"' : ''}>${time}${role === 'ai' ? ' · AI Coach' : ''}</span>
        </div>
    `;
    c.appendChild(d);
    c.scrollTop = c.scrollHeight;
}

function triggerCelebration() {
    const toast = document.getElementById('aiCelebration');
    toast.style.display = 'flex';
    setTimeout(() => {
        toast.style.animation = 'toast-in 0.5s cubic-bezier(.34,1.56,.64,1) reverse forwards';
        setTimeout(() => {
            toast.style.display = 'none';
            toast.style.animation = '';
        }, 500);
    }, 4000);
}
</script>
@endsection
