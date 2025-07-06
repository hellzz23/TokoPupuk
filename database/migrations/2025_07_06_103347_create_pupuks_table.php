<?php
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
    Schema::create('pupuks', function (Blueprint $table) {
    $table->id();
    $table->foreignIdFor(User::class);
    $table->string('nama');
    $table->enum('jenis', ['organik', 'kimia', 'campuran']);
    $table->integer('stok');
    $table->integer('harga');
    $table->text('deskripsi');
    $table->string('foto');
    $table->timestamps();
    $table->softDeletes('deleted_at');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupuks');
    }
};