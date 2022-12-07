<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FotoController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $fotos = Foto::where('user_id', $id)->get();
        return view('fotos.fotos', compact('fotos'));
    }

    public function mostrarFoto(string $ruta)
    {
        $file = Storage::disk('fotos')->get($ruta);
        return Image::make($file)->response();
    }

    public function subirFoto(Request $request)
    {
        if ($request->hasFile('foto')) {
            $id = auth()->user()->id;
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('fotos')->put('/' . $fileName, file_get_contents($image));
            $foto = new Foto;
            $foto->user_id = $id;
            $foto->descripcion = $request->descripcion;
            $foto->estado = 1;
            $foto->ruta = $fileName;
            $foto->save();
            return redirect('/fotos');
        }
    }
    public function eliminarFoto(Request $request)
    {
        if ($request->id_foto) {
            $foto = Foto::find($request->id_foto);
            $foto->delete();

            Storage::disk('fotos')->delete($foto->ruta);
            return redirect('/fotos');
        }
    }
    public function subirComentario(Request $request)
    {
        if ($request->comentario) {
            $id = auth()->user()->id;
            $comentario = new Comentario;
            $comentario->user_id = $id;
            $comentario->foto_id = $request->id_foto;
            $comentario->comentario = $request->comentario;
            $comentario->estado = 1;
            $comentario->save();
            return redirect('/home');
        }
    }
}
