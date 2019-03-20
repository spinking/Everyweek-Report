<?php
require 'quart_report_logic.php';
header("Content-type: application/vnd.ms-word");
header('Content-Disposition: attachment;Filename="Отчет службы связи за '. $quart .' квартал 2019 года' .'.doc"');


echo "<html>";
echo '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">';
echo '<style type="text/css">body {font-size:14pt;} h2 {line-height: 1;font-size: 14pt;font-style:bold;text-align:center;}h4 {font-style:bold;text-align:center;font-size:14pt;}</style>';//Word-Friendly Styles
echo '<body>
    <h2>Отчёт о проделанных работах службой связи в '. $quart .' квартале 2019 года</h2>
  <ol>
    <li id="1">Проведены работы по обслуживанию телефонной сети Правительства области(установка, перенос и снятие телефонных номеров, настройка и программирование телефонных аппаратов – '. $count_lines .').</li>
    <li id="2">Проведен текущий ремонт факсимильных, проводных и мобильных телефонных аппаратов, линий связи – '. $count_device .'.</li>
    <li id="3">Проведены обходы по выявлению и устранению неисправностей телефонных кабельных сетей в зданиях по адресу: '. $go_round .'.</li>
    <li id="4">Проведены профилактические работы на кроссовом оборудовании и ведомственной телефонной станции Правительства области.</li>
    <li id="5">Проведены работы по инвентаризации оборудования связи, телефонных аппаратов, радиотелефонов и радиостанций, находящихся в резерве.</li></ol>
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