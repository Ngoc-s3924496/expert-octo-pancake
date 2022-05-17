<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List images</title>
</head>
<body>
    <h1>List images</h1>
    <?php
    include_once('functions.php');
    if (isset($_POST['manage_image'])) {
        echo "<form action='delete_img_and_post.php' method='post' enctype='multipart/form-data'>";
        $folder = '../../UserData/UserUpload/';
        $folder_location = $folder . 'Images';
        $user_account = '../../UserData/UserAccounts/accounts.db';
        $post_database = '../../UserData/UserUpload/posts.db';
        $post_data = retrieve_data($post_database);
        $data = retrieve_data($user_account);
        $users = [];
        for ($i = 0; $i < count($data); $i++)  {
            if (in_array(get_name_via_email($data[$i]['email']), $users)) {
                continue;
            } else {
                $users[] = get_name_via_email($data[$i]['email']);
            }
        }
        if (file_exists($folder_location . '/')) {
            for ($j = (count($post_data) - 1); $j >= 0; $j--) {
                foreach (scandir($folder_location) as $img) {
                    $image_location = $folder_location . '/' . $img;
                    $username = explode('@', explode('@@', $img)[0])[1];
                    $created_seconds = explode('@@', explode('.', $img)[0])[1];
                    $image_name = substr(explode('@', $img)[0], 11);
                    if (str_contains($post_data[$j]['email'], explode('@', explode('@@', $img)[0])[1])) {
                        if (explode('@@', explode('.', $img)[0])[1] == $post_data[$j]['created_seconds']) {
                            if (str_contains($post_data[$j]['image']['name'], substr(explode('@', $img)[0], 11))) {
                                echo '<div>';
                                echo 'Username: ' . $post_data[$j]['email'] . '<br>';
                                echo 'Caption: ' . $post_data[$j]['caption'] . "<br>";
                                echo 'Created time: ' . $post_data[$j]['created_time'] . '<br>';
                                echo 'Sharing level: ' . $post_data[$j]['sharing_level'] . '<br>';
                                echo "<input type='checkbox' name='" . 'deleteimages[]' . "'" . " value='" . $post_data[$j]['created_seconds'] . '@' . get_name_via_email($data[$i]['email']) . '___' . $post_data[$j]['image']['name'] . "'" . "> " . "<img src='" . $image_location . "' height='150' width='150' alt='User's upload image'>";
                                echo '</div>';
                                echo '<br>';
                                echo '<br>';
                                break;
                            } else {
                                continue;
                            }
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
            }
            $deletebutton = <<<DELETEBUTTON
            <button type="submit" name="delete">Delete</button>
            DELETEBUTTON;
            echo $deletebutton;
        } else {
            echo "There are no posts!";
        }
        echo "</form>";
    }
    ?>
</body>
</html>


