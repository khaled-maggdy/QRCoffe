<?php

use App\Models\Branch;
use App\Models\Shift;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Table::class)->nullable()->constrained();
            $table->foreignIdFor(Branch::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Shift::class)->constrained();
            $table->float('price');
            $table->float('discount');
            $table->float('total_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
