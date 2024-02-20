<section class="content">

<title>User</title>

<div class="body_scroll">

    <div class="block-header">

        <div class="row">

            <div class="col-lg-12">

                <h2>Data User</h2>
                <a href="<?=base_url('/home/pdf/')?>" style="position: absolute; top: 10px; right: 10px;">
                    <button class="btn btn-danger">PDF</button>
                </a>

            </div>

        </div>

    </div>

    <div class="container-fluid">
        
        <div class="row clear-fix">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped">
                                
                                <thead>

                                    <tr style="text-align: center;">

                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level</th>

                                    </tr>

                                </thead>

                                <tbody>
                                
                                    <?php $no = 1; foreach($userData as $data) { ?>

                                        <tr align="center">

                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data -> username ?></td>
                                            <td><?php echo $data -> nama_user ?></td>
                                            <td><?php echo ucwords($data -> level) ?></td>
                                            


                                        </tr>

                                    <?php } ?>
                                
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>_
