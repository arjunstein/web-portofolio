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
                        <span>{{ \Carbon\Carbon::parse($exp->start_period)->format('F Y') . ' - ' . ($exp->end_period && \Carbon\Carbon::parse($exp->end_period)->isPast() ? \Carbon\Carbon::parse($exp->end_period)->format('F Y') : 'Present') }}</span>
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
            <div class="filter-select-box">
                <button class="filter-select" data-select>
                </button>
            </div>
            <ul class="project-list">
                <li class="project-item active" data-filter-item data-category="all">
                    @forelse ($projects as $pjk)
                        <a href="{{ $pjk->url_image }}" target="_blank">
                            <figure class="project-img">
                                <div class="project-item-icon-box">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                                @php
                                    $images = json_decode($pjk->image, true);
                                @endphp
                                @if (is_array($images))
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/project/' . $image) }}"
                                            alt="{{ $pjk->project_title }}" loading="lazy">
                                    @endforeach
                                @endif
                            </figure>
                            <h3 class="project-title">{{ ucwords($pjk->project_title) }}</h3>
                            <p class="project-category">{{ Ucwords($pjk->based) }}</p>
                        </a>
                    @empty
                        Empty Project
                    @endforelse
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
