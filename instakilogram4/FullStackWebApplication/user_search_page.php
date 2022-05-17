<?php session_start()?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/cookies.css"/>
    <title>User search page</title>
</head>
<body>
    <main>
        <form action="php/search.php" method="get" enctype="multipart/form-data">
            <h1>Search page</h1>
            <br>
            <input type="text" name = "user_search">
            <input type="submit" name="search" value="Search">
        </form>
        <?php
            $_SESSION['username_search'] = '';
            $_SESSION['fname_search'] = '';
            $_SESSION['lname_search'] = '';
            echo "<form action='php/set_profile_page.php' method='post' enctype='multipart/form-data'>";
            for ($i = 0; $i < (count($_SESSION['search-result'])); $i++) {
                foreach ($_SESSION['search-result'] as $key => $value) {
                    $fname = $_SESSION['search-result'][$i]['fname'];
                    $lname = $_SESSION['search-result'][$i]['lname'];
                    $email = $_SESSION['search-result'][$i]['email'];
                    $result = <<<SEARCHRESULT
                        <button type='submit' name='submit' value='$email'>
                            User's name: $fname $lname; User's email: $email
                        </button>
                    SEARCHRESULT;
                    echo $result . "<br>";
                    break;
                }
            }
            echo '</form>';
            $_SESSION['search-result'] = [];
        ?>
        <!-- Cookies modal -->
        <div id="cookies">
            <div class="container">
                <div class="subcontainer">
                    <h3>Our website will use cookies</h3>
                    <div class="cookies">
                        <p>This website uses your cookies to improve the performance of our website as well as your
                            experiences at our website. This cookies consent is only appear one, if you accept it, it will not appear again across pages.</p>
                        <a href="https://gdpr-info.eu/">Learn More</a>
                        <button id="cookies-btn">I accept</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/cookies.js"></script>
    </main>
</body>
</html>