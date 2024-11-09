<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationField;

use MoonShine\Fields\Json;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<RegistrationField>
 */
class RegistrationFieldResource extends ModelResource
{
    protected string $model = RegistrationField::class;

    protected string $title = 'RegistrationFields';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('registrationType'),
                Text::make('label'),
                Text::make('type'),
                Slug::make('name')->from('label')->separator('_'),
                Json::make('options')->onlyValue()->removable()->hideOnIndex(),
            ]),
        ];
    }

    /**
     * @param RegistrationField $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
