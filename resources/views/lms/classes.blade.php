@extends('layouts.lms-layout')

@section('title', 'Class Menu')
@section('nav_classes', 'active')

@section('content')
<h2 class="font-weight-bold primary-text m-b-20">📚 Class Menu & Resources</h2>
<div class="row">
    <div class="col-md-6">
        <div class="dashboard-card pd-25">
            <h6 class="font-weight-bold m-b-20">Sesi Zoom Terjadwal</h6>
            <div class="class-resource-card shadow-sm border">
                <div class="icon-wrap bg-info-1"><span class="material-icons accent-text">videocam</span></div>
                <div class="flex-fill">
                    <h6 class="m-b-0 font-weight-bold">Writing Task 2 Deep Dive</h6>
                    <p class="f-12 text-muted m-b-0">4 Maret, 19:00 WIB</p>
                </div>
                <button class="btn btn-sm btn-info">Join Link</button>
            </div>
            <div class="class-resource-card shadow-sm border m-t-15">
                <div class="icon-wrap bg-info-1"><span class="material-icons accent-text">videocam</span></div>
                <div class="flex-fill">
                    <h6 class="m-b-0 font-weight-bold">Speaking Fluency Session</h6>
                    <p class="f-12 text-muted m-b-0">6 Maret, 19:00 WIB</p>
                </div>
                <button class="btn btn-sm btn-outline-info">Add To Calendar</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="dashboard-card pd-25">
            <h6 class="font-weight-bold m-b-20">Materi & PDF</h6>
            <div class="class-resource-card shadow-sm border">
                <div class="icon-wrap bg-warning-1"><span class="material-icons text-warning">picture_as_pdf</span></div>
                <div class="flex-fill">
                    <h6 class="m-b-0 font-weight-bold">IELTS Pattern Handbook</h6>
                    <p class="f-12 text-muted m-b-0">E-Book Eksklusif</p>
                </div>
                <button class="btn btn-sm btn-outline-warning">Download</button>
            </div>
            <div class="class-resource-card shadow-sm border m-t-15">
                <div class="icon-wrap bg-warning-1"><span class="material-icons text-warning">description</span></div>
                <div class="flex-fill">
                    <h6 class="m-b-0 font-weight-bold">Vocabulary Builder List</h6>
                    <p class="f-12 text-muted m-b-0">Fokus: Level B1-B2</p>
                </div>
                <button class="btn btn-sm btn-outline-warning">Download</button>
            </div>
        </div>
    </div>
</div>
@endsection
