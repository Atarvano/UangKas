<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Validation - Mazer Admin Dashboard</title>

    <link rel="shortcut icon" href="../src/img/icon.png" type="image/x-icon" />
</head>

<>
    <?php include '../src/assets/sidebar.php'; ?>
    <div id="app">

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="c>
                        </div>
                        <div class=" col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        History
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Create
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Multiple Column</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="insert.php" method="POST" data-parsley-validate>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama-column" class="form-label">Nama</label>
                                                        <input type="text" id="nama-column" class="form-control"
                                                            placeholder="Nama" name="nama-column"
                                                            data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="date-column" class="form-label">Date</label>
                                                        <input type="date" id="date-column" class="form-control"
                                                            placeholder="Select date.." name="date-column"
                                                            data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dibayar-column" class="form-label">Dibayar</label>
                                                        <input type="number" id="dibayar-column" class="form-control"
                                                            placeholder="Jumlah Dibayar" name="dibayar-column"
                                                            data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="bendahara-column"
                                                            class="form-label">Bendahara</label>
                                                        <input type="text" id="bendahara-column" class="form-control"
                                                            placeholder="Nama Bendahara" name="bendahara-column"
                                                            data-parsley-required="true" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>


        </div>
    </div>
    <script src="../src/js/bundle.js"></script>
    </body>

</html>