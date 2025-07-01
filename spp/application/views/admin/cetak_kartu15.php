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
  padding: 0px;
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
<body onload="printCetak()">
  <?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>

<div style="overflow-x:auto;padding-top: 90px;text-align: center;">
  <table>
    <tr align="center">
      <td width="9%" height="60" rowspan="2"></td>
      <td width="12%" rowspan="2"></td>
      <td width="9%" rowspan="2"></td>
      <td width="10%" rowspan="2">&nbsp;</td>
      <td width="10%" rowspan="2"></td>
      <td width="10%" rowspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td width="14%" rowspan="2">&nbsp;</td>
    </tr>
    <tr align="center">
      <td width="11%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
    </tr>
    <?php $i = 1; ?>
      <?php foreach($bulan as $sis): ?>
        <?php $cek1 = $this->db->get_where('tb_transaksi_bulan',['trabu_bulan' => $sis['bulan_id']])->result_array(); ?>
        <tr>
        <td style="text-align: center; height: 18px;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek2 = $this->db->get_where('tb_bulan',['bulan_id' => $c1['trabu_bulan']])->row_array(); ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
            <?php echo $cek2['bulan_nama']; ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo date('d-m-Y', strtotime($cek3['transaksi_tgl'])); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_spp'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_infaq'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_akademik'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['transaksi_registrasi'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_infaq'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_akademik'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
            <?php if($cek3) { ?>
              <?php echo number_format($cek3['tratagih_registrasi'],0,',','.'); ?>
            <?php }else { ?>
            <?php } ?>
          <?php endforeach; ?>
        </td>
        <td style="text-align: center;">
          <?php foreach($cek1 as $c1): ?>
            <?php $cek3 = $this->db->get_where('tb_transaksi',['transaksi_id' => $c1['trabu_transaksiid'], 'transaksi_siswaid' => $this->uri->segment(4), 'transaksi_ta' => $cek['ta_tahun']])->row_array(); ?>
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
