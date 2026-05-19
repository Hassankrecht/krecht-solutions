@extends('layouts.app')
@section('title', isset($project) ? $project->title . ' - Krecht Solutions' : 'Project Details - Krecht Solutions')
@section('meta_description', isset($project) ? 'View details about ' . $project->title . ' project by Krecht Solutions. Learn about our approach, technologies used, and results delivered.' : 'View project details from Krecht Solutions portfolio.')
@section('canonical_url', isset($project) ? config('app.url') . '/portfolio/' . $project->id : config('app.url') . '/portfolio')
@push('styles')
<style>
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    justify-content: center;
    align-items: center;
}

.lightbox.active {
    display: flex;
}

.lightbox img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 40px;
    cursor: pointer;
    z-index: 10000;
}

.lightbox-prev, .lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    font-size: 50px;
    cursor: pointer;
    z-index: 10000;
    padding: 20px;
    user-select: none;
}

.lightbox-prev {
    left: 20px;
}

.lightbox-next {
    right: 20px;
}

.lightbox-prev:hover, .lightbox-next:hover {
    color: #ccc;
}
</style>
@endpush
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
                        <div class="portfolio-details-slider swiper init-swiper position-relative">
                            <script type="application/json" class="swiper-config">
                            {
                                "loop": {{ count($slides) > 1 ? 'true' : 'false' }},
                                "speed": 600,
                                "autoplay": { "delay": 5000 },
                                "slidesPerView": "auto",
                                "navigation": {
                                    "nextEl": ".swiper-button-next",
                                    "prevEl": ".swiper-button-prev"
                                },
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                }
                            }
                            </script>
                            <div class="swiper-wrapper align-items-center">
                                @foreach($slides as $index => $slide)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($slide) }}" alt="{{ $project->title }}"
                                             style="width:100%;max-height:480px;object-fit:cover;cursor:pointer;"
                                             data-index="{{ $index }}"
                                             data-src="{{ asset($slide) }}"
                                             class="gallery-image">
                                    </div>
                                @endforeach
                            </div>
                            @if(count($slides) > 1)
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            @endif
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

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close">&times;</span>
        <span class="lightbox-prev">&#10094;</span>
        <img src="" alt="Full size image" id="lightbox-img">
        <span class="lightbox-next">&#10095;</span>
    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.querySelector('.lightbox-close');
    const lightboxPrev = document.querySelector('.lightbox-prev');
    const lightboxNext = document.querySelector('.lightbox-next');
    const galleryImages = document.querySelectorAll('.gallery-image');

    let currentIndex = 0;
    const images = [];

    // Collect all gallery images
    galleryImages.forEach((img, index) => {
        images.push(img.dataset.src);
        img.addEventListener('click', function() {
            currentIndex = parseInt(this.dataset.index);
            openLightbox(images[currentIndex]);
        });
    });

    function openLightbox(src) {
        lightboxImg.src = src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % images.length;
        lightboxImg.src = images[currentIndex];
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        lightboxImg.src = images[currentIndex];
    }

    lightboxClose.addEventListener('click', closeLightbox);
    lightboxNext.addEventListener('click', showNext);
    lightboxPrev.addEventListener('click', showPrev);

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('active')) return;

        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowRight') {
            showNext();
        } else if (e.key === 'ArrowLeft') {
            showPrev();
        }
    });
});
</script>
@endpush
@endsection
