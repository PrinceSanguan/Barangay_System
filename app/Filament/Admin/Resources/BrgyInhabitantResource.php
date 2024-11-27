<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BrgyInhabitantResource\Pages;
use App\Models\BrgyInhabitant;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BrgyInhabitantResource extends Resource
{
    protected static ?string $model = BrgyInhabitant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Inhabitants';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('middlename')
                    ->label('Middlename (optional)')
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->required()
                    ->numeric()
                    ->maxLength(3),
                Forms\Components\DatePicker::make('birthdate')
                    ->required(),
                Forms\Components\TextInput::make('purok')
                    ->label('Purok')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('placeofbirth')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('sex')
                    ->required()
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),
                Forms\Components\Select::make('civilstatus')
                    ->label('Civil Status')
                    ->required()
                    ->options([
                        'Single' => 'Single',
                        'Married' => 'Married',
                        'Widowed' => 'Widowed',
                        'Separated' => 'Separated',
                        'Annulled' => 'Annulled',
                        'Live-in' => 'Live-in',
                    ]),
                    Forms\Components\Select::make('positioninFamily')
                    ->required()
                    ->options([
                        'Head of the family' => 'Head of the family',
                        'Wife' => 'Wife',
                        'Husband' => 'Husband',  // Added "Husband"
                        'Son' => 'Son',
                        'Daughter' => 'Daughter',
                        'Father' => 'Father',  // Added "Father"
                        'Mother' => 'Mother',  // Added "Mother"
                        'Grandfather' => 'Grandfather',  // Added "Grandfather"
                        'Grandmother' => 'Grandmother',  // Added "Grandmother"
                        'Brother' => 'Brother',  // Added "Brother"
                        'Sister' => 'Sister',  // Added "Sister"
                        'Uncle' => 'Uncle',  // Added "Uncle"
                        'Aunt' => 'Aunt',  // Added "Aunt"
                        'Cousin' => 'Cousin',  // Added "Cousin"
                    ]),
                
                Forms\Components\Select::make('citizenship')
                    ->required()
                    ->options([
                        'Filipino' => 'Filipino',
                        'Others' => 'Others',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === 'Others') {
                            // If 'Others' is selected, show the `other_citizenship` value as the selected citizenship.
                            $set('citizenship', 'Others');
                        }
                    }),
                Forms\Components\TextInput::make('other_citizenship')
                    ->label('Please specify citizenship')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('citizenship') === 'Others')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            // If 'other_citizenship' is provided, set it as the value of citizenship.
                            $set('citizenship', $state);
                        }
                    }),
                    
                Forms\Components\Select::make('educAttainment')
                    ->label('Educational Attainment')
                    ->required()
                    ->options([
                        'No Formal Education' => 'No Formal Education',
                        'Elementary' => 'Elementary',
                        'High School' => 'High School',
                        'Vocational' => 'Vocational',
                        'Undergraduate' => 'Undergraduate',
                        'Graduate' => 'Graduate',
                        'Postgraduate' => 'Postgraduate',
                        'Others' => 'Others',
                    ])
                    ->reactive(),
                Forms\Components\TextInput::make('other_educationalAtt')
                    ->label('Please specify Attainment')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('educAttainment') === 'Others'),
                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('ofw')
                    ->required()
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ]),
                Forms\Components\Select::make('PWD')
                    ->required()
                    ->options([
                        'YES' => 'YES',
                        'NO' => 'NO',
                    ]),
                Forms\Components\TextInput::make('email')
                    ->label('Active Email Account')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lastname')->searchable(),
                Tables\Columns\TextColumn::make('firstname')->searchable(),
                Tables\Columns\TextColumn::make('middlename')->searchable(),
                Tables\Columns\TextColumn::make('age')->searchable(),
                Tables\Columns\TextColumn::make('birthdate')->date()->sortable(),
                Tables\Columns\TextColumn::make('purok')->searchable(),
                Tables\Columns\TextColumn::make('placeofbirth')->searchable(),
                Tables\Columns\TextColumn::make('sex')->searchable(),
                Tables\Columns\TextColumn::make('civilstatus')->searchable(),
                Tables\Columns\TextColumn::make('positioninFamily')->searchable(),
                Tables\Columns\TextColumn::make('citizenship')->searchable(),
                // Removed 'other_citizenship' column from the table since it's handled in the form.
                Tables\Columns\TextColumn::make('educAttainment')->searchable(),
                Tables\Columns\TextColumn::make('occupation')->searchable(),
                Tables\Columns\TextColumn::make('ofw')->searchable(),
                Tables\Columns\TextColumn::make('PWD')->label('PWD')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Active Email Account')->searchable(),
                BooleanColumn::make('is_approved')->label('Approved')->sortable(),
            ])
            ->filters([
                Filter::make('Pending Approval')
                    ->query(fn (Builder $query) => $query->where('is_approved', false)),
                Filter::make('Approved Only')
                    ->query(fn (Builder $query) => $query->where('is_approved', true)),
                Filter::make('PWD')
                    ->query(fn (Builder $query) => $query->where('PWD', 'YES')),
                Filter::make('OFW')
                    ->query(fn (Builder $query) => $query->where('ofw', 'Yes')),
                Filter::make('Senior Citizens')
                    ->label('Age 60 and Above')
                    ->query(fn (Builder $query) => $query->where('age', '>=', 60)),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (BrgyInhabitant $record) {
                        $record->is_approved = true;
                        $record->save();
                    })
                    ->visible(fn (BrgyInhabitant $record) => Filament::auth()->user() &&
                        (Filament::auth()->user()->hasRole('super_admin') || Filament::auth()->user()->hasRole('brgySecretary')) &&
                        ! $record->is_approved),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('brgySecretary')) {
            // Show all records, approved or not, for super_admin and brgySecretary
            return $query;
        }

        // Show only approved records for other users
        $query = $query->where('is_approved', true);

        // Check if citizenship is 'Others' and filter by 'other_citizenship'
        $citizenshipFilter = request()->input('citizenship'); // Get citizenship filter from request
        if ($citizenshipFilter === 'Others') {
            $query = $query->whereNotNull('other_citizenship'); // Show records with a non-null 'other_citizenship'
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [
            // Define any relationships if necessary
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrgyInhabitants::route('/'),
            'create' => Pages\CreateBrgyInhabitant::route('/create'),
            'edit' => Pages\EditBrgyInhabitant::route('/{record}/edit'),
        ];
    }
}
