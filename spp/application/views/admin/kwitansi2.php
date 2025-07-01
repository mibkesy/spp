<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <?php $ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $trala['trala_nis']])->row_array(); ?>
    <?php $cekls = $this->db->get_where('tb_kelas',['id' => $ceksis['siswa_kelas']])->row_array(); ?>
    <?php $cekbiayalain = $this->db->get_where('tb_biaya_lain',['bila_kelas' => $cekls['id'], 'bila_ket' => $trala['trala_ket']])->row_array(); ?>
    <?php $sisa = $cekbiayalain['bila_biaya'] - $trala['trala_jml']; ?>
<body>
<!-- <body onLoad="window.print()"> -->

<div align="center">
<table width="100%">
<tr valign="top">
<td width="50%">
    <img src="assets/img/header.png"height="50"><hr>

  </td>
  <td align="right">
      <font size='2'>KWITANSI</font>
  <p align="right"><font size='2'>Purwokerto, <?php echo date("d M Y");  ?></td>
  </tr>
</table><font size='2'>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><font size='2'>NIS / ID Siswa</td>
    <td><font size='2'>: <?php echo $trala['trala_nis']; ?></td>
    <td><font size='2'>Tanggal</td>
    <td align='right'><font size='2'>: <?php echo date('d-m-Y', strtotime($trala['trala_tgl'])); ?></td>
  </tr>
  <tr>
    <td><font size='2'>Nama</td>
    <td><font size='2'>: <?php echo $ceksis['siswa_nama']; ?></td>
    <td width="28%"><font size='2'>Sisa Tagihan <?php echo $trala['trala_ket']; ?></td>
    <td width="14%" align='right'>: Rp. <?php echo number_format($sisa,0,',','.'); ?></td>
  </tr>
  <tr>
    <td><font size='2'>Kelas</td>
    <td><font size='2'>: <?php echo $cekls['kelas']; ?></td>
    <td width="28%"><font size='2'></td>
    <td width="14%" align='right'></td>
  </tr>
</table>
<hr>

<i><font size='2'>Telah Terima Uang Sebesar <strong>Rp. <?php echo number_format($trala['trala_jml'],0,',','.'); ?></strong> Guna Membayar : </i>
<hr>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><font size='2'>Biaya <?php echo $trala['trala_ket']; ?></td>
    <td align="right">Rp. <?php echo number_format($trala['trala_jml'],0,',','.'); ?></td>
  </tr>
  <tr>
      <td><strong><font size='2'>Jumlah</td>
      <td align="right"><strong>Rp. <?php echo number_format($trala['trala_jml'],0,',','.'); ?></strong></td>
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