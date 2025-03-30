<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Simple Book Catalog</title>
</head>
<body>
    <div class="container">

        <div style="width: 100%; text-align: right;">
            <button data-toggle="modal" data-target="#bookModal" id="addButton" class="button-add">Add</button>
        </div>

        <?php
            $books = require './connection/getBooks.php';
            
            if (empty($books)) {
                echo "<p>No available books</p>";
            } else {
                echo '
                    <table>
                        <thead>
                            <tr>
                                <th>TITLE</th>
                                <th>ISBN</th>
                                <th>AUTHOR</th>
                                <th>PUBLISHER</th>
                                <th>YEAR PUBLISHED</th>
                                <th>CATEGORY</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>';

                    foreach ($books as $book) {
                        echo '<tr>
                                <td>' . $book['Title'] . '</td>
                                <td>' . $book['ISBN'] . '</td>
                                <td>' . $book['Author'] . '</td>
                                <td>' . $book['Publisher'] . '</td>
                                <td>' . $book['Year'] . '</td>
                                <td>' . $book['Category'] . '</td>
                                <td>
                                    <button class="button-edit-del editButton" 
                                            data-id="' . $book['id'] . '" 
                                            data-title="' . $book['Title'] . '" 
                                            data-isbn="' . $book['ISBN'] . '" 
                                            data-author="' . $book['Author'] . '" 
                                            data-publisher="' . $book['Publisher'] . '" 
                                            data-year="' . $book['Year'] . '" 
                                            data-category="' . $book['Category'] . '">
                                        EDIT
                                    </button>
                                    <button onclick="deleteBook(' . $book['id'] . ')" class="button-edit-del">DEL</button>
                                </td>
                            </tr>';
                        }
                        
                    echo '</tbody>
                    </table>';
            }
        ?>
    </div>

    <!-- SAVE BOOK MODAL -->
    <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Save Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display: flex; flex-direction: column; gap: 12px">
                    <form id="bookForm">
                        <div>
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div>
                            <label for="title">TITLE<span style="color: red">*</span></label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div>
                            <label for="isbn">ISBN<span style="color: red">*</span></label>
                            <input type="text" id="isbn" name="isbn" required>
                        </div>
                        <div>
                            <label for="author">AUTHOR<span style="color: red">*</span></label>
                            <input type="text" id="author" name="author" required>
                        </div>
                        <div>
                            <label for="publisher">PUBLISHER<span style="color: red">*</span></label>
                            <input type="text" id="publisher" name="publisher" required>
                        </div>
                        <div>
                            <label for="year">YEAR PUBLISHED<span style="color: red">*</span></label>
                            <input type="number" id="year" name="year" required>
                        </div>
                        <div>
                            <label for="category">CATEGORY<span style="color: red">*</span></label>
                            <input type="text" id="category" name="category" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button onclick="saveBook()" type="submit" class="btn btn-primary">Save Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="./js/functions.js"></script>
</body>
</html>
