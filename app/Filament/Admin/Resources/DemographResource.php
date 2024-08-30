<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DemographResource\Pages;
use App\Filament\Admin\Resources\DemographResource\RelationManagers;
use App\Models\Demograph;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DemographResource extends Resource
{
    protected static ?string $model = Demograph::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Inhabitants';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('PopulationByAge')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Male')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('female')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('PopulationByAge')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Male')
                    ->searchable(),
                Tables\Columns\TextColumn::make('female')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable(),
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
            'index' => Pages\ListDemographs::route('/'),
            'create' => Pages\CreateDemograph::route('/create'),
            'edit' => Pages\EditDemograph::route('/{record}/edit'),
        ];
    }
}
