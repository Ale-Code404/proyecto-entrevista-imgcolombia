<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ArticulosRequest;
use App\Models\Articulo;

use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Articulo::simplePaginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticulosRequest $request)
    {
        $validated = $request->safe()->all();

        $newArticle = Articulo::create($validated);

        return response()->json([
            'message' => 'Artículo creado exitosamente',
            'article' => [ 'id' => $newArticle->id ]
        ], 201);
    }
}
