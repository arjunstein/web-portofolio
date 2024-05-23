@extends('layouts.master')

@section('title', 'Manage experience')

@section('content')
    <div class="pagetitle">
        <h1>Manage project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Project</h5>
                        <a href="{{ route('backend.project.create') }}" class="btn btn-primary mb-3">Add Project</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Project Title</th>
                                    <th>Based</th>
                                    <th>Start Project</th>
                                    <th>End Project</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $e => $project)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td><img src="{{ asset('storage/project/' . $project->image) }}" alt="{{ $project->project_title }}" width="80px"></td>
                                        <td>{{ $project->project_title }}</td>
                                        <td>{{ $project->based }}</td>
                                        <td>{{ $project->start_project }}</td>
                                        <td>{{ $project->end_project }}</td>

                                        <td>
                                            <form action="{{ route('backend.project.delete', ['id' => $project]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('backend.project.edit', ['id' => $project]) }}"
                                                    class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure to delete this data?')"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
