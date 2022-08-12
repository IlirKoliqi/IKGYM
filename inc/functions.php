<?php

$dbcon = '';
dbCon();

function dbCon(){
    global $dbcon;
    $dbcon = mysqli_connect('localhost' , 'root' , '' , 'ikgym');
    if(!$dbcon){
        die("Lidhja me databaze deshtoj " . mysqli_error($dbcon));
    }

    /** Funksioni logIn per Klient */

    function Login($email , $password){
        global $dbcon;
        $query = "SELECT * FROM klientet WHERE email = '$email'";
        $result = mysqli_query($dbcon , $query);
        if($result){
            $res = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 1){
                if($password === $res['fjalekalimi']){
                    header("Location: home.php");
                    session_start();

                    $_SESSION['id'] = $res['klientiid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                }else {
                    echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
                }
            }else {
                echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
            }

        }
    }
    /** Funksioni logIn per Klient */

    /** Funksioni logIn per Trajner */

    function LoginTrajner($email , $password){
        global $dbcon;
        $query = "SELECT * FROM `trajneret` WHERE email = '$email'";
        $result = mysqli_query($dbcon , $query);
        if($result){
            $res = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 1){
                if($password === $res['fjalekalimi']){
                    header("Location: home.php");
                    session_start();

                    $_SESSION['tid'] = $res['trajneriid'];
                    $_SESSION['emri'] = $res['emri'];
                    $_SESSION['mbiemri'] = $res['mbiemri'];
                    $_SESSION['roli'] = $res['roli'];
                }else {
                    echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
                }
            }else {
                echo "<script>alert('Email ose Password nuk eshte ne rregull!')</script>";
            }

        }
    }
    /** Funksioni logIn per Trajner */

    /** Funksioni per Regjistrim */

    function regjistrohu($emri , $mbiemri , $telefoni , $email , $fjalekalimi){
        global $dbcon;
        $query = "SELECT * FROM klientet WHERE email = '$email'";
        $result = mysqli_query($dbcon , $query);
        if($result){
            $res = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 0){
                $query = "INSERT INTO `klientet`(`emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `roli`) 
                VALUES ('$emri','$mbiemri','$telefoni','$email','$fjalekalimi','klient')";
                $result1 = mysqli_query($dbcon , $query);
                if($result1){
                    Login($email , $fjalekalimi);
                }
            }else {
                echo "<script>alert('Ekziston nje llogari me kete email!');</script>";
            }
        }
    }
    /** Funksioni per Regjistrim */

    /** Funksionet per Klientet */
    function  merrKlientet(){
        global $dbcon;
        $query = "SELECT * FROM `klientet`";
        $result = mysqli_query($dbcon , $query);
        return $result;
    }
    function merrKlientiID($id){
        global $dbcon;
        $query = "SELECT * FROM `klientet` WHERE klientiid = $id";
        $result = mysqli_query($dbcon , $query);
        return $result;
    }
    
}
    function fshijKlient($id){
        global $dbcon;
        $query = "DELETE FROM `klientet` WHERE  `klientiid` =$id";
        $result = mysqli_query($dbcon, $query);
        return $result;
}

    function modifikoKlient($klientiid, $emri, $mbiemri, $telefoni, $email, $passwordi,$roli){
        global $dbcon;
        $query ="UPDATE `klientet` SET `emri`='$emri',`mbiemri`='$mbiemri',`telefoni`='$telefoni',`email`='$email',`fjalekalimi`='$passwordi',`roli`='$roli' WHERE klientiid=$klientiid";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function shtoKlient($emri, $mbiemri, $telefoni, $email, $passwordi,$roli){
        global $dbcon;
        $query = "INSERT INTO `klientet`(`emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `roli`) VALUES ('$emri','$mbiemri','$telefoni','$email','$passwordi','$roli')";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }


/** Funksionet per Klientet */


/** Funksionet per Trajneret */

    function merrTrajneret(){
        global $dbcon;
        $query = "SELECT * FROM `trajneret`";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function merrTrajneriID($id){
        global $dbcon;
        $query = "SELECT * FROM `trajneret` WHERE trajneriid = $id";
        $result = mysqli_query($dbcon , $query);
        return $result;

    }
    function fshijTrajner($id){
        global $dbcon;
        $query = "DELETE FROM `trajneret` WHERE `trajneriid` =$id";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function modifikoTrajneret($trajneriid, $emri, $mbiemri, $telefoni, $email, $passwordi,$roli){
        global $dbcon;
        $query ="UPDATE `trajneret` SET `emri`='$emri',`mbiemri`='$mbiemri',`telefoni`='$telefoni',`email`='$email',`fjalekalimi`='$passwordi',`roli`='$roli' WHERE trajneriid=$trajneriid";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function shtoTrajner($emri, $mbiemri, $telefoni, $email, $passwordi){
        global $dbcon;
        $query = "INSERT INTO `trajneret`(`emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `roli`) VALUES ('$emri','$mbiemri','$telefoni','$email','$passwordi','trajner')";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }


/** Funksionet per Trajneret */

/** Funksionet per Kategori */
    function merrKategorit(){
    global $dbcon;
        $query = "SELECT * , trajneret.emri AS trajneret_emri , trajneret.mbiemri AS trajneret_mbiemri , kategorit.emri AS kategorite_emri 
        FROM kategorit INNER JOIN trajneret ON kategorit.trajneriid = trajneret.trajneriid";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }

    function merrKategoriID($id){
        global $dbcon;
        $query = "SELECT * FROM `kategorit` WHERE kategoriaiid= $id";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function fshijKategori($id){
        global $dbcon;
        $query = "DELETE FROM `kategorit` WHERE `kategoriaiid` =$id";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function shtoKategori($trajneriid , $emri , $pershkrimi){
        global $dbcon;
        $query = "INSERT INTO `kategorit`(`trajneriid`, `emri`, `pershkrimi`) VALUES ('$trajneriid','$emri','$pershkrimi')";
        $result = mysqli_query($dbcon , $query);
        return $result;
    }
    function modifikoKategori($kategoriaiid , $trajneriid , $emri , $pershkrimi){
        global $dbcon;
        $query = "UPDATE `kategorit` SET `trajneriid`='$trajneriid',`emri`='$emri',`pershkrimi`='$pershkrimi' WHERE kategoriaiid = $kategoriaiid";
        $result = mysqli_query($dbcon , $query);
        return $result;
    }


/** Funksionet per Kategori */


/** Funksionet per Rezervime */
    function merrRezervimet(){
        if(isset($_SESSION['id'])){
        $klientiid=($_SESSION['id']);
        }if(isset($_SESSION['tid'])){
        $trajneriid=$_SESSION['tid'];
    }
        global $dbcon;
        $query = "SELECT *, klientet.emri as klientet_emri ,klientet.mbiemri as klientet_mbiemri , kategorit.emri as kategoria_emri,trajneret.emri AS trajneret_emri FROM `rezervimet` INNER JOIN klientet ON klientet.klientiid = rezervimet.klientiid
        INNER JOIN kategorit on kategorit.kategoriaiid = rezervimet.kategoriaiid
        INNER JOIN trajneret on trajneret.trajneriid = kategorit.trajneriid";
        if(isset($_SESSION['id']) && $_SESSION['roli'] =='klient'){
            $query .= " WHERE klientet.klientiid = $klientiid";
        }
        if(isset($_SESSION['tid']) && $_SESSION['roli'] == 'trajner'){
            $query .= " WHERE trajneret.trajneriid = $trajneriid";
        }
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function merrRezervimetid($id){
        global $dbcon;
        $query = "SELECT * FROM `rezervimet` WHERE rezervimiid= $id";
    $result = mysqli_query($dbcon, $query);
    return $result;
    }
    function fshijRezervimet($id){
        global $dbcon;
        $query = "DELETE FROM `rezervimet` WHERE `rezervimiid` =$id";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
    function modifikoRezervime($rezervimiid , $klientiid , $kategoriaiid , $dataeRezervimit){
        global $dbcon;
        $query = "UPDATE `rezervimet` SET `klientiid`='$klientiid',`kategoriaiid`='$kategoriaiid',`dataerezervimit`='$dataeRezervimit' WHERE `rezervimiid` = $rezervimiid";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }

    function shtoRezervime($klientiid,$kategoriaiid,$dataeRezervimit){
        global $dbcon;
        $query = "INSERT INTO `rezervimet`(`klientiid`, `kategoriaiid`, `dataerezervimit`) VALUES ('$klientiid','$kategoriaiid','$dataeRezervimit')";
        $result = mysqli_query($dbcon, $query);
        return $result;
    }
/** Funksionet per Rezervime */
 /** Funksionet per Newsletter */

 function newsLetter($email){
    global $dbcon;
    $query = "INSERT INTO `subscribers` (`email`) VALUES ('$email')";
    $result = mysqli_query($dbcon, $query);
     return $result;
 }
 function merrSubscribers(){
    global $dbcon;
    $query = "SELECT * FROM `subscribers`";
    $result = mysqli_query($dbcon, $query);
    return $result;
}
function fshijSubscribers($id){
    global $dbcon;
    $query = "DELETE FROM `subscribers` WHERE `id` =$id";
    $result = mysqli_query($dbcon, $query);
    return $result;
}

  /** Funksionet per Newsletter */


?>