<?php

$file = 'visiting.txt';
$weekNum = date("W");

/*array from front form*/
if (isset($_POST["next_visit_input"]) ) { 

	// Формируем массив для JSON ответа
    $result = array(
    	'week' => $weekNum,
    	'visit' => $_POST["next_visit_input"],
    );

    // Переводим массив в JSON

	$get_content = file_get_contents($file);//поучаем содержимое файла

	$result = json_encode($result); //джецсоним данные из формы
	echo $result; // выводим во фронт


	$get_content = rtrim($get_content, "]");//отрезаем конец

	if (substr($get_content, 0, 1) !== '[') {
		$get_content = '['. $get_content;//добавить символ в начало строки
		$repl_str = $get_content. $result. ']';//собрать итоговую строку
	} else {
		$repl_str = $get_content. ','. $result. ']';//собрать итоговую строку
	}

    file_put_contents($file, $repl_str);//кинуть в файл


}



?>