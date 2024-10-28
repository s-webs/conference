<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Speaker;

use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Speaker>
 */
class SpeakerResource extends ModelResource
{
    protected string $model = Speaker::class;

    protected string $title = 'Спикеры';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Фотография', 'photo')
                    ->hideOnAll()
                    ->showOnIndex(),
                BelongsTo::make('conference')
                    ->hideOnIndex(),
                Image::make('Фотография', 'photo')
                    ->disk('public')
                    ->dir('conferences/speakers')
                    ->removable()
                    ->hideOnIndex(),
                Text::make('Полное имя', 'name')->unescape(),
                Text::make('Должность, степень и заведение', 'position')->unescape(),
                Text::make('Контакты', 'contacts')->unescape()->hideOnIndex(),
                Select::make('Страна', 'country')
                    ->options([
                        'AF' => 'Afghanistan',
                        'AL' => 'Albania',
                        'DZ' => 'Algeria',
                        'AR' => 'Argentina',
                        'AM' => 'Armenia',
                        'AU' => 'Australia',
                        'AT' => 'Austria',
                        'AZ' => 'Azerbaijan',
                        'BS' => 'Bahamas',
                        'BD' => 'Bangladesh',
                        'BY' => 'Belarus',
                        'BE' => 'Belgium',
                        'BZ' => 'Belize',
                        'BO' => 'Bolivia',
                        'BA' => 'Bosnia and Herzegovina',
                        'BR' => 'Brazil',
                        'BG' => 'Bulgaria',
                        'CA' => 'Canada',
                        'CL' => 'Chile',
                        'CN' => 'China',
                        'CO' => 'Colombia',
                        'CR' => 'Costa Rica',
                        'HR' => 'Croatia',
                        'CU' => 'Cuba',
                        'CY' => 'Cyprus',
                        'CZ' => 'Czech Republic',
                        'DK' => 'Denmark',
                        'DO' => 'Dominican Republic',
                        'EC' => 'Ecuador',
                        'EG' => 'Egypt',
                        'SV' => 'El Salvador',
                        'EE' => 'Estonia',
                        'ET' => 'Ethiopia',
                        'FI' => 'Finland',
                        'FR' => 'France',
                        'GE' => 'Georgia',
                        'DE' => 'Germany',
                        'GH' => 'Ghana',
                        'GR' => 'Greece',
                        'GT' => 'Guatemala',
                        'HN' => 'Honduras',
                        'HK' => 'Hong Kong',
                        'HU' => 'Hungary',
                        'IS' => 'Iceland',
                        'IN' => 'India',
                        'ID' => 'Indonesia',
                        'IR' => 'Iran',
                        'IQ' => 'Iraq',
                        'IE' => 'Ireland',
                        'IL' => 'Israel',
                        'IT' => 'Italy',
                        'JM' => 'Jamaica',
                        'JP' => 'Japan',
                        'JO' => 'Jordan',
                        'KZ' => 'Kazakhstan',
                        'KE' => 'Kenya',
                        'KW' => 'Kuwait',
                        'KG' => 'Kyrgyzstan',
                        'LV' => 'Latvia',
                        'LB' => 'Lebanon',
                        'LY' => 'Libya',
                        'LT' => 'Lithuania',
                        'LU' => 'Luxembourg',
                        'MY' => 'Malaysia',
                        'MX' => 'Mexico',
                        'MD' => 'Moldova',
                        'MC' => 'Monaco',
                        'MN' => 'Mongolia',
                        'ME' => 'Montenegro',
                        'MA' => 'Morocco',
                        'NP' => 'Nepal',
                        'NL' => 'Netherlands',
                        'NZ' => 'New Zealand',
                        'NI' => 'Nicaragua',
                        'NG' => 'Nigeria',
                        'NO' => 'Norway',
                        'PK' => 'Pakistan',
                        'PA' => 'Panama',
                        'PY' => 'Paraguay',
                        'PE' => 'Peru',
                        'PH' => 'Philippines',
                        'PL' => 'Poland',
                        'PT' => 'Portugal',
                        'QA' => 'Qatar',
                        'RO' => 'Romania',
                        'RU' => 'Russia',
                        'SA' => 'Saudi Arabia',
                        'RS' => 'Serbia',
                        'SG' => 'Singapore',
                        'SK' => 'Slovakia',
                        'SI' => 'Slovenia',
                        'ZA' => 'South Africa',
                        'KR' => 'South Korea',
                        'ES' => 'Spain',
                        'LK' => 'Sri Lanka',
                        'SE' => 'Sweden',
                        'CH' => 'Switzerland',
                        'TW' => 'Taiwan',
                        'TJ' => 'Tajikistan',
                        'TH' => 'Thailand',
                        'TN' => 'Tunisia',
                        'TR' => 'Turkey',
                        'TM' => 'Turkmenistan',
                        'UA' => 'Ukraine',
                        'AE' => 'United Arab Emirates',
                        'GB' => 'United Kingdom',
                        'US' => 'United States',
                        'UY' => 'Uruguay',
                        'UZ' => 'Uzbekistan',
                        'VE' => 'Venezuela',
                        'VN' => 'Vietnam',
                        'YE' => 'Yemen',
                        'ZM' => 'Zambia',
                        'ZW' => 'Zimbabwe'
                    ])
                    ->searchable()
            ]),
        ];
    }

    /**
     * @param Speaker $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
