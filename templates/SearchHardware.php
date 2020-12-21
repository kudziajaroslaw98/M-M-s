<!-- Search Hardware Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Search Hardware</title>
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
            <h1 class="h3 mb-0 text-gray-800">Search Hardware</h1>
          </div>

          <!-- Content Row -->
          <div class="row row col-lg-12 d-flex justify-content-center">

            <div class='card col-12'>
              <div class='card-header'>
                <div class="row">
                  <div class='col-6'>
                    <label for="search_user">Hardware Number: </label>
                    <input type="search" placeholder="Hardware Number" id="search_Hardware_number" class='form-control search_user' value="12312">
                  </div>
                  <div class='col-6'>
                    <label for="search_user">Hardware Serial Number: </label>
                    <input type="search" placeholder="Equipment Serial Number" id="search_Hardware_serial" class='form-control search_user' value="125215212">
                  </div>
                </div>
              </div>
              <div class='card-body'>

                <div class="actual_user_info card">

                  <h5 class="card-header">Found Hardware</h5>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hardware Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Purchase Date</th>
                            <th scope="col">Invoice Number</th>
                            <th scope="col">Warranty Date</th>
                            <th scope="col">Net Value</th>
                            <th scope="col">Hardware User</th>
                            <th scope="col">Note</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>12312</td>
                            <td>Laptop MSI</td>
                            <td>125215212</td>
                            <td>19.12.2020</td>
                            <td>64712</td>
                            <td>19.12.2025</td>
                            <td>24718 zł</td>
                            <td>Jaroslaw Kudzia</td>
                            <td>Sprawny</td>
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