<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\ConferenceFormPage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conference;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\LineBreak;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Conference>
 */
class ConferenceResource extends ModelResource
{
    protected string $model = Conference::class;

    protected string $title = 'Конференции';

    protected function pages(): array
    {
        return [
            IndexPage::make($this->title()),
            ConferenceFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Превью', 'preview')
                ->hideOnAll()
                ->showOnIndex(),
            Collapse::make('Название и описание', [
                Block::make([
                    Tabs::make([
                        Tab::make('RU', [
                            Text::make('Название', 'name_ru'),
                            TinyMce::make('Описание', 'description_ru')
                                ->hideOnIndex(),
                            TinyMce::make('Контакты', 'contacts_ru')
                                ->hideOnIndex(),
                        ]),
                        Tab::make('KZ', [
                            Text::make('Название', 'name_kz')
                                ->hideOnIndex(),
                            TinyMce::make('Описание', 'description_kz')
                                ->hideOnIndex(),
                            TinyMce::make('Контакты', 'contacts_kz')
                                ->hideOnIndex(),
                        ]),
                        Tab::make('EN', [
                            Text::make('Название', 'name_en')
                                ->hideOnIndex(),
                            TinyMce::make('Описание', 'description_en')
                                ->hideOnIndex(),
                            TinyMce::make('Контакты', 'contacts_en')
                                ->hideOnIndex(),
                        ]),
                    ]),
                ]),
            ]),
            LineBreak::make(),
            Block::make([
                Grid::make([
                    Column::make([
                        Image::make('Превью', 'preview')
                            ->disk('public')
                            ->dir('conferences/previews')
                            ->removable()
                            ->hideOnIndex(),
                        Date::make('Дата начала', 'date_start'),
                        Date::make('Дата окончания', 'date_end'),
                        Flex::make([
                            Switcher::make('Актуально', 'is_active'),
                            Switcher::make('Конференция окончена', 'is_completed'),
                            Switcher::make('Открыта ли регистрация', 'is_registration_open')
                        ]),
                    ])->columnSpan(6),
                    Column::make([
                        File::make('Программа конференции', 'program_file')
                            ->disk('public')
                            ->dir('conferences/program-files')
                            ->removable()
                            ->hideOnIndex(),
                        File::make('Информационное письмо', 'info_letter')
                            ->disk('public')
                            ->dir('conferences/info-letters')
                            ->removable()
                            ->hideOnIndex(),
                        File::make('Сборник тезисов', 'abstracts_file')
                            ->disk('public')
                            ->dir('conferences/abstract-files')
                            ->removable()
                            ->hideOnIndex(),
                    ])->columnSpan(6),
                ]),
            ]),
            HasMany::make('', 'organizingCommitteeMembers', resource: new OrganizingCommitteeMemberResource())
                ->creatable()
                ->hideOnIndex(),
            HasMany::make('', 'speakers', resource: new SpeakerResource())
                ->creatable()
                ->hideOnIndex(),
            HasMany::make('', 'sponsors', resource: new SponsorResource())
                ->creatable()
                ->hideOnIndex(),
            HasMany::make('', 'gallery', resource: new GalleryResource())
                ->creatable()
                ->hideOnIndex(),
            HasMany::make('', 'articles', resource: new ArticleResource())
                ->creatable()
//                ->withoutModals()
                ->hideOnIndex(),
            HasMany::make('', 'registrationTypes', resource: new RegistrationTypeResource())
                ->creatable()
                ->withoutModals()
                ->hideOnIndex()
        ];
    }

    /**
     * @param Conference $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
