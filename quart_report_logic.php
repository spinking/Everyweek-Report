<?php
$file = 'content.txt';
$file2 = 'visiting.txt';
$get_report_json = file_get_contents($file);
$get_report = json_decode($get_report_json, true);
$week_number = date("W");

if($week_number[0] == "0") $week_number = substr($week_number, 1);

$job = [];
$repair = [];

$get_visiting_json = file_get_contents($file2);
$get_visiting = json_decode($get_visiting_json, true);

$quart = "none";
$count_lines;
$count_device;
$go_round = "";// обходы


function job_Counter($first, $last) {
	global $job, $repair, $get_report;
	if($get_report != NULL) {
		foreach($get_report as $key => $value) {
			if($value[week] > $first && $value[week] <= $last) {
				if ($value[operation] === 'Ремонт' || $value[operation] === 'Профилактика') {
					array_push($repair, $value[quantity]);
				} else {
					array_push($job, $value[quantity]);
					
				}
		}
		}
	}
}

function go_round_address($first, $last) {
	global $go_round ,$get_visiting;
	if($get_visiting != NULL) {
		foreach ($get_visiting as $key => $value) {
			if($value[week] > $first && $value[week] <= $last) {
				$go_round .= ", " . $value[visit];
			}
		}
	}
}

if($week_number > 48) {
	$quart = "IV";
	jobCounter(40, 52);
	go_round_address(40, 52);
} else if($week_number > 39) {
	$quart = "III";
	jobCounter(27, 39);
	go_round_address(27, 39);
} else if($week_number > 26) {
	$quart = "II";
	jobCounter(14, 26);
	go_round_address(14, 26);
} else{
	$quart = "I";
	job_Counter(0, 13);
	go_round_address(0, 13);
}

function sum($a, $b) {
	$a += $b;
	return $a;
}

$count_lines = array_reduce($job, "sum");
$count_device = array_reduce($repair, "sum");
$go_round = substr($go_round, 2);

?>