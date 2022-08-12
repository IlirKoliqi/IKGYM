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
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = merrSubscribers();
                        if($result){
                            while($subscribers = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>". $subscribers['email'] ."</td>";
                                ?>
                                <td>
                                     <form action="fshij_subscribers.php" method="post">
                                    <input type="text" name="id" hidden value="<?php echo $subscribers['id']; ?>">
                                        <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                            name="btnFshij" onclick="return fshijSubscriber()">
                                             <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                        <script>
                            function fshijSubscriber() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini Subscriber?');
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
            <h1 class ="tablename">Subscribers</h1>
</div>


            













<?php
include 'inc/footer.php';
?>
