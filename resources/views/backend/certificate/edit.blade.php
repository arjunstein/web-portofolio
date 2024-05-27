@extends('layouts.master')

@section('title', 'Edit Certificate')

@section('content')
    <div class="pagetitle">
        <h1>Edit Certificate</h1>
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
                        <h5 class="card-title">Edit Certificate</h5>
                        <form class="row g-3"
                            action="{{ route('backend.certificate.update', ['id' => $certificates->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label class="form-label">Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ $certificates->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Certificate Title</label>
                                <input type="text" name="certificate_title"
                                    class="form-control @error('certificate_title') is-invalid @enderror"
                                    value="{{ $certificates->certificate_title }}">
                                @error('certificate_title')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Publish Date</label>
                                <input type="date" name="publish_date"
                                    class="form-control @error('publish_date') is-invalid @enderror"
                                    value="{{ $certificates->publish_date }}">
                                @error('publish_date')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Publisher</label>
                                <input type="text" name="publisher" value="{{ $certificates->publisher }}"
                                    class="form-control @error('publisher') is-invalid @enderror">
                                @error('publisher')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Expired</label>
                                <input type="date" name="expired" rows="3"
                                    class="form-control @error('expired') is-invalid @enderror"
                                    value="{{ $certificates->expired }}">
                                @error('expired')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Certificate Description</label>
                                <textarea type="text" name="certificate_description" rows="5"
                                    class="form-control @error('certificate_description') is-invalid @enderror">{{ $certificates->certificate_description }}</textarea>
                                @error('certificate_description')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('backend.certificate') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
