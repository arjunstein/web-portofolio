@extends('layouts.master')

@section('title', 'Edit experience')

@section('content')
    <div class="pagetitle">
        <h1>Edit Experience</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Experience</h5>
                        <form class="row g-3" action="{{ route('backend.experience.update', ['id' => $experience]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Company Name</label>
                                <input type="text" name="company_name"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    value="{{ $experience->company_name }}">
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Job Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $experience->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Start Period</label>
                                <input type="date" name="start_period"
                                    class="form-control @error('start_period') is-invalid @enderror"
                                    value="{{ $experience->start_period }}">
                                @error('start_period')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Last Salary</label>
                                <input type="number" name="last_salary"
                                    class="form-control @error('last_salary') is-invalid @enderror"
                                    value="{{ $experience->last_salary }}">
                                @error('last_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Period</label>
                                <input type="date" name="end_period"
                                    class="form-control @error('end_period') is-invalid @enderror"
                                    value="{{ $experience->end_period }}">
                                @error('end_period')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Job Desc</label>
                                <textarea type="text" name="jobdesc" class="form-control @error('jobdesc') is-invalid @enderror" rows="5">{{ $experience->jobdesc }}</textarea>
                                @error('jobdesc')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('backend.experience') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
