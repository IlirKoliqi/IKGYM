<?php
    session_start();
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
    $klientiid = $_POST['klientet'];
    $kategoriaiid = $_POST['kategoria'];
    $dataeRezervimit = $_POST['data'];
    $res = shtoRezervime($klientiid,$kategoriaiid,$dataeRezervimit);
    if($res){
        header("Location: rezervimet.php");
    }
  }
  if(isset($_POST['modifiko'])){
    $rezervimiid = $_GET['rezervimiid'];
    $klientiid = $_POST['klientet'];
    $kategoriaiid = $_POST['kategoria'];
    $dataeRezervimit = $_POST['data'];
    $res = modifikoRezervime($rezervimiid , $klientiid , $kategoriaiid , $dataeRezervimit);
    if($res){
        header("Location: rezervimet.php");
    }
  }
  ?>    

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>
<form method="post">
<?php if(isset($_GET['rezervimiid'])) {
        $rezervimi = mysqli_fetch_assoc(merrRezervimetid($_GET['rezervimiid']));   }  ?>
        <?php  if(isset($_SESSION['id']) && $_SESSION['roli'] == 'admin') {  ?>
   <div>
    
                <select id="klienti" name="klientet">
                    <option value="">Zgjedh klientin </option>
                    <?php
                     $klienti = merrKlientet();
                     if($klienti){
                         while($klientet = mysqli_fetch_assoc($klienti)){
                             echo '<option value="'.$klientet['klientiid'].'">'.$klientet['emri'].'</option>'; 
                         }
                     }
                    
                    ?>
                </select>
            </div>
            <?php  }else { ?>
            <div hidden>
                <label for="klienti">Klienti</label>
                <input type="text" id="klienti" name="klientet" readonly value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']?>">
        </div>
        <?php  } ?>
<div>
            <select id="kategoria" name="kategoria">
                    <option value="">Zgjedh kategorin </option>
                    <?php
                     $kategoria = merrKategorit();
                     if($kategoria){
                         while($kategorit = mysqli_fetch_assoc($kategoria)){
                             echo '<option value="'.$kategorit['kategoriaiid'].'">'.$kategorit['kategorite_emri'].'</option>'; 
                         }
                     }
                    ?>
                </select>
            </div>
            <div class="form-field">
    <input type="date" placeholder="data" name="data" required value="<?php if(isset($_GET['rezervimiid'])) echo $rezervimi['dataerezervimit'];  ?>" />
  </div>
  <?php if(isset($_GET['rezervimiid'])){ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="modifiko">Modifiko</button>
  </div>
    <?php  }else{ ?>
  <div class="form-field">
    <button class="btn" type="submit" name="shto">Shto</button>
  </div>
  <?php    } ?>
  <?php if(isset($_GET['rezervimiid'])) { ?>
  <div class="label">
    <label style="font-size:20px">Modifikimi per Rezervime</a></label>
  </div>
  <?php }else{ ?>
  <div class="label">
    <label style="font-size:20px;">Shtimi per Rezervime</a></label>
  </div>
  <?php } ?>
  <div class="home">
    <label><a href="home.php" class="signup">Home</a></label>
  </div>
</form>
<!-- partial -->
</body>
</html>
