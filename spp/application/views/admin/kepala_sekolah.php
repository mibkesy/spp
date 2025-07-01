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
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $kepsek['kepsek']; ?>" autofocus>
                                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?php echo $kepsek['nik']; ?>">
                                            <small class="text-danger"><?php echo form_error('nik'); ?></small>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Tanda Tangan</label>
                                            <input class="form-control" type="file" name="gambar">
                                            <input type="hidden" name="gambar_old" value="<?php echo $kepsek['ttd']; ?>">
                                        </div>
                                        <div style="margin-top:33px;" class="form-group col-md-6">
                                            <?php if($kepsek['ttd'] == '') { ?>
                                                <i>Belum ada tanda tangan</i>
                                            <?php }else { ?>
                                                <img src="assets/img/<?php echo $kepsek['ttd']; ?>" width="100">
                                            <?php } ?>
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