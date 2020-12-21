<!-- Add Invoice Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Add Invoice</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="dev_dependency/css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles/style.min.css" />
  <link rel="stylesheet" href="styles/styles.css" />
  <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
  <script src="scripts/jquery-3.5.1.min.js"></script>
  <script src="dev_dependency/js/popper.min.js"></script>
  <script src="dev_dependency/js/bootstrap.min.js"></script>
  <link href="styles/sb-admin-2.min.css" rel="stylesheet">
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
                      <h1 class="h3 mb-0 text-gray-800">Add Invoice</h1>
                  </div>

                  <!-- Content Row -->
                  <div class="row col-lg-12 d-flex justify-content-center">
                    <div class='card col-sm-12'>
                      <div class='card-body'>
                        <form class='col-12'>
                          <div class='row col-12'>
                          <div class='col-6'>
                            <div class="form-group">
                              <label for="InvoiceNumber">Invoice Number</label>
                              <input type="number" class="form-control" id="InvoiceNumber" placeholder="Invoice Number">
                            </div>
                            </div>

                        <div class='row col-12'>
                          <div class='col-6'>
                          <div class="form-group">
                            <label for="ContractorData">Contractor Data</label>
                            <input type="text" class="form-control" id="ContractorData" placeholder="Contractor Data">
                          </div>
                        </div>
                          <div class='col-6'>
                            <div class="form-group">
                              <label for="NETTO">NETTO</label>
                              <input type="number" class="form-control" id="NETTO" placeholder="NETTO">
                            </div>
                            </div>
                        </div>
                          <div class="row col-12">
                            <div class='col-6'>
                              <div class="form-group">
                                <label for="VAT">VAT</label>
                                <input type="number" class="form-control" id="VAT" placeholder="VAT">
                              </div>
                              </div>
                              <div class='col-6'>
                                <div class="form-group">
                                  <label for="BRUTTO">BRUTTO</label>
                                  <input type="number" class="form-control" id="BRUTTO" placeholder="BRUTTO">
                                </div>
                                </div>


                          </div>
                          <div class="row col-12">
                              <div class='col-6'>
                                <div class="form-group">
                                  <label for="CurrencyNETTO">Currency NETTO</label>
                                  <input type="number" class="form-control" id="CurrencyNETTO" placeholder="Currency NETTO">
                                </div>
                                </div>
                                <div class='col-6'>
                                  <div class="form-group">
                                    <label for="CurrancyName">Currancy Name</label>
                                    <input type="text" class="form-control" id="CurrancyName" placeholder="Currancy Name">
                                  </div>
                                  </div>
                          </div>
                        </div>

                        <div class="row col-12">
                        <div class="form-group">
                          <label for="UploadEq">Pick file to Upload</label>
                          <input type="file" class="form-control-file" id="UploadInvoice">
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
              <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; M&M's Karczma</span></br></br>
                      <span>Authors: Kudzia, Czarnota, Olejarczyk, Marcinkowski</span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->
    </div>

</html>
