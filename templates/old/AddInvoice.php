<!-- Add Invoice Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Add Invoice</title>
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
      </div>
      <?php require_once("foother.php") ?>
      <!-- End of Content Wrapper -->
    </div>

</html>