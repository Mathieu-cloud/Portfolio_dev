<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FacadesFile;
use App\Models\Technologie;

class TechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lire le fichier JSON
        $json = FacadesFile::get(database_path("data/technologies.json"));

        // Décoder le JSON den tableau PHP
        $technologies = json_decode($json, true);

        // Parcourir le tableau
        foreach ($technologies as $technologie) {
            Technologie::updateOrCreate(
                ['nom' => $technologie['nom']],
            );
        }
    }
}
