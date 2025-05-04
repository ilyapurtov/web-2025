function isPrime(number) {
    if (number < 2)
        return false
    for (let i = 2; i <= number ** 0.5; i++) {
        if (number % i == 0)
            return false
    }
    return true
}

function isPrimeNumber(number) {
    if (typeof number == 'number') {
        console.log(number + (isPrime(number) ? '' : ' не') + ' простое число')
    } else if (typeof number == 'object') {
        if (number == null || number.length == 0) {
            console.log("Передан пустой массив или null.")
            return
        }

        let prime = []
        let nonPrime = []
        for (let num of number) {
            if (typeof num != "number") {
                console.error('Ошибка, ' + num + ' не является числом.')
                return
            }
            if (isPrime(num))
                prime.push(num)
            else
                nonPrime.push(num)
        }
        // Формирование и вывод сообщения в консоль
        let msg1 = prime + ((prime.length == 1) ? ' - простое число. ' : ' - простые числа. ')
        let msg2 = nonPrime + ((nonPrime.length == 1) ? ' - не простое число.' : ' - не простые числа.')
        let msg = ((prime.length != 0) ? msg1 : '') + ((nonPrime.length != 0) ? msg2 : '')
        console.log(msg)
    } else {
        console.error('Переданный параметр не является числом или массивом чисел.')
    }
}