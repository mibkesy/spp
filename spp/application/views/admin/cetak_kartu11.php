<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
<style>
@media print {
  th, td {
    font-size: 11px;
  }
}
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;
}

th {
  /*background-color: #4CAF50;*/
  font-weight: bold;
}

th, td {
  text-align: left;
  padding: 8px;
  /*border: 1px solid grey;*/
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

.responsive {
  width: 100%;
  height: auto;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<?php if($this->uri->segment(2) == 'pembayaran') { ?>
<body>
<?php }else { ?>
<body>
<!-- <body onload="printCetak()"> -->
<?php } ?>
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<h2 style="text-align: center;"></h2>

<div style="overflow-x:auto;padding-top: 110px;">
  <table>
    <tr>
      <th rowspan="2" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
      <th colspan="3" style="text-align: center;"></th>
      <th rowspan="2" style="text-align: center;"></th>
    </tr>
    <tr>
      <th style="text-align: center;"></th>
      <th style="text-align: center;"></th>
      <th style="text-align: center;"></th>
    </tr>
    <?php $i = 1; ?>
      <?php foreach($bulan as $sis): ?>
        <?php $cek1 = $this->db->get_where('tb_transaksi_bulan',['trabu_bulan' => $sis['bulan_id']])->result_array(); ?>
        <tr>
        <td style="height: 18px;width: 105px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek2 = $this->db->get_where('tb_bulan',['bulan_id' => $c1['trabu_bulan']])->row_array(); ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
            <?php echo $cek2['bulan_nama']; ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 155px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo date('d-m-Y', strtotime($cek3['transaksi_tgl'])); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 104px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_spp'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 90px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_infaq'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 208px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_akademik'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 133px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_registrasi'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 91px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php $cek4 = $this->db->get_where('tb_biaya_infaq',['binf_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php $bill = $cek4['binf_biaya'] - $cek3['transaksi_infaq']; ?>
            <?php }else { ?>
            <?php } ?>
            <?php if($cek3) { ?>
              <?php echo number_format($bill,0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 208px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php $ceksiswa = $this->db->get_where('tb_siswa',['siswa_nis' => $this->uri->segment(4)])->row_array(); ?>
            <?php $cek4 = $this->db->get_where('tb_biaya_akademik',['baka_kelas' => $ceksiswa['siswa_kelas']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php $bill = $cek4['baka_biaya'] - $cek3['transaksi_akademik']; ?>
            <?php }else { ?>
            <?php } ?>
            <?php if($cek3) { ?>
              <?php echo number_format($bill,0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="width: 133px;"></td>
        <td style="width: 154px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4)])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_total'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
