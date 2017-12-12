<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\User;
use App\Pasiente;

class TratamientoController extends Controller
{
    public function index(Request $request)
    {
        
        $dato=trim($request->get('busqueda'));
    	$tratamientos = DB::table('tratamientos')
        ->where('nombre','LIKE','%'.$dato.'%')
        ->where('id_odontologo', Auth::user()->id)
        ->orderBy('id','DES')
        ->paginate(10);
        // dd($tratamientos);
    	return view('tratamiento.index',compact('tratamientos'));
    }

    public function create()
    {
    	return view('tratamiento.create');
    }

    public function edit($id)
    {
    	$tratamiento=Tratamiento::find($id);
    	return view('tratamiento.edit',compact('tratamiento'));
    }

     public function show($id)
    {
    	$tratamiento=Tratamiento::find($id);
    	return view('tratamiento.show',compact('tratamiento'));
    }

     public function destroy($id)
    {
    	$tratamiento=Tratamiento::find($id);
    	$tratamiento->delete();
    	return back()->with('info', 'El registro ha sido eliminado');
    }

    public function update(Request $request, $id)
    {
        // return 'actualizado ' . $id;
        $tratamiento=Tratamiento::find($id);
        $tratamiento->nombre=$request->nombre;
        $tratamiento->costo=$request->costo;
        $tratamiento->tiempo=$request->tiempo;
        $tratamiento->id_odontologo=Auth::user()->id;
        $tratamiento->save();

        // LaravelSweetAlert::setMessageSuccessConfirm("flash message");
        return redirect()->route('tratamiento.index')
            ->with('info', 'Registro actualizado correctamente');
    }

    public function store(Request $request)
    {
        $tratamiento= new Tratamiento;
        $tratamiento->nombre=$request->nombre;
        $tratamiento->costo=$request->costo;
        $tratamiento->tiempo=$request->tiempo;
        $tratamiento->id_odontologo=Auth::user()->id;
        $tratamiento->save();
        return redirect()->route('tratamiento.index')
            ->with('info', 'Registro guardado correctamente');
    }
}
