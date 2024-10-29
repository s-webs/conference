<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Gallery>
 */
class GalleryResource extends ModelResource
{
    protected string $model = Gallery::class;

    protected string $title = 'Galleries';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('conference')->hideOnIndex(),
//                Text::make('Название на русском', 'name_ru')->unescape(),
//                Text::make('Название на казахском', 'name_kz')->unescape()->hideOnIndex(),
//                Text::make('Название на английском', 'name_en')->unescape()->hideOnIndex(),
                Image::make('Изображения', 'images')
                    ->disk('public')
                    ->dir('conferences/gallery')
                    ->multiple(),
            ]),
        ];
    }

    /**
     * @param Gallery $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
