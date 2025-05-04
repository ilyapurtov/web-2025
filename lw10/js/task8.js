const numbers = [2, 5, 8, 10, 3]
function transformNumbers() {
    let transformed = numbers.map(x => x * 3)
    console.log("Результат после map: " , transformed)
    transformed = transformed.filter(x => x > 10)
    console.log("Результат после filter: " , transformed)
}