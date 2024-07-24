<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotoristaRequest;
use App\Http\Requests\UpdateMotoristaRequest;
use App\Models\Motorista;

class MotoristaController extends Controller
{
    protected $motorista;

    public function __construct(Motorista $motorista) {
        $this->motorista = $motorista;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = Motorista::all();
        $motoristas = Motorista::with('caminhoes')->get();

        return response()->json($motoristas);
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
    public function store(StoreMotoristaRequest $request)
    {
        try {
            $motorista = $this->motorista->create([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'cnh' => $request->cnh,
                'dt_nascimento' => $request->dt_nascimento
            ]);

            return response()->json($motorista);
        } catch(Exception $e) {
            return response()->json(['msg', 'Erro ao cadastrar motorista']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motorista = Motorista::with('caminhoes')->find($id);

        if($motorista === null) {
            return response()->json('Motorista não encontrado');
        }

        return response()->json($motorista);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motorista $motorista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotoristaRequest $request, $id)
    {
        try {
            $motorista = Motorista::find($id);
            $motorista->update($request->all());
            return response()->json($motorista);

            return response()->json($motorista);
        } catch (Exception $e) {
            return response()->json(['msg', 'Erro ao atualizar motorista!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $motorista = Motorista::find($id);

        if($motorista === null) {
            return response()->json('Motorista não encontrado!');
        }

        try {
            $motorista->delete();

            return response()->json('Motorista deletado com sucesso!');
        } catch (Exception $e) {
            return response()->json('Erro ao deletar motorista!');
        }
    }
}
