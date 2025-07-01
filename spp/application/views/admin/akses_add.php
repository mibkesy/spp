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
                                <form action="" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="">
                                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>">
                                            <small class="text-danger"><?php echo form_error('username'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button onclick="goBack();" class="btn btn-warning" type="button">Kembali</button>
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>