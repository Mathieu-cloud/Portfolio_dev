// Jeux de caractères
const lowercase = "abcdefghijklmnopqrstuvwxyz"
const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
const numbers = "0123456789"
const symbols = "!@#$%^&*()_+-=[]{}|;:,.<>?"

const passwordEl = document.querySelector("#password") // El = element
const lengthEl = document.querySelector("#length")
const lengthValueEl = document.querySelector("#length-value")
const uppercaseEl = document.querySelector("#uppercase")
const numbersEl = document.querySelector("#numbers")
const symbolsEl = document.querySelector("#symbols")
const btnGenerate = document.querySelector("#btn-generate")
const btnCopy = document.querySelector("#btn-copy")
const btnReset = document.querySelector("#btn-reset")
const btnClearClipboard = document.querySelector("#btn-clear-clipboard")
const strengthMeterEl = document.querySelector("#strength-meter")
const strengthBarEl = document.querySelector("#strength-bar")
const strengthTextEl = document.querySelector("#strength-text")


// Met à jour l'affichage de la longueur avec le curseur
lengthEl.addEventListener("input", function () {
    lengthValueEl.textContent = lengthEl.value;
})

// Fonction qui génère le mot de pass
// Tirage sans biais modulo (rejection sampling)
function randomIndex(range, r) {
    if (range <= 0) throw new RangeError("range must be > 0")
    const max = Math.floor(0x100000000 / range) * range
    let attempts = 0
    while (true) {
        if (r.i >= r.values.length) {
            r.values = crypto.getRandomValues(new Uint32Array(r.values.length))
            r.i = 0
        }
        if (r.values[r.i] < max) break
        if (++attempts > 1000) throw new Error("randomIndex: too many rejections")
        r.i++
    }
    return r.values[r.i++] % range
}

function generatePassword() {
    const length = parseInt(lengthEl.value, 10)
    if (!length || length <= 0) return
    let chars = lowercase

    // Longueur minimum = 1 (lowercase) + 1 par catégorie cochée
    const minLength = 1 + uppercaseEl.checked + numbersEl.checked + symbolsEl.checked
    if (length < minLength) {
        lengthEl.value = minLength
        lengthValueEl.textContent = minLength
        return generatePassword()
    }

    // Allouer un buffer généreux pour absorber les rejets
    const r = { i: 0, values: crypto.getRandomValues(new Uint32Array(length * 4 + 16)) }

    // 1. Forcer un caractère de chaque type coché
    const arr = new Array(length)
    let pos = 0
    arr[pos++] = lowercase[randomIndex(lowercase.length, r)]

    if (uppercaseEl.checked) {
        chars += uppercase
        arr[pos++] = uppercase[randomIndex(uppercase.length, r)]
    }
    if (numbersEl.checked) {
        chars += numbers
        arr[pos++] = numbers[randomIndex(numbers.length, r)]
    }
    if (symbolsEl.checked) {
        chars += symbols
        arr[pos++] = symbols[randomIndex(symbols.length, r)]
    }

    // 2. Remplir les positions restantes
    for (let i = pos; i < length; i++) {
        arr[i] = chars[randomIndex(chars.length, r)]
    }

    // 3. Fisher-Yates shuffle
    for (let i = arr.length - 1; i > 0; i--) {
        const j = randomIndex(i + 1, r)
            ;[arr[i], arr[j]] = [arr[j], arr[i]]
    }

    passwordEl.value = arr.join("")
    updateStrength()
}

// Indicateur de force du mot de passe (entropie)
function updateStrength() {
    const password = passwordEl.value
    if (!password) {
        strengthMeterEl.classList.add("hidden")
        return
    }
    strengthMeterEl.classList.remove("hidden")

    let poolSize = lowercase.length
    if (uppercaseEl.checked) poolSize += uppercase.length
    if (numbersEl.checked) poolSize += numbers.length
    if (symbolsEl.checked) poolSize += symbols.length

    const entropy = password.length * Math.log2(poolSize)

    let label, color
    if (entropy < 40) { label = "Très faible"; color = "#ef4444" }
    else if (entropy < 60) { label = "Faible"; color = "#f97316" }
    else if (entropy < 80) { label = "Moyen"; color = "#eab308" }
    else if (entropy < 100) { label = "Fort"; color = "#22c55e" }
    else { label = "Très fort"; color = "#16a34a" }

    const percent = Math.min(entropy / 128 * 100, 100)
    strengthBarEl.style.width = percent + "%"
    strengthBarEl.style.backgroundColor = color
    strengthTextEl.textContent = label + " (" + Math.round(entropy) + " bits)"
    strengthTextEl.style.color = color
}

// Mise à jour en temps réel quand les options changent
lengthEl.addEventListener("input", updateStrength)
uppercaseEl.addEventListener("change", updateStrength)
numbersEl.addEventListener("change", updateStrength)
symbolsEl.addEventListener("change", updateStrength)

// Quand on clique sur "Générer"
btnGenerate.addEventListener("click", generatePassword)

// Feedback visuel temporaire sur un bouton
const flashTimers = new WeakMap()
function flashButton(btn, text, duration) {
    if (flashTimers.has(btn)) clearTimeout(flashTimers.get(btn))
    const original = btn.dataset.label || (btn.dataset.label = btn.textContent)
    btn.textContent = text
    flashTimers.set(btn, setTimeout(function () {
        btn.textContent = original
        flashTimers.delete(btn)
    }, duration))
}

// Copie le mot de passe dans le presse-papier
btnCopy.addEventListener("click", function () {
    if (!passwordEl.value) return

    navigator.clipboard.writeText(passwordEl.value)
        .then(function () { flashButton(btnCopy, "Copié !", 2000) })
        .catch(function () { flashButton(btnCopy, "Erreur", 2000) })
})

// Effacer le champ et le clipboard
btnReset.addEventListener("click", function () {
    passwordEl.value = ""
    updateStrength()
    navigator.clipboard.writeText("").catch(function () {})
})

// Vider le clipboard
btnClearClipboard.addEventListener("click", function () {
    navigator.clipboard.writeText("")
        .then(function () { flashButton(btnClearClipboard, "Vidé !", 2000) })
        .catch(function () { flashButton(btnClearClipboard, "Erreur", 2000) })
})
