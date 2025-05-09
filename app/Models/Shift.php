<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    /** @use HasFactory<\Database\Factories\ShiftFactory> */
    use HasFactory , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function branch() : BelongsTo {
        return $this->belongsTo(Branch::class);
    }
}
