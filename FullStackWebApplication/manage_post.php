<!DOCTYPE html>
<?php include_once('php/functions.php');?>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="assets/bootstrap.css"/>
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="stylesheet" href="assets/table.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/78d03b3312.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx '></i>
      <span class="logo_name">Instakilogram</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="manage_user.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Manage User</span>
          </a>
        </li>
        <li>
          <a href="manage_post.php"  class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Manage Post</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Manage Post</span>
      </div>
      <form action="test.php" method="get" enctype="multipart/form-data">
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      </form>
      <img src="assets/instakilogram_logo.png" height="35" width="35" alt="avatar" class="rounded-circle">
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
        <?php echo "<form action='php/delete_img_and_post.php' method='post' enctype='multipart/form-data'>"; ?>
        <button class="btn" type="submit" name="delete" style="float:right;">Delete</button>
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <table id="dtBasicExample">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Image</th>
                  <th>Caption</th>
                  <th>Post time</th>
                  <th>Sharing Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                    $folder = '../UserData/UserUpload/';
                    $folder_location = $folder . 'Images';
                    $user_account = '../UserData/UserAccounts/accounts.db';
                    $post_database = '../UserData/UserUpload/posts.db';
                    $post_data = retrieve_data($post_database);
                    $data = retrieve_data($user_account);
  
                    for ($j = (count($post_data) - 1); $j >= 0; $j--) {
                      foreach (scandir($folder_location) as $img) {
                          $image_location = $folder_location . '/' . $img;
                          $username = explode('@', explode('@@', $img)[0])[1];
                          $created_seconds = explode('@@', explode('.', $img)[0])[1];
                          $image_name = substr(explode('@', $img)[0], 11);
                          if (str_contains($post_data[$j]['email'], explode('@', explode('@@', $img)[0])[1])) {
                              if (explode('@@', explode('.', $img)[0])[1] == $post_data[$j]['created_seconds']) {
                                  if (str_contains($post_data[$j]['image']['name'], substr(explode('@', $img)[0], 11))) {
                                      echo 
                                      '<tr>
                                        <td>'.$username.'</td>
                                        <td>'."<img src='" . $image_location . "' height='150' width='150' alt='User's upload image'>".'</td>
                                        <td>'.$post_data[$j]['caption'].'</td>
                                        <td>'.$post_data[$j]['created_time'].'</td>
                                        <td>'.$post_data[$j]['sharing_level']."</td>
                                        <td>
                                          <input type='checkbox' name='deleteimages[]' value='" . $post_data[$j]['created_seconds'] . '@' . get_name_via_email($data[$i]['email']) . '___' . $post_data[$j]['image']['name'] . "'>
                                        </td>
                                      </tr>";
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
                  ?>
              </tbody>
            </table>
        <?php echo "</form>"?>
        </div>
      </div>
    </div>
  </section>

<script src="assets/admin.js"></script>

</body>
</html>

