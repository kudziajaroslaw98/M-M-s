<!-- Show Documents Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Show Documents</title>
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

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.html">
              <div class="sidebar-brand-text mx-3">M&M's<sup>Karczma</sup></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
              <a class="nav-link" href="home.html">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>HOME</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Interface
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Invoice</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item" href="AddInvoice.php">Add Invoice</a>
                      <a class="collapse-item" href="ShowInvoices.php">Show Invoices</a>
                      <a class="collapse-item" href="ShowInvoicesList.php">Show Invoices As List</a>
                      <a class="collapse-item" href="SearchInvoices.php">Search For Invoices</a>
                  </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                  aria-expanded="true" aria-controls="collapseFour">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Equipment</span>
              </a>
              <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Options:</h6>
                      <a class="collapse-item" href="ShowEq.php">Show Equipments</a>
                      <a class="collapse-item" href="AddEq.php">Add Equipment</a>
                      <a class="collapse-item" href="SearchEq.php">Search For Equipment</a>
                  </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                  aria-expanded="true" aria-controls="collapseFive">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Licences</span>
              </a>
              <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Options:</h6>
                      <a class="collapse-item" href="ShowLicenses.php">Show Licences</a>
                      <a class="collapse-item" href="AddLicenses.php">Add Licence</a>
                  </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                  aria-expanded="true" aria-controls="collapseSix">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Documents</span>
              </a>
              <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Options:</h6>
                      <a class="collapse-item" href="ShowDoc.php">Show Documents</a>
                      <a class="collapse-item" href="AddDoc.php">Add Documents</a>
                  </div>
              </div>
          </li>



          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->




              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                      <h1 class="h3 mb-0 text-gray-800">Your Documents</h1>
                  </div>

                  <!-- Content Row -->


                    <div class='col-lg-12 card'>

                      <div class='card-body'>

                        <div class="InvoicesFound card">

                          <h5 class="card-header">Found Documents</h5>
                          <div class="card-body">
                            <!-- Earnings (Monthly) Card Example -->
                            <a href='document.pdf' target='_blank'>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col-auto mr-2">
                                              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                          </div>

                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Document Name
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">

                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">example-document-name.pdf</div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <!-- Earnings (Monthly) Card Example -->
                            <a href='document.pdf' target='_blank'>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col-auto mr-2">
                                              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                          </div>

                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Document Name
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">

                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">example-document-name.pdf</div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <!-- Earnings (Monthly) Card Example -->
                            <a href='document.pdf' target='_blank'>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col-auto mr-2">
                                              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                          </div>

                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Document Name
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">

                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">example-document-name.pdf</div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                          </div>

                        </div>
                      </div> <!-- tutaj beda zaczytywani uzytkownicy, a search bedzie automatycznie wyszukiwal -->
                    </div>


              <!-- /.container-fluid -->


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
