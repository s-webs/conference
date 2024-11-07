@extends('layout.layout')

@section('content')
    <section class="single-cover data-bg-image" data-bg-image="/{{ $article->preview }}">
        <div class="container-xl">
            <div class="cover-content post">
                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">{{ $article->title_ru }}</h1>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item">{{ $article->date }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <swiper-container class="mySwiper" navigation="true" pagination="true">
                        @foreach($article->gallery as $image)
                            <swiper-slide><img src="/{{$image}}" alt="" style="height: 400px; width: 100%; object-fit: cover; border-radius: 15px"></swiper-slide>
                        @endforeach
                    </swiper-container>
                    <!-- post single -->
                    <div class="post post-single mt-4">
                        <!-- post content -->
                        <div class="post-content clearfix">
                            {!! $article->text_ru !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('components.sidebar', ['conference' => $article->conference])
                </div>

            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
@endsection

@push('conference-about')
    <a class="nav-link" href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
@push('conference-about-mobile')
    <a href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
