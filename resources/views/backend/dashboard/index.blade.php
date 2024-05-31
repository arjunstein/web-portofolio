@extends('layouts.master')

@section('title', 'Dashboard page')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard Summary</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12 mt-2">
                <!-- Pills Tabs -->
                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Graph</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Analytics</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Visitor {{ date('Y') }}</h5>
                                <canvas id="barChart" style="max-height: 400px;"></canvas>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new Chart(document.querySelector('#barChart'), {
                                            type: 'bar',
                                            data: {
                                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                                                    'September', 'October', 'November', 'December'
                                                ],
                                                datasets: [{
                                                    label: 'Visitor',
                                                    data: [65, 59, 80, 81, 56, 55, 40, 62, 75, 90, 83, 69],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)',
                                                        'rgba(255, 205, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(201, 203, 207, 0.2)',
                                                        'rgba(43, 223, 257, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 99, 132, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(75, 192, 192)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(153, 102, 255)',
                                                        'rgb(201, 203, 207)',
                                                        'rgb(43, 223, 257)',
                                                        'rgb(75, 192, 192)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(153, 102, 255)',
                                                        'rgb(255, 99, 132)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>
                                <!-- End Bar CHart -->
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Visitor OS</h5>

                                            <!-- Pie Chart -->
                                            <canvas id="pieChart" style="max-height: 400px;"></canvas>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", () => {
                                                    new Chart(document.querySelector('#pieChart'), {
                                                        type: 'pie',
                                                        data: {
                                                            labels: [
                                                                'macOS',
                                                                'Windows',
                                                                'android',
                                                                'iOS',
                                                                'Linux',
                                                                'Other'
                                                            ],
                                                            datasets: [{
                                                                label: 'Total',
                                                                data: [100, 50, 100, 27, 30, 11],
                                                                backgroundColor: [
                                                                    'rgb(255, 99, 132)',
                                                                    'rgb(54, 162, 235)',
                                                                    'rgb(255, 205, 86)',
                                                                    'rgb(201, 203, 207)',
                                                                    'rgb(54, 162, 235)',
                                                                    'rgb(255, 99, 132)'
                                                                ],
                                                                hoverOffset: 4
                                                            }]
                                                        }
                                                    });
                                                });
                                            </script>
                                            <!-- End Pie CHart -->

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Most Socmed Clicked</h5>

                                            <!-- Doughnut Chart -->
                                            <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", () => {
                                                    new Chart(document.querySelector('#doughnutChart'), {
                                                        type: 'doughnut',
                                                        data: {
                                                            labels: [
                                                                'Whatsapp',
                                                                'Facebook',
                                                                'Linkedin',
                                                                'Instagram',
                                                                'Twitter',
                                                                'Email'
                                                            ],
                                                            datasets: [{
                                                                label: 'Clicked',
                                                                data: [300, 50, 100,12,31,45],
                                                                backgroundColor: [
                                                                    'rgb(255, 99, 132)',
                                                                    'rgb(54, 162, 235)',
                                                                    'rgb(255, 205, 86)',
                                                                    'rgb(201, 203, 207)',
                                                                    'rgb(54, 162, 235)',
                                                                    'rgb(255, 99, 132)'
                                                                ],
                                                                hoverOffset: 4
                                                            }]
                                                        }
                                                    });
                                                });
                                            </script>
                                            <!-- End Doughnut CHart -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Left side columns -->
                        <div class="col-lg-12">
                            <div class="row">

                                <!-- Sales Card -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">

                                        <div class="filter">
                                            <a class="icon" href="{{ route('backend.skills') }}"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Total Skills</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-award"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ count($skills) }}</h6>
                                                    <span class="text-success small pt-1 fw-bold">Qualified</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">

                                        <div class="filter">
                                            <a class="icon" href="{{ route('backend.education') }}">
                                                <i class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Educations</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-building"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ count($educations) }}</h6>
                                                    <span class="text-success small pt-1 fw-bold">Graduated</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <!-- Revenue Card -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card revenue-card">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Experiences</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-currency-dollar"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ count($experience) }}</h6>
                                                    <span class="text-success small pt-1 fw-bold">Places</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Revenue Card -->

                                <!-- Customers Card -->
                                <div class="col-xxl-4 col-xl-12">

                                    <div class="card info-card customers-card">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Portfolio Project</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ count($projects) }}</h6>
                                                    <span class="text-success small pt-1 fw-bold">Completed</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div><!-- End Customers Card -->

                                <div class="col-xxl-4 col-xl-12">

                                    <div class="card info-card customers-card">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Certificates</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ count($certificates) }}</h6>
                                                    <span class="text-success small pt-1 fw-bold">Certified</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div><!-- End Customers Card -->

                                <div class="col-xxl-4 col-xl-12">

                                    <div class="card info-card customers-card">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">Posts</h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-people"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>0</h6>
                                                    <span class="text-success small pt-1 fw-bold">Published</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div><!-- End Customers Card -->

                                <div class="col-lg-12">
                                </div>
                            </div>
                        </div><!-- End Left side columns -->
                    </div>
                </div><!-- End Pills Tabs -->
            </div>
        </div>
    </section>

@endsection
