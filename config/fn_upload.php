<?
function UploadFotoGuru($fupload_name){
  //direktori banner
  $folder_target = "../../../images/";
  $gambar = $folder_target . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto_guru"]["tmp_name"], $gambar);
}
?>