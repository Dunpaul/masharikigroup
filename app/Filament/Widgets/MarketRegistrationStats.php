<?php

namespace App\Filament\Widgets;

use App\Models\Exhibitor;
use App\Models\MarketSubscriber;
use App\Models\NonExhibitor;
use App\Models\Student;
use App\Models\VirtualAttendant;
use App\Models\WaiverCode;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MarketRegistrationStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $types = [
            'Exhibitors' => Exhibitor::query(),
            'Non-Exhibitors' => NonExhibitor::query(),
            'Students' => Student::query(),
            'Virtual Attendants' => VirtualAttendant::query(),
        ];

        $stats = [];

        foreach ($types as $label => $query) {
            $total = (clone $query)->count();
            $paid = (clone $query)->where('payment_status', 'paid')->count();

            $stats[] = Stat::make($label, $total)
                ->description("{$paid} paid / ".($total - $paid).' unpaid')
                ->color($total > 0 && $paid === $total ? 'success' : 'warning');
        }

        $stats[] = Stat::make('Waiver Codes', WaiverCode::count())
            ->description(WaiverCode::where('available', true)->count().' still available')
            ->color('gray');

        $stats[] = Stat::make('Newsletter Subscribers', MarketSubscriber::count())
            ->color('gray');

        return $stats;
    }
}
