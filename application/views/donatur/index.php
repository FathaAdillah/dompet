<div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Donatur</h6>
                        </div>
                        <div class="card-body">
                        <a href="" class="btn btn-primary mb-3">Tambah Data</a>
                            <form action="<?= base_url('Donatur');?>" method="post">
                                <div class="float-right form-inline">
                                    <h6>Search :</h6>
                                <input type="text" class="form-control form-control-sm ml-2 mb-2" placeholder="search keyword..." autocomplete="off" name="keyword">
                                <input class="btn btn-primary btn-sm ml-1 mb-2" type="submit" name="submit">
                                </div>
                            </form>
                            <?= $this->pagination->create_links();?>
                            <h6>Results : <?=$total_rows?></h6>
                                <table class="table table-bordered" id="donaturTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Alamat</th>
                                            <th>Komitmen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($donatur as $d) :?>
                                        <tr>
                                            <th scope="row"><?=++$start?></th>
                                            <td><?= $d['nama']; ?></td>
                                            <td><?= $d['hp']; ?></td>
                                            <td><?= $d['alamat']; ?></td>
                                            <td><?= $d['komitmen']; ?></td>
                                            <td>
                                                <a href="" class="btn btn-warning dropdown-toggle" id="dropdownButton" data-toggle="dropdown">Action</a>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownButton">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Alamat</th>
                                            <th>Komitmen</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
            </div>
        </div>