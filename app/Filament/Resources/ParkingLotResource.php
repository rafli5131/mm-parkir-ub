<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParkingLotResource\Pages;
use App\Filament\Resources\ParkingLotResource\RelationManagers;
use App\Models\ParkingLot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParkingLotResource extends Resource
{
    protected static ?string $model = ParkingLot::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('faculty_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_capacity')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('faculty_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('capacity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_capacity')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListParkingLots::route('/'),
            'create' => Pages\CreateParkingLot::route('/create'),
            'view' => Pages\ViewParkingLot::route('/{record}'),
            'edit' => Pages\EditParkingLot::route('/{record}/edit'),
        ];
    }
}
