<!-- Show Licenses Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Show Licenses</title>
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
            <h1 class="h3 mb-0 text-gray-800">Your Licenses</h1>
          </div>

          <!-- Content Row -->


          <div class='row col-lg-12 d-flex justify-content-center'>
            <div class="card col-sm-12">

              <div class='card-body'>

                <div class="InvoicesFound card">

                  <h5 class="card-header">Found Licenses</h5>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">License Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Expiration Date</th>
                            <th scope="col">Purchase Date</th>
                            <th scope="col">Serial Key</th>
                            <th scope="col">Invoice Id</th>
                            <th scope="col">Warranty Date</th>
                            <th scope="col">License User</th>
                            <th scope="col">Note</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>12312</td>
                            <td>Windows 10</td>
                            <td>1.10.2025</td>
                            <td>19.12.2020</td>
                            <td>64712-15212-24124-12421</td>
                            <td>49129</td>
                            <td>19.12.2025</td>
                            <td>Jaroslaw Kudzia</td>
                            <td>Aktywny</td>
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
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once("foother.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>

</html>