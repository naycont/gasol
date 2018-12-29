<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $options = new \stdClass();
      $options->token = '';
      $options->select_id = 'nombre';

		  $clientes = cliente::OrderBy('nombre','ASC')->paginate(5);
      return view('clientes.index')->with(['clientes'=>$clientes,'options'=>$options]);
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

    public function buscar(Request $request){

        $token = $request->token;
        $where = $request->select_id;

        $clientes =  cliente::where($where,'like', '%'.$token.'%')->OrderBy('nombre','ASC')->paginate(5)->appends(request()->query());

        $options = new \stdClass();
        $options->token = $token;
        $options->select_id = $where;

        return view('clientes.index')->with(['clientes'=>$clientes,'options'=>$options]);

    }

    //Busqueda de clientes relacionados con productos (manyToMany)
    public function precios(){
        $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}

        return view('clientes.precios')->with(['clientes'=>$clientes]);
    }

    public function getClientesProductos(){

    }

    public function getPrecios(Request $request){


        $cliente = cliente::find($request->cliente_id);

        $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}

        //buscamos por el cliente
        $respuesta  = ['info' => $cliente,
                           'desglose' => $cliente->productos->toArray()
        ];
        /*else{

            $respuesta = cliente::whereHas('productos', function($q)
            {
                $q->whereId($producto_id);
            })->get();


        }*/
      //  dd($respuesta['info']->rfc);die;
        return view('clientes.info_precios')->with(['respuesta'=>$respuesta,'clientes'=>$clientes]);



    }

    public function Producto(){
        $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}
        $productos = producto::all()->pluck('nombre','id');

        return view('clientes.addProducto')->with(['clientes'=>$clientes,'productos'=>$productos]);
    }

    public function addClienteProducto(Request $request){
      $cliente_id = $request->cliente_id;
      $producto_id = $request->producto_id;
      $precio = $request->precio;

      $cliente = cliente::find($cliente_id);

      $cliente->productos()->attach($producto_id,['precio'=>$precio]);

      $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}


      $clientes = cliente::all()->pluck('nombre','id');//pluck regresa  un array dado una llave P/e: [1=>'Cliente 1', 2=>'Cliente 2'}

      //buscamos por el cliente
      $respuesta  = ['info' => $cliente,
                         'desglose' => $cliente->productos->toArray()
      ];

      return view('clientes.info_precios')->with(['respuesta'=>$respuesta,'clientes'=>$clientes ]);



    }

    public function addProducto(Request $request){

           $cliente = cliente::find($request->cliente_id);
           $cliente->productos()->attach([$request->producto_id => ['precio'=>$request->precio]]);
           //return redirect()->precios();
    }
}
