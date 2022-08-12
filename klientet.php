<?php
include 'inc/header.php';
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>


<div class = "klientet">
<table class="table">
                <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Telefoni</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = merrKlientet();
                        if($result){
                            while($klientet = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>". $klientet['emri'] ."</td>";
                                echo "<td>". $klientet['mbiemri'] ."</td>";
                                echo "<td>". $klientet['telefoni'] ."</td>";
                                echo "<td>". $klientet['email'] ."</td>";
                                echo "<td><a href='shto_modifiko_klient.php?klientiid=".$klientet['klientiid'] . "'><i class='fas fa-edit'></i></a></td>";
                                ?>
                                <td>
                                     <form action="fshij_klient.php" method="post">
                                    <input type="text" name="klientiid" hidden value="<?php echo $klientet['klientiid']; ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                            name="btnFshij" onclick="return fshijKlient()">
                                             <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                        <script>
                            function fshijKlient() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini Klientet?');
                                if ($confirm) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }

                        </script>
                         </td>
                         <?php
                                echo "</tr>";
                            }
                        }

                    ?>

                </tbody>
            </table>
            <a href="shto_modifiko_klient.php" id="add_entity" ><i class="fas fa-plus"></i> Shto Klient</a>
            <h1 class ="tablename">Klientet</h1>
</div>


            













<?php
include 'inc/footer.php';
?>
