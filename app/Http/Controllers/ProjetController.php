<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Technologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
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
        $technologies = Technologie::orderBy('nom', 'asc')->get();
        return view("admins.projects.create", compact('technologies') );
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    // 1. Validation (inchangée)
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'link' => 'nullable|url',
        'technologies' => 'required|array', // Validation du tableau de IDs
        'technologies.*' => 'exists:technologies,id', // Vérifie que chaque ID existe
    ]);

    // 2. Vérification et Sauvegarde alternative
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');

        // Génère un nom unique : ex 16728394.jpg
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        // Déplace le fichier directement dans public/uploads/projects
        // Cette méthode "move" est plus fiable sur Windows/Herd
        $file->move(public_path('uploads/projects'), $fileName);

        // Le chemin qu'on stocke en base de données
        $imagePath = 'uploads/projects/' . $fileName;
    } else {
        return back()->withErrors(['image' => "Erreur lors du transfert du fichier."]);
    }

    // 3. Création en base de données
   $projet = Projet::create([
        'nom' => $request->name,
        'description' => $request->description,
        'image' => $imagePath,
        'lien' => $request->link,
    ]);

    // 4. Association des technologies
    $projet->technologies()->attach($request->technologies);

    return redirect()->route('dashboard')->with('success', 'Projet créé avec succès !');
}
    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        //
    }
}
