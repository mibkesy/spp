<div class="content-wrapper">
            <div class="page-content fade-in-up">
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
                      <div class="panel-header mb-3 ml-3">
                        <a href="admin/master/biaya-lainnya/new" class="btn btn-primary">New Data</a>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Import</button>
                      </div>
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Kelas</th>
                                <th> Biaya Lainnya </th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($biaya as $bia): ?>
                                <?php $cek = $this->db->get_where('tb_kelas',['id' => $bia['bila_kelas']])->row_array(); ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $bia['bila_ket']; ?></td>
                                  <td><?php echo $cek['kelas']; ?></td>
                                  <td><?php echo number_format($bia['bila_biaya'],0,',','.'); ?></td>
                                  <td>
                                    <a href="admin/master/biaya-lainnya/edit/<?php echo $bia['bila_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/master/biaya-lainnya/hapus/<?php echo $bia['bila_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal impor start -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Biaya Lain</h5>
                  </div>
                  <div class="modal-body">
                    <form action="admin/impor_biaya_lain" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div class="form-group">
                        <label>File Excel</label>
                        <input type="file" class="form-control" name="userfile" required="">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    </form>
                </div>
              </div>
            </div>
            <!-- modal impor end -->

            