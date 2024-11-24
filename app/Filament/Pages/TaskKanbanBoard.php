<?php

namespace App\Filament\Pages;

use App\Models\Task;
use App\TaskStatus;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Collection;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class TaskKanbanBoard extends KanbanBoard
{
    use HasPageShield;

    protected static string $model = Task::class;

    protected static string $statusEnum = TaskStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    protected static string $recordTitleAttribute = 'title';

    //   protected function statuses(): Collection
    //   {
    //       return TaskStatus::statuses();
    //   }

    //   protected function records(): Collection
    //   {
    //       return Task::class;
    //   }

    protected function getEditModalFormSchema(?int $recordId): array
    {
        return [
            TextInput::make('title'),
            TextInput::make('description'),
            TextInput::make('progress'),
            TextInput::make('urgent'),
            TextInput::make('order_column')->numeric(),
            Select::make('users')
                ->multiple()
                ->relationship('users', 'name')
                ->label('Assign to Users'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions that should be displayed in the header of the board
            CreateAction::make()->model(Task::class)
                ->form([
                    TextInput::make('title')
                        ->required()
                        ->label('Task Title')
                        ->maxLength(25),
                    TextInput::make('description')
                        ->label('Task Description'),
                    TextInput::make('progress')
                        ->label('Task Progress'),
                    TextInput::make('urgent')
                        ->label('Task Urgency'),
                    TextInput::make('order_column')->numeric(),
                    Select::make('users')
                        ->multiple()
                        ->relationship('users', 'name')
                        ->label('Assign to Users'),

                ])
                ->mutateFormDataUsing(function ($data) {

                    $data['user_id'] = auth()->id();

                    return $data;
                }),

        ];

    }
}
