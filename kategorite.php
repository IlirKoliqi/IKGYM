
<?php
include 'inc/header.php';
?>

<div class = "klientet">
<table class="table">
                <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Kategoria</th>
                        <th>Pershkrimi</th>
                        <?php
                                if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin'){
                        ?>
                        <th>Edit</th>
                        <th>Delete</th>
                        <?php  } ?>


                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = merrKategorit();
                        if($result){
                            while($kategorit = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$kategorit['trajneret_emri'] ."</td>";
                                echo "<td>".$kategorit['trajneret_mbiemri'] ."</td>";
                                echo "<td>".$kategorit['kategorite_emri'] ."</td>";
                                echo "<td>".$kategorit['pershkrimi'] ."</td>";
                                if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin'){
                                echo "<td><a href='shto_modifiko_kategorite.php?kategoriaiid=".$kategorit['kategoriaiid'] . "'><i class='fas fa-edit'></i></a></td>";
                            }
                                ?>
                                <?php
                                if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin'){
                                    ?>

                                <td>
                                     <form action="fshij_kategori.php" method="post">
                                    <input type="text" name="kategoriaiid" hidden value="<?php echo $kategorit['kategoriaiid']; ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                            name="btnFshij" onclick="return fshijKategori()">
                                             <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                        <script>
                            function fshijKategori() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini Kategorin?');
                                if ($confirm) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }

                        </script>
                         </td>
                         <?php } ?>
                        <?php   
                                echo "</tr>";


                            }
                        }                 
                        ?>
                    </tbody>
                
                    </table>
                    <?php
                    if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin'){
                        ?>
                    <a href="shto_modifiko_kategorite.php" id="add_entity" ><i class="fas fa-plus"></i> Shto Kategori</a>
                   <?php   } ?>
            <h1 class ="tablename">Kategorite</h1>
</div>

<?php
include 'inc/footer.php';
?>
