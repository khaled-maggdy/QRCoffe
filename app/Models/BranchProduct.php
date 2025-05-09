<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchProduct extends Model
{
    /** @use HasFactory<\Database\Factories\BranchProductFactory> */
    use HasFactory , SoftDeletes;
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function branch() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
