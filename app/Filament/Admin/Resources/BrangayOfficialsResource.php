<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;
use App\Models\BrangayOfficials;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter; // Import SelectFilter
use Illuminate\Database\Eloquent\Builder;

class BrangayOfficialsResource extends Resource
{
    protected static ?string $model = BrangayOfficials::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('designation')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\Select::make('term_year')  // Term year selection
                    ->required()
                    ->label('Term Year')
                    ->options([
                        '2016 to 2018' => '2016 to 2018',
                        '2018 to 2021' => '2018 to 2021',
                        '2023 to 2026' => '2023 to 2026',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('term_year')  // Term Year Column
                    ->label('Term Year')
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
                SelectFilter::make('term_year')
                    ->label('Term Year')
                    ->options([
                        '2016 to 2018' => '2016 to 2018',
                        '2018 to 2021' => '2018 to 2021',
                        '2023 to 2026' => '2023 to 2026',
                    ])
                    ->default('2023 to 2026'),  // Default value for the filter
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
            // If you have any relations, they would be defined here.
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrangayOfficials::route('/'),
            'create' => Pages\CreateBrangayOfficials::route('/create'),
            'edit' => Pages\EditBrangayOfficials::route('/{record}/edit'),
        ];
    }
}
