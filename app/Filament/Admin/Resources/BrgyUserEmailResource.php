<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyUserEmailResource\Pages;
use App\Filament\Admin\Resources\BrgyUserEmailResource\RelationManagers;
use App\Models\BrgyUserEmail;
use App\Models\User;
use App\Mail\BrgyUserNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class BrgyUserEmailResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
            ])
            ->filters([
                Filter::make('brgyUser')
                ->label('Brgy User Emails')
                ->query(fn (Builder $query) => $query->whereHas('roles', function (Builder $q) {
                    $q->where('name', 'brgyUser');
                })),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                BulkAction::make('sendEmails')
                ->label('Send Emails')
                ->action(function (Collection $records) {
                    // Iterate over each record in the collection
                    foreach ($records as $record) {
                        // Ensure $record is a User instance
                        if ($record instanceof \App\Models\User) {
                            // Send the Mailable to the user's email
                            Mail::to($record->email)->send(new BrgyUserNotification($record));
                        }
                    }
                }),
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
            'index' => Pages\ListBrgyUserEmails::route('/'),
            'create' => Pages\CreateBrgyUserEmail::route('/create'),
            'edit' => Pages\EditBrgyUserEmail::route('/{record}/edit'),
        ];
    }
}
