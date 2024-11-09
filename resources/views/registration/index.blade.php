@extends('layout.layout')

@section('content')
    <section class="single-cover data-bg-image" data-bg-image="/{{ $conference->preview }}">
        <div class="container-xl">
            <div class="cover-content post">
                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">Регистрация</h1>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item">{{ $conference->name_ru }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content">
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($registrationTypes as $type)
                            <div class="post featured-post-md col-sm-6">
                                <div class="details clearfix">
                                    <span class="category-badge">Регистрация</span>
                                    <h4 class="post-title"><a href="{{ route('conference.form', [$conference->id, $type->id]) }}">{{ $type->name_ru }}</a></h4>
                                </div>
                                <a href="blog-single.html">
                                    <div class="thumb rounded">
                                        <div class="inner data-bg-image" data-bg-image="/assets/images/register_image.jpg"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
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
