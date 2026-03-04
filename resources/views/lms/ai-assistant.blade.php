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
            Halo <b>Aryo</b>! 👋 Saya AI Coach-mu hari ini.<br><br>
            Update terbaru: <b>Reading-mu naik ke 6.0</b> — bagus sekali! 🎉 Tapi perlu atensi: <b>Writing Task 2 (5.5)</b> dan <b>Speaking (5.5)</b> masih jadi gap terbesar menuju <b>IELTS 6.5</b>.<br><br>
            Kamu sedang di <b>Unit 4 — Grammar Fundamentals (60%)</b>. Selesaikan ini dulu, lalu kita fokus ke Writing & Speaking bersamaan.<br><br>
            Mau mulai dengan strategi Writing Task 2 hari ini?
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
      <div class="sh-target">Overall Saat Ini · Target: <b>6.5</b></div>

      {{-- Per-skill bars --}}
      <div style="display:flex;flex-direction:column;gap:6px;margin:10px 0;">
        @foreach([['L','Listening','5.5',60],['R','Reading','6.0',80],['W','Writing','5.5',60],['S','Speaking','5.5',60]] as $sk)
        <div style="display:flex;align-items:center;gap:6px;">
          <span style="font-size:10px;font-weight:700;color:var(--muted);width:14px;">{{ $sk[0] }}</span>
          <div style="flex:1;height:4px;background:rgba(255,255,255,.06);border-radius:4px;overflow:hidden;">
            <div style="height:100%;width:{{ $sk[3] }}%;background:{{ $sk[2]==='6.0' ? 'var(--green-acc)' : 'var(--yellow)' }};border-radius:4px;"></div>
          </div>
          <span style="font-size:11px;font-weight:700;color:{{ $sk[2]==='6.0' ? 'var(--green-acc)' : 'var(--text-2)' }};">{{ $sk[2] }}</span>
        </div>
        @endforeach
      </div>

      <div class="simulation-box">
        <div class="sim-row">
          <span class="sim-label">Jika Writing 5.5 → 6.5</span>
          <span class="sim-impact">+0.25 Overall</span>
        </div>
        <div style="height:1px;background:var(--border);margin:8px 0;"></div>
        <div class="sim-row">
          <span class="sim-label">Jika Speaking 5.5 → 6.5</span>
          <span class="sim-impact">+0.25 Overall</span>
        </div>
        <div style="height:1px;background:var(--border);margin:8px 0;"></div>
        <div class="sim-row">
          <span class="sim-label">Estimasi Overall (Juli)</span>
          <span class="sim-impact" style="color:var(--green-acc)">6.5 ✓</span>
        </div>
      </div>
    </div>

    {{-- Goal Reinforcement --}}
    <div class="coach-sidebar-item">
      <div class="section-label" style="font-size:10px;margin-bottom:12px;">🎯 Goal Reinforcement</div>
      <div style="font-size:13px;font-weight:700;color:var(--white);margin-bottom:6px;">Target: IELTS 6.5 · 4 Jul 2026</div>
      <div style="font-size:12px;color:var(--muted);line-height:1.6;">
        Gap: <b style="color:var(--orange);">+1.0 Writing</b>, <b style="color:var(--orange);">+1.0 Speaking</b>, <b style="color:var(--blue-acc);">+1.0 Listening</b>, <b style="color:var(--green-acc);">+0.5 Reading</b>.
        Fokus utama: selesaikan Grammar lalu pindah ke Writing & Speaking intensif.
      </div>
      <div style="margin-top:10px;">
        <div style="display:flex;justify-content:space-between;font-size:11px;">
          <span style="color:var(--muted);">Unit 4 Grammar</span>
          <span style="font-weight:700;color:var(--yellow);">60% selesai</span>
        </div>
        <div class="prog-bar" style="margin-top:4px;height:4px;"><div class="prog-fill" style="width:60%;"></div></div>
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
    <div class="coach-sidebar-item" style="border-color:rgba(239,68,68,0.2);background:rgba(239,68,68,0.03)">
      <div class="section-label" style="font-size:10px;margin-bottom:8px;color:#ef4444">⚔️ Clan Alert</div>
      <div style="font-size:12px;color:#fca5a5;line-height:1.5;">
        <b>IELTS Warriors 6.5</b> — kamu Rank <b>#12</b> dari 32 anggota. Clan butuh kontribusimu hari ini! Siti Rahma baru selesaikan Unit 5.
      </div>
      <button class="escalation-btn" style="background:rgba(239,68,68,0.1);border-color:rgba(239,68,68,0.3);color:#fca5a5;margin-top:10px;" onclick="window.location.href='/dashboard-study/clan'">LIHAT CLAN</button>
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
    setTimeout(() => {
        let response = "";

        if (userTxt.toLowerCase().includes('writing')) {
            response = "Siap! Mari fokus ke <b>Writing Task 2</b>. Berdasarkan pola belajarmu, kamu sering kesulitan di bagian <i>Conclusion &amp; Coherence</i>. Coba formula ini: <b>P-E-E-L</b> (Point → Evidence → Explanation → Link). Target: dari 5.5 → 6.5 dalam 2 bulan. Mau kita latihan dengan topik IELTS terbaru?";
        } else if (userTxt.toLowerCase().includes('simulasi') || userTxt.toLowerCase().includes('skor')) {
            response = "Skor saat ini: <b>L:5.5 | R:6.0 | W:5.5 | S:5.5</b> (Overall: 5.5). Simulasi: jika Writing naik ke 6.5 dan Speaking ke 6.5, <b>Overall-mu menjadi 6.25</b>. Tambah 0.25 di Listening — dan kamu sudah di 6.5! Kita bisa mulai dari Writing minggu ini.";
        } else if (userTxt.toLowerCase().includes('feedback')) {
            response = "Berdasarkan latihan terakhirmu (Grammar U4, 60%): <b>Tenses</b> sudah bagus (95%), tapi <b>Articles (a/an/the)</b> masih 68% — perlu lebih banyak latihan. Saya rekomendasikan 15 menit latihan artikel setiap pagi sebelum sesi utama.";
        } else if (userTxt.toLowerCase().includes('clan') || userTxt.toLowerCase().includes('jadwal')) {
            response = "<b>IELTS Warriors 6.5</b> — kamu Rank #12 dari 32 anggota. Siti Rahma baru selesaikan Unit 5. Kalau kamu selesaikan Grammar U4 hari ini, kamu naik ke Rank #10 dan menyumbang <b>+40 Clan XP</b>. Clan War berakhir 8 Mar — warriors butuhmu! ⚔️";
        } else {
            response = "Ingat target utama: <b>IELTS 6.5 pada 4 Juli 2026</b>. Kamu punya 121 hari. Pace saat ini: on-track ✓. Yang paling penting sekarang: selesaikan <b>Grammar Unit 4</b> (tinggal 40%), lalu kita langsung masuk ke Listening & Writing. Apakah kamu butuh bantuan dengan bagian tertentu? 🔥";
        }

        addMsg(response, 'ai');

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
