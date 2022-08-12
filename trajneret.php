
<?php
include 'inc/header.php';
?>


<div class = "klientet">
<table class="table">
                <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Telefoni</th>
                        <th>Email</th>
                        <?php  if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin') { ?>
                        <th>Edit</th>
                        <th>Delete</th>
                        <?php  } ?>


                    </tr>
                </thead>
                <tbody>
                   <?php
                         $result = merrTrajneret();
                         if($result){
                            while($trajneret = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$trajneret['emri']."</td>";
                                echo "<td>".$trajneret['mbiemri']."</td>";
                                echo "<td>".$trajneret['telefoni']."</td>";
                                echo "<td>".$trajneret['email']."</td>";
                                if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin') {
                                echo "<td><a href='shto_modifiko_trajner.php?trajneriid=".$trajneret['trajneriid'] . "'><i class='fas fa-edit'></i></a></td>";
                                }
                               ?>
                              <?php  if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin') { ?>

                                <td>
                                     <form action="fshij_trajner.php" method="post">
                                    <input type="text" name="trajneriid" hidden value="<?php echo $trajneret['trajneriid']; ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                            name="btnFshij" onclick="return fshijtrajner()">
                                             <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                        <script>
                            function fshijtrajner() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini Trajnerin?');
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
            <?php  if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin') { ?>

            <a href="shto_modifiko_trajner.php" id="add_entity" ><i class="fas fa-plus"></i> Shto Trajner</a>
            <?php  } ?>
            <h1 class ="tablename">Trajneret</h1>
</div>

            













<?php
include 'inc/footer.php';
?>
