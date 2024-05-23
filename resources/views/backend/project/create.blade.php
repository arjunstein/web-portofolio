@extends('layouts.master')

@section('title', 'Add Project')

@section('content')
    <div class="pagetitle">
        <h1>Add Project</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Project</h5>
                        <form class="row g-3" action="{{ route('backend.project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project Title</label>
                                <input type="text" name="project_title"
                                    class="form-control @error('project_title') is-invalid @enderror"
                                    value="{{ old('project_title') }}">
                                @error('project_title')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>











                            <div class="col-md-6">
                                <label class="form-label">Based</label>
                                <input type="text" name="based"
                                    class="form-control @error('based') is-invalid @enderror" value="{{ old('based') }}"
                                    autocomplete="yes">
                                @error('based')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Start Project</label>
                                <input type="date" name="start_project" value="{{ old('start_project') }}"
                                    class="form-control @error('start_project') is-invalid @enderror">
                                @error('start_project')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stack used</label>
                                <textarea type="text" name="stack" rows="3" class="form-control @error('stack') is-invalid @enderror">{{ old('stack') }}</textarea>
                                @error('stack')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Project</label>
                                <input type="date" name="end_project"
                                    class="form-control @error('end_project') is-invalid @enderror"
                                    value="{{ old('end_project') }}">
                                @error('end_project')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('backend.project') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
