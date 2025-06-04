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
                                    <a href="admin.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    History
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Update Users
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Multiple Column</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="../src/php/updateusers.php?role=<?= $role ?>&id=<?= $id ?>" method="POST"
                                        data-parsley-validate>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama-column" class="form-label">Nama</label>
                                                    <input type="text" id="nama-column" value="<?= $row['nama'] ?>" class="form-control"
                                                        placeholder="Masukkan Nama" required name="nama-column"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="role-column" class="form-label">Role</label>
                                                    <select id="role-column" class="form-control" name="role-column"
                                                        required data-parsley-required="true">
                                                        <option value="" disabled selected>Pilih Role</option>
                                                        <option value="siswa">Siswa</option>
                                                        <option value="bendahara">Bendahara</option>
                                                        <option value="guru">Guru</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="username-column" class="form-label">Username</label>
                                                    <input type="text" id="username-column" class="form-control"
                                                        placeholder="Masukkan Username" value="<?= $row['username'] ?>" required name="username-column"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="password-column" class="form-label">Password</label>
                                                    <input type="password" id="password-column" class="form-control"
                                                        placeholder="Masukkan Password" value="<?= $row['password'] ?>" required name="password-column"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kelas-column" class="form-label">Kelas</label>
                                                    <select id="kelas-column" class="form-control" name="kelas-column">
                                                        <option value="" disabled selected>Pilih Kelas</option>
                                                        <?php
                                                        include '../src/php/conn.php';
                                                        $query = "SELECT id_kelas, nama_kelas FROM kelas";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_assoc($result)): ?>
                                                            <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                                                        <?php endwhile; ?>
                                                            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    <a href="index.php">Back</a>
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