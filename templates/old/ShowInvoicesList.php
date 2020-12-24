<!-- Upload Equipment Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Upload Equipment</title>
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
            <h1 class="h3 mb-0 text-gray-800">Your Invoices</h1>
          </div>

          <!-- Content Row -->
          <div class="row col-lg-12 d-flex justify-content-center">

            <div class='card col-sm-12'>

              <div class='card-body'>

                <div class="InvoicesFound card">

                  <h5 class="card-header">Found Invoices</h5>
                  <div class="card-body">
                    <div class='card'>
                      <div class='card-header'>
                        <label for="InvoideId" class="col-sm-2 col-form-label">#</label><span id="InvoideId">1</span></li>
                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><label for="InvoiceNumber" class="col-sm-2 col-form-label">Invoice Number</label><span id="InvoiceNumber">421512</span></li>
                          <li class="list-group-item"><label for="ContractorData" class="col-sm-2 col-form-label">Contractor Data</label><span id="ContractorData">Jaroslaw Kudzia, 24%, 99102</span></li>
                          <li class="list-group-item"><label for="NETTO" class="col-sm-2 col-form-label">NETTO</label><span id="NETTO">681 zł</span></li>
                          <li class="list-group-item"><label for="VAT" class="col-sm-2 col-form-label">VAT</label><span id="VAT">24%</span></li>
                          <li class="list-group-item"><label for="BRUTTO" class="col-sm-2 col-form-label">BRUTTO</label><span id="BRUTTO">5215 zł</span></li>
                          <li class="list-group-item"><label for="CurrencyNETTO" class="col-sm-2 col-form-label">Currency NETTO</label><span id="CurrencyNETTO">24718 zł</span></li>
                          <li class="list-group-item"><label for="CurrancyName" class="col-sm-2 col-form-label">Currancy Name</label><span id="CurrancyName">Złotych</span></li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div> <!-- tutaj beda zaczytywani uzytkownicy, a search bedzie automatycznie wyszukiwal -->
            </div>

          </div>
          <!-- /.container-fluid -->
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once("foother.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>

</html>