                    <div class="containexr-fluid px-4">
                        <h1 class="mt-4">User Management</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Foto</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Foto</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $sql = "SELECT * FROM pengguna";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><img src="../assets/image/users/<?=$row['foto'] ? $row['foto'] : 'no_image.png' ?>" height="50px"></td>
                                            <td><?= $row['role'] ?></td>
                                            <td>
                                                <a href="modules_admin/controller/edit_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"> Edit</a>
                                                <a href="modules_admin/controller/hapus_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
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