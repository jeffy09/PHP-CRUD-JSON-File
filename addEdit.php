<?php
// Start session 
session_start();

// Retrieve session data 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

// Get member data 
$memberData = $userData = array();
if (!empty($_GET['id'])) {
    // Include and initialize JSON class 
    include 'Json.class.php';
    $db = new Json();

    // Fetch the member data 
    $memberData = $db->getSingle($_GET['id']);
}
$userData = !empty($sessData['userData']) ? $sessData['userData'] : $memberData;
unset($_SESSION['sessData']['userData']);

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

// Get status message from session 
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!doctype html>
<html lang="en">

<?= require_once('include/head.php'); ?>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?= require_once('include/header.php'); ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?= require_once('include/sidebar.php'); ?>

        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18"><?php echo $actionLabel; ?></h4>

                               

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Display status message -->
                    <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
                        <div class="col-xs-12">
                            <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                        </div>
                    <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
                        <div class="col-xs-12">
                            <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $actionLabel; ?> Member</h4>
                                    <p class="card-title-desc"></p>

                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <form method="post" action="userAction.php">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Enter contact no" value="<?php echo !empty($userData['phone']) ? $userData['phone'] : ''; ?>" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" placeholder="Enter country name" value="<?php echo !empty($userData['country']) ? $userData['country'] : ''; ?>" required="">
                                            </div>

                                            <a href="index.php" class="btn btn-secondary">Back</a>
                                            <input type="hidden" name="id" value="<?php echo !empty($memberData['id']) ? $memberData['id'] : ''; ?>">
                                            <input type="submit" name="userSubmit" class="btn btn-success" value="Submit">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Dason.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <!-- Table Editable plugin -->
    <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

    <script src="assets/js/pages/table-editable.int.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>