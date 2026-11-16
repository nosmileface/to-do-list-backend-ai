<?php

namespace App\Models\Todo;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'title'])]
class Todo extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
