<?php
$sql = "SELECT * FROM projecten ORDER BY 'projectid' ";

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
    case "detail":
        $tpl->newblock("projectDetail");
        $projectid = $_GET['projectid'];
        $sql = "SELECT * FROM projecten WHERE projectid= $projectid ";

        $query = $db->prepare($sql);
        $query->execute();
        $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($globalResult as $array){
            $tpl->assign("titel", $array['titel']);
            $tpl->assign("date", $array['datum']);
            $tpl->assign("schrijver", $array['schrijver']);
            $tpl->assign("text", $array['text']);
            $projectid = $array['projectid'];
        }

        $sql = "SELECT * FROM comments WHERE projectid= $projectid ";

        $query = $db->prepare($sql);
        $query->execute();
        $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($globalResult as $array){
            $tpl->newblock("comments");
            $tpl->assign("comm_date", $array['datum']);
            $tpl->assign("comm_schrijver", $array['schrijver']);
            $tpl->assign("comm_text", $array['text']);
        }

        if(isset($_POST['submit']) and isset($_POST['comment-text'])){
            $Date = date('Y-m-d');
            $Writer = $_SESSION['userDetails']['username'];
            $Text = $_POST["comment-text"];
            $Forid = $projectid;

            //create comment
            $insert = $db->prepare("INSERT INTO comments SET datum= :value1, schrijver= :value2, text= :value3, projectid= :value4");

            $insert->bindparam(":value1", $Date);
            $insert->bindparam(":value2", $Writer);
            $insert->bindparam(":value3", $Text);
            $insert->bindparam(":value4", $Forid);
            $insert->execute();
            header('Location: index.php?link=projecten&mode=detail&projectid=' . $projectid);
        }
        break;
    default:
        foreach($globalResult as $array){
            $tpl->newblock("project");

            $tpl->assign("titel", $array['titel']);
            $tpl->assign("date", $array['datum']);
            $tpl->assign("schrijver", $array['schrijver']);
            $tpl->assign("text", $array['text']);
            $tpl->assign("projectid", $array['projectid']);
        }
        break;
}