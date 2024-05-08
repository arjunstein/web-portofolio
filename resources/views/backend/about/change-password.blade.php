@extends('layouts.master')

@section('title', 'Manage about data')

@section('content')

    <div class="pagetitle">
        <h1>Manage Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ isset($about->title) ? $about->title : 'Not filled' }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <a href="{{ route('backend.about', ['id' => $about]) }}" class="nav-link">Overview</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.about.edit', ['id' => $about]) }}" class="nav-link">Edit
                                    Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link active">Change Password</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active pt-3" id="">
                                <!-- Change Password Form -->
                                <form action="{{ route('backend.about.update-password') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="old_password" type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password"
                                                class="form-control @error('new_password') is-invalid @enderror""
                                                id="newPassword">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password_confirmation" type="password" class="form-control"
                                                id="">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
