<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class UsernamePassword extends Model
{
    use HasFactory;

    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/300?img='.((string) crc32($this->email))[0];
    }

    public function dateForHumans()
    {
        return $this->ordered_at->format(
            $this->ordered_at->year === now()->year
                ? 'M d, g:i A'
                : 'M d, Y, g:i A'
        );
    }

    public function amountForHumans()
    {
        return Number::currency($this->amount);
    }
}
