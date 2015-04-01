<?php
$sql = "SELECT * FROM blogs ORDER BY 'blogid' ";

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
        $tpl->newblock("blogDetail");
        $blogid = $_GET['blogid'];
        $sql = "SELECT * FROM blogs WHERE blogid= $blogid ";

        $query = $db->prepare($sql);
        $query->execute();
        $globalResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($globalResult as $array){
            $tpl->assign("titel", $array['titel']);
            $tpl->assign("date", $array['datum']);
            $tpl->assign("schrijver", $array['schrijver']);
            $tpl->assign("text", $array['text']);
            $blogid = $array['blogid'];
        }

        $sql = "SELECT * FROM comments WHERE blogid= $blogid ";

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
            $Forid = $blogid;

            //create comment
            $insert = $db->prepare("INSERT INTO comments SET datum= :value1, schrijver= :value2, text= :value3, blogid= :value4");

            $insert->bindparam(":value1", $Date);
            $insert->bindparam(":value2", $Writer);
            $insert->bindparam(":value3", $Text);
            $insert->bindparam(":value4", $Forid);
            $insert->execute();
            header('Location: index.php?link=blog&mode=detail&blogid=' . $blogid);
        }
        break;
    default:
        foreach($globalResult as $array){
            $tpl->newblock("blogPost");

            $tpl->assign("titel", $array['titel']);
            $tpl->assign("date", $array['datum']);
            $tpl->assign("schrijver", $array['schrijver']);
            $tpl->assign("text", $array['text']);
            $tpl->assign("blogid", $array['blogid']);
        }
        break;
}