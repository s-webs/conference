@extends('layout.layout')

@section('content')
    <section class="hero-carousel">
        <div class="container-xl">
            <div class="post-carousel-lg">
                <!-- post -->
                <div class="post featured-post-xl">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="blog-single.html">{{ $conference->name_ru }}</a></h4>
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
                    @foreach($conference->articles as $article)
                        @include('components.article_card', ['article' => $article])
                    @endforeach
                </div>
                <div class="col-lg-4">
                    @include('components.sidebar', ['sponsors' => $conference->sponsors])
                </div>
            </div>

        </div>
    </section>
@endsection
