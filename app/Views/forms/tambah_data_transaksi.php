<section class="content">

<div class="body_scroll">

    <div class="block-header">

        <div class="row">

            <div class="col-lg-7 col-md-6 col-sm-12">

                <h2>Tambah Transaksi</h2>

            </div>

            <div class="col-lg-5 col-md-6 col-sm-12">

                <a href="/home/data_transaksi">
                    
                    <button class="btn btn-secondary btn-icon float-right" type="buttin"><i class="zmdi zmdi-chevron-left"></i></button>

                </a>

            </div>

        </div>

    </div>

    <div class="container-fluid">

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">

                    <div class="body">

                        <form class="form-horizontal" action="<?= base_url('/home/aksi_tambah_data_transaksi')?>" method="POST" enctype="multipart/form-data">

                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">

                                    <label for="nama">Nama</label>

                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8">

                                    <div class="form-group">

                                        <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control">
                                        
                                    </div>

                                </div>
                                
                            </div>

                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">

                                    <label for="jam_mulai">Jam Mulai</label>

                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8">

                                    <div class="form-group">

                                        <input type="time" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" class="form-control">
                                        
                                    </div>

                                </div>
                                
                            </div>

                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">

                                    <label for="jam_selesai">Jam Selesai</label>

                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8">

                                    <div class="form-group">

                                        <input type="time" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" class="form-control">
                                        
                                    </div>

                                </div>
                                
                            </div>

                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">

                                    <label for="status">Status</label>

                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8">

                                    <div class="form-group">

                                        <input type="text" name="status" id="status" placeholder="Status" class="form-control">
                                        
                                    </div>

                                </div>
                                
                            </div>
                            

                            <div class="row clearfix d-flex justify-content-center">

                                <button type="submit" class="btn btn-md btn-round btn-success">Submit</button>
                                
                            </div>

                        </form>

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>

</section>