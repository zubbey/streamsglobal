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
        <li class="nav-item">
            <a class="nav-link" href="task">
                <i class="fas fa-tasks fa-chart-area"></i>
                <span>Tasks</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item active">
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
                    if(isset($_GET['success']) AND $_GET["success"]=='adcreated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> your advert is Visible now.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    }else if(isset($_GET['error']) AND $_GET["error"]== 'notcreated')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> Your Advert was not created.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    };
                    //Check if ads is Updated
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
                        echo "<strong>Opps!</strong> you can't update this admin user.";
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                    };

                    //PAGE CONTENT UPDATE
                    if(isset($_GET['success']) AND $_GET["success"]== 'adminupdated')
                    {
                        echo "<div id='alert' class='alert alert-success alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Success!</strong> Admin user was updated.";
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
                        $errors['password'] = "Ops! Passwords must be at least 8 characters long.";
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
                    else if(isset($_GET['error']) AND $_GET["error"]== 'invalidaddemail')
                    {
                        echo "<div id='alert' class='alert alert-danger alert-dismissible fade show flyover flyover-centered position-absolute' role='alert'>";
                        echo "<strong>Opps!</strong> That's not a valid email address.";
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
                                <a class="nav-link text-muted active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true">Manage Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                        <div class="modal hide fade" id="editadminModal">
                            <div class="modal-dialog modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Admin</h5>
                                        <button id="admineditClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input id="username" name="username" type="text" class="form-control" value="<?php echo $_SESSION['adminusername'];?>">
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Admin Role</label>
                                                <select name="role" class="custom-select mr-sm-2" >
                                                    <option selected><?php echo $_SESSION['adminrole'];?></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Editor">Editor</option>
                                                    <option value="Viewer">Viewer</option>
                                                    <option value="Contractor">Contractor</option>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <input name="password" type="password" class="form-control" placeholder="Change Password" value="<?php echo $_SESSION['adminpassword'];?>">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update_admin" class="btn btn-primary"><i class="fas fa-pen-alt"></i> Update Admin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content py-4" id="myTabContent">

                            <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                                <div class="d-sm-flex mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Manage Admin</h1>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">All Admin in the System</h6>
                                        <a href="task?error=adminempty" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Add Admin</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-responsive-sm" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Created</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Created</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </tfoot>
                                                <?php

                                                $sql = "SELECT `*` FROM `admin`";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        if ($row['avatar'] > 0){
                                                            $image = '<img src="../images/uploads/admin'.$row['id'].'.jpg?'.mt_rand().'" ait="Profile Avatar" class="img-thumbnail rounded-circle img-fluid" width="30px"/>';
                                                        } else {
                                                            $image = "<img src='https://i.imgur.com/gaJNXRO.png' class='img-thumbnail rounded-circle img-fluid' width='30px'/>";
                                                        }
                                                        echo "<tbody>";
                                                        echo "<tr>";
                                                        echo "<td class='rounded-0'>".$row['id']."</td>";
                                                        echo "<td class='rounded-0'>".$image.' '.$row['username']."</td>";
                                                        echo "<td class='rounded-0'>".$row['email']."</td>";
                                                        echo "<td class='rounded-0'>".$row['role']."</td>";
                                                        echo "<td class='rounded-0'>".$row['datecreated']."</td>";
                                                        echo "<td class='rounded-0'><button onClick='editAdmin(".$row['id'].")' type='button' class='btn btn-secondary btn-sm'>Edit <i class='fas fa-edit'></i></button></td>";
                                                        echo "<td class='rounded-0'><button onClick='delAdmin(".$row['id'].")' type='button' class='btn btn-danger btn-sm'>Delete <i class='fas fa-trash'></i></button></td>";
                                                        echo "</tr>";
                                                        echo "</tbody>";
                                                    }
                                                } else {
                                                    echo "<p>You have 0 Admin user</p>";
                                                }
                                                $conn->close();
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- PROFILE TAB ####################################### -->

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="d-sm-flex mb-4">
                                    <h4 class="h3 mb-0 text-gray-800">Profile</h4>
                                </div>
                                <div class="row">
                                    <div class="col text-center text-muted">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                            <?php
                                            if ($_SESSION['avatar'] > 0 ) {
                                                echo '<img src="../images/uploads/admin'.$_SESSION['id'].'.jpg?'.mt_rand().'" id="profile-image1" width="339" class="mx-auto img-fluid img-circle d-block rounded-circle img-thumbnail" alt="Profile Image">';
                                            } else {
                                                echo '<img src="https://i.imgur.com/gaJNXRO.png" class="mx-auto img-fluid img-circle d-block rounded-circle" alt="Profile Image">';
                                            }
                                            ?>
                                            <h4 class="py-3"><?php echo $_SESSION['username'];?></h4>
                                            <label class="custom-file">
                                                <input type="file" id="file" name="file" class="custom-file-input d-none">
                                                <span class="btn custom-file-control shadow-sm">Change image</span>
                                                <button type="submit" id="upload-img" name="upload-admin-img" class="d-none"></button>
                                            </label>
                                        </form>
                                        <hr>
                                        <address>
                                            <strong>@Username</strong><br>
                                            <p><?php echo $_SESSION['username'];?></p>
                                        </address>
                                        <address>
                                            <strong>Email Address</strong><br>
                                            <?php
                                                if (strlen($_SESSION['adminemail']) == 0){
                                                    echo "<button onclick='addemailBox()' class='btn btn-primary'><i class='fas fa-plus'></i> Add Email</button>";
                                                }else{
                                                    echo "<p>".$_SESSION['adminemail']."</p>";
                                                }
                                            ?>
                                        </address>
                                        <address>
                                            <strong>Role</strong><br>
                                            <p><?php echo $_SESSION['role'];?></p>
                                        </address>
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
        function editAdmin(admin_id){
            window.location.href='?admin_id='+admin_id+'';
            return true;
        }

        function delAdmin(adminDel_id) {
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
                        'Admin has been deleted.',
                        'success',
                        window.location.href='?deladmin_id='+adminDel_id+''
                    )
                }

            });
            return true;
        }

        if (window.location.search.indexOf('admin_id') > -1) {
            $('#editadminModal').modal('show');
        }

        let admincancelbtn = document.getElementById("admineditClose");
        admincancelbtn.addEventListener("click", function() {
            <?php
            unset($_SESSION['adminusername']);
            unset($_SESSION['adminrole']);
            unset($_SESSION['adminpassword']);
            ?>
        });

        function addemailBox(){
            Swal.fire({
                title: 'Add your Email Address',
                input: 'text',
                inputAttributes: {
                    placeholder: 'example@email.com',
                },
                showCancelButton: true,
                confirmButtonColor: '#2ab334',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Update'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Added!',
                        'success',
                        window.location.href='?addemail='+result.value+''
                    )
                }

            });
            return true;
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
            $("#editadminModal")[0].click();
        }
        if (queryParameters().success === "uploaded"){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Profile image uploaded!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>

</body>

</html>