<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
    /** @use HasFactory<\Database\Factories\GovernorateFactory> */
    use HasFactory , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users() : HasMany {
        return $this->hasMany(User::class);
    }

    public function branches() : HasMany {
        return $this->hasMany(Branch::class);
    }
}
