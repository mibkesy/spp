<html>
<?php $cek = $this->db->get_where('tb_tahun_pelajaran',['ta_status' => 'AKTIF'])->row_array(); ?>
<?php $kls = $this->db->get_where('tb_kelas',['id' => $siswa['siswa_kelas']])->row_array(); ?>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<base href="<?php echo base_url(); ?>"/>
<style>
<!--
 /* Font Definitions */
 @font-face
  {font-family:Wingdings;
  panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
  {font-family:"Cambria Math";
  panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
  {font-family:Calibri;
  panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
  {margin-top:0in;
  margin-right:0in;
  margin-bottom:8.0pt;
  margin-left:0in;
  line-height:107%;
  font-size:11.0pt;
  font-family:"Calibri",sans-serif;}
p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing
  {margin:0in;
  font-size:11.0pt;
  font-family:"Calibri",sans-serif;}
.MsoChpDefault
  {font-family:"Calibri",sans-serif;}
.MsoPapDefault
  {margin-bottom:8.0pt;
  line-height:107%;}
@page WordSection1
  {size:8.5in 11.0in;
  margin:1.0in 1.0in 1.0in 1.0in;}
div.WordSection1
  {page:WordSection1;}
 /* List Definitions */
 ol
  {margin-bottom:0in;}
ul
  {margin-bottom:0in;}
  .css-serial {
          counter-reset: serial-number;  /* Atur penomoran ke 0 */
        }
        .css-serial td:first-child:before {
          counter-increment: serial-number;  /* Kenaikan penomoran */
          content: counter(serial-number);  /* Tampilan counter */
        }
-->
</style>

</head>

<body lang=EN-US style='word-wrap:break-word'>

<div class=WordSection1>

<p class=MsoNoSpacing align=center style='text-align:center'><b><span
lang=EN-ID style='font-size:10.0pt;font-family:"Arial",sans-serif'>RINCIAN
KEKURANGAN</span></b><b><span lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>
KEUANGAN SISWA</span></b></p>

<p class=MsoNoSpacing align=center style='text-align:center'><b><span lang=IN
style='font-size:10.0pt;font-family:"Arial",sans-serif'>SMP MUHAMMADIYAH 1
PURWOKERTO</span></b></p>

<p class=MsoNoSpacing align=center style='text-align:center'><b><span
lang=EN-ID style='font-size:10.0pt;font-family:"Arial",sans-serif'>TAHUN AJARAN
<?php echo $cek['ta_tahun']; ?></span></b></p>

<p class=MsoNoSpacing align=center style='text-align:center'><span lang=IN
style='font-size:10.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:14.2pt;line-height:150%'><b><span
lang=IN style='font-size:10.0pt;line-height:150%;font-family:"Arial",sans-serif'>NAMA          :
</span></b><b><span
lang=IN style='font-size:10.0pt;line-height:150%;font-family:"Arial",sans-serif'><?php echo $siswa['siswa_nama']; ?></span></b></p>

<p class=MsoNoSpacing style='margin-left:14.2pt;line-height:150%'><b><span
lang=IN style='font-size:10.0pt;line-height:150%;font-family:"Arial",sans-serif'>KELAS        :
</span></b><b><span
lang=IN style='font-size:10.0pt;line-height:150%;font-family:"Arial",sans-serif'><?php echo $kls['kelas']; ?></span></b></p>

<p class=MsoNoSpacing><span lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=595
 style='width:446.5pt;margin-left:13.95pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>NO</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>KEKURANGAN</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>JUMLAH
  (Rp)</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>1</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=EN-ID
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPIP
  (Infaq) Kelas <?php echo $kls['kelas']; ?></span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. <?php echo number_format($tasis['tagihan_infaq'],0,',','.'); ?></span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>2</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Akademik</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'><?php echo number_format($tasis['tagihan_akademik'],0,',','.'); ?></span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>3</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Registrasi</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'><?php echo number_format($tasis['tagihan_registrasi'],0,',','.'); ?></span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>4</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Buku
  Pendamping (LKS)</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>-</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>5</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=EN-ID
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Seragam</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=EN-ID
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>-</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>6</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=EN-ID
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rapot</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=EN-ID
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>-</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>7</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Juli
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>8</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Agustus
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>9</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP September
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>10</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Oktober
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>11</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Nopember
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>12</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Desember
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>20</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>13</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP
  Januari 20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>14</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP
  Februari 20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>15</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP
  Maret 20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>16</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP
  April 20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>17</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP Mei
  20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=37 valign=top style='width:28.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>18</span></p>
  </td>
  <td width=263 valign=top style='width:197.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>SPP
  Juni 20</span><span lang=EN-ID style='font-size:10.0pt;line-height:115%;
  font-family:"Arial",sans-serif'>21</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp. </span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>250.000</span></p>
  </td>
 </tr>
 <tr>
  <td width=300 colspan=2 valign=top style='width:225.15pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center;line-height:115%'><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>J</span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>UMLAH</span></p>
  </td>
  <td width=295 valign=top style='width:221.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNoSpacing style='line-height:115%'><span lang=IN
  style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>Rp.</span><span
  lang=IN style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>
  </span><span
  lang=EN-ID style='font-size:10.0pt;line-height:115%;font-family:"Arial",sans-serif'>4.005.000</span></p>
  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:35.45pt;text-align:justify'><span
lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>Catatan : </span></p>

<p class=MsoNoSpacing style='margin-left:.5in;text-align:justify;text-indent:
-.25in'><span lang=IN style='font-size:10.0pt;font-family:Symbol'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>Data
pembayaran diambil per 21 Juni <?php echo date('Y'); ?></span></p>

<p class=MsoNoSpacing style='margin-left:.5in;text-align:justify;text-indent:
-.25in'><span lang=IN style='font-size:10.0pt;font-family:Symbol'>·<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>Jika
ada perbedaan data, dimohon menunjukan bukti pembayaran pada petugas bagian
keuangan</span></p>

<p class=MsoNoSpacing style='margin-left:35.45pt;text-align:justify'><span
lang=IN style='font-size:10.0pt;font-family:"Arial",sans-serif'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:80.45pt'><span style='position:relative;
z-index:-1895824384'><span style='left:0px;position:absolute;left:273px;
top:-1px;width:137px;height:150px'><img width=137 height=150
src="assets/img/<?php echo $me['admin_ttd']; ?>"></span></span></p>

<p class=MsoNoSpacing style='margin-left:300.65pt'><span lang=IN
style='font-size:10.0pt;font-family:"Arial",sans-serif'>Purwokerto, <?php echo date('d-m-Y'); ?></span> <br>Bendahara</p>
<p class=MsoNoSpacing style='margin-left:300.65pt;margin-top:100px;'><span lang=IN
style='font-size:10.0pt;font-family:"Arial",sans-serif'><?php echo $me['admin_nama']; ?></span> <br></p>


<p class=MsoNormal><span lang=EN-ID>&nbsp;</span></p>

</div>

</body>

</html>
