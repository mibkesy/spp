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
                      <form action="" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row">
                          <div class="form-group col-md-4">
                            <select name="ket" class="form-control" required>
                              <option value="">-Pilih-</option>
                              <?php foreach($biaya as $bin): ?>
                                  <option value="<?php echo $bin['bila_ket']; ?>"><?php echo $bin['bila_ket']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                          </div>
                        </div>
                      </form>
                        <div class="table table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Ket</th>
                                <th>Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php $total = 0; ?>
                              <?php foreach($transaksi as $trx): ?>
                              <?php $total += $trx['trala_jml']; ?>
                                <tr>
                                  <td><?php echo $i; ?>.</td>
                                  <td><?php echo date('d-m-Y', strtotime($trx['trala_tgl'])); ?></td>
                                  <td><?php echo number_format($trx['trala_jml'],0,',','.'); ?></td>
                                  <td><?php echo $trx['trala_ket']; ?></td>
                                  <td>
                                    <a href="admin/transaksi-lainnya/hapus/<?php echo $trx['trala_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    <a onclick="window.open('admin/transaksi-lainnya/kwitansi/<?php echo $trx['trala_id']; ?>','nama window','width=1000,height=700,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')" class="btn btn-warning btn-sm text-white"><i class="fa fa-print"></i></a>
                                  </td>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; ?>
                              <tr>
                                <th colspan="2">Total</th>
                                <th><?php echo number_format($total,0,',','.'); ?></th>
                                <th></th>
                              </tr> 
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>