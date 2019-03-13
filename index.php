<?php
$navigation = filter_input(INPUT_GET, 'web_nav');
if (!isset($navigation)) {
    $navigation = 'home';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Programming with Google Firebase</title>
        <!-- Firebase App is always required and must be first -->
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>

        <!-- Add additional services that you want to use -->
        <!--<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-auth.js"></script>-->
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>
        <!--<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-firestore.js"></script>-->
        <!--<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-messaging.js"></script>-->
        <!--<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-functions.js"></script>-->

        <!-- Comment out (or don't include) services that you don't want to use -->
        <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-storage.js"></script>

        <script>
            // Initialize Firebase
            var config = {
                // put your configuration here
            };
            firebase.initializeApp(config);
        </script>
        <script type="text/javascript" src="plugins/jQuery-3.3.1/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="plugins/DataTables-1.10.18/js/jquery.dataTables.js"></script>
        <!--<script type="text/javascript" src="js/main.js"></script>-->
        <link rel="stylesheet" href="plugins/DataTables-1.10.18/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <div class="page">
            <nav>
                <ul>
                    <li><a href="?web_nav=home">Home</a></li>
                    <li><a href="?web_nav=genre">Genre</a></li>
                    <li><a href="?web_nav=book">Book</a></li>
                </ul>
            </nav>
        </div>
        <?php
        switch ($navigation) {
            case 'home':
                include_once './view/home.php';
                break;
            case 'genre':
                include_once './view/genre_view.php';
                break;
            case 'book':
                include_once './view/book_view.php';
                break;
            default:
                break;
        }
        ?>
    </body>
</html>
