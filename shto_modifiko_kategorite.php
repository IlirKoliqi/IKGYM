<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['roli'] != 'admin'){

header("Location: home.php");
}
  ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>IKGYM</title>
  <?php
    include 'inc/functions.php';
  ?>
  <link rel="stylesheet" href="loginsignup.css">
  <?php
  if(isset($_POST['shto'])){
    $trajneriid = $_POST['trajneret'];
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $res = shtoKategori($trajneriid , $emri , $pershkrimi);
    if($res){
        header("Location: kategorite.php");
    }
  }
  if(isset($_POST['modifiko'])){
    $kategoriaiid = $_GET['kategoriaiid'];
    $trajneriid = $_POST['trajneret'];
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $res = modifikoKategori($kategoriaiid , $trajneriid , $emri , $pershkrimi);
    if($res){
        header("Location: kategorite.php");
    }
  }
  ?>    

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>
<form method="post">
<?php if(isset($_GET['kategoriaiid'])) {
        $kategoria = mysqli_fetch_assoc(merrKategoriID($_GET['kategoriaiid']));   }  ?>
  <div class="form-field">
    <input type="text" placeholder="Emri" name="emri" required value="<?php if(isset($_GET['kategoriaiid'])) echo $kategoria['emri'];  ?>" />
  </div>
  <div class="form-field">
    <input type="text" placeholder="Pershkrimi" name="pershkrimi" value="<?php if(isset($_GET['kategoriaiid'])) echo $kategoria['pershkrimi'];  ?>" required/>
  </div>
   <div>
                <select id="trajneret" name="trajneret">
                    <option value="">Zgjedh trajnerin </option>
                    <?php
                     $trajneri = merrTrajneret();
                     if($trajneri){
                         while($trajneret = mysqli_fetch_assoc($trajneri)){
                             echo '<option value="'.$trajneret['trajneriid'].'">'.$trajneret['emri'].'</option>'; 
                         }
                     }
                    ?>
                </select>
            </div>
  <?php if(isset($_GET['kategoriaiid'])){ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="modifiko">Modifiko</button>
  </div>
    <?php  }else{ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="shto">Shto</button>
  </div>
  <?php    } ?>
  <?php if(isset($_GET['kategoriaiid'])) { ?>
  <div class="label">
    <label style="font-size:20px">Modifikimi per Kategori</a></label>
  </div>
  <?php }else{ ?>
  <div class="label">
    <label style="font-size:20px;">Shtimi per Kategori</a></label>
  </div>
  <?php } ?>
  <div class="home">
    <label><a href="home.php" class="signup">Home</a></label>
  </div>
</form>
<!-- partial -->
</body>
</html>
