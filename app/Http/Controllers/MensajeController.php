<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginated_mensajes = Mensaje::paginate(5);
        return view('mensajes.index', [
            'mensajes' => $paginated_mensajes,
        ]);
    }

    /**
     * Return the decoded image from the base64 string.
     */
    public function imagen(Mensaje $mensaje)
    {
        return response(base64_decode($mensaje->imagen))
            ->header('Content-Type', 'image/png');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => 'required',
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imgPath = $request->file('imagen')->getRealPath();
        $encodedImage = base64_encode(file_get_contents($imgPath));

        Mensaje::create([
            'mensaje' => $request->mensaje,
            'imagen' => $encodedImage,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
