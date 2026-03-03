@extends('layouts.app')

@section('content')
<div class="container pd-t-80 pd-b-50">
    <div class="text-center m-b-40">
        <h2 class="fw-800">🎯 Dashboard Study Independent</h2>
        <p class="f-h6 fc-purple-7">Kelola perjalanan belajar mandiri Anda dengan panduan AI Englishvit.</p>
    </div>

    <div class="row">
        <!-- Sidebar / Overview -->
        <div class="col-lg-4 m-b-30">
            <div class="bg-white p-4 br-20 shadow-sm border h-full">
                <div class="text-center m-b-25">
                    <div class="icon-circle bg-purple-1 fc-purple-7 mx-auto m-b-15" style="width: 60px; height: 60px; font-size: 24px;">👤</div>
                    <h5 class="fw-800 mb-0">Student Profile</h5>
                    <span class="badge bg-info-1 fc-info-7 f-10 mt-2">ACTIVE LEARNER</span>
                </div>

                <div class="inventory-stats p-3 bg-light br-15">
                    <div class="d-flex-center-btw m-b-10">
                        <span class="f-13 fc-black-5">Progres Roadmap</span>
                        <span class="f-13 fw-800 fc-purple-7">0%</span>
                    </div>
                    <div class="ai-strength-bar-bg" style="height: 8px;">
                        <div class="ai-strength-bar-fill" style="width: 0%; height: 100%; border-radius: 4px; background: var(--ai-gradient);"></div>
                    </div>
                </div>

                <div class="m-t-30">
                    <h6 class="fw-800 f-11 m-b-15 fc-black-4 text-uppercase letter-spacing-1">Akses Cepat:</h6>
                    <button class="btn btn-block bg-purple-1 fc-purple-7 f-13 fw-700 m-b-10 text-left px-3 py-2 br-10">
                        <i class="material-icons v-middle m-r-10">list_alt</i> My Curriculum
                    </button>
                    <button class="btn btn-block bg-purple-1 fc-purple-7 f-13 fw-700 m-b-10 text-left px-3 py-2 br-10">
                        <i class="material-icons v-middle m-r-10">calendar_month</i> Full Schedule
                    </button>
                    <button class="btn btn-block bg-purple-1 fc-purple-7 f-13 fw-700 m-b-10 text-left px-3 py-2 br-10">
                        <i class="material-icons v-middle m-r-10">description</i> Learning Invoice
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Workspace -->
        <div class="col-lg-8 m-b-30">
            <div class="bg-white p-4 br-20 shadow-sm border h-full">
                <div class="d-flex-center-btw m-b-25">
                    <h5 class="fw-800 mb-0">🚀 Rencana Belajar Hari Ini</h5>
                    <span class="f-12 fc-black-4">{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>

                <div id="activeTask" class="p-4 bg-purple-1 br-15 border-left-purple m-b-30">
                    <div class="row align-center">
                        <div class="col-md-9">
                            <div class="d-flex align-center m-b-10">
                                <span class="badge bg-white fc-purple-7 f-10 fw-800 m-r-10">NEXT LESSON</span>
                                <span class="f-11 fc-black-5">Est. 45-60 Menit</span>
                            </div>
                            <h4 class="fw-800 m-b-10">Modul Perkenalan & Diagnostic Test</h4>
                            <p class="f-13 fc-black-6 mb-0">Mari memulai perjalanan belajar Anda dengan memahami pondasi dasar dan mengukur level awal Anda.</p>
                        </div>
                        <div class="col-md-3 text-right">
                            <button class="btn bg-purple-7 fc-white px-4 py-2 br-12 fw-700">MULAI</button>
                        </div>
                    </div>
                </div>

                <h6 class="fw-800 f-13 m-b-20 fc-black-8">Materi & Sesi Mendatang:</h6>
                
                <div class="task-list">
                    <div class="d-flex align-center p-3 m-b-15 br-15" style="background:#F9FAFB; border: 1px solid #eee;">
                        <div class="bg-white shadow-sm p-2 br-10 m-r-15">
                            <i class="material-icons fc-black-4">lock</i>
                        </div>
                        <div>
                            <div class="f-14 fw-700 fc-black-7">Core Skills Phase 1</div>
                            <div class="f-11 fc-black-4">Terbuka setelah Diagnostic Test selesai.</div>
                        </div>
                        <i class="material-icons m-l-auto fc-black-3">chevron_right</i>
                    </div>

                    <div class="d-flex align-center p-3 m-b-15 br-15" style="background:#F9FAFB; border: 1px solid #eee;">
                        <div class="bg-white shadow-sm p-2 br-10 m-r-15">
                            <i class="material-icons fc-black-4">lock</i>
                        </div>
                        <div>
                            <div class="f-14 fw-700 fc-black-7">Live Class Session #1</div>
                            <div class="f-11 fc-black-4">Tersedia mulai Selasa depan pukul 19:00 WIB.</div>
                        </div>
                        <i class="material-icons m-l-auto fc-black-3">chevron_right</i>
                    </div>
                </div>

                <div class="m-t-40 p-4 br-15" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); color: white;">
                    <div class="row align-center">
                        <div class="col-8">
                            <h5 class="fw-800 mb-1">Butuh Bantuan Personal?</h5>
                            <p class="f-12 opacity-8 mb-0">Tim Tutor kami siap membantu kendala belajar Anda 24/7.</p>
                        </div>
                        <div class="col-4 text-right">
                            <button class="btn bg-white fc-purple-7 fw-800 px-4 br-10">CHAT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center m-t-30">
        <a href="/" class="f-13 fc-black-4 text-decoration-none"><i class="material-icons v-middle f-16">west</i> Kembali ke Landing Page</a>
    </div>
</div>

<style>
.border-left-purple {
    border-left: 5px solid #4f46e5;
}
.br-20 { border-radius: 20px; }
.br-15 { border-radius: 15px; }
.bg-purple-1 { background: rgba(79, 70, 229, 0.08); }
.fc-purple-7 { color: #4f46e5; }
.bg-purple-7 { background: #4f46e5; }
.shadow-sm { box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
</style>
@endsection
