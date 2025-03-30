document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editButton").forEach(button => {
        button.addEventListener("click", function () {
            $('#bookModal').modal('show');
            document.getElementById("id").value = this.dataset.id;
            document.getElementById("title").value = this.dataset.title;
            document.getElementById("isbn").value = this.dataset.isbn;
            document.getElementById("author").value = this.dataset.author;
            document.getElementById("publisher").value = this.dataset.publisher;
            document.getElementById("year").value = this.dataset.year;
            document.getElementById("category").value = this.dataset.category;
        });
    });
});


function saveBook() {
    document.getElementById("bookForm").addEventListener("submit", function (e) {
        e.preventDefault();
    
        const formData = new FormData(this);
        const bookId = document.getElementById("id")?.value.trim();
        const url = bookId ? "./connection/updateBook.php" : "./connection/addBook.php";

        if (bookId) {
            formData.append("id", bookId);
        }

        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
    
            if (data.success) {
                $('#bookModal').modal('hide');
                location.reload();
            }
        })
        .catch(error => console.error("Error:", error));
    });
}


function deleteBook(id) {
    if (confirm("Are you sure you want to delete this book?")) {
        fetch('./connection/deleteBook.php', {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
}