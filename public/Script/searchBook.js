const input = document.getElementById("searchInput");
const books = document.querySelectorAll(".bookCards");

input.addEventListener("input", function () {
    const search = this.value.toLowerCase();

    books.forEach(book => {
        const title = book.querySelector("h2").textContent.toLowerCase();

        if (title.includes(search)) {
            book.parentElement.style.display = "";
        } else {
            book.parentElement.style.display = "none";
        }
    });
});