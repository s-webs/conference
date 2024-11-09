<div class="sidebar">
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title mb-4">Материалы и регистрация</h3>
            <a href="{{ route('conference.register', $conference->id) }}" class="btn btn-default btn-full" type="submit"
               target="_blank">Регистрация</a>
            <img src="/assets/images/wave.svg" class="wave" alt="wave"/>
        </div>
        <div class="widget-content">
            <a href="/{{ $conference->info_letter }}" class="btn btn-default btn-full" type="submit" target="_blank">Информационное
                письмо</a>
            <a href="/{{ $conference->program_file }}" class="btn btn-default btn-full mt-2" type="submit"
               target="_blank">Программа</a>
            @if($conference->abstracts_file)
                <a href="/{{ $conference->abstracts_file }}" class="btn btn-default btn-full mt-2" type="submit"
                   target="_blank">Сборник тезисов</a>
            @endif
            <a href="{{ route('conference.gallery', $conference->id) }}" class="btn btn-default btn-full mt-2"
               type="submit"
               target="_blank">Галерея</a>
        </div>
    </div>

    @include('components.last_conferencies')

    @include('components.newsletter')

    <div class="widget no-container rounded text-md-center">
        <span class="sponsors-title">- Спонсоры -</span>
        <div style="display: flex; justify-content: center; align-items: center">
            @foreach($conference->sponsors as $sponsor)
                <a href="{{ $sponsor->link }}" class="widget-sponsors" target="_blank">
                    <img src="/{{ $sponsor->logo }}" alt="Advertisement" style="height: 60px; margin: 10px;">
                </a>
            @endforeach
        </div>
    </div>
</div>
