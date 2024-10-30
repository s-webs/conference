@extends('layout.layout')

@section('conferenceId', $conference->id)

@section('content')
    <section class="single-cover data-bg-image" data-bg-image="/{{ $conference->preview }}">

        <div class="container-xl">

            <div class="cover-content post">
                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">{{ $conference->title_ru }}</h1>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item">{{ $conference->date }}</li>
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
                            {!! $conference->text_ru !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('components.sidebar', ['sponsors' => $conference->conference->sponsors])
                </div>

            </div>

        </div>
    </section>
@endsection
