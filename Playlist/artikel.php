<div class="container py-3 mx-auto">
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-success py-2 my-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
      <i class="bi bi-plus-lg"></i> Tambah Lagu
   </button>
   <div class="row py-3">
      <div class="table-responsive">
         <table class="table table-hover rounded-4">
            <thead class="table rounded-4">
               <tr>
                  <th>No</th>
                  <th class="w-25">Judul</th>
                  <th class="w-75">Artis</th>
                  <th class="w-25">Gambar</th>
                  <th class="w-25">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $sql = "SELECT * FROM artikel ORDER BY id ASC";
               $hasil = $conn->query($sql);

               $no = 1;
               while ($row = $hasil->fetch_assoc()) {
               ?>
                  <tr>
                     <td><?= $no++ ?></td>
                     <td>
                        <strong><?= $row["judul"] ?></strong>
                        <br>oleh : <?= $row["username"] ?>
                     </td>
                     <td><?= $row["artis"] ?></td>
                     <td>
                        <?php
                        if ($row["gambar"] != '') {
                           if (file_exists('img/' . $row["gambar"] . '')) {
                        ?>
                              <img src="img/<?= $row["gambar"] ?>" width="100">
                        <?php
                           }
                        }
                        ?>
                     </td>
                     <td>
                        <a href="#" title="edit" class="badge rounded text-bg-secondary my-2" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil fs-5"></i></a>
                        <a href="#" title="delete" class="badge rounded text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-trash fs-5"></i></a>

                        <!-- Awal Modal Edit -->
                        <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Lagu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <form method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <div class="mb-3">
                                          <label for="formGroupExampleInput" class="form-label">Judul</label>
                                          <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                          <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Artikel" value="<?= $row["judul"] ?>" required>
                                       </div>
                                       <div class="mb-3">
                                          <label for="floatingTextarea2">Artis</label>
                                          <textarea class="form-control" placeholder="Tuliskan Artis Lagu " name="artis" required><?= $row["artis"] ?></textarea>
                                       </div>
                                       <div class="mb-3">
                                          <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                          <input type="file" class="form-control" name="gambar">
                                       </div>
                                       <div class="mb-3">
                                          <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                          <?php
                                          if ($row["gambar"] != '') {
                                             if (file_exists('img/' . $row["gambar"] . '')) {
                                          ?>
                                                <br><img src="img/<?= $row["gambar"] ?>" width="100">
                                          <?php
                                             }
                                          }
                                          ?>
                                          <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- Akhir Modal Edit -->

                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Lagu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <form method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <div class="mb-3">
                                          <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus lagu "<strong><?= $row["judul"] ?></strong>"?</label>
                                          <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                          <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                       <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- Akhir Modal Hapus -->
                     </td>
                  </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<!-- Awal Modal Tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Lagu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Artikel" required>
               </div>
               <div class="mb-3">
                  <label for="floatingTextarea2">Artis</label>
                  <textarea class="form-control" placeholder="Tuliskan Artis Lagu" name="artis" required></textarea>
               </div>
               <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                  <input type="file" class="form-control" name="gambar">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Akhir Modal Tambah-->



<?php
include "upload_foto.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Check if the form is for saving or deleting
   if (isset($_POST['simpan'])) {
      $judul = $_POST['judul'];
      $artis = $_POST['artis'];
      $gambar = '';
      $username = $_SESSION['username'];
      $nama_gambar = $_FILES['gambar']['name'];

      // Check if a file has been uploaded
      if ($nama_gambar != '') {
         // Call the upload_foto function to check the file specifications
         $cek_upload = upload_foto($_FILES["gambar"]);

         // Check the status of the upload
         if ($cek_upload['status']) {
            // If the upload is successful, get the file name
            $gambar = $cek_upload['message'];
         } else {
            // If the upload fails, display an error message
            echo "<script>alert('" . $cek_upload['message'] . "'); document.location='admin.php?page=artikel';</script>";
            die;
         }
      }

      // Check if an ID has been provided
      if (isset($_POST['id'])) {
         // If an ID is provided, update the data
         $id = $_POST['id'];

         // Check if a new image has been uploaded
         if ($nama_gambar == '') {
            // If no new image has been uploaded, use the old image
            $gambar = $_POST['gambar_lama'];
         } else {
            // If a new image has been uploaded, delete the old image
            unlink("img/" . $_POST['gambar_lama']);
         }

         // Prepare the SQL query to update the data
         $stmt = $conn->prepare("UPDATE artikel SET judul = ?, artis = ?, gambar = ?, username = ? WHERE id = ?");

         // Bind the parameters to the query
         $stmt->bind_param("ssssi", $judul, $artis, $gambar, $username, $id);

         // Execute the query
         $simpan = $stmt->execute();
      } else {
         // If no ID is provided, insert new data
         // Prepare the SQL query to insert the data
         $stmt = $conn->prepare("INSERT INTO artikel (judul, artis, gambar, username) VALUES (?, ?, ?, ?)");

         // Bind the parameters to the query
         $stmt->bind_param("ssss", $judul, $artis, $gambar, $username);

         // Execute the query
         $simpan = $stmt->execute();
      }

      // Check if the query was successful
      if ($simpan) {
         // If the query was successful, display a success message
         echo "<script>alert('Simpan data sukses'); document.location='admin.php?page=artikel';</script>";
      } else {
         // If the query failed, display an error message
         echo "<script>alert('Simpan data gagal'); document.location='admin.php?page=artikel';</script>";
      }

      // Close the statement and connection
      $stmt->close();
      $conn->close();
   } elseif (isset($_POST['hapus'])) {
      // If the form is for deleting, get the ID and image name
      $id = $_POST['id'];
      $gambar = $_POST['gambar'];

      // Check if an image has been uploaded
      if ($gambar != '') {
         // If an image has been uploaded, delete the image file
         unlink("img/" . $gambar);
      }

      // Prepare the SQL query to delete the data
      $stmt = $conn->prepare("DELETE FROM artikel WHERE id = ?");

      // Bind the parameter to the query
      $stmt->bind_param("i", $id);

      // Execute the query
      $hapus = $stmt->execute();

      // Check if the query was successful
      if ($hapus) {
         // If the query was successful, display a success message
         echo "<script>alert('Hapus data sukses'); document.location='admin.php?page=artikel';</script>";
      } else {
         // If the query failed, display an error message
         echo "<script>alert('Hapus data gagal'); document.location='admin.php?page=artikel';</script>";
      }

      // Close the statement and connection
      $stmt->close();
      $conn->close();
   }
}
