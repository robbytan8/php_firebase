<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" src="js/app_book.js"></script>
<script type="text/javascript" src="js/app_genre.js"></script>
<form id="formBook">
    <fieldset>
        <label for="txtIsbnId" class="form-label">Isbn</label>
        <input type="text" id="txtIsbnId" name="txtIsbn" autofocus="" maxlength="13" required="" class="form-input" >
        <label for="txtTitleId" class="form-label">Title</label>
        <input type="text" id="txtTitleId" name="txtTitle" required="" class="form-input" >
        <label for="txtAuthorId" class="form-label">Author</label>
        <input type="text" id="txtAuthorId" name="txtAuthor" required="" class="form-input" >
        <label for="comboGenreId" class="form-label">Genre</label>
        <select id="comboGenreId" name="comboGenre" class="form-input">
        </select>
        <label for="fileId" class="form-label">Cover</label>
        <input type="file" id="fileId" class="form-input" >
        <input type="submit" id="btnSaveBook" name="btnSaveBook" value="Save Book" class="button button-primary" >
    </fieldset>
</form>

<table id="bookTable" class="display">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnSaveBook").click(function () {
            saveBookData();
            return false;
        });

        fetchGenreData(putGenreDataToCombo, 'comboGenreId');
        fetchBookData(putBookDataToTable, 'bookTable');

        // DataTables rendering
        $(document).ready(function () {
            $('#bookTable').DataTable({
                columns: [
                    {data: 'isbn'},
                    {data: 'title'},
                    {data: 'author'},
                    {data: 'genre'}
                ]
            });
        });
    });
</script>
