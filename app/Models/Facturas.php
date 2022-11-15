<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Facturas extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'numero', 'fecha', 'user_id','compras_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function compras()
    {
        return $this->hasMany(Compras::class,'factura_id', 'id')->orderBy('fecha');
    }

    public function nice_date()
    {
        return Carbon::parse($this->fecha)->format('d/m/Y h:i:s');
    }

}
