@extends('layouts.dashboard.master')

@section('page-title')
    Profile
@endsection

@section('module-title')
    <h1>Hi, {{ auth()->user()->name }}</h1>
@endsection

@section('css-libraries')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('page-content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <div class="">
                      @if (empty(auth()->user()->img_src))
                          <img alt="image" src="../assets/img/avatar/avatar-1.png"
                              class="rounded-circle profile-widget-picture"
                              style="width: 100px; height: 100px; object-fit: cover;">
                      @elseif(str_contains(auth()->user()->img_src, 'post-images'))
                          <img alt="image" src="{{ asset('storage/' . auth()->user()->img_src) }}"
                              class="rounded-circle profile-widget-picture"
                              style="width: 100px; height: 100px; object-fit: cover;">
                      @else
                          <img alt="image" src="{{ auth()->user()->img_src }}"
                              class="rounded-circle profile-widget-picture"
                              style="width: 100px; height: 100px; object-fit: cover;">
                      @endif
                    </div>

                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Posts</div>
                            <div class="profile-widget-item-value">187</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Likes</div>
                            <div class="profile-widget-item-value">6,8K</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ auth()->user()->name }}</div>
                    <div>
                        {!! auth()->user()->biography !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                    required="">
                                <div class="invalid-feedback">
                                    Please fill in the full name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->username }}"
                                    required="">
                                <div class="invalid-feedback">
                                    Please fill in the username
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                    required="">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea class="form-control summernote-simple">{!! auth()->user()->biography !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right pt-0">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('spesific-js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
