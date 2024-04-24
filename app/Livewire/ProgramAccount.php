<?php

namespace App\Livewire;

use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Laravel\Prompts\alert;

class ProgramAccount extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Program Account')
            ->query(\App\Models\ProgramAccount::query()
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc'))
            ->columns([
                TextColumn::make('program_account_name')
                    ->searchable(),
                TextColumn::make('program_account_status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'inactive' => 'danger',
                        'active' => 'success',
                        default => 'info',
                    }),
                SelectColumn::make('verification_status')
                    ->options([
                        'verified' => 'Verified',
                        'failed' => 'Failed',
                        'forced' => 'Forced'
                    ])->selectablePlaceholder(false)
                    ->beforeStateUpdated(function ($record, $state) {
                        // Runs before the state is saved to the database.
                        $record->verification_status = $state;
                        $record->save();
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        // Runs after the state is saved to the database.
                    }),
                TextColumn::make('comment')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->sortable()
                    ->tooltip(fn(Carbon $state) => $state->toDateTimeString())
                    ->formatStateUsing(function (Carbon $state) {
                        return $state->format('Y-m-d');
                    }),
                TextColumn::make('username'),
                TextColumn::make('password')
                    ->formatStateUsing(function ($state) {
                        return str_repeat('*', strlen($state));  // Masks the password with asterisks
                    })
            ])
            ->searchable()
            ->filters([
                SelectFilter::make('program_account_status')
                    ->multiple()
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive'
                    ])
            ])
            ->headerActions([
                Action::make('create')
                    ->label('Create')
                    ->icon('heroicon-c-plus-circle')
                    ->url(route('programs.create')),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn(Model $record) => route('programs.index', $record))
                    ->hiddenLabel(),
                EditAction::make()
                    ->slideOver()
                    ->hiddenLabel()
                    ->form(\App\Models\ProgramAccount::form()),
//                Action::make('delete')
//                    ->requiresConfirmation()
//                    ->action(fn (\App\Models\ProgramAccount $record) => $record->delete()),
//                Action::make('Check Credentials')
//                    ->accessSelectedRecords(true)
//                    ->action(function () {
////
//                    }),
            ], position: ActionsPosition::BeforeCells);
            //->recordUrl(fn(Model $record) => route('programs.show', $record));;
    }

    public function render()
    {
        return view('livewire.programs.index');
    }
}
