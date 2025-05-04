const passwordAlphabet = {
    nums: '0123456789',
    lowercase: 'abcdefghijklmnopqrstuvwxyz',
    uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    special: '!@#$%^&*()_+-=?/.:;`~{}|'
}
const passwordLen = 4;

function generatePassword(len) {
    if (typeof len != "number") {
        console.error("Передано не число")
        return
    }

    if (len < passwordLen) {
        console.error("Минимальная длина пароля " + passwordLen)
        return
    }

    let password = ""
    let base = Object.values(passwordAlphabet).join('');
    for (let i = 0; i < len; i++) {
        password += base[Math.floor(Math.random() * base.length)]
    }

    if (validatePassword(password))
        return password
    else
        return generatePassword(len)
}

function validatePassword(password) {
    let hasNum = false,
        hasLowercase = false,
        hasUppercase = false,
        hasSpecial = false
    for (let ch of password) {
        hasNum ||= passwordAlphabet.nums.includes(ch)
        hasLowercase ||= passwordAlphabet.lowercase.includes(ch)
        hasUppercase ||= passwordAlphabet.uppercase.includes(ch)
        hasSpecial ||= passwordAlphabet.special.includes(ch)
    }
    return hasNum & hasLowercase & hasUppercase & hasSpecial
}