<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
  <thead>
    <tr>
      <?php if($mulai == '' AND $sampai == '') { ?>
        <th colspan="14"><?php echo $title; ?></th>
      <?php }else { ?>
        <th colspan="14"><?php echo $title; ?> Periode <?php echo date('d-m-Y', strtotime($mulai)); ?> s/d <?php echo date('d-m-Y', strtotime($sampai)); ?></th>
      <?php } ?>
    </tr>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jumlah</th>
      <th>Ket</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $total = 0; ?>
    <?php foreach($transaksi as $trx): ?>
    <?php $total += $trx['trala_jml']; ?>
    <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['trala_nis']])->row_array(); ?>
    <?php $kls = $this->db->get_where('tb_kelas',['id' => $cek['siswa_kelas']])->row_array(); ?>
    <tr>
      <td><?php echo $i; ?>.</td>
      <td><?php echo date('d-m-Y', strtotime($trx['trala_tgl'])); ?></td>
      <td><?php echo $cek['siswa_nis']; ?></td>
      <td><?php echo $cek['siswa_nama']; ?></td>
      <td><?php echo $kls['kelas']; ?></td>
      <td><?php echo number_format($trx['trala_jml'],0,',','.'); ?></td>
      <td><?php echo $trx['trala_ket']; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    <tr>
      <th colspan="5">Total</th>
      <th><?php echo number_format($total,0,',','.'); ?></th>
      <th></th>
    </tr>
  </tbody>
</table>