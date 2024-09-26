<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CertificateResource\Pages;
use App\Filament\Admin\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Certificate Appointments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\Select::make('certificate_type')
                ->label('Certificate Type')
                ->options([
                    'Indigency_certificate' => 'Indigency Certificate',
                    'barangay_clearance' => 'Barangay Clearance',
                    'business_permit' => 'Business Permit',
                ])
                ->required(),

            Forms\Components\Textarea::make('purpose')
                ->label('Purpose')
                ->required(),

                Forms\Components\Toggle::make('is_approved')
                    ->label('Approved')
                    ->disabled() // Disabled in the form
                    ->visible(fn () => Auth::user()->hasRole('brgySecretary')), // Visible only to brgySecretary
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
                ->label('Email'),

            TextColumn::make('certificate_type')
                ->label('Certificate Type')
                ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state))),

            TextColumn::make('purpose')
                ->label('Purpose')
                ->limit(50),
                BooleanColumn::make('is_approved')
                ->label('Approved')
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Filter::make('certificate_type')
                ->label('Certificate Type')
                ->query(fn (Builder $query) => $query->where('certificate_type', '!=', null)),
            ])
            ->actions([
                    Action::make('approve')
                    ->label('Approve')
                    ->action(function (Certificate $record) {
                        $record->is_approved = true; // Set approved status to true
                        $record->save();
                    })
                    ->visible(fn (Certificate $record) => Auth::user()->hasAnyRole(['brgySecretary', 'super_admin']) && !$record->is_approved), // Visible for both roles and if not approved yet
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
