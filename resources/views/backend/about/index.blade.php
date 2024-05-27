@extends('layouts.master')

@section('title', 'Manage about data')

@section('content')

    <div class="pagetitle">
        <h1>Manage Profile</h1>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ isset($about->image) ? asset('storage/profile/' . $about->image) : '/assets/img/profile-img.jpg' }}"
                            alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ isset($user->about->title) ? $user->about->title : 'Not Filled' }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.about.edit', ['id' => $about]) }}" class="nav-link">Edit
                                    Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.about.change-password', ['id' => $about]) }}"
                                    class="nav-link">Change Password</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Summary</h5>
                                <p class="small fst-italic">
                                    {{ isset($user->about->summary) ? $user->about->summary : 'Not filled' }}
                                </p>
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Age</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (isset($user->about->birthday))
                                            {{ date('Y') - date('Y', strtotime($user->about->birthday)) }} yrs
                                        @else
                                            Not filled
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->title) ? $user->about->title : 'Not filled' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->country) ? $user->about->country : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->address) ? $user->about->address : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->phone) ? $user->about->phone : 'Not filled' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Whatsapp</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->whatsapp) ? $user->about->whatsapp : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Linkedin</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->linkedin) ? $user->about->linkedin : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Instagram</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->instagram) ? $user->about->instagram : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Twitter</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->twitter) ? $user->about->twitter : 'Not filled' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Facebook</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ isset($user->about->facebook) ? $user->about->facebook : 'Not filled' }}</div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
