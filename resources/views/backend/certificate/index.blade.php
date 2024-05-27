@extends('layouts.master')

@section('title', 'Manage certificate')

@section('content')
    <div class="pagetitle">
        <h1>Manage certificate</h1>
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
                        <h5 class="card-title">Your certificate</h5>
                        <a href="{{ route('backend.certificate.create') }}" class="btn btn-primary mb-3">Add certificate</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Certificate Title</th>
                                    <th>Publish Date</th>
                                    <th>Publisher</th>
                                    <th>Expired</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $e => $certificate)
                                    <tr>
                                        <td>{{ $e + 1 }}</td>
                                        <td><img src="{{ asset('storage/certificates/' . $certificate->image) }}"
                                                alt="{{ $certificate->certificate_title }}" width="80px"></td>
                                        <td>{{ $certificate->certificate_title }}</td>
                                        <td>{{ $certificate->publish_date }}</td>
                                        <td>{{ $certificate->publisher }}</td>
                                        <td>{{ $certificate->expired }}</td>

                                        <td>
                                            <form
                                                action="{{ route('backend.certificate.delete', ['id' => $certificate]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('backend.certificate.edit', ['id' => $certificate]) }}"
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
