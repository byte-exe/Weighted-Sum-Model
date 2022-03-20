<?php  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  for ($a = 1; $a <= $_POST['jumlahkriteria']; $a++) {
  $insertSQL = sprintf("INSERT INTO tb_bobot (kriteria_id, alternatif_id, nilai_bobot) VALUES (%s, %s, %s)",
                       GetSQLValueString($koneksi, $_POST['kriteria_id'.$a], "int"),
                       GetSQLValueString($koneksi, $_GET['id_alternatif'], "int"),
                       GetSQLValueString($koneksi, $_POST['nilai_bobot'.$a], "int"));

  mysqli_select_db($koneksi, $database_koneksi);
  $Result1 = mysqli_query($koneksi, $insertSQL) or die(mysqli_error($koneksi));
  }
}
  

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_kriteria = "SELECT id_kriteria, nama_kriteria FROM tb_kriteria ORDER BY id_kriteria ASC";
$rs_kriteria = mysqli_query($koneksi, $query_rs_kriteria) or die(mysqli_error($koneksi));
$row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria);
$totalRows_rs_kriteria = mysqli_num_rows($rs_kriteria);

$colname_rs_alternatif = "-1";
if (isset($_GET['id_alternatif'])) {
  $colname_rs_alternatif = $_GET['id_alternatif'];
}
mysqli_select_db($koneksi, $database_koneksi);
$query_rs_alternatif = sprintf("SELECT * FROM tb_alternatif WHERE id_alternatif = %s", GetSQLValueString($koneksi, $colname_rs_alternatif, "int"));
$rs_alternatif = mysqli_query($koneksi, $query_rs_alternatif) or die(mysqli_error($koneksi));
$row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif);
$totalRows_rs_alternatif = mysqli_num_rows($rs_alternatif);
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<p><strong>BERIKAN NILAI BOBOT UNTUK ALTERNATIF &quot;<?php echo $row_rs_alternatif['nama_alternatif']; ?> (<?php echo $row_rs_alternatif['id_alternatif']; ?>)&quot;</strong></p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <table width="100%" class="table table-striped table-bordered">
        <thead>
          <tr bgcolor="#003366">
            <th width="5%"><span class="style1">NO.</span></th>
            <th width="67%"><span class="style1">NAMA</span></th>
            <th width="28%"><span class="style1">NILAI BOBOT</span></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; do { ?>
          <tr>
            <td align="center"><a href="?page=kriteria/update&id_kriteria=<?php echo $row_rs_kriteria['id_kriteria']; ?>"><?php echo $no; ?></a></td>
            <td><?php echo $row_rs_kriteria['nama_kriteria']; ?></td>
            <td>
                <input type="hidden" name="kriteria_id<?= $no;?>" value="<?php echo $row_rs_kriteria['id_kriteria']; ?>" size="32">
                <input type="text" name="nilai_bobot<?= $no;?>" value="" size="32">
            </td>
          </tr>
          <?php 
		  $no++;
		  } while ($row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria)); ?>
          <tr>
            <td height="43" colspan="3" align="center"><input type="submit" value="Simpan Nilai" class="btn btn-primary btn-block"></td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" name="jumlahkriteria" value="<?php echo $totalRows_rs_kriteria; ?>"> 
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    <p>&nbsp;</p>
