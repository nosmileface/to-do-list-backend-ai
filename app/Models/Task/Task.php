<?php

namespace App\Models\Task;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'title', 'description', 'is_completed'])]
class Task extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
