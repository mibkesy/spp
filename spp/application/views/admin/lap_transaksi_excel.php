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
      <th>SPP Bulan</th>
      <th>SPP</th>
      <th>Infaq</th>
      <th>Akademik</th>
      <th>Registrasi</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $totalspp = 0; ?>
    <?php $totalinfaq = 0; ?>
    <?php $totalaka = 0; ?>
    <?php $totalregi = 0; ?>
    <?php $totaltaginfaq = 0; ?>
    <?php $totaltagaka = 0; ?>
    <?php $totaltagregi = 0; ?>
    <?php $total = 0; ?>
    <?php foreach($transaksi as $trx): ?>
    <?php $totalspp += $trx['transaksi_spp']; ?>
    <?php $totalinfaq += $trx['transaksi_infaq']; ?>
    <?php $totalaka += $trx['transaksi_akademik']; ?>
    <?php $totalregi += $trx['transaksi_registrasi']; ?>
    <?php $totaltaginfaq += $trx['tratagih_infaq']; ?>
    <?php $totaltagaka += $trx['tratagih_akademik']; ?>
    <?php $totaltagregi += $trx['tratagih_registrasi']; ?>
    <?php $total += $trx['transaksi_total']; ?>
    <?php $cek = $this->db->get_where('tb_siswa',['siswa_nis' => $trx['transaksi_siswaid']])->row_array(); ?>
    <?php $kls = $this->db->get_where('tb_kelas',['id' => $cek['siswa_kelas']])->row_array(); ?>
    <?php $trabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $trx['transaksi_id']])->row_array(); ?>
    <?php $cekbulan = $this->db->get_where('tb_bulan',['bulan_id' => $trabu['trabu_bulan']])->row_array(); ?>
    <tr>
      <td><?php echo $i; ?>.</td>
      <td><?php echo date('d-m-Y', strtotime($trx['transaksi_tgl'])); ?></td>
      <td><?php echo $trx['transaksi_siswaid']; ?></td>
      <td><?php echo $cek['siswa_nama']; ?></td>
      <td><?php echo $kls['kelas']; ?></td>
      <td><?php echo $cekbulan['bulan_nama']; ?></td>
      <td><?php echo number_format($trx['transaksi_spp'],0,',','.'); ?></td>
      <td><?php echo number_format($trx['transaksi_infaq'],0,',','.'); ?></td>
      <td><?php echo number_format($trx['transaksi_akademik'],0,',','.'); ?></td>
      <td><?php echo number_format($trx['transaksi_registrasi'],0,',','.'); ?></td>
      <td><?php echo number_format($trx['transaksi_total'],0,',','.'); ?></td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <th colspan="6">Total</th>
    <th><?php echo number_format($totalspp,0,',','.'); ?></th>
    <th><?php echo number_format($totalinfaq,0,',','.'); ?></th>
    <th><?php echo number_format($totalaka,0,',','.'); ?></th>
    <th><?php echo number_format($totalregi,0,',','.'); ?></th>
    <th><?php echo number_format($total,0,',','.'); ?></th>
  </tr>
  </tbody>
</table>