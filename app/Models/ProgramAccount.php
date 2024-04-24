<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
            TextInput::make('username'),
            TextInput::make('password'),
        ];
    }
}
