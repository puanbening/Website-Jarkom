<?php include("inc_header.php")?>
        <?php

        $success = "";
        $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] :"";
        if(isset($_GET['op'])){
            $op = $_GET['op'];
        }else {
            $op ="";
        }

        if($op == 'delete'){
            $ID    = $_GET['ID'];
            $sql1   = "delete from halaman where ID = '$ID'";
            $q1     = mysqli_query($conn, $sql1);
            
            if($q1){
                $success    = "Yeayy, data berhasil dihapus!";
            }
        }
        ?>
        <h1>Home<h1>
        <p>
            <a href="halaman_input.php">
                <input type="button" class="btn btn-primary" value="Input Data Baru"/>
            </a>
        </p>
        <?php
        if($success) {
            ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $success ?>
                </div>
            <?php
        }
        ?>

        <table class="table table-striped">
            <thead>
                <tr style="font-size: 12px;">
                    <th class="col-1">#</th>
                    <th>Judul</th>
                    <th>Kutipan</th>
                    <th class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1   = "select * from halaman order by ID desc";
                $q1     = mysqli_query($conn, $sql1);
                $nomor  = 1;
                while($r1 = mysqli_fetch_array($q1)) {
                    ?>
                        <tr style="font-size: 12px";>
                            <td><?php echo $nomor++?> </td>
                            <td><?php echo $r1['Judul']?></td>
                            <td><?php echo $r1['Kutipan']?></td>
                            <td>
                                <a href="halaman_input.php?ID=<?php echo $r1['ID']?>">
                                <span class="badge bg-warning text-dark">Edit</span>
                                </a>
                                <a href="halaman.php?op=delete&ID=<?php echo $r1['ID'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                <span class="badge bg-danger">Delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                
            </tbody>
        </table>
<?php include("inc_footer.php")?>