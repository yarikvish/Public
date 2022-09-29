
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
    </style>




    </style>
</head>
<body>


<?php 
$today = getdate();
$myday = $today["mday"]; // получаем сегодняшний день
$ip = $_SERVER['REMOTE_ADDR']; // получаем IP посетителя
$myfile = fopen("mycount.txt","a"); // создаём пустой файл mycount.txt если его нет
fclose($myfile);
$mydaten = file("mycount.txt");
$count = trim($mydaten[0],"\r\n"); // получаем предыдущее количество посетитлелей
$myday1 = trim($mydaten[1],"\r\n"); // получаем день последнего посещения
if($myday != $myday1){ // если он не совпадает с сегодняшним днём
    $myfile = fopen("ip_list.txt","w"); // создаём по-новой файл ip_list.txt
    fwrite($myfile,"\r\n".$ip); // записываем IP посетителя
    fclose($myfile);
    $myfile = fopen("mycount.txt","w");
    $count = 0; // обнуляем счётчик посещений
    fwrite($myfile,$count."\r\n".$myday);
    fclose($myfile);
}
$ip_array = file("ip_list.txt"); // получаем массив из IP посетителей
$used_ip = array_search($ip,$ip_array); // ищем в нём текущий IP
if($used_ip == false){ // если он не находится
    $myfile = fopen("ip_list.txt","a");
    fwrite($myfile,"\r\n".$ip); // то добавляем
    fclose($myfile);
    $ip_array = file("ip_list.txt"); // получаем массив из IP посетителей
}
$myusers = sizeof($ip_array)-1; // получаем количество посетителей
$count++; // увеличиваем счёт посещений на один
$myfile = fopen("mycount.txt","w");
fwrite($myfile,$count."\r\n".$myday); // записываем обновлённую информацию
fclose($myfile);



?>
<font face="arial">
<h1>HELLO WORLD!</h1>
</font>


</body>
</html>


