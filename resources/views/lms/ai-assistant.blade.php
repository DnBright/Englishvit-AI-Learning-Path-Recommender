@extends('layouts.lms-layout')
@section('title', '🤖 AI Assistant')
@section('nav_ai', 'active')
@section('topbar_title', '🤖 AI Assistant')

@section('content')
<h2 class="page-title">AI Assistant</h2>
<p class="page-sub">Asisten belajar personal yang memahami roadmap dan progressmu secara real-time.</p>

<div class="ai-layout">
  <div class="chat-area">
    <div class="chat-messages" id="chatMessages">
      <div class="msg msg-ai">
        <div class="msg-avatar" style="background:transparent;"><img src="{{ asset('images/logo-new.png') }}" style="width: 24px; object-fit: contain; filter: brightness(0) invert(1);"></div>
        <div>
          <div class="msg-bubble">
            Halo {{ explode(' ', Auth::user()->name ?? 'Student')[0] }}! 👋 Saya sudah analisa progress belajarmu minggu ini.<br><br>
            Kamu sudah menyelesaikan <strong>3 dari 5 task</strong> di Unit 4. Good job! Tapi saya lihat kamu belum sentuh <em>Writing Task 2 Practice</em> dalam 3 hari terakhir. Mau kita mulai sekarang?
          </div>
          <span class="msg-time">09:00 · AI Assistant</span>
        </div>
      </div>
      <div class="msg msg-user">
        <div class="msg-avatar">{{ substr(Auth::user()->name ?? 'S', 0, 1) }}</div>
        <div>
          <div class="msg-bubble">Iya betul, saya kesulitan di bagian essay structure-nya.</div>
          <span class="msg-time" style="text-align:right;display:block;">09:02</span>
        </div>
      </div>
      <div class="msg msg-ai">
        <div class="msg-avatar" style="background:transparent;"><img src="{{ asset('images/logo-new.png') }}" style="width: 24px; object-fit: contain; filter: brightness(0) invert(1);"></div>
        <div>
          <div class="msg-bubble">
            Paham! Writing Task 2 memang butuh latihan struktur yang konsisten. Ini quick tip dari saya:<br><br>
            <strong>Formula PEEL:</strong><br>
            📌 <em>Point</em> — Nyatakan pendapatmu<br>
            📌 <em>Evidence</em> — Berikan bukti/contoh<br>
            📌 <em>Explanation</em> — Jelaskan relevansinya<br>
            📌 <em>Link</em> — Hubungkan ke topik utama<br><br>
            Mau saya buatkan satu exercise pendek sekarang?
          </div>
          <span class="msg-time">09:03 · AI Assistant</span>
        </div>
      </div>
      <div class="msg msg-user">
        <div class="msg-avatar">{{ substr(Auth::user()->name ?? 'S', 0, 1) }}</div>
        <div>
          <div class="msg-bubble">Boleh! Sekarang saja.</div>
          <span class="msg-time" style="text-align:right;display:block;">09:04</span>
        </div>
      </div>
      <div class="msg msg-ai">
        <div class="msg-avatar" style="background:transparent;"><img src="{{ asset('images/logo-new.png') }}" style="width: 24px; object-fit: contain; filter: brightness(0) invert(1);"></div>
        <div>
          <div class="msg-bubble">
            ✏️ <strong>Exercise — Writing Task 2</strong><br><br>
            <em>"Some people believe technology makes communication easier. Others argue it creates more problems. Discuss both views and give your own opinion."</em><br><br>
            Coba tulis 1 body paragraph menggunakan formula PEEL di atas. Kirim ke sini, saya akan kasih feedback langsung! ⏱ Target: 15 menit.
          </div>
          <span class="msg-time">09:04 · AI Assistant</span>
        </div>
      </div>
    </div>
    <div class="chat-input-area">
      <input class="chat-input" id="chatInput" placeholder="Tanya sesuatu atau kirim jawaban latihan..." onkeydown="if(event.key==='Enter')sendMsg()">
      <button class="chat-send" onclick="sendMsg()">➤</button>
    </div>
  </div>

  <div class="ai-sidebar">
    <div class="ai-stat-card">
      <div class="section-label">Analisa Performa</div>
      <div style="display:flex;flex-direction:column;gap:12px;">
        <div>
          <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px;">
            <span>Speaking</span><span style="color:var(--orange);font-weight:700">5.5</span>
          </div>
          <div class="prog-bar"><div class="prog-fill" style="width:55%"></div></div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px;">
            <span>Writing</span><span style="color:var(--orange);font-weight:700">5.0</span>
          </div>
          <div class="prog-bar"><div class="prog-fill" style="width:50%"></div></div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px;">
            <span>Reading</span><span style="color:var(--green-acc);font-weight:700">6.5</span>
          </div>
          <div class="prog-bar"><div class="prog-fill blue" style="width:78%"></div></div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:4px;">
            <span>Listening</span><span style="color:var(--yellow);font-weight:700">6.0</span>
          </div>
          <div class="prog-bar"><div class="prog-fill" style="width:65%;background:linear-gradient(90deg,var(--blue-acc),#7BAEFF)"></div></div>
        </div>
      </div>
    </div>

    <div class="ai-stat-card">
      <div class="section-label">🔔 Reminder Aktif</div>
      <div class="alert-item">
        <div class="alert-dot" style="background:var(--orange)"></div>
        <div>
          <div class="alert-txt">Writing Task 2 Practice belum dikerjakan</div>
          <div class="alert-time">3 hari tertunda</div>
        </div>
      </div>
      <div class="alert-item">
        <div class="alert-dot" style="background:var(--yellow)"></div>
        <div>
          <div class="alert-txt">Checkpoint 1 — 3 hari lagi</div>
          <div class="alert-time">8 Maret 2026</div>
        </div>
      </div>
      <div class="alert-item">
        <div class="alert-dot" style="background:var(--blue-acc)"></div>
        <div>
          <div class="alert-txt">Live Speaking Session hari ini jam 16.00</div>
          <div class="alert-time">Zoom · Mr. Aryo</div>
        </div>
      </div>
    </div>

    <div class="ai-stat-card" style="background:var(--yellow-dim);border-color:rgba(245,200,66,.25)">
      <div style="font-size:13px;font-weight:700;margin-bottom:4px;">💡 Rekomendasi AI</div>
      <div style="font-size:12px;color:var(--text-2);line-height:1.6;">
        Tambah 20 menit latihan Writing setiap hari selama 2 minggu ke depan. 
        Skor estimasimu bisa naik dari <span style="color:var(--orange);font-weight:700">5.0</span> ke <span style="color:var(--green-acc);font-weight:700">6.0</span>.
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   AI CHAT
=========================================================== */
function sendMsg(){
  const inp=document.getElementById('chatInput');
  const txt=inp.value.trim();if(!txt)return;
  addMsg(txt,'user');
  inp.value='';
  setTimeout(()=>{
    const replies=[
      "Bagus! Coba kirim paragrafnya dan saya akan langsung feedback struktur PEEL-nya. 💪",
      "Itu sudah arah yang benar. Pastikan 'Evidence' kamu spesifik dengan contoh nyata atau data.",
      "Mau saya buka latihan tambahan di Unit 4 untuk kamu? Tinggal satu klik! ✨",
      "Skor speaking-mu minggu ini naik 0.3 poin! Pertahankan konsistensinya ya.",
    ];
    addMsg(replies[Math.floor(Math.random()*replies.length)],'ai');
  },1000);
}
function addMsg(txt,role){
  const c=document.getElementById('chatMessages');
  const d=document.createElement('div');
  d.className=`msg msg-${role}`;
  const now=new Date();
  const time=now.getHours()+':'+String(now.getMinutes()).padStart(2,'0');
  d.innerHTML=`
    <div class="msg-avatar" ${role==='ai'?'style="background:transparent;"':''}>
      ${role==='ai' 
        ? '<img src="{{ asset("images/logo-new.png") }}" style="width: 24px; object-fit: contain; filter: brightness(0) invert(1);">' 
        : '{{ substr(Auth::user()->name ?? "S", 0, 1) }}'}
    </div>
    <div>
      <div class="msg-bubble">${txt}</div>
      <span class="msg-time" ${role==='user'?'style="text-align:right;display:block;"':''}>${time}${role==='ai'?' · AI Assistant':''}</span>
    </div>
  `;
  c.appendChild(d);
  c.scrollTop=c.scrollHeight;
}
</script>
@endsection
