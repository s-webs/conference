@extends('layout.layout')

@push('styles')
    <link rel="stylesheet" href="/assets/css/photoswipe.css">
@endpush

@section('content')
    <section class="single-cover data-bg-image" data-bg-image="/{{ $conference->preview }}">
        <div class="container-xl">
            <div class="cover-content post">
                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">{{ $conference->name_ru }}</h1>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item">{{ $conference->date_start }} - {{ $conference->date_end }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="pswp-gallery" id="my-gallery">
                        @foreach($conference->allPhotos() as $image)
                            <a href="/{{ $image }}" data-pswp-width="800"
                               data-pswp-height="600"
                               target="_blank"
                               class="gallery-item"
                            >
                                <img
                                    src="/{{ $image }}"
                                    alt=""
                                    loading="lazy"
                                    class="gallery-image"
                                />
                            </a>
                        @endforeach
                    </div>
                    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="pswp__bg"></div>
                        <div class="pswp__scroll-wrap">
                            <div class="pswp__container">
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                                <div class="pswp__item"></div>
                            </div>
                            <div class="pswp__ui pswp__ui--hidden">
                                <div class="pswp__top-bar">
                                    <div class="pswp__counter"></div>
                                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                    <button class="pswp__button pswp__button--share" title="Share"></button>
                                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('components.sidebar', ['conference' => $conference])
                </div>

            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script type="module">
        import PhotoSwipeLightbox from '/assets/js/photoswipe-lightbox.esm.js';

        // Get the dimensions of the image and adjust the data-pswp attributes dynamically
        document.addEventListener('DOMContentLoaded', function () {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const maxWidth = window.innerWidth * 0.8;  // Max width to 80% of screen width
            const maxHeight = window.innerHeight * 0.8; // Max height to 80% of screen height

            galleryItems.forEach(item => {
                const img = item.querySelector('img');
                const image = new Image();
                image.src = img.src;

                image.onload = function () {
                    const aspectRatio = image.width / image.height;
                    let width = image.width;
                    let height = image.height;

                    // Ensure the image doesn't exceed max width or height
                    if (width > maxWidth) {
                        width = maxWidth;
                        height = width / aspectRatio;
                    }
                    if (height > maxHeight) {
                        height = maxHeight;
                        width = height * aspectRatio;
                    }

                    // Update the data-pswp attributes
                    item.setAttribute('data-pswp-width', width);
                    item.setAttribute('data-pswp-height', height);
                };
            });

            const options = {
                gallery: '#my-gallery',
                children: 'a',
                pswpModule: () => import('/assets/js/photoswipe.esm.js')
            };
            const lightbox = new PhotoSwipeLightbox(options);
            lightbox.init();
        });
    </script>
@endpush

@push('conference-about')
    <a class="nav-link" href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
@push('conference-about-mobile')
    <a href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
