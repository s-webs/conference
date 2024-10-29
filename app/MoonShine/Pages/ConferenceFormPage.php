<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\Layer;
use MoonShine\Pages\Crud\FormPage;

class ConferenceFormPage extends FormPage
{
    public function components(): array
    {
        if (!$this->getResource()->getItemID()) {
            return parent::components();
        }

        $bottomComponents = $this->getLayerComponents(Layer::BOTTOM);

        $speakersComponent = collect($bottomComponents)->filter(fn($component) => $component->getName() === 'speakers')->first();
        $organizingCommitteeComponent = collect($bottomComponents)->filter(fn($component) => $component->getName() === 'organizingCommitteeMembers')->first();
        $sponsorsComponent = collect($bottomComponents)->filter(fn($component) => $component->getName() === 'sponsors')->first();

        $tabLayer = [
            Block::make('', [
                Tabs::make([
                    Tab::make('Основная информация', $this->mainLayer()),

                    Tab::make('Спикеры', [$speakersComponent]),

                    Tab::make('Организационный комитет', [$organizingCommitteeComponent]),

                    Tab::make('Спонсоры', [$sponsorsComponent])
                ])
            ])
        ];

        return [
            ...$this->getLayerComponents(Layer::TOP),
            ...$tabLayer,
        ];
    }
}
