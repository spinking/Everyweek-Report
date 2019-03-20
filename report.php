<?php
require 'report_logic.php';
header("Content-type: application/vnd.ms-word");
header('Content-Disposition: attachment;Filename="'. date("W"). ' Отчет и план работы на период с '. $start_first_week. ' '. $date_first .' по '. $end_second_week. ' '. $date_second .' 2019 года' .'.doc"');



echo "<html>";
echo '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">';
echo '<style type="text/css">body {font-size:14pt;} h2 {line-height: 1;font-size: 14pt;font-style:bold;text-align:center;}h4 {font-style:bold;text-align:center;font-size:14pt;}</style>';//Word-Friendly Styles
echo '<body>
    <h2>Отчёт о проделанной работе сотрудниками службы связи <br />
    за период c 
    <span id="date1">'. $start_first_week . " $start_first_month" .'</span>
     по 
    <span id="date2">'. $end_first_week . " $end_first_month" .'</span>
    <span id="month2"></span> 2019 года.</h2>
  <ol>
    <li id="1">Проведено подключение роуминга по заявкам абонентов.</li>
    <li id="2">Проведены установка, программирование, переключение телефонных аппаратов и МФУ по адресу: '. $add_job .'.</li>
    <li id="3">Проведены профилактические и ремонтные работы стационарных и мобильных телефонных аппаратов по адресу: '. $add_repair .'.</li>
    <li id="4">Проведены  обходы кабинетов по выявлению и устранению повреждений  и инвентаризации оборудования связи по адресу: '. $add_prev_visit .'.</li>
  </ol>
    <h2>План работы службы связи <br />
    на период c 
    <span id="date3">'. $start_second_week . " $start_second_month" .'</span>
     по 
    <span id="date4">'. $end_second_week . " $end_second_month" .'</span>
    <span id="month4"></span> 2019 года.</h2>
  <ol>
    <li>Провести подключение роуминга по заявкам абонентов.</li>
    <li>Провести установку и переключение телефонных аппаратов по заявкам абонентов.</li>
    <li>Провести профилактические и ремонтные работы факсимильных, стационарных и мобильных телефонных аппаратов.</li>
    <li>Провести  обходы кабинетов по выявлению и устранению повреждений  и инвентаризации оборудования связи по адресу: '. $add_next_visit .'.</li>
  </ol>
  <br>
  <br>
  <br>
  <br>
  <h4>Начальник службы связи &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160; &#160;В.Ю.Жданов</h4>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.csv.js"></script>
  <script type="text/javascript" src="moment.js"></script>
  <script type="text/javascript" src="scripts.js"></script>
</body>';
echo "</html>";

?>