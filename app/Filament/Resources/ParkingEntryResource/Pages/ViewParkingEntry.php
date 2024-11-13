<?php

namespace App\Filament\Resources\ParkingEntryResource\Pages;

use App\Filament\Resources\ParkingEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewParkingEntry extends ViewRecord
{
    protected static string $resource = ParkingEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
