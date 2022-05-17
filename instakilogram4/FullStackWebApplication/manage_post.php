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
      <img src="../UserData/ProfileImages/a/Profile_Img_asdasd.png" height="35" width="35" alt="avatar" class="rounded-circle">
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
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
                <tr>
                  <td>Ngoc</td>
                  <td><img src='..\UserData\UserUpload\Images\Upload_Img_andrew-ridley-jR4Zf-riEjI-unsplash@a@@1652666424.jpg'></td>
                  <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</td>
                  <td>15/5/2005</td>
                  <td>Public</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                  </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>

<script src="assets/admin.js"></script>

</body>
</html>

