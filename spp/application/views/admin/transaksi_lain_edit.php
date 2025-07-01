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
                                              <label>Siswa</label>
                                              <input class="form-control" type="text" value="<?php echo $siswa['siswa_nama']; ?>" readonly>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Tanggal</label>
                                              <input class="form-control" type="date" name="tgl" value="<?php echo $tralaid['trala_tgl']; ?>">
                                              <small class="text-danger"><?php echo form_error('tgl'); ?></small>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="form-group col-md-6">
                                              <label>Jumlah</label>
                                              <input class="form-control" type="number" min="0" name="jml" value="<?php echo $tralaid['trala_jml']; ?>">
                                              <small class="text-danger"><?php echo form_error('jml'); ?></small>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label>Keterangan</label>
                                             <select name="ket" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php foreach($biayalain as $sis): ?>
                                                  <option <?php if($tralaid['trala_ket'] == $sis['bila_ket']) {echo 'selected="selected"'; } ?> value="<?php echo $sis['bila_ket']; ?>"><?php echo $sis['bila_ket']; ?></option>
                                                  <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?php echo form_error('ket'); ?></small>
                                          </div>
                                      </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning" type="button" onclick="goBack();">Batal</button>
                                        <button class="btn btn-info" type="submit" onclick="return confirm('Anda yakin akan melanjutkan?');">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>