<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasDetalles extends Model
{
    use HasFactory;

    protected $table = 'compras_detalles';

    protected $fillable = [
        'compras_id', 'productos_id', 'cantidad', 'costo_unitario', 'impuesto_fecha'
    ];

    public function producto()
    {
        return $this->hasOne(Productos::class, 'id', 'productos_id')->withTrashed();
    }

    public function precio_base()
    {
        return round(($this->costo_unitario*100)/($this->impuesto_fecha+100),2);
    }

    public function impuesto_puro()
    {
        #dd( $this->precio_base() );
        return round( ( $this->costo_unitario - $this->precio_base() ) ,2);
    }
}
