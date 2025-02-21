<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    // relazione 1 progetti ha 1 utente
    public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

    // fillable
    protected $fillable = [
        'user_id',
        'project_title',
        'slug',
        'summary',
        'description',
        'img1',
        'img2',
        'img3'
    ];
}
