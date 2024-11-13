<?php

namespace App\Filament\Resources\ParkingEntryResource\Pages;

use App\Filament\Resources\ParkingEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParkingEntry extends EditRecord
{
    protected static string $resource = ParkingEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
