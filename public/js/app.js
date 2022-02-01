window.onload = function () {
    const inputSearch = document.getElementById("search")

    console.log(inputSearch)

    inputSearch.addEventListener("keyup", (e) => {
        console.log(e.target.value)

        fetch(`/search?q=${e.target.value}`)
            .then((res) => res.json())
            .then((data) => console.log(data))
    })
}