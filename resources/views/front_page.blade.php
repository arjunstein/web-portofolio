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
                                    @foreach ($projects as $pjk)
                                        <img src="{{ asset('storage/project/' . $pjk->image) }}"
                                            alt="{{ $pjk->project_title }}" loading="lazy">
                                    @endforeach
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
                @forelse ($certificates as $cert)
                    <li class="blog-post-item">
                        <a href="#">
                            <figure class="blog-banner-box">
                                <img src="{{ asset('storage/certificates/' . $cert->image) }}" alt="{{ $cert->certificate_title }}"
                                    loading="lazy">
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p class="blog-category">{{ $cert->publisher }}</p>
                                    <span class="dot"></span>
                                    <time datetime="d M Y">{{ $cert->publish_date }}</time>
                                </div>
                                <h3 class="h3 blog-item-title">{{ $cert->certificate_title }}</h3>
                                <p class="blog-text">
                                    {{ $cert->certificate_description }}
                                </p>
                            </div>
                        </a>
                    </li>
                @empty
                    <p>Empty certificate</p>
                @endforelse
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
