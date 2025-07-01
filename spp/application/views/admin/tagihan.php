<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo base_url(); ?>"/>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 10pt;
    }
    table, tr, th, td {
      border: 1px solid;
    }
    .css-serial {
      counter-reset: serial-number;  /* Atur penomoran ke 0 */
    }
    .css-serial td:first-child:before {
      counter-increment: serial-number;  /* Kenaikan penomoran */
      content: counter(serial-number);  /* Tampilan counter */
    }
  </style>
</head>
<?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<?php $kls = $this->db->get_where('tb_kelas',['id' => $siswa['siswa_kelas']])->row_array(); ?>
<?php 
          $cekspp = $this->db->get_where('tb_biaya_spp',['bspp_siswaid' => $siswa['siswa_nis'], 'bspp_ta' => $cek['ta_tahun']])->row_array();
$infaq = $this->db->get_where('tb_biaya_infaq',['binf_ta' => $cek['ta_tahun'],'binf_siswaid' => $siswa['siswa_nis']])->row_array();
    $akademik = $this->db->get_where('tb_biaya_akademik',['baka_ta' => $cek['ta_tahun'],'baka_kelas' => $siswa['siswa_kelas']])->row_array();
    $regis = $this->db->get_where('tb_biaya_registrasi',['bare_ta' => $cek['ta_tahun'],'bare_kelas' => $siswa['siswa_kelas']])->row_array();
    $cektagihan = $this->db->get_where('tb_tagihan',['tagihan_siswa' => $siswa['siswa_nis'], 'tagihan_ta' => $cek['ta_tahun']])->row_array();
    $cektrax = $this->db->get_where('tb_transaksi',['transaksi_siswaid' => $siswa['siswa_nis'], 'transaksi_ta' => $cek['ta_tahun']])->result_array();
    $totalinfaq = 0;
    $totalakademik = 0;
    $totalregis = 0;
    foreach($cektrax as $ctr) {
      $totalinfaq += $ctr['transaksi_infaq'];
      $totalakademik += $ctr['transaksi_akademik'];
      $totalregis += $ctr['transaksi_registrasi'];
    }

    if($cektagihan['tagihan_infaq'] == 0) {
      if($totalinfaq == $infaq['binf_biaya']) {
        $taginfaq = 0;
      }else {
        $taginfaq = $infaq['binf_biaya'];
      }
    }else {
      $taginfaq = $cektagihan['tagihan_infaq'];
    }

    if($cektagihan['tagihan_akademik'] == 0) {
      if($totalakademik == $akademik['baka_biaya']) {
        $tagaka = 0;
      }else {
        $tagaka = $akademik['baka_biaya'];
      }
    }else {
      $tagaka = $cektagihan['tagihan_akademik'];
    }

    if($cektagihan['tagihan_registrasi'] == 0) {
      if($totalregis == $regis['bare_biaya']) {
        $tagreg = 0;
      }else {
        $tagreg = $regis['bare_biaya'];
      }
    }else {
      $tagreg = $cektagihan['tagihan_registrasi'];
    }
 ?>
<body>
  <h4 style="font-size:10pt;font-family: arial;text-align: center;">RINCIAN KEKURANGAN KEUANGAN SISWA <br>
  SMA LAZUARDI GCS <br>
   TAHUN AJARAN <?php echo $cek['ta_tahun']; ?></h4>
  <p style="font-size: 11pt;">
<tr>
      <td>NAMA</td>
      <td>: <?php echo $siswa['siswa_nama']; ?></td>
</tr> <br>
    <tr>
      <td>KELAS</td>
      <td>: <?php echo $kls['kelas']; ?></td>
    </tr>
  </p>
  <table class="css-serial">
    <tr>
      <th width="60">NO</th>
      <th>KEKURANGAN</th>
      <th>JUMLAH (Rp)</th>
    </tr>
    <tr>
      <td style="text-align: center;"></td>
      <td>SPIP (Infaq) Kelas <?php echo $kls['kelas']; ?></td>
      <td>Rp. <?php echo number_format($taginfaq,0,',','.'); ?></td>
    </tr>
    <tr>
      <td style="text-align: center;"></td>
      <td>Akademik</td>
      <td>Rp. <?php echo number_format($tagaka,0,',','.'); ?></td>
    </tr>
    <tr>
      <td style="text-align: center;"></td>
      <td>Registrasi</td>
      <td>Rp. <?php echo number_format($tagreg,0,',','.'); ?></td>
    </tr>
    <?php $tagihanlain = $this->db->get_where('tb_biaya_lain',['bila_kelas' => $siswa['siswa_kelas']])->result_array(); ?>
    <?php foreach($tagihanlain as $tl): ?>
    <?php $ceklain = $this->db->get_where('tb_transaksi_lain',['trala_ket' => $tl['bila_ket'],'trala_nis' => $this->uri->segment(4)])->result_array(); ?>
    <?php $tagih = 0; ?>
    <?php foreach($ceklain as $cl): ?>
    <?php $tagih += $cl['trala_jml']; ?>
    <?php endforeach; ?>
    <?php $tabila = $tl['bila_biaya'] - $tagih; ?>
      <tr>
        <td style="text-align: center;"></td>
        <td><?php echo $tl['bila_ket'] ?></td>
        <td>Rp. <?php echo number_format($tabila,0,',','.'); ?></td>
      </tr>
    <?php endforeach; ?>
    <?php $bulansaatini = substr(date('m'), 1); ?>
    <?php $batas = 21; ?>
    <?php foreach($bulan as $sis): ?>
      <?php $bulanasli = $this->db->get_where('tb_bulan',['bulan_id' => $bulansaatini])->row_array(); ?>
      <?php $cek1 = $this->db->get_where('tb_transaksi_bulan',['trabu_siswa' => $siswa['siswa_nis'], 'trabu_bulan' => $sis['bulan_id']])->result_array(); ?>
      <?php 
      if($sis['bulan_urut'] == 1 OR $sis['bulan_urut'] == 2 OR $sis['bulan_urut'] == 3 OR $sis['bulan_urut'] == 4 OR $sis['bulan_urut'] == 5 OR $sis['bulan_urut'] == 6) {
        $tahunnya = substr($cek['ta_tahun'], 0, -5);
      }else {
        $tahunnya = substr($cek['ta_tahun'], 5);
      }

       ?>
      <tr>
        <td style="text-align: center;"></td>
        <td>SPP <?php echo $sis['bulan_nama']; ?> <?php echo $tahunnya; ?></td>
        <?php if($cek1) { ?>
          <td>Rp. <?php echo number_format(0,0,',','.'); ?></td>
        <?php }else { ?>
          <?php if($sis['bulan_urut'] <= $bulanasli['bulan_urut']) { ?>
            <td>Rp. <?php echo number_format($cekspp['bspp_biaya'],0,',','.'); ?></td>
          <?php }else { ?>
            <td>Rp. <?php echo number_format(0,0,',','.'); ?></td>
          <?php } ?>
        <?php } ?>
      </tr>
    <?php endforeach; ?>
    <?php $jumlah = $taginfaq + $tagaka + $tagreg + $tagstor + $tagihanspp; ?>
    <tr>
      <th colspan="2">JUMLAH</th>
      <th style="text-align: left;">Rp. <?php echo number_format($jumlah,0,',','.'); ?></th>
    </tr>
  </table>
  <p>Catatan : <br>
<li>Tagihan otomatis terjadwal setiap awal bulan</li>
    <li>Jika ada perbedaan data, dimohon menunjukan bukti pembayaran pada petugas bagian keuangan</li>
  </p>
  <p style="margin-left: 500px;">Depok, <?php echo date('d-m-Y'); ?> <br>
 Bendahara <br><img src="assets/img/<?php echo $me['admin_ttd']; ?>" width="100"> <br><?php echo $me['admin_nama']; ?></p>
</body>
</html>