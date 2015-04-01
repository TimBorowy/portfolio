<?php
if(isset($_POST['username'])) {
    //waar in te kijken
    $username = $_POST["username"];
    $sql = "SELECT * FROM account WHERE username= '$username' ";
    $query = $db->prepare($sql);
    $query->execute();
    //array van resultaat maken
    $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);
    //resultaat open maken en password checken
    foreach ($globalResult as $result) {
        $passResult = $result['wachtwoord'];
    }
    if(isset($passResult)) {
        $passResult = $result['wachtwoord'];

        if (hash('sha256', $_POST['password']) == $passResult) {
            $tpl->newBlock('message');
            $tpl->assign('Message', 'login succes!');

            header('Refresh: 0.6; URL=index.php');
            $_SESSION['userDetails'] = $result;
            $_SESSION['logStat'] = true;
        }
        else {
            $tpl->newBlock('message');
            $tpl->assign('Message', 'wachtwoord niet correct :(');
        }
    }
    else{
        $tpl->newBlock('message');
        $tpl->assign('Message', 'username niet gevonden :(');
    }
}