<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Koleksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $guarded = 'id';
    protected $fillable = [
        'member_id','koleksi_id','tanggal'
    ];

    /**
     * Get the member that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the koleksi that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function koleksi(): BelongsTo
    {
        return $this->belongsTo(Koleksi::class);
    }
}
