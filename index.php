<?php
session_start();
    require_once "config/connection.php";
    include "views/fixed/head.php";
    include "views/fixed/header.php";


if(isset($_GET['page'])){
    switch($_GET['page'])
    {
      case 'pocetna':
        include "views/pages/pocetna.php";
        break;
      case 'registracija': 
        include "views/pages/registracija.php";
        break;
      case 'logovanje': 
        include "views/pages/logovanje.php";
        break;
      case 'autor': 
        include "views/pages/autor.php";
        break;
      case 'contact': 
        include "views/pages/contact.php";
        break;
      case 'admin': 
        include "views/admin/adminPanel.php";
        break;
      case 'post': 
        include "views/pages/post.php";
        break;
      case 'postovi': 
        include "views/pages/postovi.php";
        break;
    }
  } else {
    include "views/pages/pocetna.php";
  }
        include "views/fixed/footer.php";
?>