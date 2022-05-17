<?php session_start()?>
<?php require_once('php/functions.php')?>
<!DOCTYPE html>
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
          <a href="manage_user.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Manage User</span>
          </a>
        </li>
        <li>
          <a href="manage_post.php">
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
        <span class="dashboard">Manage User</span>
      </div>
      <form action="manage_user.php" method="get" enctype="multipart/form-data">
        <div class="search-box">
            <input type="text" name="user_search" placeholder="Search...">
            <button class="action-btn" type="submit" name="search" value="Search"><i class='bx bx-search' ></i></button>
        </div>
      </form>
      <img src="../UserData/ProfileImages/a/Profile_Img_asdasd.png" height="35" width="35" alt="avatar" class="rounded-circle">
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Users List</div>
          <div class="sales-details">
            <table>
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Register Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $user_accounts = '../UserData/UserAccounts/accounts.db';
                $data = retrieve_data($user_accounts);
                for ($i = (count($data) - 1); $i >= 0; $i--) {
                  $fname = $data[$i]['f_name'];
                  $lname = $data[$i]['l_name'];
                  $email = $data[$i]['email'];
                  $registered_time = $data[$i]['registered_time'];
                  if (isset($_GET['search'])) {
                    $user_search = clean_text($_GET['user_search']);
                    if (str_contains(strtolower($fname), strtolower($user_search)) or 
                    str_contains(strtolower($lname), strtolower($user_search)) or 
                    str_contains(strtolower($email), strtolower($user_search))){
                      echo
                      '<form action="php/set_detailed_page.php" method="Post" enctype="multipart/form-data">
                      <tr>
                        <td>'.$fname.'</td>
                        <td>'.$lname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$registered_time.'</td>
                        <td>
                          <button class="action-btn" type="submit" name="submit" value="'.$email.'"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                      </tr>
                      </form';
                    }
                  }
                  else {
                    echo
                    '<form action="php/set_detailed_page.php" method="Post" enctype="multipart/form-data">
                    <tr>
                      <td>'.$fname.'</td>
                      <td>'.$lname.'</td>
                      <td>'.$email.'</td>
                      <td>'.$registered_time.'</td>
                      <td>
                        <button class="action-btn" type="submit" name="submit" value="'.$email.'"><i class="fa-solid fa-pen-to-square"></i></button>
                      </td>
                    </tr>
                    </form';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="assets/admin.js"></script>
</body>
</html>

