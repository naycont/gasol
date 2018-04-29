<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\cliente;
use App\producto;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$clientes = cliente::OrderBy('nombre','ASC')->paginate(5);
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$cliente = new Cliente($request->all());
		$cliente->factura = isset($request->factura)? 'Si': 'No';
        $cliente->save();
		return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = cliente::find($id);
		return view('clientes.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = cliente::find($id);		
		$cliente->fill($request->all());
		$cliente->factura = isset($request->factura)? 'Si': 'No';
		$cliente->save();
		return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    //Busqueda de clientes relacionados con productos (manyToMany)
    public function precios(){
        $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}
        $productos = producto::all()->pluck('nombre','id');
        return view('clientes.precios')->with(['clientes'=>$clientes,'productos'=>$productos]);
    }

    public function getPrecios(Request $request){

        $cliente = cliente::find($request->cliente_id);
        $producto = cliente::find($request->producto_id);
        if($producto == null ){//buscamos por el cliente
            $respuesta  = ['info' => $cliente,
                           'desglose' => $cliente->productos
            ];
        }elseif($cliente == null ){//buscamos por el producto
            $respuesta = ['info' => $producto,
                       'desglose' =>$producto->clientes
            ];
        }else{
            $respueta = cliente::whereHas('productos', function($q)
            {
                $q->whereId(producto_id);
            })->get();
        }
        //return view('clientes.info_precios')->with(['respuesta'=>$respuesta,'clientes'=>$clientes,'productos'=>$productos ]);
        //dd($respuesta);



    }

    public function Producto(){
        $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}
        $productos = producto::all()->pluck('nombre','id');
        return view('clientes.addProducto')->with(['clientes'=>$clientes,'productos'=>$productos]);
    }

    public function addProducto(Request $request){

           $cliente = cliente::find($request->cliente_id);
           $cliente->productos()->attach([$request->producto_id => ['precio'=>$request->precio]]);
           //return redirect()->precios();
    }
}