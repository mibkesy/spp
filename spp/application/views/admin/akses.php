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
                        <a href="admin/master/akses/new" class="btn btn-primary">New Data</a>
                      </div>
                        <div class="table table-responsive" id="reload">
                          <table class="table table-bordered css-serial" id="example-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Foto</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach($ladmin as $bia): ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo $bia['admin_nama']; ?></td>
                                  <td><?php echo $bia['admin_username']; ?></td>
                                  <td>
                                    <?php if(password_verify('12345', $bia['admin_password'])) { ?>
                                      12345
                                    <?php }else { ?>
                                      <i>Sudah diganti</i>
                                    <?php } ?>
                                  </td>
                                  <td><img src="assets/img/<?php echo $bia['admin_foto']; ?>" width="50"></td>
                                  <td>
                                    <a href="admin/master/akses/edit/<?php echo $bia['admin_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="admin/master/akses/hapus/<?php echo $bia['admin_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

            