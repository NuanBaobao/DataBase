<?php
echo rand(0,10);
echo "<br />";
$name = "  0000   ";
$name = trim($name);
echo $name;
$str = "n,
jjjj";
echo nl2br($str);
echo "<br />";
echo strtoupper("i like studying.")."<br />";
$str1 = " \" ' \ / NULL";
echo $str1."<br />";
echo addslashes($str1)."<br />";
echo stripcslashes($str1)."<br />";

$w = "www";
echo "$w.com"."<br />";
echo <<<a
wo / NULL ///
hhhh dd
a;
echo "<br />";
$arr = array("1","2","3");

for($i=1;$i<=9;$i++)
{
    for($j=1;$j<=9;$j++)
    {
        echo "$i*$j=".$i*$j;
        echo "&nbsp";
    }
    echo "<br />";
}

$arr = array(1,2,3,4,5,6);
foreach ($arr as $value){
    echo "Value: $value<br />";
}

foreach ($arr as $key => $value){
    echo "Key: $key Value: $value<br />";
}

function maxValue($a): int
{
    $max_number = $a[0];
    for($i=0;$i<6;$i++){
        if($i > $max_number){
            $max_number = $i;
        }
    }
    return $max_number;
}

echo maxValue(arr)."<br />";
echo max(arr)."<br />";