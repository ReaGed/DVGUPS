<?php
date_default_timezone_set("Asia/Vladivostok");
  $out1 = file_get_contents('http://dvgups.ru/index.php?Itemid=1246&option=com_timetable&view=ringtable');
  preg_match('/<table width="400" border="1" cellspacing="0" cellpadding="0">(.*)<\/table>\r\n<p>/s', $out1,$zam1);
  
  $out2 = file_get_contents('http://dvgups.ru/studtopmenu/study/timetables?view=timetable&tmpl=component&selector=grp&sel1=%D0%98%D0%A3%D0%90%D0%A2&sel2=21%D0%9A.TXT');
  preg_match('/<pre(.*)<\/pre>/s', $out2,$zam2);
  
  $out3 = file_get_contents('http://dvgups.ru/studtopmenu/study/timetables?view=examtable&tmpl=component&selector=grp&sel1=%D0%98%D0%A3%D0%90%D0%A2&sel2=21%D0%9A.TXT&no_html=1&print=1&layout=default');
  preg_match('/<pre(.*)<\/pre>/s', $out3,$zam3);
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
