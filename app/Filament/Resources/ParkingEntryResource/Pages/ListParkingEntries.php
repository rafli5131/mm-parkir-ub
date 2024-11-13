<?php

namespace App\Filament\Resources\ParkingEntryResource\Pages;

use App\Filament\Resources\ParkingEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParkingEntries extends ListRecords
{
    protected static string $resource = ParkingEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
