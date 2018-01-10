<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\Pasiente;
use App\Tratamiento;
use App\User;


class PasienteController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index(Request $request)
    {   
        $dato=trim($request->get('busqueda'));
        $tratamientos = DB::table('tratamientos')->select('id','nombre')
        ->get();
    	$pacientes = DB::table('pasientes')
        ->where('nombre','LIKE','%'.$dato.'%')
        // ->orwhere('apellido_paterno','LIKE','%'.$dato.'%')
        // ->where('apellido_materno','LIKE','%'.$dato.'%')
        ->where('id_odontologo', Auth::user()->id)
        ->paginate(10);
        // dd(Auth::user()->id);
    	return view('paciente.index',compact('pacientes','tratamientos'));
    }
    public function create()
    {
        $tratamientos = DB::table('tratamientos')->select('id','nombre')
        ->where('id_odontologo',Auth::user()->id)
         ->get();

        return view('paciente.create', compact('tratamientos'));
    }

    public function edit($id)
    {
        
        $tratamientos = DB::table('tratamientos')->select('id','nombre')
        ->where('id_odontologo', '=', Auth::user()->id)
        ->get();
        $paciente=Pasiente::find($id);
        // dd($tratamientos, $paciente);
        return view('paciente.edit',compact('paciente','tratamientos'));
    }

    public function show($id)
    {    
        $paciente=Pasiente::find($id);
        return view('paciente.show',compact('paciente'));
    }

     public function destroy($id)
    {
        $paciente=Pasiente::find($id);
        $paciente->delete();
        return back()->with('info', 'El registro ha sido eliminado');
    }

    public function update(Request $request, $id)
    {
        // return 'actualizado ' . $id;
        $paciente=Pasiente::find($id);
        $paciente->nombre=$request->nombre;
        $paciente->apellido_paterno=$request->apellido_paterno;
        $paciente->apellido_materno=$request->apellido_materno;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->malestares=$request->malestares;
        $paciente->id_odontologo=Auth::user()->id;
        $paciente->id_tratamiento=$request->id_tratamiento;
        $paciente->save();

        return redirect()->route('paciente.index')
            ->with('info', 'Registro actualizado correctamente');
    }

    public function store(Request $request)
    {
        $paciente= new Pasiente;
        $paciente->nombre=$request->nombre;
        $paciente->apellido_paterno=$request->apellido_paterno;
        $paciente->apellido_materno=$request->apellido_materno;
        $paciente->fecha_nacimiento=$request->fecha_nacimiento;
        $paciente->malestares=$request->malestares;
        $paciente->id_odontologo=Auth::user()->id;
        $paciente->id_tratamiento=$request->id_tratamiento;
        $paciente->save();
        return redirect()->route('paciente.index')
            ->with('info', 'Registro guardado correctamente');
    }



    // mostrar tratamientos en vista de pacientes

}
