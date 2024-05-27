@extends('layouts.master')

@section('title', 'Manage Education')

@section('content')

    <div class="pagetitle">
        <h1>Manage Education</h1>
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
                        <h5 class="card-title">Your Skills</h5>
                        <a href="{{ route('backend.education.create') }}" class="btn btn-primary mb-3">Your Education</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Schools</th>
                                    <th>Major</th>
                                    <th>Title</th>
                                    <th>GPA</th>
                                    <th>Start Year</th>
                                    <th>End Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($education as $e => $edu)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td>{{ $edu->school }}</td>
                                        <td>{{ $edu->major }}</td>
                                        <td>{{ $edu->title }}</td>
                                        <td>{{ $edu->gpa }}</td>
                                        <td>{{ $edu->start_year }}</td>
                                        <td>{{ $edu->end_year }}</td>
                                        <td>
                                            <form action="{{ route('backend.education.delete', ['id' => $edu]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('backend.education.edit', ['id' => $edu]) }}"
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
