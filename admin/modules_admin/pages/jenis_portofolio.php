                    <div class="containexr-fluid px-4">
                        <h1 class="mt-4">Jenis Portofolio</h1>
                        <a href="modules_admin/controller/tambah_jenis.php" class="btn btn-primary">Tambah Jenis Portofolio </a>
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Jenis Portofolio List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jenis</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $sql = "SELECT * FROM jenis_portofolio";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama_jenis'] ?></td>
                                            <td><?= $row['deskripsi'] ?></td>
                                            <td>
                                                <a href="modules_admin/controller/edit_jenis_portofolio.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"> Edit</a>
                                                <a href="modules_admin/controller/hapus_jenis_portofolio.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis portofolio ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>