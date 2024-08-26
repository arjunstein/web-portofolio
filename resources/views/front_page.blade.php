@extends('layouts.master_front')

@section('content')
    <article class="about active" data-page="about">
        <header>
            <h2 class="h2 article-title">About me</h2>
        </header>
        <section class="about-text">
            <p>
                {{ isset($about->summary) ? $about->summary : 'Not set' }}
            </p>
        </section>
        <section class="skill">
            <h3 class="h3 skills-title">Skills</h3>
            <div class="clients-list has-scrollbar">
                @foreach ($skills as $skl)
                    <p title="{{ $skl->skillName }}">{!! $skl->pathIcon !!}</p>
                @endforeach
            </div>
        </section>
        <section class="timeline">
            <div class="title-wrapper">
                <div class="icon-box">
                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <h3 class="h3">Experience</h3>
            </div>
            <ol class="timeline-list">
                @foreach ($experience as $exp)
                    <li class="timeline-item">
                        <h4 class="h4 timeline-item-title">{{ $exp->company_name }}</h4>
                        <p class="timeline-text">{{ $exp->title }}</p>
                        <span>{{ \Carbon\Carbon::parse($exp->start_period)->format('F Y') . ' - ' . \Carbon\Carbon::parse($exp->end_period)->format('F Y') }}</span>
                        <p class="timeline-text">
                            {{ $exp->jobdesc }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </section>
        <section class="timeline">
            <div class="title-wrapper">
                <div class="icon-box">
                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <h3 class="h3">Education</h3>
            </div>
            <ol class="timeline-list">
                @foreach ($education as $edu)
                    <li class="timeline-item">
                        <h4 class="h4 timeline-item-title">{{ $edu->school }}</h4>
                        <p class="timeline-text">{{ $edu->title }}, {{ $edu->major }}</p>
                        <span>{{ $edu->start_year }}-{{ $edu->end_year }}</span>
                        <p class="timeline-text">
                            {{ $edu->description }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </section>
        <div class="modal-container" data-modal-container>
            <div class="overlay" data-overlay></div>
            <section class="testimonials-modal">
                <button class="modal-close-btn" data-modal-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </section>
        </div>
    </article>

    <article class="portfolio" data-page="portfolio">
        <header>
            <h2 class="h2 article-title">Portfolio</h2>
        </header>
        <section class="projects">
            <ul class="filter-list">
                <li class="filter-item">
                    <button class="active" data-filter-btn>All</button>
                </li>
                <li class="filter-item">
                    <button data-filter-btn>Web design</button>
                </li>
                <li class="filter-item">
                    <button data-filter-btn>Applications</button>
                </li>
                <li class="filter-item">
                    <button data-filter-btn>Web development</button>
                </li>
            </ul>
            <div class="filter-select-box">
                <button class="filter-select" data-select>
                    <div class="select-value" data-selecct-value>Select category</div>
                    <div class="select-icon">
                        <ion-icon name="chevron-down"></ion-icon>
                    </div>
                </button>
                <ul class="select-list">
                    <li class="select-item">
                        <button data-select-item>All</button>
                    </li>
                    <li class="select-item">
                        <button data-select-item>Web design</button>
                    </li>
                    <li class="select-item">
                        <button data-select-item>Applications</button>
                    </li>
                    <li class="select-item">
                        <button data-select-item>Web development</button>
                    </li>
                </ul>
            </div>
            <ul class="project-list">
                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-1.jpg" alt="finance" loading="lazy">
                        </figure>
                        <h3 class="project-title">Finance</h3>
                        <p class="project-category">Web development</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-2.png" alt="orizon" loading="lazy">
                        </figure>
                        <h3 class="project-title">Orizon</h3>
                        <p class="project-category">Web development</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-3.jpg" alt="fundo" loading="lazy">
                        </figure>
                        <h3 class="project-title">Fundo</h3>
                        <p class="project-category">Web design</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="applications">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-4.png" alt="brawlhalla" loading="lazy">
                        </figure>
                        <h3 class="project-title">Brawlhalla</h3>
                        <p class="project-category">Applications</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-5.png" alt="dsm." loading="lazy">
                        </figure>
                        <h3 class="project-title">DSM.</h3>
                        <p class="project-category">Web design</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-6.png" alt="metaspark" loading="lazy">
                        </figure>
                        <h3 class="project-title">MetaSpark</h3>
                        <p class="project-category">Web design</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-7.png" alt="summary" loading="lazy">
                        </figure>
                        <h3 class="project-title">Summary</h3>
                        <p class="project-category">Web development</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="applications">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-8.jpg" alt="task manager" loading="lazy">
                        </figure>
                        <h3 class="project-title">Task Manager</h3>
                        <p class="project-category">Applications</p>
                    </a>
                </li>
                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">
                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>
                            <img src="/assets_front/images/project-9.png" alt="arrival" loading="lazy">
                        </figure>
                        <h3 class="project-title">Arrival</h3>
                        <p class="project-category">Web development</p>
                    </a>
                </li>
            </ul>
        </section>
    </article>
    <article class="blog" data-page="achievements">
        <header>
            <h2 class="h2 article-title">Achievements</h2>
        </header>
        <section class="blog-posts">
            <ul class="blog-posts-list">
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-1.jpg" alt="Design conferences in 2022" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">Design conferences in 2022</h3>
                            <p class="blog-text">
                                Veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
                            </p>
                        </div>
                    </a>
                </li>
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-2.jpg" alt="Best fonts every designer" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">Best fonts every designer</h3>
                            <p class="blog-text">
                                Sed ut perspiciatis, nam libero tempore, cum soluta nobis est eligendi.
                            </p>
                        </div>
                    </a>
                </li>
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-3.jpg" alt="Design digest #80" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">Design digest #80</h3>
                            <p class="blog-text">
                                Excepteur sint occaecat cupidatat no proident, quis nostrum exercitationem ullam
                                corporis suscipit.
                            </p>
                        </div>
                    </a>
                </li>
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-4.jpg" alt="UI interactions of the week" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">UI interactions of the week</h3>
                            <p class="blog-text">
                                Enim ad minim veniam, consectetur adipiscing elit, quis nostrud exercitation
                                ullamco laboris nisi.
                            </p>
                        </div>
                    </a>
                </li>
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-5.jpg" alt="The forgotten art of spacing" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">The forgotten art of spacing</h3>
                            <p class="blog-text">
                                Maxime placeat, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                        </div>
                    </a>
                </li>
                <li class="blog-post-item">
                    <a href="#">
                        <figure class="blog-banner-box">
                            <img src="/assets_front/images/blog-6.jpg" alt="Design digest #79" loading="lazy">
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p class="blog-category">Design</p>
                                <span class="dot"></span>
                                <time datetime="2022-02-23">Fab 23, 2022</time>
                            </div>
                            <h3 class="h3 blog-item-title">Design digest #79</h3>
                            <p class="blog-text">
                                Optio cumque nihil impedit uo minus quod maxime placeat, velit esse cillum.
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </section>
    </article>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#linkedin-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('linkedin.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            linkedin_url: url,
                        },
                        success: function(response) {
                            console.log('LinkedIn link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#gdrive-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('gdrive.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            gdrive_url: url,
                        },
                        success: function(response) {
                            console.log('gdrive link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#ig-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('ig.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            ig_url: url,
                        },
                        success: function(response) {
                            console.log('ig link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#fb-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('fb.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            fb_url: url,
                        },
                        success: function(response) {
                            console.log('fb link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#wa-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('wa.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            wa_url: url,
                        },
                        success: function(response) {
                            console.log('wa link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#twitter-link').on('click', function(event) {
                    event.preventDefault();
                    let url = $(this).attr('href');

                    $.ajax({
                        url: '{{ route('twitter.click') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            twitter_url: url,
                        },
                        success: function(response) {
                            console.log('twitter link clicked and data sent to controller');
                            window.open(url, '_blank');
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            window.open(url, '_blank');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
