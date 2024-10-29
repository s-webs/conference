<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;

use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Sponsor>
 */
class SponsorResource extends ModelResource
{
    protected string $model = Sponsor::class;

    protected string $title = 'Sponsors';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('conference')->hideOnIndex(),
                Image::make('Логотип', 'logo')
                    ->disk('public')
                    ->dir('conferences/sponsors')
                    ->removable(),
                Text::make('Название на русском', 'name_ru')
                    ->unescape(),
                Text::make('Название на казахском', 'name_kz')
                    ->unescape(),
                Text::make('Название на английском', 'name_en')
                    ->unescape(),
                Url::make('Ссылка', 'link')
            ]),
        ];
    }

    /**
     * @param Sponsor $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
