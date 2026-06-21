<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CreateContactWidget extends Widget
{
    protected static ?int $sort = 0;

    protected string $view = 'filament.widgets.create-contact-widget';

    protected int|string|array $columnSpan = 'full';
}
