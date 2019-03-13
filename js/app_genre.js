function fetchGenreData(callback, element) {
    var genreDataRef = firebase.database().ref('demofb').child('genre');
    genreDataRef.on('value', function (snap) {
        if (snap.exists()) {
            obj = [];
            snap.forEach(function (childSnap) {
                var c2 = childSnap.val();
                obj2 = {'id': childSnap.key, 'name': c2.name};
                obj.push(obj2);
            });
            callback(element, obj);
        }
    });
}

function saveGenreData() {
    var genreName = $('#txtNameId').val();
    var newData = {
        name: genreName
    };
    firebase.database().ref('demofb').child('genre').push(newData);
    document.getElementById("formGenre").reset();
}

function putGenreDataToTable(element, data) {
    $('#' + element).DataTable().clear().draw();
    $('#' + element).DataTable().rows.add(data).draw();
}

function putGenreDataToCombo(element, data) {
    $('#' + element).empty();
    $.each(data, function (key, value) {
        $('#' + element)
                .append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.name));
    });
}

function deleteGenre(id) {
    var confirmation = window.confirm("Are you sure want to delete?");
    if (confirmation) {
        var genreDataRef = firebase.database().ref().child('demofire/genre3').child(id);
        genreDataRef.remove();
    }
}