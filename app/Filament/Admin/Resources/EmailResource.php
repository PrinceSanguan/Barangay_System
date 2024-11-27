<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EmailResource\Pages;
use App\Models\Email;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EmailResource extends Resource
{
    protected static ?string $model = Email::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Email Title')
                    ->required(),

                Textarea::make('body')
                    ->label('Email Body')
                    ->required(),

                Select::make('users')
                    ->label('Select Users')
                    ->multiple()
                    ->options(User::pluck('email', 'id'))  // Retrieve users' email
                    ->required()
                    ->afterStateHydrated(function (Select $component, $state) {
                        // Add "Select All" manually in the options
                        $component->options([
                            'select_all' => 'Select All',
                            ...User::pluck('email', 'id')->toArray(),
                        ]);
                    })
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if (in_array('select_all', $state)) {
                            // Automatically select all users if "Select All" is chosen
                            $set('users', User::pluck('id')->toArray());
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
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
            'index' => Pages\ListEmails::route('/'),
            'create' => Pages\CreateEmail::route('/create'),
            'edit' => Pages\EditEmail::route('/{record}/edit'),
        ];
    }
}

