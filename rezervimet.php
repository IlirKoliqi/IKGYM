
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
                        <th>Trajneri</th>
                        <th>Data</th>
                        <?php  if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'admin' || $_SESSION['roli'] == 'klient')) { ?>
                        <th>Edit</th>
                        <?php  } ?>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = merrRezervimet();
                        if($result){
                            while($rezervimet = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>". $rezervimet['klientet_emri'] ."</td>";
                                echo "<td>". $rezervimet['klientet_mbiemri'] ."</td>";
                                echo "<td>". $rezervimet['kategoria_emri'] ."</td>";
                                echo "<td>". $rezervimet['trajneret_emri'] ."</td>";
                                echo "<td>". $rezervimet['dataerezervimit'] ."</td>";
                                if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'admin' || $_SESSION['roli'] == 'klient')) {
                                echo "<td><a href='shto_modifiko_rezervime.php?rezervimiid=".$rezervimet['rezervimiid'] . "'><i class='fas fa-edit'></i></a></td>";
                                }
                               ?>
                                <td>
                                     <form action="fshij_rezervime.php" method="post">
                                    <input type="text" name="rezervimiid" hidden value="<?php echo $rezervimet['rezervimiid']; ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                            name="btnFshij" onclick="return fshijRezervim()">
                                             <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                        <script>
                            function fshijRezervim() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini Rezervimin?');
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
            <?php  if(isset($_SESSION['id']) && ($_SESSION['roli'] == 'admin' || $_SESSION['roli'] == 'klient')) { ?>
            <a href="shto_modifiko_rezervime.php" id="add_entity" ><i class="fas fa-plus"></i> Shto Rezervime</a>
            <?php  } ?>
            <h1 class ="tablename">Rezervimet</h1>
</div>


            













<?php
include 'inc/footer.php';
?>
