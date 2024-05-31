@extends('layouts.master_front')

@push('styles')
    <style>
        #myBtn {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Fixed/sticky position */
            bottom: 20px;
            /* Place the button at the bottom of the page */
            right: 25px;
            /* Place the button 30px from the right */
            z-index: 99;
            /* Make sure it does not overlap */
            border: none;
            /* Remove borders */
            outline: none;
            /* Remove outline */
            background-color: #378C3F;
            /* Set a background color */
            color: white;
            /* Text color */
            cursor: pointer;
            /* Add a mouse pointer on hover */
            padding: 10px;
            /* Some padding */
            border-radius: 50%;
            /* Rounded corners */
            font-size: 10px;
            font-weight: bold;
            /* Increase font size */
            height: 40px;
            width: 40px;
            margin: 0 auto;
        }

        #myBtn:hover {
            background-color: #555;
            /* Add a dark-grey background on hover */
        }
    </style>
@endpush

@section('content')
    <div>
        <div class="profile-page" id="toTop">
            <div class="wrapper">
                <div class="page-header page-header-small" filter-color="green">
                    <div class="page-header-image" data-parallax="true"
                        style="background-image: url('/front_assets/images/bg-new.jpg')"></div>
                    <div class="container">
                        <div class="content-center">
                            <div class="cc-profile-image">
                                <a href="#"><img
                                        src="{{ isset($about->image) ? asset('storage/profile/' . $about->image) : '/front_assets/images/Juna.jpg' }}"
                                        alt="Image" /></a>
                            </div>
                            <div class="h2 title">{{ $about->user->name }}</div>
                            <p class="category text-white"><i>{{ $about->title }}</i></p>
                            <a class="btn btn-primary smooth-scroll mr-2" href="{{ $about->linkedin }}" data-aos="zoom-in"
                                target="_blank" data-aos-anchor="data-aos-anchor">Hire Me</a><a class="btn btn-primary"
                                href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
                        </div>
                    </div>
                    <div class="section">
                        <div class="container">
                            <div class="button-container">
                                <a class="btn btn-default btn-round btn-lg btn-icon" href="{{ $about->facebook }}"
                                    target="_blank" rel="tooltip" title="Follow me on Facebook"><i
                                        class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon"
                                    href="{{ $about->instagram }}" target="_blank" rel="tooltip"
                                    title="Follow me on Instagram"><i class="fa fa-instagram"></i></a><a
                                    class="btn btn-default btn-round btn-lg btn-icon"
                                    href="https://wa.me/62{{ $about->whatsapp }}" target="_blank" rel="tooltip"
                                    title="Chat me on Whatsapp"><i class="fa fa-whatsapp"></i></a>
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
                                <div class="h4 mt-0 title">Information</div>
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
                                        <strong class="text-uppercase">Country:</strong>
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
                            @forelse ($skills as $skill)
                                <div class="col-md-6">
                                    <div class="progress-container progress-primary">
                                        <span class="progress-badge">{{ $skill->skillName }}</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                                data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $skill->percentase }}%">
                                            </div>
                                            <span class="progress-value">{{ $skill->percentase }}%</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 text-center">
                                    <b>Empty Skill</b>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="h4 text-center title">Portfolio</div>
                    </div>
                </div>
                <div class="tab-content gallery mt-3">
                    <div class="tab-pane active" id="web-development">
                        <div class="ml-auto mr-auto">
                            <div class="row">
                                @forelse ($projects as $project)
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                            data-aos-anchor-placement="top-bottom">
                                            <a href="#web-development">
                                                <figure class="cc-effect">
                                                    <img src="{{ asset('storage/project/' . $project->image) }}"
                                                        alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">{{ $project->project_title }}</div>
                                                        <p>{{ $project->based }}</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center">
                                        <b>Empty Project</b>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">Work Experience</div>

                @forelse ($experience as $exp)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50"
                                data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <p>
                                        {{ \Carbon\Carbon::parse($exp->start_period)->format('M Y') }} -
                                        {{ \Carbon\Carbon::parse($exp->end_period)->greaterThan(\Carbon\Carbon::now()) ? 'Present' : \Carbon\Carbon::parse($exp->end_period)->format('M Y') }}
                                    </p>
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
                @empty
                    <div class="col-md-12 text-center">
                        <b>Empty Experience</b>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="section" id="education">
            <div class="container cc-education">
                <div class="h4 text-center mb-4 title">Education</div>
                @forelse ($education as $edu)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50"
                                data-aos-duration="500">
                                <div class="card-body cc-education-header">
                                    <p>{{ $edu->start_year }} -
                                        {{ $edu->end_year > date('Y') ? 'PRESENT' : $edu->end_year }}</p>
                                    <div class="h5">{{ $edu->title }}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">
                                        {{ $edu->major }}
                                    </div>
                                    <p class="category">{{ $edu->school }} | GPA: {{ $edu->gpa }}</p>
                                    <p>
                                        {{ $edu->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <b>Empty Education</b>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="section" id="certificate">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="h4 text-center title">Certificates</div>
                    </div>
                </div>
                <div class="tab-content gallery mt-3">
                    <div class="tab-pane active" id="certificate">
                        <div class="ml-auto mr-auto">
                            <div class="row">
                                @forelse ($certificates as $certificate)
                                    <div class="col-md-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up"
                                            data-aos-anchor-placement="top-bottom">
                                            <a href="{{ url('/storage/certificates/' . $certificate->image) }}"
                                                target="_blank">
                                                <figure class="cc-effect">
                                                    <img src="{{ asset('storage/certificates/' . $certificate->image) }}"
                                                        alt="Image" />
                                                    <figcaption>
                                                        <div class="h4">{{ $certificate->certificate_title }}</div>
                                                        <p>{{ $certificate->publisher }}</p>
                                                        <p style="text-transform: capitalize;">
                                                            {{ $certificate->certificate_description }}</p>
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center">
                                        <b>Empty Certificate</b>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">TOP</button>
    </div>
@endsection

@push('custom_script')
    <script>
        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Add event listener to the button to call topFunction on click
        mybutton.addEventListener('click', topFunction);
    </script>
@endpush
