<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\User;


class FotoController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $users = User::find($id);
        return view('fotos.fotos', compact('users'));
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
            $user = User::find($id);
            $foto = $user->Fotos()->save(
                new Foto(['descripcion' => $request->descripcion,
                'estado'=>'1',
                'ruta'=>$fileName
                ])
            );
            
            Storage::disk('fotos')->put('/' . $fileName, file_get_contents($image));
    
            return redirect('/fotos');
        }
    }

    public function eliminarFoto(Request $request)
    {
        if ($request->id_foto) {
            $user = User::where('Fotos._id',$request->id_foto)
            ->first();
            Storage::disk('fotos')->delete($user->Fotos[0]->ruta);
            $user->Fotos()->destroy($request->id_foto);


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
