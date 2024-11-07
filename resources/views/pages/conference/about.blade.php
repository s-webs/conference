@extends('layout.layout')

@section('conferenceId', $conference->id)

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
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post content -->
                        <div class="post-content clearfix">
                            {!! $conference->description_ru !!}
                        </div>
                    </div>
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
                    <div style="border-bottom: 3px solid #203656; padding: 0; margin-bottom: 24px;">
                        <h2 class="widget-title mb-4" style="margin-bottom: 0 !important;">Организационный комитет</h2>
                    </div>
                    <div class="row">
                        @foreach($conference->organizingCommitteeMembers as $member)
                            <div class="col-sm-4">
                                <!-- post -->
                                <div class="post post-grid rounded bordered">
                                    <div class="thumb top-rounded">
                                        <div class="inner">
                                            <img src="/{{ $member->photo }}" alt="post-title"
                                                 style="height: 180px; width: 100%; object-fit: cover">
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h5 class="post-title mb-3 mt-3" style="font-size: 0.9rem; height: 60px;">
                                            {{ $member->name }}
                                        </h5>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"
                                                style="font-size: 0.7rem; height: 55px;">{{ $member->position }}</li>
                                        </ul>
                                    </div>
                                </div>
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
