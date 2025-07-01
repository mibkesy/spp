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
                      <div class="panel-header mb-3 ml-3">
                        <a href="admin/kelas/new" class="btn btn-primary">New Data</a>
                      </div>
                        <div class="table table-responsive">
                          <table class="table table-bordered" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($kelas as $kel): ?>
                                <?php $jumlahsiswa = $this->db->get_where('tb_siswa',['siswa_kelas' => $kel['id']])->num_rows(); ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $kel['kelas']; ?></td>
                                  <td><?php echo $jumlahsiswa; ?></td>
                                  <td>
                                    <a href="admin/kelas/edit/<?php echo $kel['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/kelas/hapus/<?php echo $kel['id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            <div class="modal fade" id="kelasadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelas Baru</h5>
                  </div>
                  <div class="modal-body">
                    <form action="admin/simpan_kelas" method="post">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                      <div class="form-group">
                          <label>Kelas</label>
                          <input class="form-control" type="text" name="kelas" required>
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

            <?php foreach($kelas as $kel): ?>
              <div class="modal fade" id="edit<?php echo $kel['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    </div>
                    <div class="modal-body">
                      <form action="admin/edit_kelas" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="id" value="<?php echo $kel['id']; ?>">
                        <div class="form-group">
                            <label>Kelas</label>
                            <input class="form-control" type="text" name="kelas" value="<?php echo $kel['kelas']; ?>" required>
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
            <?php endforeach; ?>