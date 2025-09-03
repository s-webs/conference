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
                @if($errors->any())
                    <h4 style="color: red">{{$errors->first()}}</h4>
                @endif
                @if (session('success'))
                    <h4 style="color: green">{{ session('success') }}</h4>
                @endif
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('conference.store', [$conference->id, $form->id]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @foreach($form->registrationFields as $field)
                            <div class="form-group">
                                <label for="field-{{ $field->id }}">{{ $field->label }}</label>
                                @if($field->type === 'text')
                                    <input type="text" class="form-control" name="{{ $field->label }}"
                                           id="field-{{ $field->id }}" required>
                                @elseif($field->type === 'number')
                                    <input type="number" class="form-control" name="{{ $field->label }}"
                                           id="field-{{ $field->id }}" required>
                                @elseif($field->type === 'email')
                                    <input type="email" class="form-control" name="{{ $field->label }}"
                                           id="field-{{ $field->id }}" required>
                                @elseif($field->type === 'textarea')
                                    <textarea class="form-control" name="{{ $field->label }}"
                                              id="field-{{ $field->id }}" rows="4" required></textarea>
                                @elseif($field->type === 'file')
                                    <br><input type="file" class="form-control-file" name="{{ $field->label }}"
                                               id="field-{{ $field->id }}" required>
                                @elseif($field->type === 'select' && $field->options)
                                    <select class="form-control" name="{{ $field->label }}" id="field-{{ $field->id }}"
                                            required>
                                        @foreach($field->options as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @error('fields.' . $field->id)
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </form>
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
