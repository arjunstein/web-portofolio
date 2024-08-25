@extends('layouts.master')

@section('title', 'Manage skills')

@section('content')
    <div class="pagetitle">
        <h1>Manage Skills</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                        <h5 class="card-title">Your Skills</h5>
                        <a href="{{ route('backend.skills.create') }}" class="btn btn-primary mb-3">Add Skill</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Skill Name</th>
                                    <th>Icon URL</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $e => $skl)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td>{{ $skl->skillName }}</td>
                                        <td>{{ substr($skl->pathIcon,0,30) }}%</td>
                                        <td>{{ $skl->created_at->diffForHumans() }}</td>
                                        <td>
                                            <form action="{{ route('backend.skills.delete', ['id' => $skl]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('backend.skills.edit', ['id' => $skl]) }}"
                                                    class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <button type="submit" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash"></i></button>
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
