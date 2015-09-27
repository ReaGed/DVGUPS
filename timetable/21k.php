<?php
date_default_timezone_set("Asia/Vladivostok");
  if( $curl1 = curl_init() ) {
    curl_setopt($curl1, CURLOPT_URL, 'http://dvgups.ru/timetables?view=ringtable&amp;option=com_timetable');
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl1, CURLOPT_POST, false);
    $out1 = curl_exec($curl1);
	preg_match('/<table width="400" border="1" cellspacing="0" cellpadding="0">(.*)<\/table>/s', $out1,$zam1);
	curl_close($curl1);
  }

  if( $curl2 = curl_init() ) {
    curl_setopt($curl2, CURLOPT_URL, 'http://dvgups.ru/timetables?view=timetable&option=com_timetable');
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_POSTFIELDS, "sel1=ИУАТ&sel2=21К.TXT&selector=grp");
    $out2 = curl_exec($curl2);
	preg_match('/<pre>(.*)<\/pre>/s', $out2,$zam2);
	curl_close($curl2);
  }
  
    if( $curl3 = curl_init() ) {
    curl_setopt($curl3, CURLOPT_URL, 'http://dvgups.ru/timetables?view=examtable&option=com_timetable');
    curl_setopt($curl3, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl3, CURLOPT_POST, true);
    curl_setopt($curl3, CURLOPT_POSTFIELDS, "sel1=ИУАТ&sel2=21К.TXT&selector=grp");
    $out3 = curl_exec($curl3);
	preg_match('/<pre>(.*)<\/pre>/s', $out3,$zam3);
	curl_close($curl3);
  }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<title>Расписания группы 21К</title> 
		<meta name='original-source' content='https://github.com/ReaGed/DVGUPS/blob/master/timetable/21k.php'>
	</head>
	<body>
	Расписание автоматически обновляется. В "живом режиме" берется с сайта ДВГУПС.<br>
	Текущая неделя: <b><? echo ((strftime("%V") % 2) == 0) ? 'Числитель' : 'Знаменатель'; ?></b><br><br>
		<details>
		<summary>Расписание звонков</summary>
		<? echo (isset($zam1['0'])) ? $zam1['0'] : 'Ашипка'; ?>
		</details>
		<hr>
		<details>
		<summary>Расписание занятий</summary>
		<? echo (isset($zam2['0'])) ? $zam2['0'] : 'Ашипка'; ?>
		</details>
		<hr>
		<details>
		<summary>Расписание экзаменов</summary>
		<? echo (isset($zam3['0'])) ? $zam3['0'] : 'Ашипка'; ?>
		</details>
		<br>© Сёмин Глеб
	</body>
</html>
