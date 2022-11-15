<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Compras extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'fecha', 'user_id', 'facturado'
    ];

    protected $casts = [
        'facturado' => 'boolean',
    ];

    public function comprasdetalles()
    {
        return $this->hasMany(ComprasDetalles::class, 'compras_id', 'id');
    }

    public function user()
    {
        #return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
    }

    public function nice_date()
    {
        return Carbon::parse($this->fecha)->format('d/m/Y h:i:s');
    }
}
