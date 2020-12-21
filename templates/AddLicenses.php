<!-- Add Equipment Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Add Equipment</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="dev_dependency/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./../dev_dependency/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./../styles/style.min.css" />
  <link rel="stylesheet" href="./../styles/styles.css" />
  <link href="./../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="./../scripts/jquery-3.5.1.min.js"></script>
  <script src="./../dev_dependency/js/popper.min.js"></script>
  <script src="./../dev_dependency/js/bootstrap.min.js"></script>
  <link href="./../styles/sb-admin-2.min.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Add License</h1>
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
                          <label for="LicenseNumber">License Number</label>
                          <input type="number" class="form-control" id="LicenseNumber" placeholder="License Number">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="InvoiceId">Invoice Id</label>
                          <input type="number" class="form-control" id="InvoiceId" placeholder="Invoice Id">
                        </div>
                      </div>
                    </div>
                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="SerialKey">Serial Key</label>
                          <input type="text" class="form-control" id="SerialKey" placeholder="Serial Key">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="ExpirationDate">Expiration Date</label>
                          <input type="date" class="form-control" id="ExpirationDate" placeholder="Expiration Date">
                        </div>
                      </div>


                    </div>
                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="WarrantyDate">Warranty Date</label>
                          <input type="date" class="form-control" id="WarrantyDate" placeholder="Warranty Date">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="PurchaseDate">Purchase Date</label>
                          <input type="date" class="form-control" id="PurchaseDate" placeholder="Purchase Date">
                        </div>
                      </div>
                    </div>
                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="LicenseUser">License User</label>
                          <input type="text" class="form-control" id="LicenseUser" placeholder="License User">
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
                      <label for="UploadLicense">Pick file to Upload</label>
                      <input type="file" class="form-control-file" id="UploadLicense">
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
          </div> <!-- tutaj beda zaczytywani uzytkownicy, a search bedzie automatycznie wyszukiwal -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; M&M's Karczma</span></br></br>
            <span>Authors: Kudzia, Czarnota, Olejarczyk, Marcinkowski</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- End of Content Wrapper -->
  </div>

</html>