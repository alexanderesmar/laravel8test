<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\Compras;
use App\Models\ComprasDetalles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturasController extends Controller
{

    public function index()
    {
        $data=[
            'facturas'=>Facturas::with(['user','compras.user'])->get()
        ];

        return view('facturas.facturas', compact("data"));
    }


    public function facturar()
    {

        $compras_pendientes_users_id=Compras::where('factura_id', null)->distinct()->pluck('user_id');

        $user_actual=Auth::user()->id;
        $fecha_actual=date('Y-m-d h:i:s');

        foreach ($compras_pendientes_users_id as $key => $user_id) {

            $factura = new Facturas;
            $factura->fecha = $fecha_actual;
            $factura->numero = '0';
            $factura->user_id = $user_actual;
            $factura->save();
            $factura->numero = $factura->id;
            $factura->save();

            $compras=Compras::where('factura_id', null)
            ->where('user_id', $user_id)
            ->update(['factura_id' => $factura->id]);
        }

        return redirect('facturas')->with('message','compras pendientes facturadas');
    }

    public function show($id)
    {
        $factura=Facturas::where('id',$id)->with(['user','compras.user', 'compras.comprasdetalles','compras.comprasdetalles.producto'])->first();

        if($factura){
            $data=[
                'factura'=>$factura
            ];

            return view('facturas.detalle_factura', compact("data"));
        }

        else{

            return redirect('facturas')->with('message','Elemento no encontrado');

        }

    }

}
