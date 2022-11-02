<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = ($request->has("per_page")) ? $request->per_page : 5;

        $query = Categoria::query();

        foreach ($request->all() as $key => $value) {
            if ($key == 'sort') {
                foreach ($request->sort as $key => $value) {
                    $query->orderBy($key, $value);
                }
            } else {
                $query->where($key, $value);
            }
        }

        return $query->paginate($per_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = Categoria::create($request->validated());
        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($categoria)
    {
        $categoriaModel = Categoria::find($categoria);
        if ($categoria === null) {
            return response()->json(['message' => 'Categoria não encontrada']);
        }

        return $categoriaModel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoriaRequest  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $categoria->fill($request->validated());
        $categoria->save();

        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->delete()) {
            return response()->json("Categoria deletada", 200);
        } 

        return response()->json("Erro ao tentar deletar categoria", 500);
    }
}
