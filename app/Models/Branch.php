<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function orders() : HasMany{
        return $this->hasMany(Order::class);
    }
    public function branch_product() : HasMany{
        return $this->hasMany(BranchProduct::class);
    }
    public function shifts() : HasMany{
        return $this->hasMany(Shift::class);
    }
    public function governorate () : BelongsTo {
        return $this->belongsTo(Governorate::class);
    }
}
