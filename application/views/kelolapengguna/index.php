        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-hover" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Activation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach ($users as $u) {
                                            $name = $u->name;
                                            $email = $u->email;
                                            $role_id = $u->role;
                                            $isactive_id = $u->isactive;
                                            
                                            
                                         ?>
                                        <tr>
                                            <th scope="row"><?=$i?></th>
                                            <td><?= $name; ?></td>
                                            <td><?= $email; ?></td>
                                            <td><?= $role_id; ?></td>
                                            <td>
                                                <?php
                                                    if ($isactive_id == 'Active') {?>
                                                    <span class="badge badge-success"><?= $isactive_id; ?></span>    
                                                <?php } else {?>
                                                    <span class="badge badge-danger"><?= $isactive_id; ?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary dropdown-toggle" id="dropdownButton" data-toggle="dropdown">Action</a>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownButton">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Activation</th>
                                            <th>Action</th>
                                    </tfoot>
                                </table>
                            </div>
                            </div>
                        </div>
            </div>
        </div>
        <!-- End of Main Content -->