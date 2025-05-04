const vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']

function countVowels(str) {
    if (typeof str != "string") {
        console.error("Передано не строковое значение")
        return
    }
    let found = new Set()
    for (let ch of str) {
        if (vowels.includes(ch))
            found.add(ch)
    }
    if (found.size == 0)
        console.log('Гласных в строке не найдено.')
    else 
        console.log(found.size, '(' + [...found].join(', ') + ')')
}