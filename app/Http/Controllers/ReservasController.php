<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\User;
use App\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ReservasController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = DB::table('equipamentos')->get();
        $reservas = DB::table('reservas')
        ->join('users','users.id','=', 'reservas.user_id') 
        ->join('equipamentos','equipamentos.id','=', 'reservas.equipamento_id')
        ->select('reservas.id','reservas.data_reserva','reservas.hora_inicio','reservas.hora_fim','users.name','equipamentos.nome') 
        ->orderBy('data_reserva', 'desc')
        ->get();
        return view('reserva',compact('reservas','equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {

        $validatedData = $data->validate([
            'data_reserva' => 'required|date|after:today',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i|after:hora_inicio',
            'equipamento' => 'required'
        ]);

        $hasReserva = Reserva::where([
            ['data_reserva', $data->data_reserva],
            ['hora_inicio','<', $data->hora_inicio],
            ['hora_fim','>',$data->hora_inicio ],
            ['equipamento_id', $data->equipamento]
        ])->get();
        if (sizeof($hasReserva) == 0) {
        Reserva::create([
            'data_reserva' => $data->data_reserva,
            'hora_inicio' => $data->hora_inicio,
            'hora_fim' => $data->hora_fim,
            'user_id' => Auth::id(),
            'equipamento_id' => $data->equipamento
        ]);
        }

        return redirect('reserva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $equipamentos = DB::table('equipamentos')->get();
        $reserva = DB::table('reservas')->where('id', '=', $id)->get();
        return view('editar_reserva',compact('reserva','equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $validatedData = $data->validate([
            'data_reserva' => 'required|date|after:today',
            'hora_inicio' => 'required|',
            'hora_fim' => 'required|after:hora_inicio',
            'equipamento' => 'required'
        ]);

        $hasReserva = Reserva::where([
            ['data_reserva', $data->data_reserva],
            ['hora_inicio','<', $data->hora_inicio],
            ['hora_fim','>',$data->hora_inicio ],
            ['equipamento_id', $data->equipamento]
        ])->get();
        if (sizeof($hasReserva) == 0) {
        Reserva::findOrFail($id)->update([
            'data_reserva' => $data->data_reserva,
            'hora_inicio' => $data->hora_inicio,
            'hora_fim' => $data->hora_fim,
            'user_id' => Auth::id(),
            'equipamento_id' => $data->equipamento
        ]);
        return redirect('reserva');
        }else{
            return redirect('reserva/editar/'.$id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('reservas')->where('id', '=', $id)->delete();
        return redirect('reserva');
    }
}
