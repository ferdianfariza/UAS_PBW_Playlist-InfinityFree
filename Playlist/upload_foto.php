<?php
function upload_foto($File)
{
   $uploadOk = 1;
   $hasil = array();
   $message = '';

   // File properties:
   $FileName = $File['name'];
   $TmpLocation = $File['tmp_name'];
   $FileSize = $File['size'];

   // Figure out file extension:
   $FileExt = explode('.', $FileName);
   $FileExt = strtolower(end($FileExt));

   // Allowed files:
   $Allowed = array('jpg', 'png', 'gif', 'jpeg', 'jfif');

   // Check file size (500 KB)
   if ($FileSize > 500000) {
      $message .= "Sorry, your file is too large, max 500KB. ";
      $uploadOk = 0;
   }

   // Check file extension
   if (!in_array($FileExt, $Allowed)) {
      $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
      $uploadOk = 0;
   }

   // Check MIME type for extra security
   $FileMime = mime_content_type($TmpLocation);
   $AllowedMime = array('image/jpeg', 'image/png', 'image/gif');
   if (!in_array($FileMime, $AllowedMime)) {
      $message .= "Sorry, the file type is not allowed. ";
      $uploadOk = 0;
   }

   // Check if upload is allowed
   if ($uploadOk == 0) {
      $message .= "Sorry, your file was not uploaded. ";
      $hasil['status'] = false;
   } else {
      // Ensure upload directory exists
      if (!is_dir("img/")) {
         mkdir("img/", 0777, true);
      }

      // Create new filename:
      $NewName = date("YmdHis") . '.' . $FileExt;
      $UploadDestination = "img/" . $NewName;

      if (move_uploaded_file($TmpLocation, $UploadDestination)) {
         $message .= $NewName;
         $hasil['status'] = true;
         $hasil['filename'] = $NewName;
      } else {
         $message .= "Sorry, there was an error uploading your file. ";
         $hasil['status'] = false;
      }
   }

   $hasil['message'] = $message;
   return $hasil;
}
