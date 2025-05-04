function mapObject(object, callback) {
    if (typeof object != "object" || object == null || typeof callback != "function") {
        console.error("Переданы некорректные параметры")
        return
    }
    for (key in object)
        object[key] = callback(object[key])
    return object
}