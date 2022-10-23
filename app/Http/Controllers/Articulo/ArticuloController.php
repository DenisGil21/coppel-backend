<?php

namespace App\Http\Controllers\Articulo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $articulo = DB::select('CALL postArticulo(?,?,?,?,?,?,?)',[
            $data['sku'],$data['articulo'],$data['marca'],$data['modelo'],$data['stock'],
            $data['cantidad'],$data['familia']
        ]);

        return response()->json([
            'ok' => true,
            'articulo' => $articulo
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sku)
    {
        $articulo = DB::select('CALL getArticulos(?)',[$sku]);
        return response()->json([
            'ok' => true,
            'articulo' => $articulo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        $data = $request->all();

        DB::select('CALL updateArticulo(?,?,?,?,?,?,?)',[
            $sku,$data['articulo'],$data['marca'],$data['modelo'],$data['stock'],
            $data['cantidad'],$data['familia']
        ]);
        return response()->json([
            'ok'=> true,
            'msg' => 'Articulo actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sku)
    {
        DB::select('CALL deleteArticulo(?)',[$sku]);
        return response()->json([
            'ok' => true,
            'msg' => 'Artículo eliminado'
        ]);
    }
}
