<?php

namespace App\Http\Controllers;

use App\Models\Cerradura;
use App\Models\Imagen;
use App\Models\Reservas;
use App\Models\User;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $imagen = Imagen::where('user_id',auth()->user()->id)->first();
        // dd($imagen);
        // dd($imagen);
        return view('imagenes.create', compact('imagen'));
        // return view('imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Lógica para validar y guardar la imagen en la base de datos
        // Aquí deberías verificar que el usuario tiene el rol correcto antes de permitir la acción.

        $user = auth()->user();

        // Verificar el rol del usuario
        if ($user->role == 'cliente') {
            // Validar y guardar la imagen
            $request->validate([
                'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $directorio = storage_path('app/public/imagenes');
            // dd($directorio);
            if (!file_exists($directorio)) {
                mkdir($directorio, 0755, true);
            }

            $path=$request->file('url_imagen')->storeAs('public/imagenes',request('url_imagen')->getClientOriginalName());
            $imagen = new Imagen();
            $imagen->url_imagen = request('url_imagen')->getClientOriginalName(); // Almacenar la imagen en la carpeta 'public/imagenes'
            $imagen->user_id = $user->id;
            $imagen->save();

            return redirect()->back()->with('success', 'Imagen subida correctamente.');
        } else {
            return redirect()->back()->with('error', 'No tienes permisos para subir imágenes.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        //
    }

    public function compararImagenes(Request $request)
    {
        return view('imagenes.comparar');
    }

    public function mostrarCaptura()
    {
        return view('imagenes.comparar');
        // return response()->json(['mensaje' => 'Imagen recibida y procesada con éxito']);
        // Resto de la lógica de comparación...
    }
    public function procesarCaptura(Request $request)
    {
        // dd($productosIds = auth()->user()->reservas->flatMap(function ($reserva) {
        //     return $reserva->detalleHabitacions->sortByDesc('created_at')->take(1)->pluck('producto_id');
        // })->first());

        // Obtener la imagen capturada del formulario
        $imagenCapturadaBase64 = $request->input('imagen');

        // Guardar la imagen capturada temporalmente (puedes almacenarla en el sistema de archivos o en la base de datos)
        // Crear el directorio 'temp' si no existe
        $directorioTemp = storage_path('app/temp');
        // dd($directorioTemp);
        if (!file_exists($directorioTemp)) {
            mkdir($directorioTemp, 0755, true);
        }
        $rutaI1 =storage_path('app/public/imagenes');
        $foto=Imagen::where('user_id',auth()->user()->id)->first();
        $rutaImagen =$rutaI1.'/'.$foto->url_imagen;
        // Guardar la imagen capturada temporalmente
        $rutaImagenTemp = $directorioTemp . '/captura.jpg';
        // dd($rutaImagenTemp,$rutaImagen);
        file_put_contents($rutaImagenTemp, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenCapturadaBase64)));

        // Comparar con AWS Rekognition
        $rekognition = new RekognitionClient([
            'region' => 'us-east-1', // Reemplaza con tu región de AWS
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAUSCVC22QB42Y4MVM', // Reemplaza con tus credenciales de AWS
                'secret' => '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',
            ],
        ]);


        set_time_limit(120); // Aumenta el límite de tiempo a 120 segundos


        // dd($rutaImagen);
        // if (file_exists($rutaImagen)) {
            // La imagen existe, ahora puedes continuar con el código
            $result = $rekognition->compareFaces([
                'SimilarityThreshold' => 70,
                'SourceImage' => [
                    'Bytes'=>file_get_contents($rutaImagen),
                ],

                'TargetImage' => [

                    'Bytes'=>file_get_contents($rutaImagenTemp),
                ],
                // Otros parámetros según sea necesario
            ]);


        // Obtener la similitud de las caras
        $similarity = $result['FaceMatches'][0]['Similarity'];

        if ($similarity >= 70) {
            // Las imágenes son lo suficientemente similares
            // Realizar cambios de estado y enviar a la API de Habitaciones
            $habitacion_id= auth()->user()->reservas->flatMap(function ($reserva) {
                return $reserva->detalleHabitacions->sortByDesc('created_at')->take(1)->pluck('producto_id');
            })->first();

            $responseHabitacion = Http::get("https://habitaciones.proyeapp.xyz/api/habitaciones/{$habitacion_id}/");
            $habitacion = $responseHabitacion->json();
            // dd($habitacion['tipo_habitacion']['id']);
            $cerradura=Cerradura::orderBy('id','asc')->first();
            if ($habitacion['estado_cerradura']=="EC-000") {
                # code...
                $response = Http::put("https://habitaciones.proyeapp.xyz/api/habitaciones/{$habitacion_id}/", [
                    'nro_habitacion' => $habitacion['nro_habitacion'],
                    'tipo_habitacion' => $habitacion['tipo_habitacion']['id'],
                    'precio' => $habitacion['precio'],
                    'codigo_cerradura' => $habitacion['codigo_cerradura'],
                    'estado_cerradura' => "EC-111",
                    'estado_habitacion' =>$habitacion['estado_habitacion'],
                    'caracteristicas' => $habitacion['caracteristicas'],
                ]);
                $cerradura->cantidad_veces_abierto=$cerradura->cantidad_veces_abierto+1;
                // dd("abrir");
            }else {
                # code...
                $response = Http::put("https://habitaciones.proyeapp.xyz/api/habitaciones/{$habitacion_id}/", [
                    'nro_habitacion' => $habitacion['nro_habitacion'],
                    'tipo_habitacion' => $habitacion['tipo_habitacion']['id'],
                    'precio' => $habitacion['precio'],
                    'codigo_cerradura' => $habitacion['codigo_cerradura'],
                    'estado_cerradura' => 'EC-000',
                    'estado_habitacion' =>$habitacion['estado_habitacion'],
                    'caracteristicas' => $habitacion['caracteristicas'],
                ]);
                $cerradura->cantidad_veces_cerrado=$cerradura->cantidad_veces_cerrado+1;
                // dd("cerrar");
            }


            // if ($response->successful()) {
            //     // Cambios de estado enviados con éxito
            //     // Puedes hacer más lógica aquí si es necesario
            // }
        }

        // Eliminar la imagen temporal después de procesarla
        unlink($rutaImagenTemp);

        // Redireccionar a la vista con un mensaje
        return redirect()->route('mostrarCaptura')->with('success', 'Captura procesada con éxito');
    }
}
