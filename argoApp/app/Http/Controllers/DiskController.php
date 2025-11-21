<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Disk;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DiskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
        $disks = Disk::all();
        return view('disk.index' , ['disks' => $disks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        return $this->createArtist($request, $request->idartist);
    }
    
    function createArtist(Request $request, $idartist) {
        if($idartist == null) {
            return back();
        }
        $artist = Artist::find($idartist);
        if($artist == null) {
            return back();
        }
        $artists = Artist::pluck('name', 'id');
        return view('disk.create', ['artist' => $artist, 
                                    'artists' => $artists, 
                                    'idartist' => $idartist]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $disk = new Disk($request->all());                     // Disk::create($request->all());
            if($request->hasFile('file') && $request->file('file')->isValid()) {
                $archivo = $request->file('file');
                $path = $archivo->storeAs('public/images', $archivo->getClientOriginalName());
                $mime = $archivo->getMimeType();
                $path = $archivo->getRealPath();
                $imagen = Image::make($path)->resize(245, 245, function($constraint) {
                    $constraint->aspectRatio();
                });
                $canvas = Image::canvas(245, 245);
                $canvas->insert($imagen, 'center');
                $canvas->save($path);
                $imagen = file_get_contents($path);
                $disk->cover = base64_encode($imagen);
            }
            $disk->save();
        } catch(\Exception $e) {
            dd($e);
            // 4º Si no lo he guardado, volver a la página anterior con sus datos para volver a rellenar el formulario
            return back()->withInput()->withErrors(['message' => 'The disk has not been saved.']);
        }
        return redirect('disk')->with(['message' => 'The disk has been saved.']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disk  $disk
     * @return \Illuminate\Http\Response
     */
    public function show(Disk $disk) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disk  $disk
     * @return \Illuminate\Http\Response
     */
    public function edit(Disk $disk) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disk  $disk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disk $disk) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disk  $disk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disk $disk) {
        //
    }
    
    
    public function view() {
        return response()->file(storage_path('app') . '/public/images/2.png');
    }
}

