@extends('layouts.lms-layout')
@section('title', '📅 Integrated Calendar')
@section('nav_calendar', 'active')
@section('topbar_title', '📅 Integrated Calendar')

@section('content')

<div class="cal-layout">
  <div class="cal-main">
    <div class="cal-nav">
      <div style="display:flex; gap:12px; align-items:center;">
        <button class="cal-arrow" onclick="calChange(-1)">&#8592;</button>
        <div class="cal-month" id="calMonth">March <span class="yr">2026</span></div>
        <button class="cal-arrow" onclick="calChange(1)">&#8594;</button>
      </div>
      
      <div style="display:flex; gap:12px; align-items:center;">
        <!-- Trash Dropzone -->
        <div id="trashZone" class="trash-zone" ondragover="allowDrop(event)" ondrop="deleteEvent(event)" 
             style="display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; background:rgba(255,90,90,0.1); border:1px dashed rgba(255,90,90,0.5); color:#FF5A5A; font-size:16px; cursor:pointer; transition:all 0.2s;"
             title="Tarik event ke sini untuk menghapus">
          🗑️
        </div>
        
        <!-- Add Button -->
        <button class="btn-yellow" style="display:flex; align-items:center; gap:6px; padding:8px 14px; font-size:13px; font-weight:700; border:none; border-radius:8px; cursor:pointer;" onclick="alert('Fitur tambah jadwal akan segera hadir!')">
          <span>+</span> Tambah Jadwal
        </button>
      </div>
    </div>
    
    <div style="margin-bottom:16px; font-size:12px; color:var(--text-2); display:flex; align-items:center; gap:6px; background:var(--bg-card); padding:10px 14px; border-radius:8px; border:1px solid rgba(255,255,255,0.05);">
      💡 <strong style="color:var(--white)">Tips:</strong> Kamu bisa memindahkan jadwal (seperti Speaking, Grammar, TOEFL) ke hari lain dengan cara <strong>drag and drop</strong> (tarik dan lepas), atau hapus dengan menariknya ke ikon tempat sampah.
    </div>
    <div class="cal-grid" id="calGrid"></div>
    
    <!-- Unscheduled Classes (Nyawa) -->
    <div style="margin-top:24px; background:var(--bg-card); border-radius:12px; border:1px solid rgba(255,255,255,0.05); overflow:hidden;">
      <div style="padding:16px 20px; border-bottom:1px solid rgba(255,255,255,0.05); font-weight:700; display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; align-items:center; gap:8px;">
          <span style="font-size:18px;">🎒</span>
          <span>Kelas Belum Terjadwal (Sisa Tiket/Nyawa)</span>
        </div>
        <span style="font-size:12px; font-weight:500; color:var(--text-2); background:rgba(255,255,255,0.1); padding:4px 10px; border-radius:12px;" id="unschedCount">0</span>
      </div>
      <div id="unscheduledZone" style="padding:20px; display:flex; flex-wrap:wrap; gap:10px; min-height:80px; background:rgba(0,0,0,0.2);" ondragover="allowDrop(event)" ondrop="dropEvent(event, 'unscheduled')">
        <!-- Unscheduled events will be rendered here -->
      </div>
    </div>
  </div>

  <div class="cal-side">
    <div class="sched-card">
      <div class="section-label">📋 Jadwal Hari Ini — 4 Mar 2026</div>
      <div class="sched-row">
        <div class="sched-time">08:00</div>
        <div class="sched-bar" style="background:var(--blue-acc)"></div>
        <div class="sched-info">
          <div class="st">Grammar — Unit 4 (Self-Study)</div>
          <div class="ss">Section 1 · 60% selesai · Mandiri</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">10:00</div>
        <div class="sched-bar" style="background:var(--orange)"></div>
        <div class="sched-info">
          <div class="st">Speaking Practice — Part 1 & 2</div>
          <div class="ss">IELTS Prep · Zoom · Mr. Aryo</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">14:00</div>
        <div class="sched-bar" style="background:var(--yellow)"></div>
        <div class="sched-info">
          <div class="st">IELTS Writing Q&A Live</div>
          <div class="ss">Task 2 Focus · All Levels · Zoom</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">20:00</div>
        <div class="sched-bar" style="background:var(--green-acc)"></div>
        <div class="sched-info">
          <div class="st">Clan Group Study ⚔️</div>
          <div class="ss">IELTS Warriors 6.5 · Zoom</div>
        </div>
      </div>
    </div>

    <div class="sched-card">
      <div class="section-label">📊 Progress Bulan Maret</div>
      <div style="display:flex;gap:12px;margin-bottom:14px;">
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:26px;font-weight:800;color:var(--yellow)">14</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">Kelas</div>
        </div>
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:26px;font-weight:800;color:var(--white)">28</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">Jam</div>
        </div>
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:26px;font-weight:800;color:var(--green-acc)">1,250</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">XP</div>
        </div>
      </div>
      <div class="prog-bar">
        <div class="prog-fill" style="width:56%"></div>
      </div>
      <div style="font-size:11px;color:var(--muted);margin-top:6px">56% dari target bulanan (50 jam) · on-track ✓</div>
      <div style="margin-top:12px;display:flex;flex-direction:column;gap:4px;">
        <div style="display:flex;justify-content:space-between;font-size:11px;">
          <span style="color:var(--muted)">FLOW Boost Test 2</span>
          <span style="font-weight:700;color:var(--orange)">28 Mei 2026</span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:11px;">
          <span style="color:var(--muted)">Simulation Final Test</span>
          <span style="font-weight:700;color:var(--yellow)">23 Jun 2026</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
/* ============================================================
   CALENDAR
=========================================================== */
const MONTHS=['January','February','March','April','May','June','July','August','September','October','November','December'];

// Scheduled target events
/* ── TOEFL Survivors 580 · Rina · April - Juni 2026 ── */
const CAL_EVENTS={
  // BULAN 1 (APRIL)
  '2026-4-1': [{label:'FLOW Boost Test 1',cls:'cev-y',icon:'assessment'}],
  '2026-4-2': [{label:'Live Class 1',cls:'cev-b',icon:'sensors'}],
  '2026-4-4': [{label:'Self Study Reading',cls:'cev-g',icon:'menu_book'},{label:'Listening Drill',cls:'cev-g',icon:'hearing'}],
  '2026-4-5': [{label:'Review & Error Log',cls:'cev-g',icon:'rule'}],
  '2026-4-7': [{label:'Live Class 2',cls:'cev-b',icon:'sensors'}],
  '2026-4-9': [{label:'Live Class 3',cls:'cev-b',icon:'sensors'}],
  '2026-4-11':[{label:'Private Session 1',cls:'cev-o',icon:'person'},{label:'Reading Practice',cls:'cev-g',icon:'timer'}],
  '2026-4-14':[{label:'Live Class 4',cls:'cev-b',icon:'sensors'}],
  '2026-4-16':[{label:'Live Class 5',cls:'cev-b',icon:'sensors'}],
  '2026-4-18':[{label:'Listening Full Drill',cls:'cev-g',icon:'headphones'},{label:'Vocabulary',cls:'cev-g',icon:'grade'}],
  '2026-4-21':[{label:'Live Class 6',cls:'cev-b',icon:'sensors'}],
  '2026-4-23':[{label:'Live Class 7',cls:'cev-b',icon:'sensors'}],
  '2026-4-25':[{label:'Mini Simulation',cls:'cev-y',icon:'emoji_events'},{label:'Review',cls:'cev-g',icon:'rule'}],

  // BULAN 2 (MEI)
  '2026-5-5': [{label:'Live Class 8',cls:'cev-b',icon:'sensors'}],
  '2026-5-7': [{label:'Live Class 9',cls:'cev-b',icon:'sensors'}],
  '2026-5-9': [{label:'Reading Timed',cls:'cev-g',icon:'timer'},{label:'Error Log Review',cls:'cev-g',icon:'history_edu'}],
  '2026-5-12':[{label:'Live Class 10',cls:'cev-b',icon:'sensors'}],
  '2026-5-14':[{label:'Live Class 11',cls:'cev-b',icon:'sensors'}],
  '2026-5-16':[{label:'Private Session 2',cls:'cev-o',icon:'person'}],
  '2026-5-19':[{label:'Live Class 12',cls:'cev-b',icon:'sensors'}],
  '2026-5-21':[{label:'Live Class 13',cls:'cev-b',icon:'sensors'}],
  '2026-5-23':[{label:'Full Practice Test',cls:'cev-y',icon:'assessment'},{label:'Review',cls:'cev-g',icon:'rule'}],
  '2026-5-26':[{label:'Live Class 14',cls:'cev-b',icon:'sensors'}],
  '2026-5-28':[{label:'FLOW Boost Test 2',cls:'cev-y',icon:'flag'},{label:'Score Analysis',cls:'cev-g',icon:'insights'}],

  // BULAN 3 (JUNI)
  '2026-6-2': [{label:'Live Class 15',cls:'cev-b',icon:'sensors'}],
  '2026-6-4': [{label:'Live Class 16',cls:'cev-b',icon:'sensors'}],
  '2026-6-6': [{label:'Private Session 3',cls:'cev-o',icon:'person'}],
  '2026-6-9': [{label:'Live Class 17',cls:'cev-b',icon:'sensors'}],
  '2026-6-11':[{label:'Live Class 18',cls:'cev-b',icon:'sensors'}],
  '2026-6-13':[{label:'Full Mock Test 1',cls:'cev-y',icon:'emoji_events'}],
  '2026-6-16':[{label:'Live Class 19',cls:'cev-b',icon:'sensors'}],
  '2026-6-18':[{label:'Live Class 20',cls:'cev-b',icon:'sensors'}],
  '2026-6-20':[{label:'Full Mock Test 2',cls:'cev-y',icon:'emoji_events'},{label:'Deep Review',cls:'cev-g',icon:'rule'}],
  '2026-6-23':[{label:'Simulation Final',cls:'cev-y',icon:'flag'}],
  '2026-6-25':[{label:'Score Projection',cls:'cev-g',icon:'trending_up'}],
};

// Tiket kelas yang belum dijadwalkan (Backpack kosong untuk demo)
let UNSCHEDULED_EVENTS = [];

let calCur={year:2026,month:4};

function calChange(dir){
  calCur.month+=dir;
  if(calCur.month>12){calCur.month=1;calCur.year++;}
  if(calCur.month<1){calCur.month=12;calCur.year--;}
  renderCal();
}
function renderCal(){
  const{year,month}=calCur;
  document.getElementById('calMonth').innerHTML=`${MONTHS[month-1]} <span class="yr">${year}</span>`;
  const today=new Date();
  const todayKey=`${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`;
  const firstDay=new Date(year,month-1,1).getDay();
  const dim=new Date(year,month,0).getDate();
  const grid=document.getElementById('calGrid');
  grid.innerHTML='';
  const dh=['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
  dh.forEach((d,i)=>{
    const h=document.createElement('div');
    h.className='cal-dh'+(i===0||i===6?' wknd':'');
    h.textContent=d;grid.appendChild(h);
  });
  for(let i=0;i<firstDay;i++){
    const e=document.createElement('div');e.className='cal-cell empty';grid.appendChild(e);
  }
  for(let d=1;d<=dim;d++){
    const key=`${year}-${month}-${d}`;
    const dow=new Date(year,month-1,d).getDay();
    const wknd=dow===0||dow===6;
    const isToday=key===todayKey;
    const evts=CAL_EVENTS[key]||[];
    const cell=document.createElement('div');
    cell.className='cal-cell'+(wknd?' wknd-cell':'')+(isToday?' today':'')+(evts.length?' has-ev':'');
    cell.setAttribute('ondragover', 'allowDrop(event)');
    cell.setAttribute('ondrop', `dropEvent(event, '${key}')`);
    let html=`<div class="cdn">${d}</div>`;
    evts.forEach((ev, idx)=>{
      html += `
        <div class="cev-ticket ${ev.cls}" draggable="true" ondragstart="dragEvent(event, '${key}', ${idx})">
          <div class="cev-icon"><span class="material-icons" style="font-size:11px;">${ev.icon}</span></div>
          <div class="cev-label">${ev.label}</div>
        </div>
      `;
    });
    cell.innerHTML=html;
    cell.onclick=()=>{
      document.querySelectorAll('.cal-cell').forEach(c=>c.classList.remove('sel'));
      cell.classList.add('sel');
    };
    grid.appendChild(cell);
  }
  
  renderUnscheduled();
}

function renderUnscheduled() {
  const zone = document.getElementById('unscheduledZone');
  const count = document.getElementById('unschedCount');
  zone.innerHTML = '';
  count.innerText = UNSCHEDULED_EVENTS.length + ' Item';
  
  if (UNSCHEDULED_EVENTS.length === 0) {
    zone.innerHTML = '<div style="color:var(--text-2); font-size:13px; font-style:italic; padding:10px;">Semua tiket kelas sudah dijadwalkan! 🎉</div>';
  } else {
    UNSCHEDULED_EVENTS.forEach((ev, idx) => {
      const ticket = document.createElement('div');
      ticket.className = `cev-ticket ${ev.cls} unsched-ticket`;
      ticket.setAttribute('draggable', 'true');
      ticket.setAttribute('ondragstart', `dragEvent(event, 'unscheduled', ${idx})`);
      ticket.innerHTML = `
        <div class="cev-icon"><span class="material-icons" style="font-size:15px;">${ev.icon}</span></div>
        <div class="cev-label">${ev.label}</div>
      `;
      zone.appendChild(ticket);
    });
  }
}

// Drag and Drop State
let draggedEvt = null;

function allowDrop(ev) {
  ev.preventDefault();
}

function dragEvent(ev, sourceKey, evtIndex) {
  draggedEvt = { sourceKey, evtIndex };
  ev.dataTransfer.effectAllowed = 'move';
  document.getElementById('trashZone').style.background = 'rgba(255,90,90,0.2)';
  document.getElementById('trashZone').style.borderStyle = 'solid';
  document.getElementById('trashZone').style.transform = 'scale(1.05)';
  
  // Highlight unchedulled drop zone if dragging from calendar
  if(sourceKey !== 'unscheduled') {
    document.getElementById('unscheduledZone').style.background = 'rgba(255,255,255,0.05)';
  }
}

function dropEvent(ev, targetKey) {
  ev.preventDefault();
  resetTrashStyle();
  if(!draggedEvt) return;
  
  const { sourceKey, evtIndex } = draggedEvt;
  if(sourceKey === targetKey) return; // dropped on same date/zone
  
  // Extract from source array
  let evObj;
  if (sourceKey === 'unscheduled') {
    evObj = UNSCHEDULED_EVENTS.splice(evtIndex, 1)[0];
  } else {
    evObj = CAL_EVENTS[sourceKey].splice(evtIndex, 1)[0];
    if(CAL_EVENTS[sourceKey].length === 0) delete CAL_EVENTS[sourceKey];
  }
  
  // Add to target array
  if (targetKey === 'unscheduled') {
    UNSCHEDULED_EVENTS.push(evObj);
  } else {
    if(!CAL_EVENTS[targetKey]) CAL_EVENTS[targetKey] = [];
    CAL_EVENTS[targetKey].push(evObj);
  }
  
  draggedEvt = null;
  renderCal();
}

function deleteEvent(ev) {
  ev.preventDefault();
  resetTrashStyle();
  if(!draggedEvt) return;
  const { sourceKey, evtIndex } = draggedEvt;
  
  // Remove from source permanently
  if (sourceKey === 'unscheduled') {
    UNSCHEDULED_EVENTS.splice(evtIndex, 1);
  } else {
    CAL_EVENTS[sourceKey].splice(evtIndex, 1);
    if(CAL_EVENTS[sourceKey].length === 0) delete CAL_EVENTS[sourceKey];
  }
  
  draggedEvt = null;
  renderCal();
}

function resetTrashStyle() {
  const tz = document.getElementById('trashZone');
  if(tz) {
    tz.style.background = 'rgba(255,90,90,0.1)';
    tz.style.borderStyle = 'dashed';
    tz.style.transform = 'scale(1)';
  }
  const uz = document.getElementById('unscheduledZone');
  if(uz) {
    uz.style.background = 'rgba(0,0,0,0.2)';
  }
}

// Add global drag end to reset trash style if dropped outside
document.addEventListener('dragend', resetTrashStyle);

renderCal();
</script>
@endsection
