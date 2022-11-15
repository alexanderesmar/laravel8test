<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Productos;
use App\Models\ComprasDetalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{

    public function store(Request $request)
    {
        #dd($request);

        $compra = new Compras;
        $compra->fecha = date('Y-m-d h:i:s');
        $compra->user_id = Auth::user()->id;
        $compra->save();

        foreach ($request->producto as $key => $value) {

            $producto=Productos::find($key);

            $comprasdetalles = new ComprasDetalles;
            $comprasdetalles->compras_id = $compra->id;
            $comprasdetalles->productos_id = $key;
            $comprasdetalles->cantidad = $value;
            $comprasdetalles->costo_unitario = $producto->precio;
            $comprasdetalles->impuesto_fecha = $producto->impuesto;
            $comprasdetalles->save();

        }

        return redirect('home')->with('message', 'compra guardada');

    }

}
