<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjungs';
    protected $guarded = 'id';
    protected $fillable = [
        'nama','nomor','category_id','pendidikan_id','pekerjaan_id'
    ];

    /**
     * Get the category that owns the Anggota
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the pekerjaan that owns the Anggota
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    /**
     * Get the pendidikan that owns the Anggota
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendidikan(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class);
    }
}
