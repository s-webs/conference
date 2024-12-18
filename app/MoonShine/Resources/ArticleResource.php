<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Articles';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('conference')
                    ->hideOnIndex(),
                Tabs::make([
                    Tab::make('RU', [
                        Text::make('Название', 'title_ru'),
                        TinyMce::make('Контент', 'text_ru')->hideOnIndex(),
                    ]),
                    Tab::make('KZ', [
                        Text::make('Название', 'title_kz')->hideOnIndex(),
                        TinyMce::make('Контент', 'text_kz')->hideOnIndex(),
                    ]),
                    Tab::make('EN', [
                        Text::make('Название', 'title_en')->hideOnIndex(),
                        TinyMce::make('Контент', 'text_en')->hideOnIndex(),
                    ]),
                ]),
                Image::make('Превью', 'preview')
                    ->disk('public')
                    ->dir('conferences/articles/preview')
                    ->removable(),
                Image::make('Галерея', 'gallery')
                    ->disk('public')
                    ->dir('conferences/articles/gallery')
                    ->multiple()
                    ->removable(),
                Text::make('Автор', 'author'),
                Date::make('Дата', 'date'),
                Slug::make('Slug')->from('title_en'),
            ]),
        ];
    }

    /**
     * @param Article $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
