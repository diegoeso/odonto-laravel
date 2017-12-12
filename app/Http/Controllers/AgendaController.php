<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\Agenda;
use App\Pasiente;
use App\Tratamiento;

class AgendaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index(Request $request)
    {   
        $dato=trim($request->get('busqueda'));
    	$agendas = DB::table('agendas')->orderBy('id','DES')
        ->where('fecha','LIKE','%'.$dato.'%')
        ->where('id_odontologo', Auth::user()->id)
        ->paginate(10);
    	$pacientes=DB::table('pasientes')->select('id','nombre')
        // ->where('id_odontologo', Auth::user()->id)
    	->get();
    	// dd($pacientes);
    	return view('agenda.index', compact('agendas','pacientes'));
    }


    public function show($id)
    {
    	$pacientes=DB::table('pasientes')->select('id','nombre','apellido_paterno','apellido_materno')->get();
    	$agendas=Agenda::find($id);
    	// dd($pacientes,$agendas);
    	return view('agenda.show',compact('agendas','pacientes'));
    }

    public function edit($id)
    {
    	$pacientes=DB::table('pasientes')->select('id','nombre','apellido_paterno','apellido_materno')->get();
    	$agendas=Agenda::find($id);
    	return view('agenda.edit',compact('agendas','pacientes'));
    }

    public function store(Request $request)
    {
        $agenda= new Agenda;
        $agenda->id_pasiente=$request->id_pasiente;
        $agenda->fecha=$request->fecha;
        $agenda->hora=$request->hora;
        $agenda->id_odontologo=Auth::user()->id;
        $agenda->save();
        return redirect()->route('agenda.index')
            ->with('info', 'Registro guardado correctamente');
    }

    public function update(Request $request, $id)
    {
        $agenda=Agenda::find($id);
        $agenda->id_pasiente=$request->id_pasiente;
        $agenda->fecha=$request->fecha;
        $agenda->hora=$request->hora;
        $agenda->id_odontologo=Auth::user()->id;
        $agenda->save();

        return redirect()->route('agenda.index')
            ->with('info', 'Registro actualizado correctamente');
    }

     public function destroy($id)
    {
    	$agenda=Agenda::find($id);
    	$agenda->delete();
    	return back()->with('info', 'El registro ha sido eliminado');
    }

}
