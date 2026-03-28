<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/generateur.js')
</head>
<body>
    <div>
        <h1>Générateur de Mots de Passe</h1>

        <!-- Zone d'affichage du mot de passe + bouton copier -->
        <div>
            <input type="text" id="password" readonly>
            <button id="btn-copy">Copier</button>
            <button id="btn-clear-clipboard">Vider le clipboard</button>
        </div>

        <!-- Options -->
        <div>
            <div>
                <label for="length">Longueur</label>
                <input type="range" id="length" min="8" max="32" value="16">
                <span id="length-value">16</span>
            </div>
            <div>
                <label for="uppercase">Majuscules (A-Z)</label>
                <input type="checkbox" id="uppercase" checked>
            </div>
            <div>
                <label for="numbers">Chiffres (0-9)</label>
                <input type="checkbox" id="numbers" checked>
            </div>
            <div>
                <label for="symbols">Symboles (!@#$...)</label>
                <input type="checkbox" id="symbols" checked>
            </div>
        </div>

        <!-- Bouton générer -->
        <button id="btn-generate">Générer</button>
        <button id="btn-reset">Effacer</button>
    </div>


</body>
</html>
