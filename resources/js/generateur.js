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


// Met à jour l'affichage de la longueur avec le curseur
lengthEl.addEventListener("input", function () {
    lengthValueEl.textContent = lengthEl.value;
})

// Fonction qui génère le mot de pass
// Tirage sans biais modulo (rejection sampling)
function randomIndex(range, r) {
    const max = Math.floor(0x100000000 / range) * range
    while (r.values[r.i] >= max) {
        r.i++
        if (r.i >= r.values.length) {
            const prev = r.values
            const extra = crypto.getRandomValues(new Uint32Array(64))
            r.values = new Uint32Array(prev.length + extra.length)
            r.values.set(prev)
            r.values.set(extra, prev.length)
        }
    }
    return r.values[r.i++] % range
}

function generatePassword() {
    const length = parseInt(lengthEl.value, 10)
    let chars = lowercase
    let password = ""

    // Allouer un buffer généreux pour absorber les rejets
    const r = { i: 0, values: crypto.getRandomValues(new Uint32Array(length * 4 + 16)) }

    // 1. Forcer un caractère de chaque type coché
    password += lowercase[randomIndex(lowercase.length, r)]

    if (uppercaseEl.checked) {
        chars += uppercase
        password += uppercase[randomIndex(uppercase.length, r)]
    }
    if (numbersEl.checked) {
        chars += numbers
        password += numbers[randomIndex(numbers.length, r)]
    }
    if (symbolsEl.checked) {
        chars += symbols
        password += symbols[randomIndex(symbols.length, r)]
    }

    // 2. Remplir le reste
    for (let i = password.length; i < length; i++) {
        password += chars[randomIndex(chars.length, r)]
    }

    // 3. Fisher-Yates shuffle
    const arr = password.split("")
    for (let i = arr.length - 1; i > 0; i--) {
        const j = randomIndex(i + 1, r)
        ;[arr[i], arr[j]] = [arr[j], arr[i]]
    }
    password = arr.join("")

    passwordEl.value = password
}

// Quand on clique sur "Générer"
btnGenerate.addEventListener("click", generatePassword)

// Copie le mot de passe dans le presse-papier
btnCopy.addEventListener("click", function () {
    if (!passwordEl.value) return

    navigator.clipboard.writeText(passwordEl.value)
        .then(function () {
            btnCopy.textContent = "Copié !"
            setTimeout(function () {
                btnCopy.textContent = "Copier"
            }, 2000)
        })
        .catch(function () {
            btnCopy.textContent = "Erreur"
            setTimeout(function () {
                btnCopy.textContent = "Copier"
            }, 2000)
        })
})

// Effacer
btnReset.addEventListener("click", function () {
    passwordEl.value = ""
})

// Vider le clipboard
btnClearClipboard.addEventListener("click", function () {
    navigator.clipboard.writeText("")
        .then(function () {
            btnClearClipboard.textContent = "Vidé !"
            setTimeout(function () {
                btnClearClipboard.textContent = "Vider le clipboard"
            }, 2000)
        })
        .catch(function () {
            btnClearClipboard.textContent = "Erreur"
            setTimeout(function () {
                btnClearClipboard.textContent = "Vider le clipboard"
            }, 2000)
        })
})
