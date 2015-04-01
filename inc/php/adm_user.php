<?php
$sql = "SELECT * FROM account";
$query = $db->prepare($sql);
$query->execute();
$globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
else{
    $mode = NULL;
}
switch($mode){
    case "add":
        $tpl->newBlock("userToevoegen");
        if(isset($_POST['submit'])) {
            $Vnaam = $_POST["voornaam"];
            $Anaam = $_POST["achternaam"];
            $Username = $_POST["username"];
            $Wachtwoord = hash('sha256', $_POST["wachtwoord"]);
            $Geboorte_dat = $_POST["geboortedatum"];
            $Geslacht = $_POST["geslacht"];
            $Email = $_POST["email"];
            $Role = $_POST['role'];

            //include_once('PDO_verbinding.php');

            $username = $_POST["username"];
            $sql = "SELECT * FROM account WHERE username= '$username' ";
            $query = $db->prepare($sql);
            $query->execute();

            $count = $query->rowCount();

            if ($count > 0) {
                //throw error
                $tpl->newBlock('message');
                $tpl->assign('Message', 'username bestaat al :(');

            } elseif ($_POST["wachtwoord"] !== $_POST["wachtwoord_2"]) {
                //pass error
                $tpl->newBlock('message');
                $tpl->assign('Message', 'wachtwoorden komen niet overeen :(');

            } elseif ($count == 0 and $_POST["wachtwoord"] == $_POST["wachtwoord_2"]) {
                //create account
                $insert = $db->prepare("INSERT INTO account SET vnaam= :value1, anaam= :value2, username= :value3, wachtwoord= :value4, geboortedatum= :value5, geslacht= :value6, email= :value7, role= :value8 ");

                $insert->bindparam(":value1", $Vnaam);
                $insert->bindparam(":value2", $Anaam);
                $insert->bindparam(":value3", $Username);
                $insert->bindparam(":value4", $Wachtwoord);
                $insert->bindparam(":value5", $Geboorte_dat);
                $insert->bindparam(":value6", $Geslacht);
                $insert->bindparam(":value7", $Email);
                $insert->bindparam(":value8", $Role);

                $insert->execute();

                $tpl->newBlock('message');
                $tpl->assign('Message', 'nieuwe gebruiker aan gemaakt! :D');
            }
        }
        break;
    case "edit":
        $tpl->newBlock('userEdit');
        $userid = $_GET['userid'];

        $sql = "SELECT * FROM account WHERE userid=$userid";
        $query = $db->prepare($sql);
        $query->execute();
        $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($globalResult as $result){
            $tpl->assign("username", $result['username']);
            $tpl->assign("voornaam", $result['vnaam']);
            $tpl->assign("achternaam", $result['anaam']);
            $tpl->assign("geslacht", $result['geslacht']);
            $tpl->assign("geboorte_dat", $result['geboortedatum']);
            $tpl->assign("email", $result['email']);
            $tpl->assign("role", $result['role']);
            $tpl->assign('selected' . $result['role'] , 'selected="selected"');
            $tpl->assign('checked' . $result['geslacht'] , 'checked="checked"');
        }
        if(isset($_POST['submit'])){
            if($result['username'] != $_POST['username'] or
                $result['vnaam'] != $_POST['voornaam'] or
                $result['anaam'] != $_POST['achternaam'] or
                $result['geslacht'] != $_POST['geslacht'] or
                $result['geboortedatum'] != $_POST['geboortedatum'] or
                $result['email'] != $_POST['email'] or
                $result['role'] != $_POST['role']){

                $update = $db->prepare("UPDATE account SET username= :value1, vnaam= :value2, anaam= :value3, geslacht= :value4, geboortedatum= :value5, email= :value6, role= :value7 WHERE userid= :userid ");
                $update->bindparam(":value1", $_POST['username']);
                $update->bindparam(":value2", $_POST['voornaam']);
                $update->bindparam(":value3", $_POST['achternaam']);
                $update->bindparam(":value4", $_POST['geslacht']);
                $update->bindparam(":value5", $_POST['geboortedatum']);
                $update->bindparam(":value6", $_POST['email']);
                $update->bindparam(":value7", $_POST['role']);
                $update->bindparam(":userid", $result['userid']);
                $update->execute();
                header('location: index.php?link=admin-user');
            }
        }
        break;
    case "delete":
        $tpl->newBlock('message');
        $tpl->assign('Message', 'wil je deze user verwijderen?');
        $tpl->newBlock('question');
        /*
        $delete = $db->prepare("DELETE FROM account WHERE userid = :userid");
        $delete->bindParam(":userid", $_GET['userid']);
        $delete->execute();
        */
        break;
    default:
        $tpl->newBlock("userLijst");
        foreach($globalResult as $result){
            $tpl->newBlock("userRow");
            $tpl->assign("userId", $result['userid']);
            $tpl->assign("userName", $result['username']);
            $tpl->assign("userRole", $result['role']);
        }
        break;
}