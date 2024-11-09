<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrationType;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<RegistrationType>
 */
class RegistrationTypeResource extends ModelResource
{
    protected string $model = RegistrationType::class;

    protected string $title = 'RegistrationTypes';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Конференция', 'conference', 'name_ru'),
                Text::make('Название типа регистрации RU', 'name_ru'),
                Text::make('Название типа регистрации KZ', 'name_kz'),
                Text::make('Название типа регистрации EN', 'name_en'),
                HasMany::make('', 'registrationFields', resource: new RegistrationFieldResource())
                    ->hideOnIndex()
                    ->creatable()
            ]),
        ];
    }

    /**
     * @param RegistrationType $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
