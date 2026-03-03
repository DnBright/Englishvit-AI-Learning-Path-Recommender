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
      <div class="section-label">📋 Jadwal Hari Ini</div>
      <div class="sched-row">
        <div class="sched-time">07:00</div>
        <div class="sched-bar" style="background:var(--orange)"></div>
        <div class="sched-info">
          <div class="st">Morning Speaking Session</div>
          <div class="ss">Intermediate · Zoom</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">09:30</div>
        <div class="sched-bar" style="background:var(--blue-acc)"></div>
        <div class="sched-info">
          <div class="st">Grammar — Unit 4</div>
          <div class="ss">Self-paced · Online</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">16:00</div>
        <div class="sched-bar" style="background:var(--yellow)"></div>
        <div class="sched-info">
          <div class="st">Live Q&A — IELTS Writing</div>
          <div class="ss">All levels · Zoom</div>
        </div>
      </div>
      <div class="sched-row">
        <div class="sched-time">19:00</div>
        <div class="sched-bar" style="background:var(--green-acc)"></div>
        <div class="sched-info">
          <div class="st">Conversation Club</div>
          <div class="ss">Beginner–Intermediate</div>
        </div>
      </div>
    </div>

    <div class="sched-card">
      <div class="section-label">📊 Stats Bulan Ini</div>
      <div style="display:flex;gap:16px;">
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:28px;font-weight:800;color:var(--yellow)">18</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">Kelas</div>
        </div>
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:28px;font-weight:800;color:var(--white)">36</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">Jam</div>
        </div>
        <div style="flex:1;text-align:center;">
          <div style="font-family:var(--font-disp);font-size:28px;font-weight:800;color:var(--green-acc)">5</div>
          <div style="font-size:10px;color:var(--muted);text-transform:uppercase;letter-spacing:1px;">Event</div>
        </div>
      </div>
      <div class="prog-bar" style="margin-top:16px">
        <div class="prog-fill" style="width:72%"></div>
      </div>
      <div style="font-size:11px;color:var(--muted);margin-top:6px">72% dari target bulanan (50 jam)</div>
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
const CAL_EVENTS={
  '2026-3-4':[{label:'Speaking',cls:'cev-o'},{label:'TOEFL',cls:'cev-g'}],
  '2026-3-5':[{label:'Live Session',cls:'cev-y'}],
  '2026-3-7':[{label:'Grammar',cls:'cev-b'}],
  '2026-3-8':[{label:'Checkpoint 1',cls:'cev-g'}],
  '2026-3-11':[{label:'Live Q&A',cls:'cev-y'},{label:'Grammar',cls:'cev-b'}],
  '2026-3-14':[{label:'Speaking',cls:'cev-o'}],
  '2026-3-16':[{label:'TOEFL Prep',cls:'cev-g'}],
  '2026-3-18':[{label:'Live Session',cls:'cev-y'}],
  '2026-3-21':[{label:'Speaking',cls:'cev-o'},{label:'Grammar',cls:'cev-b'}],
  '2026-3-23':[{label:'Mock Test',cls:'cev-g'}],
  '2026-3-25':[{label:'Live Q&A',cls:'cev-y'}],
  '2026-3-28':[{label:'Speaking',cls:'cev-o'}],
};

// Unscheduled source events (Nyawa / Tiket)
let UNSCHEDULED_EVENTS = [
  {label:'Live Class Zoom 1', cls:'cev-y'},
  {label:'Live Class Zoom 2', cls:'cev-y'},
  {label:'One-on-One 1', cls:'cev-o'},
  {label:'One-on-One 2', cls:'cev-o'},
  {label:'TOEFL Test Attempt', cls:'cev-g'},
  {label:'Grammar Clinic', cls:'cev-b'}
];

let calCur={year:2026,month:3};

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
    cell.appendChild(htmlDiv);
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
      const span = document.createElement('span');
      span.className = `cev ${ev.cls}`;
      span.style.padding = '6px 12px';
      span.style.fontSize = '12px';
      span.style.cursor = 'grab';
      span.setAttribute('draggable', 'true');
      span.setAttribute('ondragstart', `dragEvent(event, 'unscheduled', ${idx})`);
      span.innerText = ev.label;
      zone.appendChild(span);
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
