<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesanans';

    protected $fillable = [
        'user_id', 'pupuk_id', 'nama', 'ponsel', 'alamat',
        'jumlah', 'tgl_pesan', 'total'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pupuk(): BelongsTo
    {
        return $this->belongsTo(Pupuk::class);
    }
}