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
                                            <label>Judul Agenda</label>
                                            <input class="form-control" type="text" name="judul" value="<?php echo $agenda['title']; ?>" autofocus>
                                            <small class="text-danger"><?php echo form_error('judul'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Warna Agenda</label>
                                            <input class="form-control" type="color" name="warna" value="<?php echo $agenda['color']; ?>">
                                            <small class="text-danger"><?php echo form_error('warna'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Mulai</label>
                                            <input class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>" name="start" value="<?php echo $agenda['sec_datestart']; ?>">
                                            <small class="text-danger"><?php echo form_error('start'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Selesai (optional)</label>
                                            <input class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>" name="end" value="<?php echo $agenda['sec_dateend']; ?>">
                                            <small class="text-danger"><?php echo form_error('end'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Jam Mulai (optional)</label>
                                            <input class="form-control" type="time" name="times" value="<?php echo $agenda['timestart']; ?>">
                                            <small class="text-danger"><?php echo form_error('times'); ?></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jam Selesai (optional)</label>
                                            <input class="form-control" type="time" name="timee" value="<?php echo $agenda['timeend']; ?>">
                                            <small class="text-danger"><?php echo form_error('timee'); ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning" type="button" onclick="goBack();">Batal</button>
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>