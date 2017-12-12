<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Diccionario;

class DiccionarioController extends Controller
{
    public function index(Request $request)
    {
        $dato=trim($request->get('busqueda'));
    	$diccionarios = DB::table('diccionarios')
        ->where('malestar','LIKE','%'.$dato.'%')
    	->orderBy('id','DES')
    	->paginate(10);
        return view('diccionario.index', compact('diccionarios'));
    }


    public function edit($id)
    {
    	$diccionarios=Diccionario::find($id);
    	return view('diccionario.edit',compact('diccionarios'));
    }

     public function show($id)
    {
    	$diccionarios=Diccionario::find($id);
    	return view('diccionario.show',compact('diccionarios'));
    }

     public function destroy($id)
    {
    	$diccionarios=Diccionario::find($id);
    	$diccionarios->delete();
    	return back()->with('info', 'El registro ha sido eliminado');
    }

    public function update(Request $request, $id)
    {
        // return 'actualizado ' . $id;
        $diccionarios=Diccionario::find($id);
        $diccionarios->malestar=$request->malestar;
        $diccionarios->medicamento=$request->medicamento; 
        $diccionarios->save();

        // LaravelSweetAlert::setMessageSuccessConfirm("flash message");
        return redirect()->route('diccionario.index')
            ->with('info', 'Registro actualizado correctamente');
    }

    public function store(Request $request)
    {
        $diccionarios= new Diccionario;
        $diccionarios->malestar=$request->malestar;
        $diccionarios->medicamento=$request->medicamento; 
        $diccionarios->save();
        return redirect()->route('diccionario.index')
            ->with('info', 'Registro guardado correctamente');
    }
}
