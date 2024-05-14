@extends('layouts.master')

@section('title', 'Manage experience')

@section('content')
    <div class="pagetitle">
        <h1>Manage experience</h1>
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
                        <h5 class="card-title">Your Experiences</h5>
                        <a href="{{ route('backend.experience.create') }}" class="btn btn-primary mb-3">Add Experience</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Company Name</th>
                                    <th>Title</th>
                                    <th>Start Period</th>
                                    <th>End Period</th>
                                    <th>Last Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experience as $e => $exp)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td>{{ $exp->company_name }}</td>
                                        <td>{{ $exp->title }}</td>
                                        <td>{{ $exp->start_period }}</td>
                                        <td>{{ $exp->end_period }}</td>
                                        <td>Rp. {{ number_format($exp->last_salary) }}</td>
                                        <td>
                                            <form action="{{ route('backend.experience.delete', ['id' => $exp]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('backend.experience.edit', ['id' => $exp]) }}"
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
