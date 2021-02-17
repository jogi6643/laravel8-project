<?php
function SplitName($name)
{
    $n = trim($name);
    $arrayName = explode(" ",$n);
    $first_Name = $arrayName[0];
    $last_Name = $arrayName[1];
    return array($first_Name,$last_Name);
} 
?>