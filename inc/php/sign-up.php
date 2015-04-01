<?php
if(isset($_POST["v_naam"]) /*and $_POST["wachtwoord"] == $_POST["wachtwoord_2"]*/) {
	$Vnaam = $_POST["v_naam"];
	$Anaam = $_POST["a_naam"];
	$Username = $_POST["username"];
	$Wachtwoord = hash('sha256', $_POST["wachtwoord"]);
	$Geboorte_dat = $_POST["geboorte_dat"];
	$Geslacht = $_POST["geslacht"];
    $Email = $_POST["email"];

	$username = $_POST["username"];
	$sql = "SELECT * FROM account WHERE username= '$username' ";
	$query = $db->prepare($sql);
	$query->execute();

	$count = $query->rowCount();

	if($count > 0 ) {
		//throw error
        $tpl->newBlock('message');
        $tpl->assign('Message', 'username bestaat al :(');

	} elseif($_POST["wachtwoord"] !== $_POST["wachtwoord_2"]) {
		//pass error
        $tpl->newBlock('message');
        $tpl->assign('Message', 'wachtwoorden komen niet overeen :(');

	} elseif($count == 0 and $_POST["wachtwoord"] == $_POST["wachtwoord_2"]) {
		//create account
		$insert = $db->prepare("INSERT INTO account SET vnaam= :value1, anaam= :value2, username= :value3, wachtwoord= :value4, geboortedatum= :value5, geslacht= :value6, email= :value7 ");

		$insert->bindparam(":value1", $Vnaam);
		$insert->bindparam(":value2", $Anaam);
		$insert->bindparam(":value3", $Username);
		$insert->bindparam(":value4", $Wachtwoord);
		$insert->bindparam(":value5", $Geboorte_dat);
		$insert->bindparam(":value6", $Geslacht);
        $insert->bindparam(":value7", $Email);
		$insert->execute();

        $tpl->newBlock('message');
        $tpl->assign('Message', 'nieuwe gebruiker aan gemaakt! :D');
	}
}
