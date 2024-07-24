<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaminhaoRequest;
use App\Http\Requests\UpdateCaminhaoRequest;
use App\Models\Caminhao;

class CaminhaoController extends Controller
{
    protected $caminhao;
    
    public function __construct(Caminhao $caminhao) {
        $this->caminhao = $caminhao;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caminhoes = Caminhao::all();
        $caminhoes = Caminhao::with('motoristas')->get();

        return response()->json($caminhoes);
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
    public function store(StoreCaminhaoRequest $request)
    {
        try {
            $caminhao = $this->caminhao->create([
                'placa' => $request->placa,
                'modelo' => $request->modelo,
            ]);

            return response()->json($caminhao);
        } catch(Execption $e){
            return response()->json(['msg', 'Erro ao cadastrar caminhão!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $caminhao = Caminhao::with('motoristas')->find($id);

        if($caminhao === null) {
            return response()->json('Caminhão não encontrado!');
        }

        return response()->json($caminhao);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caminhao $caminhao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaminhaoRequest $request, $id)
    {
        try{
            $caminhao = Caminhao::find($id);
            $caminhao->update($request->all());
            
            return response()->json($caminhao);
        } catch(Exception $e) {
            return response()->json(['msg', 'Erro ao editar caminhão!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $caminhao = $this->caminhao->find($id);

        if ($caminhao === null) {
            return response()->json('Caminhão não encontrado!');
        }

        try {
            $caminhao->delete();

            return response()->json(['msg', 'Caminhão deletado com sucesso!']);
        } catch(Exception $e) {
            return response()->json(['msg', 'Erro ao deletar caminhão!']);
        }

    }
}
