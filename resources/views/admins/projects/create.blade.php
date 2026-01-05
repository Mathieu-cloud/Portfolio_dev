<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un projet</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        div { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        input, textarea { width: 100%; max-width: 400px; padding: 8px; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>

    <h1>Créer un nouveau projet</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Nom du projet</label>
            <input type="text" name="name" id="name" value="" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>

        <div>
            <label for="image">Image d'illustration</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <div>
            <label for="link">Lien du projet (URL)</label>
            <input type="url" name="link" id="link" value="" placeholder="https://example.com">
        </div>

        <button type="submit" style="padding: 10px 20px; cursor: pointer;">
            🚀 Enregistrer le projet
        </button>
    </form>

</body>
</html>
