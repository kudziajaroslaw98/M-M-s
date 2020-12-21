<!-- Search Invoice Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Search Invoice</title>
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
            <h1 class="h3 mb-0 text-gray-800">Search Invoice</h1>
          </div>

          <!-- Content Row -->
          <div class="row row col-lg-12 d-flex justify-content-center">

            <div class='card col-12'>
              <div class='card-header'>
                <div class='col-12'>
                  <label for="search_user">Invoice Number: </label>
                  <input type="search" placeholder="Invoice Number" id="search_invoice_id" class='form-control search_user' value="421512">
                </div>
              </div>
              <div class='card-body'>

                <div class="actual_user_info card">

                  <h5 class="card-header">Found Invoices</h5>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice Number</th>
                            <th scope="col">Contractor Data</th>
                            <th scope="col">NETTO</th>
                            <th scope="col">VAT</th>
                            <th scope="col">BRUTTO</th>
                            <th scope="col">Currency NETTO</th>
                            <th scope="col">Currancy Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>421512</td>
                            <td>Jaroslaw Kudzia, 24%, 99102</td>
                            <td>681 zł</td>
                            <td>24%</td>
                            <td>5215 zł</td>
                            <td>24718 zł</td>
                            <td>Złotych</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div> <!-- tutaj beda zaczytywani uzytkownicy, a search bedzie automatycznie wyszukiwal -->
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
      </div>
      <!-- Footer -->
      <?php require_once("foother.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>

</html>