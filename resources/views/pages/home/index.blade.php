@extends('layout.layout')

@section('content')
    <section class="hero-carousel">
        <div class="container-xl">
            <div class="post-carousel-lg">
                <!-- post -->
                <div class="post featured-post-xl">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="{{ route('conference.about', $conference->id) }}">{{ $conference->name_ru }}</a></h4>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item">Дата проведения</li>
                            <li class="list-inline-item">{{ $conference->date_start }}
                                - {{ $conference->date_end }}</li>
                        </ul>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image" data-bg-image="/{{ $conference->preview }}"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">

                    <div class="mb-4">
                        <div style="border-bottom: 3px solid #203656; padding: 0; margin-bottom: 24px;">
                            <h2 class="widget-title mb-4" style="margin-bottom: 0 !important;">Спикеры</h2>
                        </div>
                        <div class="row">
                            @foreach($conference->speakers as $speaker)
                                <div class="col-sm-4">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered">
                                        <div class="thumb top-rounded">
                                            <div class="inner">
                                                <img src="/{{ $speaker->photo }}" alt="post-title"
                                                     style="height: 180px; width: 100%; object-fit: cover">
                                            </div>
                                        </div>
                                        <div class="details">
                                            <h5 class="post-title mb-3 mt-3" style="font-size: 0.9rem; height: 60px;">
                                                {{ $speaker->name }}
                                            </h5>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"
                                                    style="font-size: 0.7rem; height: 55px;">{{ $speaker->position }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div style="border-bottom: 3px solid #203656; padding: 0; margin-bottom: 24px;">
                        <h2 class="widget-title mb-4" style="margin-bottom: 0 !important;">Новости</h2>
                    </div>
                    @foreach($conference->articles as $article)
                        @include('components.article_card', ['article' => $article])
                    @endforeach
                </div>
                <div class="col-lg-4">
                    @include('components.sidebar', ['conference' => $conference])
                </div>
            </div>

        </div>
    </section>
@endsection

@push('conference-about')
    <a class="nav-link" href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
@push('conference-about-mobile')
    <a href="{{ route('conference.about', $conference->id) }}">О конференции</a>
@endpush
