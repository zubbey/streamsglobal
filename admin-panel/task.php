<?php
// Connect database admin-panel php
require_once ('../controllers/userController.php');

if(!isset($_SESSION['admin-session'])){
    header('location: ../admin.php');
}
// you are Admin
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Users | Streams Global</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link href="../css/custom.css" rel="stylesheet" type="text/css">
    <link href="../css/users.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/loader.min.css">
    <link href="../images/favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
    <link href="../images/ms-icon-256x256.png" rel="apple-touch-icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script type="text/javascript">WebFont.load({  google: {    families: ["Saira:100,200,300,regular,500,600,700,800,900"]  }});
    </script>

    <link rel="stylesheet" href="../css/sweetalert2.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<div class="loader-body" id="loader">
    <div class="loader"></div>
</div>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex justify-content-center" id="logo" href="index.html">
            <!--            <div class="sidebar-brand-icon rotate-n-15 d-none">-->
            <!--                <i class="fas fa-laugh-wink"></i>-->
            <!--            </div>-->
            <div class="sidebar-brand-text">
                <img src="../images/H-Logo_Color.png" width="100%" class="img-responsive" alt="Streamsglobal"/>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="users">
                <i class="fas fa-fw fa-cog"></i>
                <span>Users</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Charts -->
        <li class="nav-item active">
            <a class="nav-link" href="task">
                <i class="fas fa-tasks fa-chart-area"></i>
                <span>Tasks</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="admin.settings">
                <i class="fas fa-cog"></i>
                <span>Settings</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="?logout=1">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Notification
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Messages
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($_SESSION['username']); ?></span>
                            <?php

                            $id = $_SESSION['id'];

                            $sqlImg = "SELECT `*` FROM `admin` WHERE `id` = '$id' LIMIT 1;";
                            $resultImg = mysqli_query($conn, $sqlImg);
                            while ($adminRow = mysqli_fetch_assoc($resultImg)){

                                if ($adminRow['avatar'] == TRUE ) {
                                    echo '<img src="../images/uploads/profile'.$id.'.jpg?'.mt_rand().'" ait="Profile Avatar" class="img-profile img-thumbnail rounded-circle">';
                                } else {
                                    echo '<img src="https://i.imgur.com/gaJNXRO.png" ait="Profile Avatar" class="img-profile img-thumbnail rounded-circle">';
                                }
                            }
                            ?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <div class="row">
                <div class="col">
                    <?php
                    //Check if ads is Deleted
                    if(isset($_GET['warning']) AND $_GET['warning']== 'deleted')
                    {
                        echo "<div id='alert' class='alert alert-warning alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Deleted!</strong> You have deleted an advert from Database.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    } else if(isset($_GET['error']) AND $_GET['error']== 'notdeleted')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Error!</strong> You can't delete this advert.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    };
                    //Check if ads is Created
                    if(isset($_GET['error']) AND $_GET["error"]== 'notcreated')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> Your Advert was not created.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    };
                    //Check if ads is Created
                    if(isset($_GET['success']) AND $_GET["success"]== 'adupdated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> your advert was updated.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }else if(isset($_GET['error']) AND $_GET["error"]== 'notupdated')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> you can't update this Advert.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    };

                    //PAGE CONTENT UPDATE
                    if(isset($_GET['success']) AND $_GET["success"]== 'contentupdated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> you have updated the page content.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }

                    //Check if a new user is created
                    if(isset($_GET['success']) AND $_GET["success"]== 'newusercreated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> you added a new user.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "<p>Please inform the user to verify their email address email we sent.";
                        echo "</div>";
                    }else if(isset($_GET['error']) AND $_GET["error"]== 'cantcreateuser')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> you can't add a new user.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'empty')
                    {
                        $errors['fname'] = "Ops! you have an empty field.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'invalidemail')
                    {
                        $errors['email'] = "Ops! Your Email address is invalid.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'invalidphone')
                    {
                        $errors['phone'] = "Ops! Your Phone number is invalid.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'passwordshort')
                    {
                        $errors['password'] = "Ops! Passwords is too short.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'passwordconfirm')
                    {
                        $errors['passwordconfirm'] = "Ops! The both password did not match.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'emailexist')
                    {
                        $errors['email'] = "Ops! Email already exists";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'cantstoreimg')
                    {
                        $errors['userimg'] = "Ops! no user : cant store image.";
                    };

                    // ADMIN VALIDATION QUERY
                    if(isset($_GET['success']) AND $_GET["success"]== 'admincreated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> you added a new ".$_GET['role'].".";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'adminempty')
                    {
                        $errors['fname'] = "Ops! you have an empty field.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'usernameexist')
                    {
                        $errors['username'] = "Ops! this username already exist.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'adminpasswordshort')
                    {
                        $errors['password'] = "Ops! Passwords must be at least 6 characters long.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'adminpasswordconfirm')
                    {
                        $errors['passwordconfirm'] = "Ops! The both password did not match.";
                    }
                    else if(isset($_GET['error']) AND $_GET["error"]== 'adminnotcreated')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> you can't create an admin.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }

                    if (count($errors) > 0) {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        foreach ($errors as $error) {
                            echo "<p>" . $error . "</p>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 order-lg-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-muted active" id="createAds-tab" data-toggle="tab" href="#createAds" role="tab" aria-controls="createAds" aria-selected="true">Create Ads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="editpages-info-tab" data-toggle="tab" href="#editpages-info" role="tab" aria-controls="editpages-info" aria-selected="true">Edit Pages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="createusers-tab" data-toggle="tab" href="#createusers" role="tab" aria-controls="createusers" aria-selected="true">Create Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="createadmin-tab" data-toggle="tab" href="#createadmin" role="tab" aria-controls="createadmin" aria-selected="true">Create Admin</a>
                            </li>
                        </ul>



                        <div class="tab-content py-4" id="myTabContent">

                            <div class="tab-pane fade show active" id="createAds" role="tabpanel" aria-labelledby="createAds-tab">
                                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                                    <h6 class="m-0 p-0 font-weight-bold text-primary">Create Adverts</h6>
                                    <button onclick="adsModal()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Advert</button>
                                </div>
                                <h4 id="availableAds" class="my-3"></h4>
                                <p>This Adverts will display at your landing page</p>
                                <div class="row ">   <!-- this row display the Ads created -->
                                    <?php

                                    $sqlImg = "SELECT `*` FROM `adminAds`;";
                                    $resultImg = mysqli_query($conn, $sqlImg);
                                    while ($imgRow = mysqli_fetch_assoc($resultImg)) {

                                        echo "<div id='Ads' class='col-6 col-md-4 p-2'>";
                                        echo "<div class='card p-3'>";
                                        echo "<img class='card-img-top' src='../images/".$imgRow ['image']."' >";
                                        echo "<h5 class='card-title pt-3'>".$imgRow ['heading']."</h5>";
                                        echo "<hr class='my-2'>";
                                        echo "<p class='blockquote'>".$imgRow ['body']."</p>";
                                        echo "<blockquote class='blockquote-footer'> Created by <cite title='Source Title'>".$imgRow ['creator']."</cite></blockquote>";

                                        echo "<div class='row'>";
                                        echo "<div class='col'>";
                                        echo "<button class='btn btn-info mr-2' type='button' name='edit' onClick='editAds(".$imgRow ['id'].")'>edit</button>";
                                        echo "<button class='btn btn-danger mr-2' type='button' name='delete' onClick='deleteAds(".$imgRow ['id'].")'>Delete</button>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";

                                    }

                                    ?>
                                </div>

                                <div class="modal hide fade" id="createadsModal">
                                    <div class="modal-dialog modal-dialog" role="document">
                                        <div class="modal-content px-3">
                                            <div class="modal-header">
                                                <label for="exampleInputEmail1">Create new Ads</label>
                                                <button onclick="location.href='?cancelled'" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row"> <!-- this row Creates the Ads-->
                                                    <div class="col">
                                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" name="size" value="20000000">
                                                                <label for="exampleInputEmail1">Upload your Banner</label>
                                                                <div class="input-group">
                                                                    <input type="file" name="image" class="form-control-file">
                                                                    <small id="emailHelp" class="form-text text-muted">Only Images with 5290 × 1531 Dimension are allowed.</small>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Enter Your Headings</label>
                                                                <textarea class="form-control" rows="1" name="heading" placeholder="Write a heading"></textarea>
                                                                <small id="emailHelp" class="form-text text-muted">Not more then three words.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Enter the paragragh / Body</label>
                                                                <textarea class="form-control" rows="3" name="body" placeholder="Write a paragragh or body"></textarea>
                                                            </div>
                                                            <div>
                                                                <button class="btn btn-primary" type="submit" name="upload" ><i class="fas fa-plus fa-sm text-white-50"></i> CREATE ADVERT</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--  EDIT ADVERT CONTENT-->
                                <div class="modal hide fade" id="myModal">
                                    <div class="modal-dialog modal-dialog" role="document">
                                        <form method="post">
                                            <div class="form-group">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <label for="exampleInputEmail1">Edit Headings</label>
                                                        <button onclick="location.href='?cancelled'" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <input class="form-control" name="edit-heading" value="<?php echo $row['heading']; ?>">
                                                    <label for="exampleInputEmail1" class="p-3">Edit paragragh / Body</label>
                                                    <textarea class="form-control" name="edit-body" rows="3"><?php echo $row['body']; ?></textarea>
                                                    <div class="modal-footer">
                                                        <button onclick="location.href='?cancelled'" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" name="update_advert">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <!-- CHANGE TAB ####################################### -->

                            <div class="tab-pane fade" id="editpages-info" role="tabpanel" aria-labelledby="editpages-info-tab">
                                <div class="row">
                                    <?php
                                    $sql = "SELECT `*` FROM `pageContent`;";
                                    $result = mysqli_query($conn, $sql);
                                    while ($content = mysqli_fetch_assoc($result))
                                    {
                                        echo "<div class='col-lg-8 order-lg-2'>";
                                        echo "<legend for='exampleFormControlTextarea1' class='text-black'>".$content['heading']."</legend>";
                                        echo "<div class='form-group d-flex align-items-center justify-content-between m-0'>";
                                        echo "<p class='ellipsis m-0'>".$content['body']."</p>";
                                        echo "<button onClick='editContent1(".$content['id'].")' type='button' class='btn btn-secondary btn-sm'>Edit <i class='fas fa-edit'></i></button>";
                                        echo "</div>";
                                        echo "<small class='text-muted'>Last Update : ".$content['dateCreated']."</small>";
                                        echo "<hr>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>

                                <div class="modal hide fade" id="contentModal_1">
                                    <div class="modal-dialog modal-dialog" role="document">
                                        <form method="post">
                                            <div class="form-group">
                                                <div class="modal-content px-3">
                                                    <div class="modal-header">
                                                        <label for="exampleInputEmail1">Edit Headings</label>
                                                        <button onclick="location.href='?cancelled'" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <input class="form-control" name="edit-heading" value="<?php echo $contentRow['heading']; ?>">
                                                    <label for="exampleInputEmail1" class="p-3">Edit paragragh / Body</label>
                                                    <textarea class="form-control" name="edit-body" rows="3"><?php echo $contentRow['body']; ?></textarea>
                                                    <div class="modal-footer">
                                                        <button onclick="location.href='?cancelled'" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" name="update_content1">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- CHANGE EMAIL TAB ####################################### -->


                            <div class="tab-pane fade" id="createusers" role="tabpanel" aria-labelledby="createusers-tab">
                                <h4 class="mb-3">Create new users</h4>
                                <div class="row">
                                    <div class="col-lg-6 order-lg-2">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="form-row my-3">
                                                <div class="col">
                                                   <input name='fname' type='text' class='form-control' value='<?php echo $userfname;?>' placeholder='First name'>
                                                </div>
                                                <div class="col">
                                                    <input name="lname" type="text" class="form-control" value="<?php echo $userlname;?>" placeholder="Last name">
                                                </div>
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="email" type="text" class="form-control" id="email" placeholder="name@example.com" value="<?php echo $useremail;?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="phone" type="text" class="form-control" id="phone" placeholder="08012345678" value="<?php echo $userphone;?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="confirm-password" type="password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                                            </div>
                                            <button name="create-user-btn" type="submit" class="btn btn-primary mb-2">Create User <i class='fas fa-plus'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- CHANGE PASSWORD TAB ####################################### -->

                            <div class="tab-pane fade" id="createadmin" role="tabpanel" aria-labelledby="createadmin-tab">
                                <h4 class="mb-3">Create Admin</h4>
                                <div class="row">
                                    <div class="col-lg-6 order-lg-2">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input name="username" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username" value="<?php echo $username;?>">
                                            </div>
                                            <div class="form-group my-3">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Admin Role</label>
                                            <select name="role" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected value="<?php echo $role;?>">Choose...</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Editor">Editor</option>
                                                <option value="Viewer">Viewer</option>
                                                <option value="Contractor">Contractor</option>
                                            </select>
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                                                <small id="passwordHelp" class="form-text text-muted">password most be atleast 8 character long.</small>
                                            </div>
                                            <div class="form-group my-3">
                                                <input name="confirm-password" type="password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                                            </div>
                                            <button name="create-admin-btn" type="submit" class="btn btn-primary mb-2">Create Admin <i class='fas fa-plus'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>  <p class='text-muted'>&copy; Copyright 2019 <script>new Date().getFullYear()>2017&&document.write('- '+new Date().getFullYear());</script> <a href='index' class='text-muted'> Streams Global Cooperative</a>, All Rights Reserved</p></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/loader.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="../js/sweetalert2.all.js"></script>
<!-- Menu Toggle Script -->
<script>
    function editAds(editid){
        window.location.href='?edit_id=' +editid+'';
        return true;
    }

    function deleteAds(delid) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2ab334',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'This Advert has been deleted.',
                    'success',
                    window.location.href='?del_id=' +delid+''
                )
            }

        });
        return true;
    }

    //CREATE ADVERTS
    function adsModal(){
        $('#createadsModal').modal('show');
    }

    var Ads = document.getElementById("Ads");
    var availableAds = document.getElementById('availableAds');
    var adsInfo = document.getElementById('adsInfo');
    if(Ads){
        availableAds.innerText ='Available Ads';
    } else {
        availableAds.innerText = 'You have 0 Ads';
        adsInfo.innerText = "Create your first Advert, this Ads will be displayed on you landing page.";
    }

    if (window.location.search.indexOf('edit_id') > -1) {
        $('#myModal').modal('show');
    }

    //END OF CREATE ADS SCRIPT
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('document').ready(function (){

        // AUTO DISAPPEAR ALERT
        $("#alert").toggleClass('in');
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 8000);

        $("#file").change(function(e) {
            $("#upload-img")[0].click();
        });

        $("#menu-toggle").click(function() {
            $("#logo").toggle("slow", function(){
                if($(this).is(':visible'))
                    $("#logo").html("<img src='../images/H-Logo_Color.png' width='100%' class='sidebar-heading img-responsive' alt='Streamsglobal'>");
                else
                    $("#logo").html("<img src='../images/ms-icon-256x256.png' width='100px' class='sidebar-heading img-responsive' alt='Streamsglobal'>")
            });
        });

    });
    var dropdown = $(".dropdown-toggle");

    dropdown.on("click", function() {
        setTimeout(function(){           //loses focus after 0 milliseconds
            dropdown.blur();
        }, 0);
    });

    //################# CHECK URL PARAM FUNCTION ##################
    function queryParameters () {
        var result = {};

        var params = window.location.search.split(/\?|\&/);

        params.forEach( function(it) {
            if (it) {
                var param = it.split("=");
                result[param[0]] = param[1];
            }
        });

        return result;
    }
    if (queryParameters().error === "empty" || queryParameters().error === "invalidemail" || queryParameters().error === "invalidphone" || queryParameters().error === "passwordshort" || queryParameters().error === "passwordconfirm" || queryParameters().error === "emailexist" || queryParameters().error === "cantstoreimg"){
        $("#createusers-tab")[0].click();
    }
    if (queryParameters().error === "adminempty" || queryParameters().error === "usernameexist" || queryParameters().error === "adminpasswordshort" || queryParameters().error === "adminpasswordconfirm" || queryParameters().error === "adminnotcreated"){
        $("#createadmin-tab")[0].click();
    }
    if (queryParameters().success === "adcreated"){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your Advert is Created!',
            showConfirmButton: false,
            timer: 1500
        })
    }

    //EDIT SITE PAGES
    if (queryParameters().success === "contentupdated")
    {
        $("#editpages-info-tab")[0].click();
    }

    function editContent1(content1){
        window.location.href='?content_id=' +content1+'';
        return true;
    }
    if (window.location.search.indexOf('content_id') > -1) {
        $('#contentModal_1').modal('show');
        $("#editpages-info-tab")[0].click();
    }

</script>

</body>

</html>