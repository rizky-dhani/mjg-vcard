<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Division;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Contacts', Contact::count())
                ->description('All business cards'),
            Stat::make('Total Divisions', Division::count())
                ->description('Departments'),
            Stat::make('Total Users', User::count())
                ->description('System users'),
        ];
    }
}
