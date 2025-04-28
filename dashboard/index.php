<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <link rel="shortcut icon" href="../src/img/icon.png" type="image/x-icon" />
</head>

<body>
  <?php include '../src/assets/sidebar.php'; ?>
  <div id="main" class="full-page-content">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none" id="burger-btn">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <h3>Class Statistics</h3>
    </div>
    <div class="card mt-4">
      <div class="card-body py-4 px-4 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center mb-3">
          <div class="avatar avatar-xl">
            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1" />
          </div>
          <div class="ms-3 name">
            <h5 class="font-bold">Atarvano</h5>
            <h6 class="text-muted mb-0">Bendahara</h6>
          </div>
        </div>

      </div>
    </div>
    <div class="page-content">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>XI PPLG 1</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-lg">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="col-5">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-md">
                            <img src="./assets/compiled/jpg/5.jpg" />
                          </div>
                          <p class="font-bold ms-3 mb-0">Irvani Heldy Fauzan</p>
                        </div>
                      </td>
                      <td class="col-3">
                        <p class="mb-0">
                          <a href="history.php" class="btn btn-primary">History</a>
                        </p>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>


  <script src="../src/js/bundle.js"></script>
</body>

</html>