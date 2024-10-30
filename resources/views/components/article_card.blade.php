<div class="post post-classic rounded bordered">
    <div class="thumb top-rounded">
        <a href="{{ route('article.show', $article->slug) }}">
            <div class="inner">
                <img src="/{{ $article->preview }}" alt="post-title"
                     style="height: 300px; width: 100%; object-fit: cover"/>
            </div>
        </a>
    </div>
    <div class="details">
        <ul class="meta list-inline mb-0">
            <li class="list-inline-item" style="margin: 0; padding: 0;">
                <i class="fas fa-calendar" style="margin-right: 10px;"></i> {{ $article->date }}
            </li>
        </ul>
        <h5 class="post-title mb-3 mt-3"><a
                href="{{ route('article.show', $article->slug) }}">{{ $article->title_ru }}</a></h5>
        <p class="excerpt mb-0">{{ $article->getShortDescription(200) }}</p>
    </div>
    <div class="post-bottom clearfix d-flex align-items-center">
        <div class="social-share me-auto">
        </div>
        <div class="float-end d-none d-md-block">
            <a href="{{ route('article.show', $article->slug) }}" class="more-link">Прочитать<i
                    class="icon-arrow-right"></i></a>
        </div>
    </div>
</div>
