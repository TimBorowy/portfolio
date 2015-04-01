<?php
$sql = "SELECT * FROM projecten";
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
        $tpl->newBlock("projectToevoegen");
        if(isset($_POST["titel"]) and isset($_POST["text"])) {

            $Date = date('Y-m-d');
            $Writer = $_SESSION['userDetails']['username'];
            $Title = $_POST["titel"];
            $Text = $_POST["text"];

            //create project
            $insert = $db->prepare("INSERT INTO projecten SET datum= :value1, schrijver= :value2, titel= :value3, text= :value4");

            $insert->bindparam(":value1", $Date);
            $insert->bindparam(":value2", $Writer);
            $insert->bindparam(":value3", $Title);
            $insert->bindparam(":value4", $Text);
            $insert->execute();
            header('location: index.php?link=admin-projects');

            //$Stat = "nieuw project aangemaakt! :D";
        }
        break;
    case "edit":
        $tpl->newBlock('projectEdit');
        $projectid = $_GET['projectid'];

        $sql = "SELECT * FROM projecten WHERE projectid=$projectid";
        $query = $db->prepare($sql);
        $query->execute();
        $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($globalResult as $result){
            $tpl->assign("titel", $result['titel']);
            $tpl->assign("text", $result['text']);
        }
        if(isset($_POST['submit'])){
            if($result['titel'] != $_POST['titel'] or
                $result['text'] != $_POST['text']){

                $update = $db->prepare("UPDATE projecten SET titel= :value1, text= :value2 WHERE projectid= :projectid ");
                $update->bindparam(":value1", $_POST['titel']);
                $update->bindparam(":value2", $_POST['text']);
                $update->bindparam(":projectid", $result['projectid']);
                $update->execute();
                header('location: index.php?link=admin-projects');
            }
        }
        break;
    case "delete":
        $tpl->newBlock('message');
        $tpl->assign('Message', 'wil je dit project verwijderen?');
        $tpl->newBlock('question');

        $delete = $db->prepare("DELETE FROM projecten WHERE projectid = :projectid");
        $delete->bindParam(":projectid", $_GET['projectid']);
        $delete->execute();

        $delete = $db->prepare("DELETE FROM comments WHERE projectid = :projectid");
        $delete->bindParam(":projectid", $_GET['projectid']);
        $delete->execute();

        break;
    default:
        $tpl->newBlock("projectenLijst");
        foreach($globalResult as $result){
            $tpl->newBlock("projectenRow");
            $tpl->assign("projectId", $result['projectid']);
            $tpl->assign("datum", $result['datum']);
            $tpl->assign("schrijver", $result['schrijver']);
            $tpl->assign("titel", $result['titel']);
        }
        break;
}