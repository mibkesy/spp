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
                                        <div class="col-sm-4 form-group">
                                            <label>Password Baru</label>
                                            <input class="form-control" type="password" name="password1" autofocus="">
                                            <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Konfirmasi Password Baru</label>
                                            <input class="form-control" type="password" name="password2">
                                            <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Konfirmasi Password Lama</label>
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