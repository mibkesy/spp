<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
</head>
<body onload="printCetak()">
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<h2 style="text-align: center;">KARTU BUKTI PEMBAYARAN SPP DAN DANA <br> TAHUN PELAJARAN <?php echo $cek['ta_tahun']; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Bulan</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Dibayar</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">SPP</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Infaq</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Dana Akademik</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Registrasi</th>
      <th colspan="3" style="text-align: center;border: 1px solid grey;">Tagihan</th>
      <th rowspan="2" style="text-align: center;border: 1px solid grey;">Total Bayar</th>
    </tr>
    <tr>
      <th style="text-align: center;border: 1px solid grey;">Infaq</th>
      <th style="text-align: center;border: 1px solid grey;">Dana Akademik</th>
      <th style="text-align: center;border: 1px solid grey;">Registrasi</th>
    </tr>
    <?php $i = 1; ?>
      <?php foreach($bulan as $sis): ?>
        <?php $cek1 = $this->db->get_where('tb_transaksi_bulan',['trabu_bulan' => $sis['bulan_id']])->result_array(); ?>
        <tr>
          <td style="border-left: 1px solid grey;height: 18px;width: 105px;"></td>
          <td style="border-left: 1px solid grey;width: 155px;"></td>
          <td style="border-left: 1px solid grey;width: 104px;"></td>
          <td style="border-left: 1px solid grey;width: 90px;"></td>
          <td style="border-left: 1px solid grey;width: 208px;"></td>
          <td style="border-left: 1px solid grey;width: 133px;"></td>
          <td style="border-left: 1px solid grey;width: 91px;"></td>
          <td style="border-left: 1px solid grey;width: 208px;"></td>
          <td style="border-left: 1px solid grey;width: 133px;"></td>
          <td style="border-left: 1px solid grey;border-right: 1px solid grey;width: 154px;"></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
      <tr style="border-top: 1px solid grey;">
        <td colspan="10"></td>
      </tr>
  </table>
  <p align="left"><strong>PERHATIAN </strong> : SPP dibayar selambat-lambatnya tanggal 10 tiap - tiap bulan<br />
    - Simpan dan peliharalah baik - baik KARTU bukti pembayaran ini, jika rusak dikenakan biaya penggantian KARTU. </p>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
