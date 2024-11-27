<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FamilyProfileResource\Pages;
use App\Models\BrgyInhabitant;
use App\Models\FamilyProfile;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FamilyProfileResource extends Resource
{
    protected static ?string $model = FamilyProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inhabitants';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),
                Forms\Components\Select::make('head_of_family')
                    ->label('Head of the Family')
                    ->options(BrgyInhabitant::where('positioninFamily', 'Head of the family')
                        ->pluck('lastname', 'id'))
                    ->reactive()
                    ->searchable()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $inhabitant = BrgyInhabitant::find($state);
                        if ($inhabitant) {
                            $set('sex', $inhabitant->sex);
                            $set('age', $inhabitant->age);
                            $set('birthdate', $inhabitant->birthdate);
                            $set('educAttainment', $inhabitant->educAttainment);
                            $set('civilstatus', $inhabitant->civilstatus);
                            $set('occupation', $inhabitant->occupation);
                        }
                    }),
                Forms\Components\TextInput::make('sex')->required()->disabled(),
                Forms\Components\TextInput::make('age')->required()->disabled(),
                Forms\Components\TextInput::make('birthdate')->required()->disabled(),
                Forms\Components\TextInput::make('civilstatus')->required()->disabled(),
                Forms\Components\TextInput::make('educAttainment')->required()->disabled(),
                Forms\Components\TextInput::make('occupation')->required()->disabled(),
                Forms\Components\Select::make('monthlyincome')
                    ->label('Monthly Income')
                    ->required()
                    ->options([
                        'Below 10,000' => 'Below 10,000',
                        '10,000 - 20,000' => '10,000 - 20,000',
                        '20,000 - 30,000' => '20,000 - 30,000',
                        '30,000 - 40,000' => '30,000 - 40,000',
                        '40,000 - 50,000' => '40,000 - 50,000',
                        'Above 50,000' => 'Above 50,000',
                    ])
                    ->reactive(),
                Forms\Components\Select::make('typeOfDwelling')
                    ->label('Type of Dwelling')
                    ->required()
                    ->options([
                        'Concrete House' => 'Concrete House',
                        'Wooden House' => 'Wooden House',
                        'Bamboo House' => 'Bamboo House',
                        'Nipa Hut' => 'Nipa Hut',
                        'Mixed Materials' => 'Mixed Materials',
                        'Apartment' => 'Apartment',
                        'Condominium' => 'Condominium',
                        'Shanty' => 'Shanty',
                    ])
                    ->reactive(),
                Forms\Components\TextInput::make('watersource')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('toiletFacility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('4ps')
                    ->label('4Ps (Pantawid Pamilyang Pilipino Program)')
                    ->required()
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('civilstatus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('educAttainment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monthlyincome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('typeOfDwelling')
                    ->searchable(),
                Tables\Columns\TextColumn::make('watersource')
                    ->searchable(),
                Tables\Columns\TextColumn::make('toiletFacility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('4ps')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                BooleanColumn::make('is_approved')->label('Approved'),
            ])
            ->filters([
                Filter::make('Pending Approval')
                    ->query(fn (Builder $query) => $query->where('is_approved', false)),
                    Filter::make('4Ps Members')
                    ->query(fn (Builder $query) => $query->where('4ps', 'Yes')),
                                 
                    
                    Filter::make('Monthly Income')
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['monthlyincome'])) {
                            $query->where('monthlyincome', $data['monthlyincome']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('monthlyincome')
                            ->label('Monthly Income')
                            ->options([
                                'Below 10,000' => 'Below 10,000',
                                '10,000 - 20,000' => '10,000 - 20,000',
                                '20,000 - 30,000' => '20,000 - 30,000',
                                '30,000 - 40,000' => '30,000 - 40,000',
                                '40,000 - 50,000' => '40,000 - 50,000',
                                'Above 50,000' => 'Above 50,000',
                            ])
                            ->placeholder('Select Income Range'),
                    ]),

                
    
                // Filtering for Type of Dwelling
                Filter::make('Type of Dwelling')
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['typeOfDwelling'])) {
                            $query->where('typeOfDwelling', $data['typeOfDwelling']);
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('typeOfDwelling')
                            ->label('Type of Dwelling')
                            ->options([
                                'Concrete House' => 'Concrete House',
                                'Wooden House' => 'Wooden House',
                                'Bamboo House' => 'Bamboo House',
                                'Nipa Hut' => 'Nipa Hut',
                                'Mixed Materials' => 'Mixed Materials',
                                'Apartment' => 'Apartment',
                                'Condominium' => 'Condominium',
                                'Shanty' => 'Shanty',
                                'Other' => 'Other',
                            ])
                            ->placeholder('All Types'),
                    ]),
    

            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (FamilyProfile $record) {
                        $record->is_approved = true;
                        $record->save();
                    })
                    ->visible(fn (FamilyProfile $record) => Filament::auth()->user() && (Filament::auth()->user()->hasRole('super_admin') || Filament::auth()->user()->hasRole('brgySecretary')) && ! $record->is_approved),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([ 
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('brgySecretary')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('user_id', auth()->id());
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
            'index' => Pages\ListFamilyProfiles::route('/'),
            'create' => Pages\CreateFamilyProfile::route('/create'),
            'edit' => Pages\EditFamilyProfile::route('/{record}/edit'),
        ];
    }
}
