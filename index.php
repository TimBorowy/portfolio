<?php
session_start();
include("TemplatePower/class.TemplatePower.inc.php");

if(isset($_GET['link'])){
    $link = $_GET['link'];
}
else{ $link = 'voorpagina';
}
//array maken van .tpl bestanden
$pages = array();
$files = scandir(dirname(__FILE__) . "/tpl/");

foreach($files as $file){
    if(pathinfo($file, PATHINFO_EXTENSION) == "tpl"){
        $pages[] = $file;
    }
}
//.tpl bestanden inladen
if(in_array($link . ".tpl", $pages)){
    $tpl = new TemplatePower("tpl/" . $link . ".tpl");
    $title = "else";
}else{
    $tpl = new TemplatePower("tpl/voorpagina.tpl");
    $title = "default";
}

/*
switch($link){
    case 1:
        $tpl_file = 'tpl/voorpagina.tpl';
        $title = " ";
        $titleHeader = "Voorpagina";
    case 2:
        $tpl_file = 'tpl/about.tpl';
        $title = " | Over";
        $titleHeader = "Over";
    case 3:
        $tpl_file = 'tpl/contact.tpl';
        $title = " | Contact";
        $titleHeader = "Contact";
    case 4:
        $tpl_file = 'tpl/achtergrond.tpl';
        $title = " | Achtergrond";
        $titleHeader = "Achtergrond";
    case 5:
        $tpl_file = 'tpl/opleidingen.tpl';
        $title = " | Opleidingen";
        $titleHeader = "Opleidingen";
    case 6:
        $tpl_file = 'tpl/hobbies.tpl';
        $title = " | Hobbies";
        $titleHeader = "Hobbies";
    case 7:
        $tpl_file = 'tpl/projecten.tpl';
        $title = " | Projecten";
        $titleHeader = "Projecten";
        $pageStylesheet = "<link rel='stylesheet' type='text/css' href='css/projecten.css'>";
    case 8:
        $tpl_file = 'tpl/blog.tpl';
        $title = " | Blog";
        $titleHeader = "Blog";
    case 9:
        $tpl_file = 'tpl/login.tpl';
        $title = " | Login";
        $titleHeader = "Login";
    case 10:
        $tpl_file = 'tpl/sign-up.tpl';
        $title = " | Aanmelden";
        $titleHeader = "Aanmelden";
    case 11:
        $tpl_file = 'tpl/gebruiker.tpl';
        $title = " | Gebruiker";
        $titleHeader = "Gebruiker";
    case "comment":
        $tpl_file = 'tpl/adm_comment.tpl';
        $title = " | Gebruiker";
        $titleHeader = "comment admin";
    case "blog":
        $tpl_file = 'tpl/adm_blog.tpl';
        $title = " | Gebruiker";
        $titleHeader = "blog admin";
    case "projects":
        $tpl_file = 'tpl/adm_projects.tpl';
        $title = " | Gebruiker";
        $titleHeader = "projects admin";
    case "user":
        $tpl_file = 'tpl/adm_user.tpl';
        $title = " | Gebruiker";
        $titleHeader = "user admin";
    case 12:
        $tpl_file = 'tpl/gebruiker.tpl';
        $title = " | Uitloggen";
        $titleHeader = "U bent uit gelogd";
        unset($_session['userDetails']);
    default:
        $tpl_file = 'tpl/voorpagina.tpl';
        $title = " ";
        $titleHeader = "Voorpagina";
}
*/
$tpl->assignInclude('header', 'inc/header.tpl');
$tpl->assignInclude('footer', 'inc/footer.tpl');
include_once('inc/php/PDO_verbinding.php');
$tpl->prepare();
//php begin

//titles aangeven
$tpl->assign("titleHeader", $link);
$tpl->assign('title', " | " . $link);


//login session
if(!isset($_SESSION['logStat'])){
    $_SESSION['logStat'] = false;
}
if(isset($_GET['link'])) {
    if($link == "uitloggen"){
        session_unset();
        unset($_SESSION['userDetails']);
        unset($_SESSION['logStat']);
        $_SESSION['logStat'] = false;
    }
}

//kijken voor illegale header locations
if($_SESSION['logStat'] == false){
    if($link == "gebruiker" or $link == "uitloggen"){
        header('location: index.php?link=login');
    }
}
elseif($_SESSION['logStat'] == true){
    if($link == "login" or $link == "sign-up"){
        header('location: index.php?link=voorpagina');
    }
}

//navigatie menu voor gebruikers en bezoekers
if($_SESSION['logStat'] == true){
    $tpl->newBlock('navAccount');
    $tpl->assign('username_nav', $_SESSION['userDetails']['username']);
}
else{
    $tpl->newBlock('navDefault');
}
//functies inladen
include('inc/php/functions.php');
//.php bestanden op halen
switch ($link) {
    case "projecten":
        include('inc/php/projecten.php');
        break;
    case "blog":
        include('inc/php/blog.php');
        break;
    case "login":
        include('inc/php/login.php');
        break;
    case "sign-up":
        include('inc/php/sign-up.php');
        break;
    case "gebruiker":
        include('inc/php/gebruiker.php');
        break;
    case "admin-user":
        include('inc/php/adm_user.php');
        break;
    case "admin-blog":
        include('inc/php/adm_blog.php');
        break;
    case "admin-projects":
        include('inc/php/adm_project.php');
        break;
}
//mail('blastertimbo@gmail.com', 'test subject', 'hallo dit is test text');




$tpl->printToScreen();
?>