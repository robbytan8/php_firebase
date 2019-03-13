function fetchBookData(callback, element) {
    var bookDataRef = firebase.database().ref('demofb').child('book');
    bookDataRef.on('value', function (snap) {
        if (snap.exists()) {
            var obj = [];
            snap.forEach(function (childSnap) {
                var c2 = childSnap.val();
                var genreDataRef = firebase.database().ref('demofb').child('genre').child(c2.genre);
                var genreName;
                genreDataRef.once('value', function (snap2) {
                    var c3 = snap2.val();
                    genreName = c3.name;
                });
                var obj2 = {'isbn': c2.isbn, 'title': c2.title, 'author': c2.author, 'genre': genreName};
                obj.push(obj2);
            });
            callback(element, obj);
        }
    });
}

function saveBookData() {
    var isbn = $('#txtIsbnId').val();
    var title = $('#txtTitleId').val();
    var author = $('#txtAuthorId').val();
    var genreId = $('#comboGenreId').val();
    var file = $('#fileId').get(0).files[0];
    var newFileName = isbn + '.' + file.name.substring(file.name.lastIndexOf('.') + 1);

    var newBook = {
        "isbn": isbn,
        "title": title,
        "author": author,
        "genre": genreId,
        "cover": newFileName
    };

    try {
        var storage = firebase.storage().ref('cover').child(newFileName);
        storage.put(file);
        firebase.database().ref('demofb').child('book').child(isbn).set(newBook);
    } catch (e) {
        console.log(e);
    }
}

function putBookDataToTable(element, data) {
    $('#' + element).DataTable().clear().draw();
    $('#' + element).DataTable().rows.add(data).draw();
}
