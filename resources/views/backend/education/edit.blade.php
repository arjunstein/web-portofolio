@extends('layouts.master')

@section('title', 'Edit Education')

@section('content')
    <div class="pagetitle">
        <h1>Edit Education</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Education</h5>
                        <form class="row g-3" action="{{ route('backend.education.update', ['id' => $education]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label class="form-label">School</label>
                                <input type="text" name="school"
                                    class="form-control @error('school') is-invalid @enderror"
                                    value="{{ $education->school }}">
                                @error('school')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Major</label>
                                <input type="text" name="major"
                                    class="form-control @error('major') is-invalid @enderror"
                                    value="{{ $education->major }}">
                                @error('major')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $education->title }}" autocomplete="yes">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">GPA</label>
                                <input type="string" name="gpa" class="form-control @error('gpa') is-invalid @enderror"
                                    value="{{ $education->gpa }}">
                                @error('gpa')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Start Year</label>
                                <input type="number" name="start_year" value="{{ $education->start_year }}"
                                    class="form-control @error('start_year') is-invalid @enderror">
                                @error('start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Year</label>
                                <input type="number" name="end_year"
                                    class="form-control @error('end_year') is-invalid @enderror"
                                    value="{{ $education->end_year }}">
                                @error('end_year')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ $education->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('backend.education') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
