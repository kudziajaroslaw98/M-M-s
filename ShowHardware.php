<!-- Show Hardware Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Show Hardware</title>
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
                      <h1 class="h3 mb-0 text-gray-800">Your Hardware</h1>
                  </div>

                  <!-- Content Row -->
                  <div class="row col-lg-12 d-flex justify-content-center">

                    <div class='card col-sm-12'>

                      <div class='card-body'>

                        <div class="InvoicesFound card">

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
