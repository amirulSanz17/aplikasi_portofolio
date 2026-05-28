                        <div class="container-fluid px-4">
                            <h1 class="mt-4 mb-4">
                                Portofolio Management
                            </h1>
                            <?php
                            $query_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM portofolio");
                            $data_total = mysqli_fetch_assoc($query_total);
                            $total_portofolio = $data_total['total'];

                            $query_pengguna = mysqli_query($conn, "SELECT COUNT(*) as total FROM pengguna");
                            $data_pengguna = mysqli_fetch_assoc($query_pengguna);
                            $total_pengguna = $data_pengguna['total'];
                            ?>
                            <div class="row mb-4">
                                <!-- TOTAL PORTOFOLIO -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="small-box bg-primary text-white rounded shadow position-relative overflow-hidden">
                                        <div class="p-3">
                                            <h3 class="fw-bold display-5">
                                                <?= $total_portofolio ?>
                                            </h3>
                                            <p class="mb-0 fs-5">
                                                Total Portofolio
                                            </p>
                                        </div>
                                        <div 
                                            class="position-absolute top-0 end-0 p-3 opacity-25"
                                            style="font-size: 90px;"
                                        >
                                            <i class="bi bi-briefcase-fill"></i>
                                        </div>
                                        <a
                                            href="?page=dashboard_admin"
                                            class="small-box-footer text-white text-center d-block py-2 text-decoration-none"
                                            style="background: rgba(0,0,0,0.15);"
                                        >
                                            More info
                                            <i class="bi bi-arrow-right-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- TOTAL PENGGUNA -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="small-box bg-success text-white rounded shadow position-relative overflow-hidden">
                                        <div class="p-3">
                                            <h3 class="fw-bold display-5">
                                                <?= $total_pengguna ?>
                                            </h3>
                                            <p class="mb-0 fs-5">
                                                Total Pengguna
                                            </p>
                                        </div>
                                        <div 
                                            class="position-absolute top-0 end-0 p-3 opacity-25"
                                            style="font-size: 90px;"
                                        >
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <a
                                            href="?page=pengguna"
                                            class="small-box-footer text-white text-center d-block py-2 text-decoration-none"
                                            style="background: rgba(0,0,0,0.15);"
                                        >
                                            More info
                                            <i class="bi bi-arrow-right-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Jenis</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Link</th>
                                                <th>Foto</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Jenis</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Link</th>
                                                <th>Foto</th>
                                                <th>Created At</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $sql = "SELECT * FROM portofolio JOIN jenis_portofolio ON portofolio.id_jenis = jenis_portofolio.id JOIN pengguna ON portofolio.id_pengguna = pengguna.id";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['nama_jenis'] ?></td>
                                                <td><?= $row['judul'] ?></td>
                                                <td><?= $row['deskripsi'] ?></td>
                                                <td class="admin-portofolio-link">
                                                    <a href="<?= $row['link'] ?>" target="_blank" rel="noreferrer">
                                                        <?= htmlspecialchars($row['link']) ?>
                                                    </a>
                                                </td>
                                                <td><img src="../assets/image/portofolio/<?=$row['bukti'] ? $row['bukti'] : 'no_image.png' ?>" height="50px"></td>
                                                <td><?= $row['created_at'] ?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>