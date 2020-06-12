<?php
    function dohvati_glavni_navigacioni_meni($broj){
        return executeQuery("SELECT * FROM meni WHERE prioritet=$broj");
    }
    function dohvati_navigacioni_meni(){
        return executeQuery("SELECT * FROM meni");
    }
    function dohvati_glavni_navigacioni_meni_ulogovani(){
        return executeQuery("SELECT * FROM meni WHERE prioritet=1 AND naziv != 'Logovanje'");
    }
    
    function registracija_korisnika($ime,$prezime,$email,$lozinka){
        $lozinka = md5($lozinka);
        global $conn;
            $upit = "INSERT INTO korisnici(ime, prezime, email, lozinka) VALUES (:ime, :prezime, :email, :lozinka)";
            
            $stmt = $conn->prepare($upit);
            $stmt ->bindParam(":ime",$ime);
            $stmt ->bindParam(":prezime",$prezime);
            $stmt ->bindParam(":email",$email);
            $stmt ->bindParam(":lozinka",$lozinka);

           $rez= $stmt->execute();
           return $rez;
    }
    function logovanje_korisnika($email,$lozinka){
    $lozinka=md5($lozinka);
            global $conn;
            $upit="SELECT * FROM korisnici k INNER JOIN uloge u ON k.idUloga=u.idUloga WHERE email=:email AND lozinka=:password ";

            $stmt=$conn->prepare($upit);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$lozinka);

            $stmt->execute();
            $user = $stmt->fetch();
            return $user;
    }

    function dohvati_sve($tabela){
        return executeQuery("SELECT * FROM $tabela");
    }
    function insert_kategirije($naziv){
        global $conn;
        $upit="INSERT INTO kategorije VALUES (NULL, ?)";

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naziv);

        $rez = $stmt->execute();
        return $rez;
        
    }
    function dohvati_jedan_zapis($tabela,$kolona,$id){
        global $conn;
        $upit="SELECT * FROM $tabela WHERE $kolona = ?" ;

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$id);
        
        $stmt->execute();
        $rez = $stmt->fetch();
        return $rez;
        
    }
    function edit_kategirije($naziv, $id){
        global $conn;
        $upit="UPDATE kategorije SET naziv = ? WHERE idKategorije=?" ;

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naziv);
        $stmt->bindValue(2,$id);
        
        $rez = $stmt->execute();
        return $rez;
        
    }
    //MENIIII
    function edit_menija($naziv, $id){
        global $conn;
        $upit="UPDATE meni SET naziv = ? WHERE idMeni=?" ;

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naziv);
        $stmt->bindValue(2,$id);
        
        $rez = $stmt->execute();
        return $rez;
        
    }
    function brisanje_jednog_zapisa($tabela,$kolona,$id){
        global $conn;
        $upit="DELETE FROM $tabela WHERE $kolona = ?";

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$id);

        $rez = $stmt->execute();
        return $rez;
    }
   
//SLIKEEEE
function getOne($id){
    global $conn;
    $result = $conn->prepare("SELECT * FROM slike WHERE id = ?");
    $result->execute([$id]);
    return $result->fetch();
}

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
   
    global $conn; 
    $insert = $conn->prepare("INSERT INTO slike VALUES('', ?, ?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika]);
    $last_id = $conn->lastInsertId();

    return $last_id;
}
function upis_vesti($naslov,$tekst,$idKat,$idSlike){
        global $conn;
        $upit="INSERT INTO vesti(naslov,tekst,idKategorije,idSlika) VALUES (?,?,?,?)";

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naslov);
        $stmt->bindValue(2,$tekst);
        $stmt->bindValue(3,$idKat);
        $stmt->bindValue(4,$idSlike);

        $rez = $stmt->execute();
        return $rez;
        
}
function  dohvatiPostove(){
    return executeQuery("SELECT * FROM vesti v JOIN slike s ON v.idSlika=s.idSlika JOIN kategorije k ON k.idKategorije=v.idKategorije");
}
function  dohvati_najnovije_vesti(){
    return executeQuery("SELECT * FROM vesti v JOIN slike s ON v.idSlika=s.idSlika JOIN kategorije k ON k.idKategorije=v.idKategorije ORDER BY v.datum DESC LIMIT 0,3");
}
//MENI 
function insert_meni($naziv){
    global $conn;
    $upit="INSERT INTO meni(naziv) VALUES (?)";

    $stmt=$conn->prepare($upit);
    $stmt->bindValue(1,$naziv);

    $rez = $stmt->execute();
    return $rez;
    
}
define("NEWS_OFFSET", 3);
function get_num_of_news(){
    return executeQueryOneRow("SELECT COUNT(*) AS num_of_news FROM vesti");
}

function get_pagination_count(){
    $result = get_num_of_news();
    $num_of_news = $result->num_of_news;

    return ceil($num_of_news / NEWS_OFFSET);
}
 

function dohvati_vestiSlike($limit = 0){
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM vesti v INNER JOIN slike s ON v.idSlika = s.idSlika LIMIT :limit, :offset");

        $limit = ((int) $limit) * NEWS_OFFSET;

        $select->bindParam(":limit", $limit, PDO::PARAM_INT); 

        $offset = NEWS_OFFSET;
        $select->bindParam(":offset", $offset, PDO::PARAM_INT);

        $select->execute(); 

        $news = $select->fetchAll();

        return $news;
    }
    catch(PDOException $ex){
        return null;
    }
}
function dohvati_jednuVest($id){
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM vesti v INNER JOIN slike s ON v.idSlika = s.idSlika WHERE idVesti=:id");


        $select->bindParam(":id", $id); 


        $select->execute(); 

        $news = $select->fetch();

        return $news;
    }
    catch(PDOException $ex){
        return null;
    }
}
function kategorijePostova($id){
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM vesti v INNER JOIN slike s ON v.idSlika = s.idSlika JOIN kategorije k ON k.idKategorije=v.idKategorije WHERE k.idKategorije=:id ");


        $select->bindParam(":id",$id); 

        $select->execute(); 

        $news = $select->fetchAll();

        return $news;
    }
    catch(PDOException $ex){
        return null;
    }
}

function  sortPostova($id){
    $upit = "SELECT * FROM vesti v JOIN slike s ON v.idSlika=s.idSlika JOIN kategorije k ON k.idKategorije=v.idKategorije ORDER BY v.datum";
    if($id == "datumNajnovije"){
        $upit .= " DESC";
    }
    return executeQuery($upit);
}
?>