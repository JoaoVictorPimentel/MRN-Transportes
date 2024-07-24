<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViagemRequest;
use App\Http\Requests\UpdateViagemRequest;
use App\Models\Viagem;

class ViagemController extends Controller
{
    protected $viagem;

    public function __construct(Viagem $viagem){
        $this->viagem = $viagem;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viagems = Viagem::all();
        
        return response()->json($viagems);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreViagemRequest $request)
    {
        try {
            $viagem = $this->viagem->create([
                'motorista_id' => $request->motorista_id,
                'caminhao_id' => $request->caminhao_id,
                'destino'=> $request->destino
            ]);

            return response()->json($viagem);
        } catch (Exception $e) {
            return response()->json('Erro ao cadastrar viagem');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viagem = Viagem::find($id);

        if($viagem === null) {
            return response()->json('A viagem não foi encontrada!');
        }

        return response()->json($viagem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viagem $viagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateViagemRequest $request, $id)
    {
        try {
            $viagem = Viagem::find($id);
            $viagem->update($request->all());

            return response()->json($viagem);
        } catch(Exception $e) {
            return response()->json('Erro ao atualizar viagem!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $viagem = Viagem::find($id);

        if($viagem === null) {
            return response()->json('A viagem não foi encontrada!');
        }

        try {
            $viagem->delete();

            return response()->json('A viagem foi deletada!');
        } catch(Exception) {
            return response()->json('Erro ao deletar viagem!');
        }
    }
}
