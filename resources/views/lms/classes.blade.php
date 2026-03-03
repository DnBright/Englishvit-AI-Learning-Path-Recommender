@extends('layouts.lms-layout')

@section('title', 'Class Menu')
@section('nav_classes', 'active')

@section('content')
<div class="d-flex justify-content-between align-items-center m-b-30">
    <div>
        <h2 class="font-weight-bold primary-text m-b-5">📚 Class Menu & Resources</h2>
        <p class="text-muted f-14 mb-0">Akses cepat ke sesi LIVE dan materi pendukung belajar Anda.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="dashboard-card pd-30 m-b-25">
            <h5 class="font-weight-bold m-b-25 d-flex align-items-center">
                <span class="material-icons m-r-10 accent-text">video_camera_front</span>
                Sesi Zoom Terjadwal
            </h5>
            
            <div class="resource-item p-3 m-b-15 border rounded-lg hover-shadow transition-300 d-flex align-items-center bg-light-soft">
                <div class="icon-box bg-info text-white rounded-lg m-r-15 d-flex-center justify-center" style="width: 50px; height: 50px;">
                    <span class="material-icons">videocam</span>
                </div>
                <div class="flex-fill">
                    <h6 class="m-b-3 font-weight-bold f-14">Writing Task 2 Deep Dive</h6>
                    <p class="f-11 text-muted mb-0 d-flex align-items-center">
                        <span class="material-icons f-12 m-r-5">schedule</span> 4 Maret, 19:00 WIB
                    </p>
                </div>
                <button class="btn btn-sm btn-info font-weight-bold p-x-15 rounded-pill">Join Now</button>
            </div>

            <div class="resource-item p-3 border rounded-lg hover-shadow transition-300 d-flex align-items-center">
                <div class="icon-box bg-info-light text-info rounded-lg m-r-15 d-flex-center justify-center" style="width: 50px; height: 50px;">
                    <span class="material-icons">record_voice_over</span>
                </div>
                <div class="flex-fill">
                    <h6 class="m-b-3 font-weight-bold f-14">Speaking Fluency Session</h6>
                    <p class="f-11 text-muted mb-0 d-flex align-items-center">
                        <span class="material-icons f-12 m-r-5">calendar_today</span> 6 Maret, 19:00 WIB
                    </p>
                </div>
                <button class="btn btn-sm btn-outline-info font-weight-bold p-x-15 rounded-pill">Reminder</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="dashboard-card pd-30 m-b-25">
            <h5 class="font-weight-bold m-b-25 d-flex align-items-center">
                <span class="material-icons m-r-10 text-warning">menu_book</span>
                Materi & PDF
            </h5>
            
            <div class="resource-item p-3 m-b-15 border rounded-lg hover-shadow transition-300 d-flex align-items-center">
                <div class="icon-box bg-warning-light text-warning rounded-lg m-r-15 d-flex-center justify-center" style="width: 50px; height: 50px;">
                    <span class="material-icons">picture_as_pdf</span>
                </div>
                <div class="flex-fill">
                    <h6 class="m-b-3 font-weight-bold f-14">IELTS Pattern Handbook</h6>
                    <p class="f-11 text-muted mb-0">E-Book Eksklusif • 4.2 MB</p>
                </div>
                <button class="btn btn-sm btn-outline-warning font-weight-bold p-x-15 rounded-pill">Download</button>
            </div>

            <div class="resource-item p-3 border rounded-lg hover-shadow transition-300 d-flex align-items-center">
                <div class="icon-box bg-warning-light text-warning rounded-lg m-r-15 d-flex-center justify-center" style="width: 50px; height: 50px;">
                    <span class="material-icons">description</span>
                </div>
                <div class="flex-fill">
                    <h6 class="m-b-3 font-weight-bold f-14">Vocabulary Builder List</h6>
                    <p class="f-11 text-muted mb-0">Level B1-B2 • 1.5 MB</p>
                </div>
                <button class="btn btn-sm btn-outline-warning font-weight-bold p-x-15 rounded-pill">Download</button>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow:hover { box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .bg-light-soft { background: #f9fafb; border-color: #e5e7eb !important; }
    .rounded-pill { border-radius: 50px !important; }
</style>
@endsection
