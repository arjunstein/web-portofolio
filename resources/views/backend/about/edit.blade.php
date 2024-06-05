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

                        <img src="{{ isset($about->image) ? asset('storage/profile/' . $about->image) : '/assets/img/profile-img.jpg' }}"
                            alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ isset($user->about->title) ? $user->about->title : 'Not filled' }}</h3>
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
                                <a href="{{ route('backend.about.edit', ['id' => $about]) }}" class="nav-link active">Edit
                                    Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.about.change-password', ['id' => $about]) }}"
                                    class="nav-link">Change Password</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('backend.about.update', ['id' => $about]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ isset($about->image) ? asset('storage/profile/' . $about->image) : '/assets/img/profile-img.jpg' }}"
                                                alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" name="image"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    id="">
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                disabled value="{{ Auth::user()->name }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email"
                                                disabled value="{{ Auth::user()->email }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Summary</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" id="summary"
                                                style="height: 100px">{{ $user->about->summary }}</textarea>
                                            @error('summary')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="birthday" class="col-md-4 col-lg-3 col-form-label">Birth Date</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="birthday" type="date"
                                                class="form-control @error('birthday') is-invalid @enderror" id="birthdate"
                                                value="{{ $user->about->birthday }}">
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="gender"
                                                class="form-select @error('gender') is-invalid @enderror" id="gender"
                                                aria-label="Default select example">
                                                <option
                                                    {{ $user->about->gender == null ? 'selected disabled' : 'disabled' }}>
                                                    ---Select gender---</option>
                                                <option value="male"
                                                    {{ $user->about->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ $user->about->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="title" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror" id="title"
                                                value="{{ $user->about->title }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text"
                                                class="form-control @error('country') is-invalid @enderror" id="Country"
                                                value="{{ $user->about->country }}">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="address" type="text" class="form-control @error('address') is-invalid @enderror" rows="3"
                                                id="Address">{{ $user->about->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="number"
                                                class="form-control @error('phone') is-invalid @enderror" id="Phone"
                                                value="{{ $user->about->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="whatsapp" type="number"
                                                class="form-control @error('whatsapp') is-invalid @enderror"
                                                id="whatsapp" value="{{ $user->about->whatsapp }}">
                                            @error('whatsapp')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text"
                                                class="form-control @error('twitter') is-invalid @enderror" id="Twitter"
                                                value="{{ $user->about->twitter }}">
                                            @error('twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text"
                                                class="form-control @error('facebook') is-invalid @enderror"
                                                id="Facebook" value="{{ $user->about->facebook }}">
                                            @error('facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text"
                                                class="form-control @error('instagram') is-invalid @enderror"
                                                id="Instagram" value="{{ $user->about->instagram }}">
                                            @error('instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text"
                                                class="form-control @error('linkedin') is-invalid @enderror"
                                                id="linkedin" value="{{ $user->about->linkedin }}">
                                            @error('linkedin')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="gdrive_link" class="col-md-4 col-lg-3 col-form-label">Gdrive
                                            Link</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="gdrive_link" type="text"
                                                class="form-control @error('gdrive_link') is-invalid @enderror"
                                                id="gdrive_link" value="{{ $user->about->gdrive_link }}">
                                            @error('gdrive_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
