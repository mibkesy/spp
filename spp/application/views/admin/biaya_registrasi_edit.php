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
                                        <div class="form-group col-md-4">
                                            <label>Kelas</label>
                                            <select name="kelas" class="form-control">
                                                <?php foreach($kelas as $kls): ?>
                                                <option <?php if($biaya['bare_kelas'] == $kls['id']) {echo 'selected="selected"'; } ?> value="<?php echo $kls['id']; ?>"><?php echo $kls['kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('kelas'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <?php foreach($tahun as $ta): ?>
                                                <option <?php if($biaya['bare_ta'] == $ta['ta_tahun']) {echo 'selected="selected"'; } ?> value="<?php echo $ta['ta_tahun']; ?>"><?php echo $ta['ta_tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('tahun'); ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Biaya Registrasi</label>
                                            <input class="form-control" type="number" min="0" name="biaya" value="<?php echo $biaya['bare_biaya']; ?>">
                                            <small class="text-danger"><?php echo form_error('biaya'); ?></small>
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