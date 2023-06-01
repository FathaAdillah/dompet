        <!-- /.container-fluid -->
        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Program</h6>
                        </div>
                        <div class="card-body">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Program</th>
                                            <th>Kategori</th>
                                            <th>Target</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach ($program as $p) :?>
                                        <tr>
                                            <th scope="row"><?=$i?></th>
                                            <td><?= $p['nama_program']; ?></td>
                                            <td><?= $p['kategori']; ?></td>
                                            <td>Rp <?= number_format($p['target'],0,","); ?></td>
                                            <td>
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Program</th>
                                            <th>Kategori</th>
                                            <th>Target</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
        <!-- End of Main Content -->