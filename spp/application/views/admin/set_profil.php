        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title"><?php echo $title; ?></div>
                            </div>
                            <div class="ibox-body">
                                <?php if($this->session->flashdata('flash')): ?>
                                <div class="alert alert-success">
                                    <strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?>
                                </div>
                                <?php endif; ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" value="<?php echo $me['admin_nama']; ?>" autofocus="">
                                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username" value="<?php echo $me['admin_username']; ?>">
                                            <small class="text-danger"><?php echo form_error('username'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Foto</label>
                                            <input class="form-control" type="file" name="gambar">
                                            <input type="hidden" name="gambar_old" value="<?php echo $me['admin_foto']; ?>">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Konfirmasi Password</label>
                                            <input class="form-control" type="password" name="password">
                                            <small class="text-danger"><?php echo form_error('password'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>