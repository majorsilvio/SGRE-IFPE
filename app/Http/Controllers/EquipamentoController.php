<?php

namespace App\Http\Controllers;

use App\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipamentoController extends Controller
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
        return view('equipamento', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $validatedData = $data->validate([
        'nome' => 'required',
        'tipo' => 'required',
        ]);
        Equipamento::create([
            'nome' => $data->nome,
            'tipo' => $data->tipo
        ]);
        return redirect('equipamento');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
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
        $equipamento = DB::table('equipamentos')->where('id', '=', $id)->get();
        return view('editar_equipamento',compact('equipamento'));
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
        'nome' => 'required',
        'tipo' => 'required',
        ]);
        Equipamento::findOrFail($id)->update([
            'nome' => $data->nome,
            'tipo' => $data->tipo
        ]);
        return redirect('equipamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('reservas')->where('equipamento_id','=',$id)->delete();
        DB::table('equipamentos')->where('id', '=', $id)->delete();
        return redirect('equipamento');
    }
}
