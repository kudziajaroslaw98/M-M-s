<!-- Add Hardware Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Add Hardware</title>
  <?php require_once __DIR__ . './head.php'; ?>
</head>

<body id="page-top">

  <div id="wrapper">

    <?php require_once("navbar.php") ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-gray-800">Add Hardware</h1>
          </div>

          <!-- Content Row -->
          <div class="row col-lg-12 d-flex justify-content-center">
            <div class='card col-sm-12'>
              <div class='card-body'>
                <form class='col-12'>
                  <div class='row col-12'>
                    <div class='col-6'>
                      <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" placeholder="Name">
                      </div>
                    </div>

                    <div class='row col-12'>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="SerialNumber">Serial Number</label>
                          <input type="number" class="form-control" id="SerialNumber" placeholder="Serial Number">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="InvoiceNumber">Invoice Number</label>
                          <input type="number" class="form-control" id="InvoiceNumber" placeholder="Invoice Number">
                        </div>
                      </div>
                    </div>
                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="NetValue">Net Value</label>
                          <input type="number" class="form-control" id="NetValue" placeholder="Net Value">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="WarrantyDate">Warranty Date</label>
                          <input type="date" class="form-control" id="WarrantyDate" placeholder="Warranty Date">
                        </div>
                      </div>
                    </div>

                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="HardwareUser">Hardware User</label>
                          <input type="text" class="form-control" id="HardwareUser" placeholder="Hardware User">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="Note">Note</label>
                          <input type="text" class="form-control" id="Note" placeholder="Note">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row col-12">
                    <div class="form-group">
                      <label for="UploadHardware">Pick file to Upload</label>
                      <input type="file" class="form-control-file" id="UploadHardware">
                    </div>
                  </div>
                  <div class="row col-12">
                    <div class='col-4 offset-md-4'>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="AddEqSubmit">
                      </div>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>


        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <?php require_once("foother.php") ?>
      <!-- End of Content Wrapper -->
    </div>
  </div>

</html>