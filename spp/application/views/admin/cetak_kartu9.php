<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
<body>
<!-- <body onLoad="window.print()"> -->
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<div align="center">
  <p>KARTU BUKTI PEMBAYARAN SPP DAN DANA<br />
    TAHUN PELAJARAN <?php echo $cek['ta_tahun']; ?></p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="9%" height="60" rowspan="2">Bulan</td>
      <td width="12%" rowspan="2">Dibayar</td>
      <td width="9%" rowspan="2">SPP</td>
      <td width="10%" rowspan="2">Infaq</td>
      <td width="10%" rowspan="2">Akdmik</td>
      <td width="10%" rowspan="2">Registrsi</td>
      <td colspan="3">Tagihan</td>
      <td width="14%" rowspan="2">Total</td>
    </tr>
    <tr align="center">
      <td width="11%">Infaq</td>
      <td width="9%">Akdmik</td>
      <td width="9%">Registrsi</td>
    </tr>
    <tr align="center">
      <td height="321" valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  <p align="left"><strong>PERHATIAN </strong> : SPP dibayar selambat-lambatnya tanggal 10 tiap - tiap bulan<br />
    - Simpan dan peliharalah baik - baik KARTU bukti pembayaran ini, jika rusak dikenakan biaya penggantian KARTU. </p>
</div>

</body>
</html>
