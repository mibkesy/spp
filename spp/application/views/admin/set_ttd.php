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
                                    <input type="hidden" name="id" value="<?php echo rand(); ?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Tanda Tangan</label>
                                            <input class="form-control" type="file" name="gambar" required>
                                        </div>
                                        <div style="margin-top:33px;" class="form-group col-md-6">
                                            <?php if($me['admin_ttd'] == '') { ?>
                                                <i>Belum ada tanda tangan</i>
                                            <?php }else { ?>
                                                <img src="assets/img/<?php echo $me['admin_ttd']; ?>" width="100">
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