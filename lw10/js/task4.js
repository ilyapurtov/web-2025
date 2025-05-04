function mergeObjects(o1, o2) {
    if (typeof o1 != "object" || typeof o2 != "object" || o1 == null || o2 == null) {
        console.error("Переданы не объекты.")
        return
    }
    for (key in o2) {
        o1[key] = o2[key]
    }
    return o1
}