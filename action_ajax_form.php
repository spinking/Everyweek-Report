<?php

$file = 'content.txt';

/*array from front form*/
if (isset($_POST["room"]) ) { 

	// Формируем массив для JSON ответа
    $result = array(
    	'week' => $_POST["week_number"],
    	'day' => $_POST["select_day"],
    	'operation' => $_POST["select_operation"],
    	'quantity' => $_POST["select_quantity"],
    	'equipment' => $_POST["select_equipment"],
    	'address' => $_POST["select_address"],
    	'building' => $_POST["select_building"],
    	/*'cab' => 'каб.',*/
    	'room' => $_POST["room"],
    );

    if ($result[day] === 'Пятница') {
        $result[week] = $_POST['week_number'] + 1;
    };

/*    echo $result['week'];*/

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