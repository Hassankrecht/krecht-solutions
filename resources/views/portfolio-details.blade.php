@extends('layouts.app')
@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="current">{{ $project->title }}</li>
                </ol>
            </nav>
            <h1>{{ $project->title }}</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <!-- Left column: slider / video -->
                <div class="col-lg-8">

                    @php
                        $slides = $project->gallery_images ?? [];
                        if (empty($slides) && $project->image) {
                            $slides = [$project->image];
                        }
                    @endphp

                    @if(count($slides) > 0)
                        <div class="portfolio-details-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                            {
                                "loop": {{ count($slides) > 1 ? 'true' : 'false' }},
                                "speed": 600,
                                "autoplay": { "delay": 5000 },
                                "slidesPerView": "auto",
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                }
                            }
                            </script>
                            <div class="swiper-wrapper align-items-center">
                                @foreach($slides as $slide)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($slide) }}" alt="{{ $project->title }}"
                                             style="width:100%;max-height:480px;object-fit:cover;">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    @endif

                    @if($project->video)
                        <div class="mt-4">
                            @php
                                $videoPath = $project->video;
                                $isExternal = str_starts_with($videoPath, 'http://') || str_starts_with($videoPath, 'https://');
                                $ext = strtolower(pathinfo($videoPath, PATHINFO_EXTENSION));
                                $isYoutube = str_contains($videoPath, 'youtube.com') || str_contains($videoPath, 'youtu.be');
                                $isVimeo   = str_contains($videoPath, 'vimeo.com');
                            @endphp

                            @if($isYoutube || $isVimeo)
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $videoPath }}" allowfullscreen></iframe>
                                </div>
                            @else
                                <video controls class="w-100 rounded" style="max-height:360px;">
                                    <source src="{{ $isExternal ? $videoPath : asset($videoPath) }}" type="video/{{ $ext === 'mp4' ? 'mp4' : ($ext === 'webm' ? 'webm' : 'mp4') }}">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    @endif

                </div><!-- End left column -->

                <!-- Right column: project info -->
                <div class="col-lg-4">

                    <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $project->category }}</li>
                            @if($project->technologies)
                                <li><strong>Technologies</strong>: {{ $project->technologies }}</li>
                            @endif
                        </ul>
                    </div>

                    <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                        <h2>{{ $project->title }}</h2>
                        @if($project->description)
                            <p>{{ $project->description }}</p>
                        @endif
                    </div>

                    @if($project->gallery_images && count($project->gallery_images) > 1)
                        <div class="mt-3" data-aos="fade-up" data-aos-delay="350">
                            <p class="small text-muted mb-2">
                                <i class="bi bi-images me-1"></i>
                                {{ count($project->gallery_images) }} screenshots in gallery
                            </p>
                        </div>
                    @endif

                    <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('portfolio') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Back to Portfolio
                        </a>
                    </div>

                </div><!-- End right column -->

            </div>
        </div>
    </section><!-- /Portfolio Details Section -->

@endsection
