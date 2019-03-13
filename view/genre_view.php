<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" src="js/app_genre.js"></script>
<form id="formGenre">
    <fieldset>
        <label for="txtNameId" class="form-label">Name</label>
        <input type="text" id="txtNameId" name="txtName" required="" class="form-input" >
        <input type="submit" id="btnSaveGenre" name="btnSaveGenre" value="Save Genre" class="button button-primary" >
    </fieldset>
</form>

<table id="genreTable" class="display">
    <thead>
        <tr>
            <th>Firebase ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnSaveGenre").click(function () {
            saveGenreData();
            return false;
        });
        fetchGenreData(putGenreDataToTable, 'genreTable');

        // DataTables rendering
        $('#genreTable').DataTable({
            columns: [
                {data: 'id'},
                {data: 'name'},
                {
                    data: 'null',
                    render: function (data, type, row) {
                        return '<button onClick="deleteGenre(\'' + row.id + '\')">Delete</button>';
                    }
                }
            ]
        });
    });
</script>