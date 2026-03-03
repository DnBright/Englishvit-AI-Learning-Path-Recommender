@extends('layouts.lms-layout')
@section('title', '📅 Integrated Calendar')
@section('nav_calendar', 'active')
@section('topbar_title', '📅 Integrated Calendar')

@section('content')

<div class="cal-layout">
  <div class="cal-main">
    <div class="cal-nav">
      <button class="cal-arrow" onclick="calChange(-1)">&#8592;</button>
      <div class="cal-month" id="calMonth">March <span class="yr">2026</span></div>
      <button class="cal-arrow" onclick="calChange(1)">&#8594;</button>
    </div>
    <div class="cal-grid" id="calGrid"></div>
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
    let html=`<div class="cdn">${d}</div>`;
    evts.forEach((ev, idx)=>{
      html+=`<span class="cev ${ev.cls}" draggable="true" ondragstart="dragEvent(event, '${key}', ${idx})" style="cursor: grab;">${ev.label}</span>`;
    });
    cell.innerHTML=html;
    cell.onclick=()=>{
      document.querySelectorAll('.cal-cell').forEach(c=>c.classList.remove('sel'));
      cell.classList.add('sel');
    };
    grid.appendChild(cell);
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
}

function dropEvent(ev, targetKey) {
  ev.preventDefault();
  if(!draggedEvt) return;
  
  const { sourceKey, evtIndex } = draggedEvt;
  if(sourceKey === targetKey) return; // dropped on same date
  
  // Remove from source
  const evObj = CAL_EVENTS[sourceKey].splice(evtIndex, 1)[0];
  if(CAL_EVENTS[sourceKey].length === 0) delete CAL_EVENTS[sourceKey];
  
  // Add to target
  if(!CAL_EVENTS[targetKey]) CAL_EVENTS[targetKey] = [];
  CAL_EVENTS[targetKey].push(evObj);
  
  draggedEvt = null;
  renderCal();
}
renderCal();
</script>
@endsection
