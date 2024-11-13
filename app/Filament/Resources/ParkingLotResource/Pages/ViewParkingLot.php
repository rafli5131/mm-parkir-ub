<?php

namespace App\Filament\Resources\ParkingLotResource\Pages;

use App\Filament\Resources\ParkingLotResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewParkingLot extends ViewRecord
{
    protected static string $resource = ParkingLotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
