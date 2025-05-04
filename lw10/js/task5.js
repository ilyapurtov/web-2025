const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" }
]

function getUserNames() {
    return users.map((user) => user.name)
}