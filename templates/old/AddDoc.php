<!-- Upload Invoice Page -->

<html lang="en">

<head>
    <title>M&M's Karczma - Upload Document</title>
    <?php require_once __DIR__ . './head.php'; ?>
</head>

<body id="page-top">

    <div id="wrapper">

        <?php require_once("navbar.php") ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                        <h1 class="h3 mb-0 text-gray-800">Upload Documents</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row row col-lg-12 d-flex justify-content-center">

                        <div class="card col-sm-8 o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Upload Document Form</h1>
                                            </div>
                                            <form class="UploadDoc">
                                                <div class="form-group">
                                                    <label for="UploadDoc">Pick file to Upload and click <strong>Upload</strong></label>
                                                    <input type="file" class="form-control-file" id="UploadDoc">
                                                </div>
                                                <div class="form-group">
                                                    <label for="HardwareNotes">Hardware notes</label>
                                                    <input type="text" class="form-control" id="HardwareNotes">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="UploadSubmit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <?php require_once("foother.php") ?>
            <!-- End of Content Wrapper -->
        </div>

</html>