<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
    <?php $ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $transaksi['transaksi_siswaid']])->row_array(); ?>
    <?php $cekls = $this->db->get_where('tb_kelas',['id' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $cektrabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $transaksi['transaksi_id']])->row_array(); ?>
    <?php $cekbulan = $this->db->get_where('tb_bulan',['bulan_id' => $cektrabu['trabu_bulan']])->row_array(); ?>
    <?php $cekinfaq = $this->db->get_where('tb_biaya_infaq',['binf_siswaid' => $transaksi['transaksi_siswaid']])->row_array(); ?>
    <?php $cekakdm = $this->db->get_where('tb_biaya_akademik',['baka_kelas' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $cekreg = $this->db->get_where('tb_biaya_registrasi',['bare_kelas' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $tag1 = $transaksi['tratagih_infaq']; ?>
    <?php $tag2 = $transaksi['tratagih_akademik']; ?>
    <?php $tag3 = $transaksi['tratagih_registrasi']; ?>
    <?php $totaltag = $tag1+$tag2+$tag3; ?>
    <?php $totaltra = $transaksi['transaksi_spp']+$transaksi['transaksi_infaq']+$transaksi['transaksi_akademik']+$transaksi['transaksi_registrasi']; ?>
    <?php 

    if($cekbulan['bulan_urut'] == 1 OR $cekbulan['bulan_urut'] == 2 OR $cekbulan['bulan_urut'] == 3 OR $cekbulan['bulan_urut'] == 4 OR $cekbulan['bulan_urut'] == 5 OR $cekbulan['bulan_urut'] == 6) {
        $tahunnya = substr($cek['ta_tahun'], 0, -5);
      }else {
        $tahunnya = substr($cek['ta_tahun'], 5);
      }


     ?>
<body>
<!-- <body onLoad="window.print()"> -->

<div align="center">
<table width="100%">
<tr valign="top">
<td width="50%">
    <img src="assets/img/logo-sma-lazuardi.png"height="50"><hr>

  </td>
  <td align="right">
      <font size='2'>KWITANSI</font>
  <p align="right"><font size='2'>Depok, <?php echo date("d M Y");  ?></td>
  </tr>
</table><font size='2'>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><font size='2'>NIS / ID Siswa</td>
    <td><font size='2'>: <?php echo $transaksi['transaksi_siswaid']; ?></td>
    <td><font size='2'>Sisa Tagihan Infaq</td>
    <td align='right'><font size='2'>: Rp. <?php echo number_format($transaksi['tratagih_infaq'],0,',','.'); ?></td>
  </tr>
  <tr>
    <td><font size='2'>Nama</td>
    <td><font size='2'>: <?php echo $ceksis['siswa_nama']; ?></td>
    <td width="28%"><font size='2'>Sisa Tagihan Akademik</td>
    <td width="14%" align='right'>: Rp. <?php echo number_format($transaksi['tratagih_akademik'],0,',','.'); ?></td>
  </tr>
  <tr>
    <td><font size='2'>Kelas</td>
    <td><font size='2'>: <?php echo $cekls['kelas']; ?></td>
    <td width="28%"><font size='2'>Sisa Tagihan Registrasi</td>
    <td width="14%" align='right'>: Rp. <?php echo number_format($transaksi['tratagih_registrasi'],0,',','.'); ?></td>
  </tr>
</table>
<hr>

<i><font size='2'>Telah Terima Uang Sebesar <strong>Rp. <?php echo number_format($totaltra,0,',','.'); ?></strong> Guna Membayar : </i>
<hr>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><font size='2'>SPP bulan <?php echo $cekbulan['bulan_nama']; ?> <?php echo $tahunnya; ?></td>
    <td align="right">Rp. <?php echo number_format($transaksi['transaksi_spp'],0,',','.'); ?></td>
  </tr>
  <?php if($transaksi['transaksi_infaq'] == 0) { ?>
  <?php }else { ?>
      <tr>
        <td><font size='2'>Dana Infaq</td>
        <td align="right">Rp. <?php echo number_format($transaksi['transaksi_infaq'],0,',','.'); ?></td>
      </tr>
    <?php } ?>
  <?php if($transaksi['transaksi_akademik'] == 0) { ?>
  <?php }else { ?>
      <tr>
        <td><font size='2'>Dana Akademik</td>
        <td align="right">Rp. <?php echo number_format($transaksi['transaksi_akademik'],0,',','.'); ?></td>
      </tr>
    <?php } ?>
  <?php if($transaksi['transaksi_registrasi'] == 0) { ?>
  <?php }else { ?>
      <tr>
        <td><font size='2'>Dana Registrasi</td>
        <td align="right">Rp. <?php echo number_format($transaksi['transaksi_registrasi'],0,',','.'); ?></td>
      </tr>
    <?php } ?>
  <tr>
      <td><strong><font size='2'>Jumlah</td>
      <td align="right"><strong>Rp. <?php echo number_format($totaltra,0,',','.'); ?></strong></td>
  </tr>
</table>

<hr>

<p align="right"><font size='2'>
Teler <br>
<br>
<br>

( <?php echo $me['admin_nama']; ?> )</p>

</body>
</html>