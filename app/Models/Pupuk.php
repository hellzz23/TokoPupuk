<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pupuk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pupuks';
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id', 'nama', 'jenis', 'stok', 'harga', 'deskripsi', 'foto'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}