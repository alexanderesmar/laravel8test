<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{

    public function index()
    {
        $data=[
            'productos'=>Productos::all()
        ];

        return view('productos.index', compact("data"));
    }


    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            #reglas
            [
                'nombre'                => 'required|max:190|unique:productos',
                'precio'                => 'required|numeric|min:0',
                'impuesto'              => 'required|numeric|min:0'
            ],
            #mensajes
            [
                'nombre.unique'         => 'El nombre debe ser unico',
                'nombre.required'       => 'El nombre es requerido',
                'precio.min'            => 'El precio debe ser valido',
                'impuesto.numeric'      => 'El precio debe ser numerico',
                'precio.required'       => 'El precio es requerido',
                'impuesto.min'          => 'El impuesto debe ser valido',
                'impuesto.numeric'      => 'El impuesto debe ser numerico',
                'impuesto.required'     => 'El impuesto es requerido'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $producto = new Productos;

        $producto->fill($request->all());

        $producto->save();

        return redirect('productos')->with('message','Producto creado');
    }

    public function show($id)
    {
        $producto=Productos::find($id);

        if($producto){

            return view('productos.show',compact("producto"));
        }

        else{

            return redirect('productos')->with('message','Elemento no encontrado');

        }
    }


    public function edit($id)
    {
        $producto=Productos::find($id);

        if($producto){

            return view('productos.edit',compact("producto"));
        }

        else{

            return redirect('productos')->with('message','Elemento no encontrado');

        }
    }


    public function update($id, Request $request)
    {
        $producto=Productos::find($id);

        $validator = Validator::make($request->all(),
            #reglas
            [
                'nombre'                => 'required|max:190|unique:productos,id,' . $producto->id,
                'precio'                => 'required|numeric|min:0',
                'impuesto'              => 'required|numeric|min:0'
            ],
            #mensajes
            [
                'nombre.unique'         => 'El nombre debe ser unico',
                'nombre.required'       => 'El nombre es requerido',
                'precio.min'            => 'El precio debe ser valido',
                'impuesto.numeric'      => 'El precio debe ser numerico',
                'precio.required'       => 'El precio es requerido',
                'impuesto.min'          => 'El impuesto debe ser valido',
                'impuesto.numeric'      => 'El impuesto debe ser numerico',
                'impuesto.required'     => 'El impuesto es requerido'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $producto->fill($request->all());

        $producto->save();

        return redirect('productos')->with('message','Producto actualizado');
    }


    public function destroy($id)
    {
        $producto=Productos::destroy($id);
        return redirect('productos')->with('message','Producto Eliminado');
    }
}
