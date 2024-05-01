@extends('layouts.master')

@section('title', 'Add skills')

@section('content')
    <div class="pagetitle">
        <h1>Add Skills</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Skills</h5>
                        <form class="row g-3" action="{{ route('backend.skills.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Skill Name</label>
                                <input type="text" name="skillName"
                                    class="form-control @error('skillName') is-invalid @enderror" id="inputName5">
                                @error('skillName')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Percentase</label>
                                <input type="number" name="percentase"
                                    class="form-control @error('percentase') is-invalid @enderror" id="inputName5">
                                @error('percentase')
                                    <span class="invalid-feedback" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
