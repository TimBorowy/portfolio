<?php
$sql = "SELECT * FROM blogs";
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
        $tpl->newBlock("blogToevoegen");
        if(isset($_POST["titel"]) and isset($_POST["text"])) {

            $Date = date('Y-m-d');
            $Writer = $_SESSION['userDetails']['username'];
            $Title = $_POST["titel"];
            $Text = $_POST["text"];

            //create blog
            $insert = $db->prepare("INSERT INTO blogs SET datum= :value1, schrijver= :value2, titel= :value3, text= :value4");

            $insert->bindparam(":value1", $Date);
            $insert->bindparam(":value2", $Writer);
            $insert->bindparam(":value3", $Title);
            $insert->bindparam(":value4", $Text);
            $insert->execute();
            header('location: index.php?link=admin-blog');

            //$blogStat = "nieuwe blog aan gemaakt! :D";
        }
        break;
    case "edit":
        $tpl->newBlock('blogEdit');
        $blogid = $_GET['blogid'];

        $sql = "SELECT * FROM blogs WHERE blogid=$blogid";
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

                $update = $db->prepare("UPDATE blogs SET titel= :value1, text= :value2 WHERE blogid= :blogid ");
                $update->bindparam(":value1", $_POST['titel']);
                $update->bindparam(":value2", $_POST['text']);
                $update->bindparam(":blogid", $result['blogid']);
                $update->execute();
                header('location: index.php?link=admin-blog');
            }
        }
        break;
    case "delete":
        $tpl->newBlock('message');
        $tpl->assign('Message', 'wil je deze blog verwijderen?');
        $tpl->newBlock('question');

        $delete = $db->prepare("DELETE FROM blogs WHERE blogid = :blogid");
        $delete->bindParam(":blogid", $_GET['blogid']);
        $delete->execute();

        $delete = $db->prepare("DELETE FROM comments WHERE blogid = :blogid");
        $delete->bindParam(":blogid", $_GET['blogid']);
        $delete->execute();

        break;
    case "search":
        
        break;
    default:
        $tpl->newBlock("blogLijst");
        foreach($globalResult as $result){
            $tpl->newBlock("blogRow");
            $tpl->assign("blogId", $result['blogid']);
            $tpl->assign("datum", $result['datum']);
            $tpl->assign("schrijver", $result['schrijver']);
            $tpl->assign("titel", $result['titel']);
        }
        break;
}