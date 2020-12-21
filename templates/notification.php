<!-- Add Equipment Page -->

<html lang="en">

<head>
  <title>M&M's Karczma - Add Equipment</title>
  <?php require_once __DIR__ . './head.php'; ?>
</head>

<body id="notification" class="modal-open">

  <div class="modal fade show" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center justify-content-center text-center">
          <a href="#" class="btn btn-warning btn-circle">
            <i class="fas fa-exclamation-triangle"></i>
          </a><br>
          There is nothing u can see right now. Check serial number or contact with administration!
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <div class="modal-backdrop fade show"></div>

  <div class="col-2 alert alert-success d-flex flex-column align-items-center" role="alert">
    <a href="#" class="btn btn-success btn-circle">
      <i class="fas fa-check"></i>
    </a><br>
    Operation successfull!
  </div>
  <div class="col-2 alert alert-danger d-flex flex-column align-items-center" role="alert">
    <a href="#" class="btn btn-danger btn-circle">
      <i class="fas fa-hand-paper"></i>
    </a><br>
    There is no equipment for now. Check it later!
  </div>
  <div class="col-2 alert alert-warning d-flex flex-column align-items-center" role="alert">
    <a href="#" class="btn btn-warning btn-circle">
      <i class="fas fa-exclamation-triangle"></i>
    </a><br>
    All fields need to be filled correctly!
  </div>
  <div class="col-2 alert alert-info d-flex flex-column align-items-center" role="alert">
    <a href="#" class="btn btn-info btn-circle">
      <i class="fas fa-info-circle"></i>
    </a><br>
    There is 1 new invoice.
  </div>
</body>

</html>