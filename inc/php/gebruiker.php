<?php
    foreach($_SESSION['userDetails'] as $details){
        $tpl->newBlock("userDetails");
        $tpl->assign("details", $details);
    }
    if($_SESSION['logStat'] == 1){
        $tpl->assign("logStat", "logStat = true");
    }
    else{
        $tpl->assign("logStat", "logStat = false");
    }

$sql = "SELECT * FROM account";
$query = $db->prepare($sql);
$query->execute();

$globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($globalResult as $result){
    $tpl->newBlock("userList");
    $tpl->assign("userNames", $result['username']);
    $tpl->assign("userRole", $result['role']);
    $tpl->assign('selected' . $result['role'] , 'selected="selected"');

    $username = $result['username'];

    if(isset($_POST['submit'])){
        $role = $_POST[$username];
        $insert = $db->prepare("UPDATE account SET role = :value1 WHERE username= :username  ");
        $insert->bindparam(":value1", $role);
        $insert->bindparam(":username", $username);
        $insert->execute();
    }
}
