<?php

namespace App\Models;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Livewire;
use function Laravel\Prompts\alert;


class ProgramAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_account_name',
        'verification_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function form(): array
    {
        return [
            TextInput::make('program_account_name')
                ->rules('required'),
            Select::make('program_account_status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])->rules('required'),
            Select::make('verification_status')
                ->options([
                    'verified' => 'Verified',
                    'failed' => 'Failed',
                    'forced' => 'Forced'
                ]),
            Textarea::make('comment'),
            Fieldset::make('Check credentials')
                ->schema([
                    TextInput::make('username'),
                    TextInput::make('password'),
                    Actions::make([
                        Actions\Action::make('Check Credentials')
                            ->icon('heroicon-o-check')
                            ->action(function ($state) {
                                $username = data_get($state, 'username');
                                $password = data_get($state, 'password');
                                $checkCredentials = UsernamePassword::query()
                                    ->where('username', $username)
                                    ->where('password', $password)
                                    ->exists();

                                if ($checkCredentials) {
                                    throw new \Exception("Username Password already exists.");
                                }
                                return true;
                            }),
                    ]),
                ]),
        ];
    }
}
