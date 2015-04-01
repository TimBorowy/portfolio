<?php
function hussel($name,$times){
    $dingie = strlen($name)*$times;
    echo $dingie;
}

function wat_zegt_luke($spraak){
    $blacklist = array( "basically",
                        "rino",
                        "erino",
                        "hu",
                        "rekt",
                        "nus");

    $text = str_replace($blacklist, "...", $spraak, $count);
    echo $text . "<br>";
    echo "je bent " . $count . " keer veilig gesteld van stopwoordjes";
}
//wat_zegt_luke("basically ik ben super interresant, ik werk met PHPnus, lukerino, hu waar praat jij over");