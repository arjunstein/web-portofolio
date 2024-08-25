@extends('layouts.master')

@section('title', 'Edit skills')

@section('content')

    <div class="pagetitle">
        <h1>Edit Skills</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Skills</h5>
                        <form class="row g-3" action="{{ route('backend.skills.update', ['id' => $skill]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Skill Name</label>
                                <input type="text" name="skillName" value="{{ $skill->skillName }}"
                                    class="form-control @error('skillName') is-invalid @enderror" id="inputName5">
                                @error('skillName')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Icon URL</label>
                                <input type="text" name="pathIcon" value="{{ $skill->pathIcon }}" id
                                    class="form-control @error('pathIcon') is-invalid @enderror" id="inputName5">
                                @error('pathIcon')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('backend.skills') }}" class="btn btn-primary">Back</a>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
