function getUniqueElements(arr) {
    if (typeof arr != "object" || arr == null) {
        console.error("Передан не массив.")
        return
    }
    let result = {}
    for (let el of arr) {
        let key = el.toString()
        if (Object.keys(result).includes(key))
            result[key]++
        else
            result[key] = 1
    }
    return result
}