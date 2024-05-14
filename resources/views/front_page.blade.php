@extends('layouts.master_front')

@section('content')
    <div>
        <div class="profile-page">
            <div class="wrapper">
                <div class="page-header page-header-small" filter-color="green">
                    <div class="page-header-image" data-parallax="true"
                        style="background-image: url('/front_assets/images/bg-new.jpg')"></div>
                    <div class="container">
                        <div class="content-center">
                            <div class="cc-profile-image">
                                <a href="#"><img src="/front_assets/images/Juna.jpg" alt="Image" /></a>
                            </div>
                            <div class="h2 title">{{ $about->user->name }}</div>
                            <p class="category text-white">{{ $about->title }}</p>
                            <a class="btn btn-primary smooth-scroll mr-2"
                                href="https://www.linkedin.com/in/arjun-gunawan-68617a186/" data-aos="zoom-in"
                                data-aos-anchor="data-aos-anchor">Hire Me</a><a class="btn btn-primary"
                                href="https://drive.google.com/file/d/1lGxq2PTJk_t5PZ-H49B_00FnHEWfpo2O/view?usp=sharing"
                                data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
                        </div>
                    </div>
                    <div class="section">
                        <div class="container">
                            <div class="button-container">
                                <a class="btn btn-default btn-round btn-lg btn-icon"
                                    href="https://web.facebook.com/arjun.gunawan.1257" rel="tooltip"
                                    title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a
                                    class="btn btn-default btn-round btn-lg btn-icon"
                                    href="https://www.instagram.com/arjungunawan9/" rel="tooltip"
                                    title="Follow me on Instagram"><i class="fa fa-instagram"></i></a><a
                                    class="btn btn-default btn-round btn-lg btn-icon" href="https://wa.me/6287777115297/"
                                    rel="tooltip" title="Chat me on Whatsapp"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container">
                <div class="card" data-aos="fade-up" data-aos-offset="10">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">About</div>
                                <p>{{ $about->summary }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">Basic Information</div>
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <strong class="text-uppercase">Email:</strong>
                                    </div>
                                    <div class="col-sm-8">{{ $about->user->email }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <strong class="text-uppercase">Phone:</strong>
                                    </div>
                                    <div class="col-sm-8">0{{ $about->phone }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <strong class="text-uppercase">Address:</strong>
                                    </div>
                                    <div class="col-sm-8">{{ $about->address }}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <strong class="text-uppercase">Language:</strong>
                                    </div>
                                    <div class="col-sm-8">{{ $about->country }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="skill">
            <div class="container">
                <div class="h4 text-center mb-4 title">Professional Skills</div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">HTML</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        </div>
                                        <span class="progress-value">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">PHP</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                        <span class="progress-value">70%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">JavaScript</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                        <span class="progress-value">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">MySQL</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                        <span class="progress-value">60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">LARAVEL</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                        <span class="progress-value">70%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">GIT</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                        <span class="progress-value">70%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">Rest api's</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        </div>
                                        <span class="progress-value">50%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">CodeIgniter</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        </div>
                                        <span class="progress-value">50%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">JQuery</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                        <span class="progress-value">70%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">Css</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        </div>
                                        <span class="progress-value">50%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="h4 text-center mb-4 title">Portfolio</div>
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#web-development"
                                        role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content gallery mt-5">
                    <div class="tab-pane active" id="web-development">
                        <div class="ml-auto mr-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                        data-aos-anchor-placement="top-bottom">
                                        <a href="#web-development">
                                            <figure class="cc-effect">
                                                <img src="/front_assets/images/project-1.jpg" alt="Image" />
                                                <figcaption>
                                                    <div class="h4">Sistem Peminjaman Alat Kerja</div>
                                                    <p>Web Development</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                        data-aos-anchor-placement="top-bottom">
                                        <a href="#web-development">
                                            <figure class="cc-effect">
                                                <img src="/front_assets/images/project-4.jpg" alt="Image" />
                                                <figcaption>
                                                    <div class="h4">Sistem e-voting</div>
                                                    <p>Web Development</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                        data-aos-anchor-placement="top-bottom">
                                        <a href="#web-development">
                                            <figure class="cc-effect">
                                                <img src="/front_assets/images/project-2.jpg" alt="Image" />
                                                <figcaption>
                                                    <div class="h4">Sistem Inventory Gudang</div>
                                                    <p>Web Development</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                        data-aos-anchor-placement="top-bottom">
                                        <a href="#web-development">
                                            <figure class="cc-effect">
                                                <img src="/front_assets/images/project-3.jpg" alt="Image" />
                                                <figcaption>
                                                    <div class="h4">Ecommerce Jerziku</div>
                                                    <p>Web Development</p>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">Work Experience</div>

                @foreach ($experience as $exp)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50"
                                data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <p>{{ $exp->start_period }} - {{ $exp->end_period }}</p>
                                    <div class="h5">{{ $exp->company_name }}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{ $exp->title }}</div>
                                    <h6>Project: .....</h6>
                                    <ul>
                                        {{ $exp->jobdesc }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="section">
            <div class="container cc-education">
                <div class="h4 text-center mb-4 title">Education</div>
                <div class="card">
                    <div class="row"></div>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50"
                            data-aos-duration="500">
                            <div class="card-body cc-education-header">
                                <p>2017 - 2021</p>
                                <div class="h5">Bachelor's Degree</div>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                            <div class="card-body">
                                <div class="h5">
                                    Bachelor of Computer Science / Teknik Informatika
                                </div>
                                <p class="category">Panca Sakti University Bekasi</p>
                                <p>
                                    Panca Sakti University (PSU) Bekasi is present in the era
                                    of a new life order, marked by the signing of the Decree
                                    of the Minister of Education and Culture Number:
                                    575/M/2020 dated June 11, 2020 concerning Permits for
                                    Merger of Teacher Training and Education Colleges in Panca
                                    Sakti Bekasi in Bekasi City, Greater Indonesia College of
                                    Economics in Jakarta, and Cikarang College of Information
                                    and Computer Management in Bekasi Regency become Panca
                                    Sakti Bekasi University in Bekasi City, West Java Province
                                    Organized by the Bekasi Panca Sakti Foundation. <br />
                                    More info click
                                    <a href="https://panca-sakti.ac.id/">https://panca-sakti.ac.id/</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
