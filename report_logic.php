<?php

$file = 'content.txt';
$file2 = 'visiting.txt';
$get_report_json = file_get_contents($file);
$get_report = json_decode($get_report_json, true);
$week_number = date("W");

if($week_number[0] == "0") $week_number = substr($week_number, 1);

$repair = [];
$job = [];
$add_job;
$add_repair;
$get_visiting_json = file_get_contents($file2);
$get_visiting = json_decode($get_visiting_json, true);
$add_prev_visit;
$add_next_visit;

if ($get_visiting !== NULL) {
	foreach($get_visiting as $key => $value) {

		if ($value[week] == $week_number) {
			$add_next_visit = $value[visit];
		}
		if ($value[week] == ($week_number - 1)) {
			$add_prev_visit = $value[visit];
		}
	}
}

if ($get_report !== NULL) {
	foreach($get_report as $key => $value) {

		if ($value[week] === $week_number) {

			if ($value[operation] === 'Ремонт' || $value[operation] === 'Профилактика') {
				$repair[] =  array_slice($get_report[$key], 5, 10);
			} else {
				$job[] =  array_slice($get_report[$key], 5, 10);
				
			}
		}
	}
}

asort($job);
asort($repair);

//clean arrays
function cleanArr($input, $filter) {
	$current_arr = [];
	foreach ($input as &$value) {
		$current_value = $value[$filter];
		if (isset($current_arr[$current_value]))
			unset($value[$filter]);
		else
			$current_arr[$current_value] = true;
	}
	return $input;
}

$job = cleanArr($job, 'address');
$job = cleanArr($job, 'building');

$repair = cleanArr($repair, 'address');
$repair = cleanArr($repair, 'building');

//get variable string
function resultString($arr) {
	$result_str;
	//array to string
	foreach ($arr as $key => $value) {
		foreach ($value as $test => $val) {
			$result_str .=(" $val");
		}
	}
	//search matches
	$matches = ['Строение 1', 'Строение 2', 'Строение 3', 'Строение 4', 'Строение 5', 'Строение 6', 'Горького, 55', 'Челюскинцев, 114', 'Челюскинцев, 116', 'Радищева, 24', 'Радищева, 30', 'Шевченко, 3', 'Рабочая, 29/35', 'Рабочая, 29/39', 'Кутякова, 9', 'Киселева, 76', 'Вольская, 138/5', 'Б. Садовая, 162/166', 'Университетская, 45/51', 'Соборная, 22', 'Чардым-Дубрава', 'Октябрьское ущелье, 9' ];

	//add string inside string
	foreach ($matches as $key => $value) {
		$pos = strpos($result_str, $value);
		$add_length = strlen($value);
		

		if ($pos !== false) {
			$add_length = strlen($value);

			if (substr($result_str, $pos + $add_length, 3) == preg_match('/[a-z]/', $result_str)) {
				$result_str = substr($result_str, 0, $pos+$add_length). ", " .trim(substr($result_str, $pos+$add_length));
			} else {
				$result_str = substr($result_str, 0, $pos+$add_length). ", каб." .trim(substr($result_str, $pos+$add_length));
			}
		}
	}

	//add ", "
	$pattern = "/(\d|вахта|проходная|пост полиции|типография)(?= )/";
	$result_str = preg_replace($pattern, "$1, ", $result_str);

	return $result_str;
}

$add_job = resultString($job);
$add_repair = resultString($repair);

// Dates

$start_first_week = date("d", strtotime("last Monday"));
$end_first_week = date("d", strtotime("Friday"));
$start_second_week = date("d", strtotime("next Monday"));
$end_second_week = $end_first_week + 7;

$start_first_month = monthName(date("m", strtotime("last Monday")));
$end_first_month = monthName(date("m", strtotime("Friday")));
$start_second_month = monthName(date("m", strtotime("next Monday")));
$end_second_month = monthName(date("m", strtotime("next Friday")));

$date_first = $start_first_month;
$date_second = $end_second_month;

if ($start_first_week < $end_second_week) {
	$date_first = '';
}

if ($start_first_month === $end_first_month) {
	$start_first_month = '';
}

if ($start_second_month === $end_second_month) {
	$start_second_month = '';
}

function monthName($var) {
	if ($var === "01") {
		$var = 'января';
	} else if ($var === "02") {
		$var = 'февраля';
	} else if ($var === "03") {
		$var = 'марта';
	} else if ($var === "04") {
		$var = 'апреля';
	} else if ($var === "05") {
		$var = 'мая';
	} else if ($var === "06") {
		$var = 'июня';
	} else if ($var === "07") {
		$var = 'июля';
	} else if ($var === "08") {
		$var = 'августа';
	} else if ($var === "09") {
		$var = 'сентября';
	} else if ($var === "10") {
		$var = 'октября';
	} else if ($var === "11") {
		$var = 'ноября';
	} else if ($var === "12") {
		$var = 'декабря';
	}
	return $var;
}

?>