<div class="sidebar">
    @include('components.last_conferencies')

    @include('components.newsletter')

    <div class="widget no-container rounded text-md-center">
        <span class="sponsors-title">- Спонсоры -</span>
        <div style="display: flex; justify-content: center; align-items: center">
        @foreach($sponsors as $sponsor)
            <a href="{{ $sponsor->link }}" class="widget-sponsors" target="_blank">
                <img src="/{{ $sponsor->logo }}" alt="Advertisement" style="height: 60px; margin: 10px;">
            </a>
        @endforeach
        </div>
    </div>
</div>
