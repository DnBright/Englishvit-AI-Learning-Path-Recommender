<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Success Path — Englishvit</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
<style>
/* ============================================================
   ROOT & RESET
============================================================ */
:root {
  --navy:       #08152E;
  --navy-2:     #0F1E45;
  --navy-3:     #162755;
  --navy-card:  rgba(255,255,255,.045);
  --border:     rgba(255,255,255,.08);
  --yellow:     #F5C842;
  --yellow-dim: rgba(245,200,66,.12);
  --orange:     #F5842A;
  --orange-dim: rgba(245,132,42,.15);
  --blue-acc:   #4F7BFF;
  --green-acc:  #3DD68C;
  --red-acc:    #FF5A5A;
  --white:      #FFFFFF;
  --muted:      #6E80A8;
  --text-2:     #9DAAC8;
  --radius:     16px;
  --sidebar:    240px;
  --font-disp:  'Syne', sans-serif;
  --font-body:  'Plus Jakarta Sans', sans-serif;
}
*{margin:0;padding:0;box-sizing:border-box;}
html,body{height:100%;overflow:hidden;}
body{
  background:var(--navy);
  font-family:var(--font-body);
  color:var(--white);
  display:flex;
}

/* ============================================================
   SIDEBAR
============================================================ */
.sidebar{
  width:var(--sidebar);
  min-height:100vh;
  background:var(--navy-2);
  border-right:1px solid var(--border);
  display:flex;
  flex-direction:column;
  padding:24px 0;
  position:fixed;
  top:0;left:0;bottom:0;
  z-index:100;
  transition:transform .3s ease;
}
.sb-logo{
  display:flex;align-items:center;gap:10px;
  padding:0 20px 24px;
  border-bottom:1px solid var(--border);
  margin-bottom:16px;
}
.sb-logo-mark{
  width:38px;height:38px;
  background:var(--yellow);
  border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  font-family:var(--font-disp);
  font-weight:800;font-size:15px;color:var(--navy);
  box-shadow:0 4px 16px rgba(245,200,66,.35);
  flex-shrink:0;
}
.sb-logo-txt{
  font-family:var(--font-disp);
  font-size:17px;font-weight:800;line-height:1.1;
}
.sb-logo-txt span{color:var(--yellow);}
.sb-logo-sub{font-size:9px;color:var(--muted);font-weight:600;letter-spacing:1px;text-transform:uppercase;}

.sb-section{
  padding:8px 12px 4px;
  font-size:9px;letter-spacing:1.4px;text-transform:uppercase;
  color:var(--muted);font-weight:700;margin-top:8px;
}
.sb-item{
  display:flex;align-items:center;gap:10px;
  padding:10px 20px;
  margin:2px 10px;
  border-radius:10px;
  cursor:pointer;
  font-size:13px;font-weight:600;
  color:var(--text-2);
  transition:all .18s;
  border:1px solid transparent;
}
.sb-item:hover{background:rgba(255,255,255,.06);color:var(--white);}
.sb-item.active{
  background:var(--yellow-dim);
  border-color:rgba(245,200,66,.25);
  color:var(--yellow);
}
.sb-item .sb-icon{
  width:30px;height:30px;
  border-radius:8px;
  background:rgba(255,255,255,.06);
  display:flex;align-items:center;justify-content:center;
  font-size:14px;flex-shrink:0;
  transition:all .18s;
}
.sb-item.active .sb-icon{background:rgba(245,200,66,.2);}
.sb-badge{
  margin-left:auto;
  background:var(--orange);
  color:#fff;font-size:10px;font-weight:800;
  padding:2px 7px;border-radius:20px;
}

.sb-bottom{
  margin-top:auto;
  padding:16px 20px;
  border-top:1px solid var(--border);
}
.sb-user{display:flex;align-items:center;gap:10px;}
.sb-avatar{
  width:34px;height:34px;border-radius:50%;
  background:linear-gradient(135deg,var(--blue-acc),var(--yellow));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:13px;color:var(--navy);
}
.sb-user-name{font-size:13px;font-weight:700;}
.sb-user-tag{font-size:11px;color:var(--muted);}

/* ============================================================
   MAIN AREA
============================================================ */
.main{
  margin-left:var(--sidebar);
  flex:1;
  height:100vh;
  overflow-y:auto;
  overflow-x:hidden;
}

/* Top bar */
.topbar{
  position:sticky;top:0;z-index:50;
  background:rgba(8,21,46,.85);
  backdrop-filter:blur(16px);
  border-bottom:1px solid var(--border);
  padding:14px 32px;
  display:flex;align-items:center;justify-content:space-between;
}
.topbar-title{
  font-family:var(--font-disp);
  font-size:18px;font-weight:800;
}
.topbar-actions{display:flex;gap:10px;align-items:center;}
.btn-ghost{
  background:rgba(255,255,255,.07);
  border:1px solid var(--border);
  color:var(--text-2);
  padding:7px 16px;
  border-radius:40px;
  font-size:12px;font-weight:700;
  cursor:pointer;font-family:var(--font-body);
  transition:all .18s;
}
.btn-ghost:hover{background:rgba(255,255,255,.12);color:var(--white);}
.btn-yellow{
  background:var(--yellow);
  border:none;color:var(--navy);
  padding:8px 18px;
  border-radius:40px;
  font-size:12px;font-weight:800;
  cursor:pointer;font-family:var(--font-body);
  box-shadow:0 4px 14px rgba(245,200,66,.3);
  transition:all .18s;
}
.btn-yellow:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(245,200,66,.4);}

/* Page container */
.page{display:none;padding:32px;}
.page.active{display:block;animation:fadein .3s ease;}
@keyframes fadein{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}

/* ============================================================
   COMMON COMPONENTS
============================================================ */
.card{
  background:var(--navy-card);
  border:1px solid var(--border);
  border-radius:var(--radius);
  padding:22px;
}
.card-sm{padding:16px;}
.section-label{
  font-size:10px;letter-spacing:1.5px;text-transform:uppercase;
  color:var(--muted);font-weight:700;margin-bottom:12px;
}
.tag{
  display:inline-block;
  padding:3px 10px;border-radius:20px;
  font-size:11px;font-weight:700;
}
.tag-yellow{background:var(--yellow-dim);color:var(--yellow);}
.tag-orange{background:var(--orange-dim);color:var(--orange);}
.tag-blue{background:rgba(79,123,255,.15);color:var(--blue-acc);}
.tag-green{background:rgba(61,214,140,.12);color:var(--green-acc);}
.tag-red{background:rgba(255,90,90,.12);color:var(--red-acc);}
.tag-muted{background:rgba(255,255,255,.06);color:var(--muted);}

.prog-bar{height:6px;background:rgba(255,255,255,.08);border-radius:10px;overflow:hidden;margin-top:10px;}
.prog-fill{height:100%;border-radius:10px;background:linear-gradient(90deg,var(--yellow),var(--orange));transition:width .8s ease;}
.prog-fill.blue{background:linear-gradient(90deg,var(--blue-acc),#7BAEFF);}
.prog-fill.green{background:linear-gradient(90deg,var(--green-acc),#7DFFC9);}

h2.page-title{
  font-family:var(--font-disp);
  font-size:26px;font-weight:800;letter-spacing:-0.5px;
  margin-bottom:4px;
}
p.page-sub{color:var(--text-2);font-size:14px;margin-bottom:28px;}

.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
.grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;}
.grid-auto{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px;}

/* ============================================================
   PAGE 1 — MAP
============================================================ */
#page-map .path-container{
  position:relative;
  padding:20px 0 40px;
  display:flex;flex-direction:column;align-items:center;
  gap:0;
}
.path-row{
  display:flex;align-items:center;justify-content:center;gap:0;
  width:100%;position:relative;
  margin-bottom:0;
}
.path-node{
  position:relative;
  display:flex;flex-direction:column;align-items:center;
  margin:0 30px;
}
.node-circle{
  width:64px;height:64px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  font-size:22px;cursor:pointer;
  position:relative;z-index:2;
  transition:all .25s;
  border:2.5px solid transparent;
}
.node-circle:hover{transform:scale(1.08);}
.node-done .node-circle{
  background:var(--yellow);
  box-shadow:0 0 0 6px rgba(245,200,66,.15),0 6px 20px rgba(245,200,66,.35);
  border-color:var(--yellow);
}
.node-progress .node-circle{
  background:var(--orange);
  box-shadow:0 0 0 6px rgba(245,132,42,.15),0 6px 20px rgba(245,132,42,.35);
  border-color:var(--orange);
  animation:pulse 2s infinite;
}
@keyframes pulse{0%,100%{box-shadow:0 0 0 6px rgba(245,132,42,.15),0 6px 20px rgba(245,132,42,.3)}50%{box-shadow:0 0 0 12px rgba(245,132,42,.08),0 6px 20px rgba(245,132,42,.4)}}
.node-locked .node-circle{
  background:rgba(255,255,255,.05);
  border-color:rgba(255,255,255,.1);
  color:var(--muted);cursor:not-allowed;
}
.node-checkpoint .node-circle{
  background:var(--blue-acc);
  box-shadow:0 0 0 6px rgba(79,123,255,.15),0 6px 20px rgba(79,123,255,.3);
  border-color:var(--blue-acc);
}
.node-label{
  margin-top:8px;text-align:center;
  font-size:11px;font-weight:700;
  color:var(--text-2);max-width:80px;line-height:1.3;
}
.node-done .node-label{color:var(--yellow);}
.node-progress .node-label{color:var(--orange);}
.node-checkpoint .node-label{color:var(--blue-acc);}

.path-connector{
  position:absolute;top:32px;
  height:3px;background:rgba(255,255,255,.08);
  z-index:1;
}
.path-connector.done{background:linear-gradient(90deg,var(--yellow),var(--orange));}

.map-prog-banner{
  background:linear-gradient(135deg,rgba(245,200,66,.12),rgba(245,132,42,.08));
  border:1px solid rgba(245,200,66,.2);
  border-radius:var(--radius);
  padding:20px 28px;
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:28px;flex-wrap:wrap;gap:16px;
}
.map-prog-left h3{
  font-family:var(--font-disp);
  font-size:20px;font-weight:800;margin-bottom:4px;
}
.map-prog-left p{font-size:13px;color:var(--text-2);}
.map-prog-right{text-align:right;}
.big-pct{
  font-family:var(--font-disp);
  font-size:42px;font-weight:800;
  color:var(--yellow);letter-spacing:-2px;line-height:1;
}
.big-pct span{font-size:18px;color:var(--muted);}

/* ============================================================
   PAGE 2 — ROADMAP
============================================================ */
.roadmap-header{
  background:linear-gradient(135deg,var(--navy-3),rgba(79,123,255,.1));
  border:1px solid var(--border);
  border-radius:20px;
  padding:28px;
  margin-bottom:24px;
  display:grid;
  grid-template-columns:1fr auto;
  gap:20px;align-items:center;
}
.target-chips{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px;}
.probability-ring{
  width:100px;height:100px;
  border-radius:50%;
  background:conic-gradient(var(--yellow) 0% 78%, rgba(255,255,255,.08) 78% 100%);
  display:flex;align-items:center;justify-content:center;
  position:relative;
}
.probability-ring::before{
  content:'';position:absolute;
  width:78px;height:78px;border-radius:50%;
  background:var(--navy-3);
}
.prob-inner{
  position:relative;z-index:1;text-align:center;
}
.prob-num{font-family:var(--font-disp);font-size:22px;font-weight:800;color:var(--yellow);}
.prob-lbl{font-size:9px;color:var(--muted);font-weight:700;}

.timeline-phases{display:flex;flex-direction:column;gap:12px;margin-bottom:24px;}
.phase-card{
  background:var(--navy-card);
  border:1px solid var(--border);
  border-radius:var(--radius);
  overflow:hidden;
}
.phase-header{
  padding:16px 20px;
  display:flex;align-items:center;justify-content:space-between;
  cursor:pointer;
}
.phase-title-row{display:flex;align-items:center;gap:12px;}
.phase-num{
  width:32px;height:32px;border-radius:8px;
  background:var(--yellow-dim);
  color:var(--yellow);
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:13px;
}
.phase-expand{color:var(--muted);transition:transform .2s;}
.phase-expand.open{transform:rotate(180deg);}
.phase-tasks{
  border-top:1px solid var(--border);
  padding:16px 20px;
  display:none;flex-direction:column;gap:8px;
}
.phase-tasks.open{display:flex;}
.task-row{
  display:flex;align-items:center;gap:12px;
  padding:10px 14px;border-radius:10px;
  background:rgba(255,255,255,.03);
  border:1px solid var(--border);
}
.task-icon{font-size:16px;width:24px;text-align:center;}
.task-name{font-size:13px;font-weight:600;flex:1;}
.task-status{font-size:11px;font-weight:700;}

/* ============================================================
   PAGE 3 — AI ASSISTANT
============================================================ */
.ai-layout{display:grid;grid-template-columns:1fr 320px;gap:20px;align-items:start;}
.chat-area{
  background:var(--navy-card);
  border:1px solid var(--border);
  border-radius:20px;
  overflow:hidden;
  display:flex;flex-direction:column;
  height:calc(100vh - 200px);
}
.chat-messages{
  flex:1;overflow-y:auto;
  padding:20px;display:flex;flex-direction:column;gap:14px;
  scrollbar-width:thin;
  scrollbar-color:var(--border) transparent;
}
.msg{display:flex;gap:10px;align-items:flex-end;}
.msg.user{flex-direction:row-reverse;}
.msg-avatar{
  width:32px;height:32px;border-radius:50%;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;font-weight:800;
}
.msg-ai .msg-avatar{background:var(--yellow);color:var(--navy);}
.msg-user .msg-avatar{background:var(--blue-acc);color:#fff;}
.msg-bubble{
  max-width:70%;
  padding:12px 16px;border-radius:16px;
  font-size:13px;line-height:1.6;
}
.msg-ai .msg-bubble{
  background:rgba(255,255,255,.06);
  border:1px solid var(--border);
  border-bottom-left-radius:4px;
}
.msg-user .msg-bubble{
  background:var(--yellow);
  color:var(--navy);font-weight:600;
  border-bottom-right-radius:4px;
}
.msg-time{font-size:10px;color:var(--muted);margin-top:3px;display:block;}

.chat-input-area{
  padding:16px;border-top:1px solid var(--border);
  display:flex;gap:10px;align-items:center;
}
.chat-input{
  flex:1;background:rgba(255,255,255,.06);
  border:1px solid var(--border);
  color:var(--white);font-family:var(--font-body);font-size:13px;
  padding:12px 16px;border-radius:12px;outline:none;
  transition:border .18s;
}
.chat-input:focus{border-color:rgba(245,200,66,.4);}
.chat-input::placeholder{color:var(--muted);}
.chat-send{
  width:40px;height:40px;border-radius:10px;
  background:var(--yellow);border:none;
  color:var(--navy);font-size:16px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  transition:all .18s;
}
.chat-send:hover{transform:scale(1.05);box-shadow:0 4px 14px rgba(245,200,66,.4);}

.ai-sidebar{display:flex;flex-direction:column;gap:14px;}
.ai-stat-card{
  background:var(--navy-card);border:1px solid var(--border);
  border-radius:var(--radius);padding:18px;
}
.alert-item{
  display:flex;gap:10px;padding:10px 0;
  border-bottom:1px solid var(--border);align-items:flex-start;
}
.alert-item:last-child{border:none;padding-bottom:0;}
.alert-dot{width:8px;height:8px;border-radius:50%;margin-top:5px;flex-shrink:0;}
.alert-txt{font-size:12px;line-height:1.5;}
.alert-time{font-size:10px;color:var(--muted);margin-top:2px;}

/* ============================================================
   PAGE 4 — CALENDAR
============================================================ */
.cal-layout{display:grid;grid-template-columns:1fr 300px;gap:20px;}
.cal-main{background:var(--navy-card);border:1px solid var(--border);border-radius:20px;padding:24px;}
.cal-nav{display:flex;align-items:center;gap:16px;margin-bottom:20px;}
.cal-month{font-family:var(--font-disp);font-size:22px;font-weight:800;}
.cal-month .yr{color:var(--yellow);}
.cal-arrow{
  width:34px;height:34px;border-radius:50%;
  background:rgba(255,255,255,.07);border:1px solid var(--border);
  color:var(--white);cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;transition:all .18s;
}
.cal-arrow:hover{background:var(--yellow);color:var(--navy);border-color:var(--yellow);}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:6px;}
.cal-dh{
  text-align:center;font-size:10px;font-weight:700;
  letter-spacing:1px;text-transform:uppercase;color:var(--muted);
  padding:6px 0;
}
.cal-dh.wknd{color:rgba(245,200,66,.6);}
.cal-cell{
  background:rgba(255,255,255,.03);border:1px solid transparent;
  border-radius:10px;min-height:72px;padding:8px;
  cursor:pointer;transition:all .18s;position:relative;
  overflow:hidden;
}
.cal-cell:hover{background:rgba(255,255,255,.07);border-color:var(--border);}
.cal-cell.empty{background:transparent;pointer-events:none;}
.cal-cell.today{border-color:var(--yellow);background:rgba(245,200,66,.07);}
.cal-cell.today .cdn{color:var(--yellow);}
.cal-cell.sel{background:var(--yellow);border-color:var(--yellow);}
.cal-cell.sel .cdn,.cal-cell.sel .cev{color:var(--navy)!important;}
.cal-cell.sel .cev{background:rgba(11,21,46,.2)!important;}
.cdn{font-size:13px;font-weight:700;margin-bottom:4px;}
.cal-cell.wknd-cell .cdn{color:rgba(245,200,66,.6);}
.cev{
  font-size:9px;font-weight:700;
  padding:2px 6px;border-radius:5px;
  margin-bottom:2px;display:block;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.cev-o{background:rgba(245,132,42,.2);color:var(--orange);}
.cev-b{background:rgba(79,123,255,.2);color:var(--blue-acc);}
.cev-g{background:rgba(61,214,140,.15);color:var(--green-acc);}
.cev-y{background:rgba(245,200,66,.15);color:var(--yellow);}

.cal-side{display:flex;flex-direction:column;gap:14px;}
.sched-card{background:var(--navy-card);border:1px solid var(--border);border-radius:var(--radius);padding:18px;}
.sched-row{display:flex;gap:12px;align-items:flex-start;padding:10px 0;border-bottom:1px solid var(--border);}
.sched-row:last-child{border:none;padding-bottom:0;}
.sched-time{font-size:11px;font-weight:700;color:var(--muted);min-width:44px;padding-top:2px;}
.sched-bar{width:3px;border-radius:4px;align-self:stretch;min-height:30px;}
.sched-info .st{font-size:13px;font-weight:700;margin-bottom:2px;}
.sched-info .ss{font-size:11px;color:var(--muted);}

/* ============================================================
   PAGE 5 — CLAN
============================================================ */
.clan-banner{
  background:linear-gradient(135deg,var(--navy-3),rgba(79,123,255,.15));
  border:1px solid rgba(79,123,255,.25);
  border-radius:20px;padding:28px;
  display:grid;grid-template-columns:1fr auto;
  gap:20px;align-items:center;margin-bottom:24px;
}
.clan-name{
  font-family:var(--font-disp);
  font-size:28px;font-weight:800;letter-spacing:-0.5px;
  margin-bottom:4px;
}
.clan-stats{display:flex;gap:24px;margin-top:16px;}
.cs-item{text-align:center;}
.cs-num{font-family:var(--font-disp);font-size:24px;font-weight:800;color:var(--yellow);}
.cs-lbl{font-size:10px;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:1px;}
.clan-shield{
  width:80px;height:80px;
  background:linear-gradient(135deg,var(--blue-acc),#7BAEFF);
  border-radius:20px;
  display:flex;align-items:center;justify-content:center;
  font-size:36px;
  box-shadow:0 8px 30px rgba(79,123,255,.4);
}

.leaderboard .lb-row{
  display:flex;align-items:center;gap:14px;
  padding:12px 16px;border-radius:12px;
  background:rgba(255,255,255,.03);border:1px solid var(--border);
  margin-bottom:8px;transition:all .18s;cursor:pointer;
}
.lb-row:hover{background:rgba(255,255,255,.06);}
.lb-row.me{background:var(--yellow-dim);border-color:rgba(245,200,66,.25);}
.lb-rank{
  font-family:var(--font-disp);
  font-size:18px;font-weight:800;color:var(--muted);
  width:28px;text-align:center;flex-shrink:0;
}
.lb-rank.gold{color:var(--yellow);}
.lb-rank.silver{color:#C0C8D8;}
.lb-rank.bronze{color:#CD7F32;}
.lb-avatar{
  width:36px;height:36px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:13px;flex-shrink:0;
}
.lb-info{flex:1;}
.lb-name{font-size:13px;font-weight:700;}
.lb-stat{font-size:11px;color:var(--muted);}
.lb-pts{
  font-family:var(--font-disp);
  font-size:16px;font-weight:800;color:var(--yellow);
}
.lb-bar-wrap{flex:1;max-width:100px;}
.lb-bar{height:4px;background:rgba(255,255,255,.06);border-radius:4px;overflow:hidden;margin-top:4px;}
.lb-fill{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--yellow),var(--orange));}

/* ============================================================
   PAGE 6 — CLASS MENU
============================================================ */
.class-tabs{display:flex;gap:8px;margin-bottom:24px;}
.ctab{
  padding:8px 18px;border-radius:40px;
  font-size:12px;font-weight:700;cursor:pointer;
  border:1px solid var(--border);color:var(--muted);
  transition:all .18s;
}
.ctab:hover{color:var(--white);border-color:rgba(255,255,255,.2);}
.ctab.active{background:var(--yellow);color:var(--navy);border-color:var(--yellow);}

.class-card{
  background:var(--navy-card);border:1px solid var(--border);
  border-radius:var(--radius);padding:0;overflow:hidden;
  transition:all .25s;cursor:pointer;
}
.class-card:hover{transform:translateY(-3px);box-shadow:0 12px 40px rgba(0,0,0,.3);border-color:rgba(245,200,66,.2);}
.class-thumb{
  height:120px;
  display:flex;align-items:center;justify-content:center;
  font-size:36px;position:relative;
  overflow:hidden;
}
.class-thumb::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(180deg,transparent 40%,rgba(8,21,46,.8));
}
.class-body{padding:16px;}
.class-title{font-size:15px;font-weight:700;margin-bottom:6px;}
.class-meta{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;}
.class-actions{display:flex;gap:8px;}
.btn-sm{
  padding:7px 14px;border-radius:8px;
  font-size:11px;font-weight:700;cursor:pointer;
  font-family:var(--font-body);transition:all .18s;border:none;
}
.btn-sm-yellow{background:var(--yellow);color:var(--navy);}
.btn-sm-yellow:hover{box-shadow:0 4px 14px rgba(245,200,66,.3);}
.btn-sm-ghost{
  background:rgba(255,255,255,.07);
  color:var(--text-2);
  border:1px solid var(--border);
}
.btn-sm-ghost:hover{background:rgba(255,255,255,.12);color:var(--white);}

.attend-row{
  display:flex;align-items:center;gap:12px;
  padding:12px 0;border-bottom:1px solid var(--border);
}
.attend-row:last-child{border:none;}
.att-ico{
  width:36px;height:36px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;font-size:16px;
  flex-shrink:0;
}

/* ============================================================
   SCROLLBAR
============================================================ */
::-webkit-scrollbar{width:5px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:rgba(255,255,255,.1);border-radius:4px;}
::-webkit-scrollbar-thumb:hover{background:rgba(255,255,255,.2);}

/* ============================================================
   RESPONSIVE
============================================================ */
@media(max-width:900px){
  .sidebar{transform:translateX(-100%);}
  .sidebar.open{transform:translateX(0);}
  .main{margin-left:0;}
  .ai-layout,.cal-layout{grid-template-columns:1fr;}
  .grid-3{grid-template-columns:1fr 1fr;}
  .roadmap-header{grid-template-columns:1fr;}
  .clan-banner{grid-template-columns:1fr;}
}
</style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<nav class="sidebar" id="sidebar">
  <div class="sb-logo">
    <div class="sb-logo-mark">Ev</div>
    <div>
      <div class="sb-logo-txt">english<span>vit</span></div>
      <div class="sb-logo-sub">My Success Path</div>
    </div>
  </div>

  <div class="sb-section">Learning</div>
  <div class="sb-item active" onclick="gotoPage('map',this)">
    <div class="sb-icon">🗺</div> My Map
  </div>
  <div class="sb-item" onclick="gotoPage('roadmap',this)">
    <div class="sb-icon">📘</div> Core Roadmap
  </div>
  <div class="sb-item" onclick="gotoPage('ai',this)">
    <div class="sb-icon">🤖</div> AI Assistant
    <span class="sb-badge">3</span>
  </div>

  <div class="sb-section">Schedule</div>
  <div class="sb-item" onclick="gotoPage('calendar',this)">
    <div class="sb-icon">📅</div> Calendar
  </div>

  <div class="sb-section">Community</div>
  <div class="sb-item" onclick="gotoPage('clan',this)">
    <div class="sb-icon">👥</div> Clan
  </div>
  <div class="sb-item" onclick="gotoPage('classes',this)">
    <div class="sb-icon">🎓</div> Class Menu
  </div>

  <div class="sb-bottom">
    <div class="sb-user">
      <div class="sb-avatar">AR</div>
      <div>
        <div class="sb-user-name">Aryo Rahmat</div>
        <div class="sb-user-tag">IELTS 6.5 Target</div>
      </div>
    </div>
  </div>
</nav>

<!-- ===== MAIN ===== -->
<div class="main">

  <!-- TOP BAR -->
  <div class="topbar">
    <div class="topbar-title" id="topbar-title">🗺 My Success Path</div>
    <div class="topbar-actions">
      <button class="btn-ghost">🔔 Notifikasi</button>
      <button class="btn-yellow">+ Tambah Sesi</button>
    </div>
  </div>

  <!-- ===================== PAGE: MAP ===================== -->
  <div id="page-map" class="page active">
    <h2 class="page-title">My Success Path</h2>
    <p class="page-sub">Visualisasi perjalanan belajarmu dari awal hingga target IELTS 6.5 tercapai.</p>

    <div class="map-prog-banner">
      <div class="map-prog-left">
        <h3>🎯 IELTS Target: 6.5</h3>
        <p>Timeline: 4 Bulan &nbsp;·&nbsp; Estimasi selesai: <strong>Juli 2026</strong></p>
        <div class="prog-bar" style="width:260px;margin-top:12px">
          <div class="prog-fill" style="width:32%"></div>
        </div>
        <div style="font-size:12px;color:var(--muted);margin-top:6px">Unit 4 dari 12 selesai</div>
      </div>
      <div class="map-prog-right">
        <div class="big-pct">32<span>%</span></div>
        <div style="font-size:12px;color:var(--muted)">Completed</div>
      </div>
    </div>

    <div class="card" style="padding:32px 20px;">
      <div class="path-container" id="pathContainer"></div>
    </div>

    <div class="grid-3" style="margin-top:20px;">
      <div class="card card-sm">
        <div class="section-label">Status Saat Ini</div>
        <div style="font-size:15px;font-weight:700;margin-bottom:4px">📖 Foundation — Unit 4</div>
        <div style="font-size:12px;color:var(--muted)">Grammar Fundamentals</div>
        <div class="prog-bar"><div class="prog-fill" style="width:60%"></div></div>
        <div style="font-size:11px;color:var(--muted);margin-top:6px">60% selesai</div>
      </div>
      <div class="card card-sm">
        <div class="section-label">Checkpoint Berikutnya</div>
        <div style="font-size:15px;font-weight:700;margin-bottom:4px">⭐ Checkpoint 1</div>
        <div style="font-size:12px;color:var(--muted)">Mini Test — 8 Maret 2026</div>
        <div style="margin-top:10px"><span class="tag tag-orange">3 hari lagi</span></div>
      </div>
      <div class="card card-sm">
        <div class="section-label">Unit Selanjutnya</div>
        <div style="font-size:15px;font-weight:700;margin-bottom:4px">🔒 Unit 5</div>
        <div style="font-size:12px;color:var(--muted)">Listening Strategies</div>
        <div style="margin-top:10px"><span class="tag tag-muted">Terkunci</span></div>
      </div>
    </div>
  </div>

  <!-- ===================== PAGE: ROADMAP ===================== -->
  <div id="page-roadmap" class="page">
    <h2 class="page-title">Core Roadmap</h2>
    <p class="page-sub">Rencana belajarmu yang dipersonalisasi oleh AI berdasarkan profil dan target.</p>

    <div class="roadmap-header">
      <div>
        <div class="section-label">Target Summary</div>
        <div style="font-family:var(--font-disp);font-size:22px;font-weight:800;margin-bottom:8px">
          IELTS 6.5 &nbsp;<span style="color:var(--muted);font-size:16px">dalam 4 bulan</span>
        </div>
        <div class="target-chips">
          <span class="tag tag-orange">⚠ Speaking — Fokus Utama</span>
          <span class="tag tag-orange">⚠ Writing — Fokus Utama</span>
          <span class="tag tag-green">✓ Reading — Baik</span>
          <span class="tag tag-blue">~ Listening — Perlu Latihan</span>
        </div>
      </div>
      <div>
        <div style="text-align:center;margin-bottom:8px">
          <div class="section-label" style="margin:0 0 6px">Peluang Sukses</div>
        </div>
        <div class="probability-ring">
          <div class="prob-inner">
            <div class="prob-num">78%</div>
            <div class="prob-lbl">chance</div>
          </div>
        </div>
      </div>
    </div>

    <div class="timeline-phases" id="timelinePhases"></div>

    <div class="card" style="background:linear-gradient(135deg,rgba(61,214,140,.08),rgba(79,123,255,.05));border-color:rgba(61,214,140,.2);">
      <div style="display:flex;gap:12px;align-items:flex-start;">
        <div style="font-size:24px;">🤖</div>
        <div>
          <div style="font-weight:700;margin-bottom:4px;">Catatan AI Recommender</div>
          <div style="font-size:13px;color:var(--text-2);line-height:1.6;">
            Berdasarkan performamu minggu ini, <strong style="color:var(--yellow)">Writing Task 2</strong> perlu perhatian ekstra. 
            Roadmap telah disesuaikan — 2 sesi latihan tambahan ditambahkan di Minggu 3. 
            Jika kamu mempertahankan konsistensi ini, peluang suksesmu naik ke <strong style="color:var(--green-acc)">85%</strong>.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===================== PAGE: AI ASSISTANT ===================== -->
  <div id="page-ai" class="page">
    <h2 class="page-title">AI Assistant</h2>
    <p class="page-sub">Asisten belajar personal yang memahami roadmap dan progressmu secara real-time.</p>

    <div class="ai-layout">
      <div class="chat-area">
        <div class="chat-messages" id="chatMessages">
          <div class="msg msg-ai">
            <div class="msg-avatar">Ev</div>
            <div>
              <div class="msg-bubble">
                Halo Aryo! 👋 Saya sudah analisa progress belajarmu minggu ini.<br><br>
                Kamu sudah menyelesaikan <strong>3 dari 5 task</strong> di Unit 4. Good job! Tapi saya lihat kamu belum sentuh <em>Writing Task 2 Practice</em> dalam 3 hari terakhir. Mau kita mulai sekarang?
              </div>
              <span class="msg-time">09:00 · AI Assistant</span>
            </div>
          </div>
          <div class="msg msg-user">
            <div class="msg-avatar">AR</div>
            <div>
              <div class="msg-bubble">Iya betul, saya kesulitan di bagian essay structure-nya.</div>
              <span class="msg-time" style="text-align:right;display:block;">09:02</span>
            </div>
          </div>
          <div class="msg msg-ai">
            <div class="msg-avatar">Ev</div>
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
            <div class="msg-avatar">AR</div>
            <div>
              <div class="msg-bubble">Boleh! Sekarang saja.</div>
              <span class="msg-time" style="text-align:right;display:block;">09:04</span>
            </div>
          </div>
          <div class="msg msg-ai">
            <div class="msg-avatar">Ev</div>
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
  </div>

  <!-- ===================== PAGE: CALENDAR ===================== -->
  <div id="page-calendar" class="page">
    <h2 class="page-title">Integrated Calendar</h2>
    <p class="page-sub">Semua jadwal belajar, live class, dan deadline dalam satu tampilan.</p>

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
  </div>

  <!-- ===================== PAGE: CLAN ===================== -->
  <div id="page-clan" class="page">
    <h2 class="page-title">Clan System</h2>
    <p class="page-sub">Belajar lebih semangat bersama kelompok dengan target yang sama.</p>

    <div class="clan-banner">
      <div>
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
          <span class="tag tag-blue">Clan Aktif</span>
          <span class="tag tag-muted">32 Anggota</span>
        </div>
        <div class="clan-name">⚔️ IELTS Warriors 6.5</div>
        <div style="font-size:13px;color:var(--text-2);">Target bersama: IELTS 6.5 · Deadline: Juli 2026</div>
        <div class="clan-stats">
          <div class="cs-item">
            <div class="cs-num">32</div>
            <div class="cs-lbl">Anggota</div>
          </div>
          <div class="cs-item">
            <div class="cs-num">94%</div>
            <div class="cs-lbl">Aktif minggu ini</div>
          </div>
          <div class="cs-item">
            <div class="cs-num">#12</div>
            <div class="cs-lbl">Rank kamu</div>
          </div>
        </div>
      </div>
      <div class="clan-shield">⚔️</div>
    </div>

    <div class="grid-2">
      <div>
        <div class="section-label" style="margin-bottom:14px">🏆 Weekly Leaderboard</div>
        <div class="leaderboard" id="leaderboard"></div>
      </div>
      <div>
        <div class="section-label" style="margin-bottom:14px">🔥 Weekly Challenge</div>
        <div class="card card-sm" style="margin-bottom:12px;border-color:rgba(245,200,66,.2);background:var(--yellow-dim)">
          <div style="font-weight:700;margin-bottom:6px;">🗣 Speaking Marathon</div>
          <div style="font-size:12px;color:var(--text-2);line-height:1.6;margin-bottom:12px;">
            Record 3 speaking answers (2 menit tiap satu) dan submit sebelum Minggu jam 23:59.
          </div>
          <div class="prog-bar"><div class="prog-fill" style="width:33%"></div></div>
          <div style="display:flex;justify-content:space-between;margin-top:6px;">
            <div style="font-size:11px;color:var(--muted)">1 dari 3 selesai</div>
            <div style="font-size:11px;color:var(--yellow)">Sisa 4 hari</div>
          </div>
        </div>

        <div class="section-label" style="margin-bottom:14px">💬 Forum Diskusi</div>
        <div class="card card-sm" style="margin-bottom:10px;">
          <div style="display:flex;gap:10px;align-items:flex-start;">
            <div class="lb-avatar" style="background:linear-gradient(135deg,#F5C842,#F5842A);color:var(--navy);font-size:11px;">DS</div>
            <div>
              <div style="font-size:13px;font-weight:600;">Dini Sari</div>
              <div style="font-size:12px;color:var(--text-2);margin-top:2px;">"Ada yang sudah coba PEEL structure untuk Task 2? Hasilnya gimana?"</div>
              <div style="font-size:10px;color:var(--muted);margin-top:6px;">2 jam lalu · 8 replies</div>
            </div>
          </div>
        </div>
        <div class="card card-sm" style="margin-bottom:10px;">
          <div style="display:flex;gap:10px;align-items:flex-start;">
            <div class="lb-avatar" style="background:linear-gradient(135deg,var(--blue-acc),#7BAEFF);color:#fff;font-size:11px;">BW</div>
            <div>
              <div style="font-size:13px;font-weight:600;">Bagas W.</div>
              <div style="font-size:12px;color:var(--text-2);margin-top:2px;">"Checkpoint 1 besok — ada yang mau group study malam ini?"</div>
              <div style="font-size:10px;color:var(--muted);margin-top:6px;">5 jam lalu · 14 replies</div>
            </div>
          </div>
        </div>
        <button class="btn-yellow" style="width:100%;font-family:var(--font-body);font-size:13px;padding:12px;">+ Buat Post Diskusi</button>
      </div>
    </div>
  </div>

  <!-- ===================== PAGE: CLASSES ===================== -->
  <div id="page-classes" class="page">
    <h2 class="page-title">Class Menu</h2>
    <p class="page-sub">Semua kelas, materi, dan rekaman yang terintegrasi dengan roadmap belajarmu.</p>

    <div class="class-tabs">
      <div class="ctab active" onclick="switchTab(this,'tab-jadwal')">📅 Jadwal Aktif</div>
      <div class="ctab" onclick="switchTab(this,'tab-rekaman')">▶ Rekaman</div>
      <div class="ctab" onclick="switchTab(this,'tab-materi')">📚 Materi</div>
      <div class="ctab" onclick="switchTab(this,'tab-absensi')">✔ Absensi</div>
    </div>

    <!-- TAB: JADWAL -->
    <div id="tab-jadwal" class="tab-content">
      <div class="grid-3" id="classCards"></div>
    </div>

    <!-- TAB: REKAMAN -->
    <div id="tab-rekaman" class="tab-content" style="display:none">
      <div class="grid-3">
        <div class="card card-sm">
          <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 28 Feb 2026</div>
          <div style="font-weight:700;margin-bottom:4px;">Speaking Session — IELTS Part 2</div>
          <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 45 menit · Mr. Aryo</div>
          <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
        </div>
        <div class="card card-sm">
          <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 25 Feb 2026</div>
          <div style="font-weight:700;margin-bottom:4px;">Grammar Masterclass — Tenses</div>
          <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 60 menit · Ms. Rina</div>
          <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
        </div>
        <div class="card card-sm">
          <div style="font-size:11px;color:var(--muted);margin-bottom:8px;">📅 20 Feb 2026</div>
          <div style="font-weight:700;margin-bottom:4px;">TOEFL Listening Strategy</div>
          <div style="font-size:12px;color:var(--text-2);margin-bottom:12px;">Durasi: 50 menit · Mr. Bayu</div>
          <button class="btn-sm btn-sm-yellow">▶ Putar Rekaman</button>
        </div>
      </div>
    </div>

    <!-- TAB: MATERI -->
    <div id="tab-materi" class="tab-content" style="display:none">
      <div style="display:flex;flex-direction:column;gap:10px;">
        <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
          <div style="font-size:28px;">📄</div>
          <div style="flex:1">
            <div style="font-weight:700;">IELTS Writing Task 2 — Guide PDF</div>
            <div style="font-size:12px;color:var(--muted);">Unit 4 · 24 halaman · 2.1 MB</div>
          </div>
          <button class="btn-sm btn-sm-yellow">⬇ Download</button>
        </div>
        <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
          <div style="font-size:28px;">📊</div>
          <div style="flex:1">
            <div style="font-weight:700;">Grammar Fundamentals — Slide Deck</div>
            <div style="font-size:12px;color:var(--muted);">Unit 3 · 48 slide · 5.4 MB</div>
          </div>
          <button class="btn-sm btn-sm-yellow">⬇ Download</button>
        </div>
        <div class="card card-sm" style="display:flex;align-items:center;gap:14px;">
          <div style="font-size:28px;">🎧</div>
          <div style="flex:1">
            <div style="font-weight:700;">Listening Practice Pack — MP3</div>
            <div style="font-size:12px;color:var(--muted);">Unit 5 · 12 audio · 45 MB</div>
          </div>
          <button class="btn-sm btn-sm-ghost">🔒 Locked</button>
        </div>
      </div>
    </div>

    <!-- TAB: ABSENSI -->
    <div id="tab-absensi" class="tab-content" style="display:none">
      <div class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
          <div>
            <div style="font-family:var(--font-disp);font-size:22px;font-weight:800;">92% <span style="font-size:14px;color:var(--muted);font-weight:400">Kehadiran</span></div>
            <div style="font-size:12px;color:var(--text-2);margin-top:2px;">22 dari 24 sesi hadir</div>
          </div>
          <span class="tag tag-green">Sangat Baik ✓</span>
        </div>
        <div id="absenList"></div>
      </div>
    </div>
  </div>

</div><!-- /main -->

<script>
/* ============================================================
   NAVIGATION
============================================================ */
const pageMap = {
  map:      { title:'🗺 My Success Path',    id:'page-map' },
  roadmap:  { title:'📘 Core Roadmap',       id:'page-roadmap' },
  ai:       { title:'🤖 AI Assistant',       id:'page-ai' },
  calendar: { title:'📅 Integrated Calendar',id:'page-calendar' },
  clan:     { title:'👥 Clan System',        id:'page-clan' },
  classes:  { title:'🎓 Class Menu',         id:'page-classes' },
};

function gotoPage(key, el) {
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));
  document.querySelectorAll('.sb-item').forEach(i=>i.classList.remove('active'));
  document.getElementById(pageMap[key].id).classList.add('active');
  document.getElementById('topbar-title').textContent = pageMap[key].title;
  if(el) el.classList.add('active');
}

/* ============================================================
   MAP — PATH NODES
============================================================ */
const nodes = [
  {label:'Assessment',type:'done',icon:'✅'},
  {label:'Unit 1\nVocab Basics',type:'done',icon:'📗'},
  {label:'Unit 2\nPronunciation',type:'done',icon:'🎤'},
  {label:'Checkpoint 1',type:'checkpoint',icon:'⭐'},
  {label:'Unit 3\nReading Intro',type:'done',icon:'📖'},
  {label:'Unit 4\nGrammar',type:'progress',icon:'✏️'},
  {label:'Checkpoint 2',type:'checkpoint',icon:'⭐'},
  {label:'Unit 5\nListening',type:'locked',icon:'🔒'},
  {label:'Unit 6\nSpeaking',type:'locked',icon:'🔒'},
  {label:'Checkpoint 3',type:'checkpoint',icon:'⭐'},
  {label:'Unit 7\nWriting',type:'locked',icon:'🔒'},
  {label:'Mock Test 1',type:'locked',icon:'🔒'},
  {label:'🎯 IELTS 6.5',type:'locked',icon:'🏆'},
];

function renderMap(){
  const c=document.getElementById('pathContainer');
  c.innerHTML='';
  const row=document.createElement('div');
  row.style.cssText='display:flex;flex-wrap:wrap;justify-content:center;gap:16px 0;width:100%;';
  nodes.forEach((n,i)=>{
    const nd=document.createElement('div');
    nd.className=`path-node node-${n.type}`;
    nd.style.cssText='display:flex;flex-direction:column;align-items:center;margin:12px 18px;';
    const circ=document.createElement('div');
    circ.className='node-circle';
    circ.style.cssText='width:60px;height:60px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:22px;';
    circ.textContent=n.icon;
    const lbl=document.createElement('div');
    lbl.className='node-label';
    lbl.style.cssText='margin-top:8px;text-align:center;font-size:11px;font-weight:700;max-width:80px;line-height:1.3;white-space:pre-line;';
    lbl.textContent=n.label;
    nd.appendChild(circ);nd.appendChild(lbl);
    row.appendChild(nd);
  });
  c.appendChild(row);
}
renderMap();

/* ============================================================
   ROADMAP — PHASES
============================================================ */
const phases=[
  {
    title:'Phase 1 — Foundation',period:'Maret – April 2026',color:'var(--yellow)',
    tasks:[
      {icon:'🎬',name:'Video: Intro to IELTS',status:'done',cls:'tag-green'},
      {icon:'📝',name:'Grammar Fundamentals',status:'done',cls:'tag-green'},
      {icon:'📝',name:'Writing Task 1 Basics',status:'progress',cls:'tag-orange'},
      {icon:'🎤',name:'Speaking Part 1 Practice',status:'progress',cls:'tag-orange'},
      {icon:'⭐',name:'Checkpoint 1 — Mini Test',status:'upcoming',cls:'tag-blue'},
    ]
  },
  {
    title:'Phase 2 — Skill Building',period:'April – Mei 2026',color:'var(--orange)',
    tasks:[
      {icon:'📖',name:'Reading Strategies',status:'locked',cls:'tag-muted'},
      {icon:'🎧',name:'Listening Practice Sets',status:'locked',cls:'tag-muted'},
      {icon:'✏️',name:'Writing Task 2 Advanced',status:'locked',cls:'tag-muted'},
      {icon:'🎤',name:'Speaking Part 2 & 3',status:'locked',cls:'tag-muted'},
      {icon:'⭐',name:'Checkpoint 2 — Mock Test',status:'locked',cls:'tag-muted'},
    ]
  },
  {
    title:'Phase 3 — Intensive Practice',period:'Mei – Juni 2026',color:'var(--blue-acc)',
    tasks:[
      {icon:'🔁',name:'Full Mock Test × 3',status:'locked',cls:'tag-muted'},
      {icon:'📊',name:'Performance Analysis',status:'locked',cls:'tag-muted'},
      {icon:'🎯',name:'Weak Area Intensive',status:'locked',cls:'tag-muted'},
      {icon:'⭐',name:'Final Checkpoint',status:'locked',cls:'tag-muted'},
    ]
  },
  {
    title:'Phase 4 — Final Prep',period:'Juni – Juli 2026',color:'var(--green-acc)',
    tasks:[
      {icon:'🏁',name:'Exam Simulation',status:'locked',cls:'tag-muted'},
      {icon:'🧘',name:'Pre-test Strategy',status:'locked',cls:'tag-muted'},
      {icon:'🏆',name:'IELTS Exam Day',status:'locked',cls:'tag-muted'},
    ]
  },
];

function renderRoadmap(){
  const c=document.getElementById('timelinePhases');
  c.innerHTML='';
  phases.forEach((ph,pi)=>{
    const pc=document.createElement('div');
    pc.className='phase-card';
    const statusText={done:'Selesai',progress:'Berjalan',upcoming:'Segera',locked:'Terkunci'};
    const tasks=ph.tasks.map(t=>`
      <div class="task-row">
        <div class="task-icon">${t.icon}</div>
        <div class="task-name">${t.name}</div>
        <span class="tag ${t.cls} task-status">${statusText[t.status]||t.status}</span>
      </div>
    `).join('');
    pc.innerHTML=`
      <div class="phase-header" onclick="togglePhase(${pi})">
        <div class="phase-title-row">
          <div class="phase-num" style="background:${ph.color}20;color:${ph.color}">0${pi+1}</div>
          <div>
            <div style="font-weight:700;font-size:14px">${ph.title}</div>
            <div style="font-size:12px;color:var(--muted)">${ph.period}</div>
          </div>
        </div>
        <div class="phase-expand" id="exp-${pi}">▼</div>
      </div>
      <div class="phase-tasks ${pi===0?'open':''}" id="tasks-${pi}">
        ${tasks}
      </div>
    `;
    c.appendChild(pc);
  });
}
renderRoadmap();
function togglePhase(i){
  const t=document.getElementById('tasks-'+i);
  const e=document.getElementById('exp-'+i);
  const open=t.classList.contains('open');
  t.classList.toggle('open',!open);
  e.classList.toggle('open',!open);
}

/* ============================================================
   AI CHAT
============================================================ */
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
    <div class="msg-avatar">${role==='ai'?'Ev':'AR'}</div>
    <div>
      <div class="msg-bubble">${txt}</div>
      <span class="msg-time" ${role==='user'?'style="text-align:right;display:block;"':''}>${time}${role==='ai'?' · AI Assistant':''}</span>
    </div>
  `;
  c.appendChild(d);
  c.scrollTop=c.scrollHeight;
}

/* ============================================================
   CALENDAR
============================================================ */
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
    let html=`<div class="cdn">${d}</div>`;
    evts.slice(0,2).forEach(ev=>{html+=`<span class="cev ${ev.cls}">${ev.label}</span>`;});
    cell.innerHTML=html;
    cell.onclick=()=>{
      document.querySelectorAll('.cal-cell').forEach(c=>c.classList.remove('sel'));
      cell.classList.add('sel');
    };
    grid.appendChild(cell);
  }
}
renderCal();

/* ============================================================
   LEADERBOARD
============================================================ */
const lbData=[
  {rank:1,name:'Siti Rahma',pts:1240,pct:100,color:'#F5C842,#F5842A',initials:'SR'},
  {rank:2,name:'Bima Kusuma',pts:1185,pct:96,color:'#4F7BFF,#7BAEFF',initials:'BK'},
  {rank:3,name:'Laila Nur',pts:1102,pct:89,color:'#3DD68C,#7DFFC9',initials:'LN'},
  {rank:4,name:'Reza Fauzi',pts:980,pct:79,color:'#FF8A4F,#FFB27A',initials:'RF'},
  {rank:5,name:'Maya Putri',pts:860,pct:69,color:'#A78BFA,#C4B5FD',initials:'MP'},
  {rank:6,name:'Aryo Rahmat ★',pts:745,pct:60,color:'#F5C842,#F5842A',initials:'AR',me:true},
  {rank:7,name:'Dani Syahri',pts:680,pct:55,color:'#4F7BFF,#7BAEFF',initials:'DS'},
];
function renderLB(){
  const c=document.getElementById('leaderboard');
  c.innerHTML='';
  const rankClass=['','gold','silver','bronze'];
  lbData.forEach(u=>{
    const row=document.createElement('div');
    row.className='lb-row'+(u.me?' me':'');
    row.innerHTML=`
      <div class="lb-rank ${rankClass[u.rank]||''}">${u.rank}</div>
      <div class="lb-avatar" style="background:linear-gradient(135deg,${u.color});color:${u.rank<=3?'#0B1B3E':'#fff'}">${u.initials}</div>
      <div class="lb-info">
        <div class="lb-name">${u.name}</div>
        <div class="lb-bar-wrap"><div class="lb-bar"><div class="lb-fill" style="width:${u.pct}%"></div></div></div>
      </div>
      <div class="lb-pts">${u.pts.toLocaleString()}</div>
    `;
    c.appendChild(row);
  });
}
renderLB();

/* ============================================================
   CLASS CARDS
============================================================ */
const classData=[
  {emoji:'🎤',bg:'linear-gradient(135deg,#1A2D60,#0F1E45)',title:'Live Speaking Session',tags:['tag-orange','Intermediate'],meta:'Zoom · Mr. Aryo',next:'Hari ini, 16:00',active:true},
  {emoji:'✏️',bg:'linear-gradient(135deg,#1A3A2A,#0F2015)',title:'Writing Masterclass',tags:['tag-blue','Advanced'],meta:'Zoom · Ms. Rina',next:'Kamis, 09:00',active:true},
  {emoji:'🎧',bg:'linear-gradient(135deg,#2A1A3A,#160F20)',title:'TOEFL Listening Drills',tags:['tag-muted','All Levels'],meta:'Self-paced · Online',next:'Jumat, 14:00',active:false},
  {emoji:'📖',bg:'linear-gradient(135deg,#3A2A0A,#201505)',title:'Reading Strategy',tags:['tag-green','Semua Level'],meta:'Live · Mr. Bayu',next:'Sabtu, 10:00',active:true},
  {emoji:'🗣',bg:'linear-gradient(135deg,#1A2D60,#0F1E45)',title:'Conversation Club',tags:['tag-yellow','Beginner'],meta:'Google Meet',next:'Senin, 19:00',active:true},
  {emoji:'📝',bg:'linear-gradient(135deg,#1A2A3A,#0F1520)',title:'Grammar Clinic',tags:['tag-blue','Semua Level'],meta:'Zoom · Ms. Rina',next:'Selasa, 11:00',active:false},
];
function renderClasses(){
  const c=document.getElementById('classCards');
  c.innerHTML='';
  classData.forEach(cl=>{
    const card=document.createElement('div');
    card.className='class-card';
    card.innerHTML=`
      <div class="class-thumb" style="background:${cl.bg}">
        <span style="position:relative;z-index:1;font-size:40px">${cl.emoji}</span>
      </div>
      <div class="class-body">
        <div class="class-title">${cl.title}</div>
        <div class="class-meta">
          <span class="tag ${cl.tags[0]}">${cl.tags[1]}</span>
          ${cl.active?'<span class="tag tag-green">Aktif</span>':'<span class="tag tag-muted">Segera</span>'}
        </div>
        <div style="font-size:11px;color:var(--muted);margin-bottom:12px">🕐 ${cl.next} · ${cl.meta}</div>
        <div class="class-actions">
          ${cl.active?'<button class="btn-sm btn-sm-yellow">🔗 Join Zoom</button>':'<button class="btn-sm btn-sm-ghost">🔔 Remind Me</button>'}
          <button class="btn-sm btn-sm-ghost">📄 Materi</button>
        </div>
      </div>
    `;
    c.appendChild(card);
  });
}
renderClasses();

/* ABSENSI */
const absensi=[
  {date:'4 Mar 2026',class:'Speaking Session',status:'Hadir',cls:'tag-green'},
  {date:'2 Mar 2026',class:'Grammar Clinic',status:'Hadir',cls:'tag-green'},
  {date:'28 Feb 2026',class:'Writing Masterclass',status:'Hadir',cls:'tag-green'},
  {date:'25 Feb 2026',class:'Conversation Club',status:'Hadir',cls:'tag-green'},
  {date:'21 Feb 2026',class:'TOEFL Listening',status:'Absen',cls:'tag-red'},
  {date:'18 Feb 2026',class:'Speaking Session',status:'Hadir',cls:'tag-green'},
];
function renderAbsensi(){
  const c=document.getElementById('absenList');
  if(!c)return;
  c.innerHTML='';
  absensi.forEach(a=>{
    const row=document.createElement('div');
    row.className='attend-row';
    row.innerHTML=`
      <div class="att-ico" style="background:${a.status==='Hadir'?'rgba(61,214,140,.15)':'rgba(255,90,90,.15)'}">
        ${a.status==='Hadir'?'✅':'❌'}
      </div>
      <div style="flex:1">
        <div style="font-size:13px;font-weight:700">${a.class}</div>
        <div style="font-size:11px;color:var(--muted)">${a.date}</div>
      </div>
      <span class="tag ${a.cls}">${a.status}</span>
    `;
    c.appendChild(row);
  });
}
renderAbsensi();

/* CLASS TABS */
function switchTab(el,tabId){
  document.querySelectorAll('.ctab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(t=>t.style.display='none');
  el.classList.add('active');
  document.getElementById(tabId).style.display='block';
}
</script>
</body>
</html>
