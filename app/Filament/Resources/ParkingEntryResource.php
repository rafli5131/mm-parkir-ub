<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParkingEntryResource\Pages;
use App\Filament\Resources\ParkingEntryResource\RelationManagers;
use App\Models\ParkingEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParkingEntryResource extends Resource
{
    protected static ?string $model = ParkingEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('student_card')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('entry_time')
                    ->required(),
                Forms\Components\DateTimePicker::make('exit_time'),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parking_lot_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entry_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('exit_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParkingEntries::route('/'),
            'create' => Pages\CreateParkingEntry::route('/create'),
            'view' => Pages\ViewParkingEntry::route('/{record}'),
            'edit' => Pages\EditParkingEntry::route('/{record}/edit'),
        ];
    }
}
