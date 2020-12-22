<!-- Add Hardware Page -->

<?php
require_once __DIR__ . './../autoload.php';

$gear = new Gear();
$user = new User();
$invoice = new PurchaseInvoice();
?>

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
                <form class='col-12' method='POST'>
                  <div class='row col-12'>
                    <div class='col-6'>
                      <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
                      </div>
                    </div>

                    <div class='row col-12'>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="SerialNumber">Serial Number</label>
                          <input type="number" class="form-control" id="SerialNumber" name="SerialNumber" placeholder="Serial Number">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="InvoiceNumber">Invoice Number</label>
                          <!-- <input type="number" class="form-control" id="InvoiceNumber" name="InvoiceNumber" placeholder="Invoice Number"> -->
                          <select class="form-control" id="InvoiceNumber" name="InvoiceNumber">
                            <?php $invoice->drawAllInvoices() ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="NetValue">Net Value</label>
                          <input type="number" class="form-control" id="NetValue" name="NetValue" placeholder="Net Value">
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="WarrantyDate">Warranty Date</label>
                          <input type="date" class="form-control" id="WarrantyDate" name="WarrantyDate" placeholder="Warranty Date">
                        </div>
                      </div>
                    </div>

                    <div class="row col-12">
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="HardwareUser">Hardware User</label>
                          <!-- <input type="text" class="form-control" id="HardwareUser" name="HardwareUser" placeholder="Hardware User"> -->
                          <select class="form-control" id="HardwareUser" name="HardwareUser">
                            <?php $user->drawAllUsers(); ?>
                          </select>
                        </div>
                      </div>
                      <div class='col-6'>
                        <div class="form-group">
                          <label for="Note">Note</label>
                          <input type="text" class="form-control" id="Note" name="Note" placeholder="Note">
                        </div>
                      </div>
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

                <div class='info'>
                  <?php
                  try {
                    if (!empty($_POST)) {
                      $dataForm = new DataForm($_POST, array('WarrantyDate', 'Note'));
                      if (!$dataForm->checkIfExistsData()) {
                        throw new InvalidInputExcetion('Given data are invalid!');
                      }
                      // if (!$dataForm->validation->validateDate($dataForm->data['WarrantyDate'])) {
                      //   throw new InvalidInputExcetion('Data is invalid!');
                      // }

                      $dataForm->sanitizeData();

                      $gear->addGear($dataForm->data);
                    }
                  } catch (Exception $e) {
                    echo $e->getMessage();
                  }
                  ?>
                </div>

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