<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Http\Resources\CancionResource;
use App\Models\Cancion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    public function index(Request $request)
    {
        $canciones = $request->user()
            ->canciones()
            ->latest()
            ->paginate(5);

        return CancionResource::collection($canciones);
    }

    public function store(StoreCancionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $cancion = Cancion::create($data);

        return (new CancionResource($cancion))
            ->response()
            ->setStatusCode(201);
    }

    public function show(
        Request $request,
        Cancion $cancione
    ) {
        $this->verificarPropietario(
            $request,
            $cancione
        );

        return new CancionResource($cancione);
    }

    public function update(
        UpdateCancionRequest $request,
        Cancion $cancione
    ) {
        $this->verificarPropietario(
            $request,
            $cancione
        );

        $cancione->update($request->validated());

        return new CancionResource($cancione->fresh());
    }

    public function destroy(
        Request $request,
        Cancion $cancione
    ): JsonResponse {
        $this->verificarPropietario(
            $request,
            $cancione
        );

        $cancione->delete();

        return response()->json([
            'message' => 'Canción eliminada correctamente.',
        ]);
    }

    private function verificarPropietario(
        Request $request,
        Cancion $cancion
    ): void {
        if ($cancion->user_id !== $request->user()->id) {
            abort(
                404,
                'La canción solicitada no existe.'
            );
        }
    }
}