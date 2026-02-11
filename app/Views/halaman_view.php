<?php
foreach ($mahasiswa as $key) : ?>
    NIM : <?php echo $key['nim']; ?><br>
    Nama : <?php echo $key['nama']; ?><br>
    Alamat : <?php echo $key['alamat']; ?><br>
    Handphone : <?php echo $key['no_hp']; ?><br>
    <hr>
<?php endforeach; ?>