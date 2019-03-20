<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Everyweek Report</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/moment.min.js"></script>

</head>

<body>
    <form class="form-job" method="post" id="ajax_form" action="" >
        <input type="hidden" name="week_number" id="week-number" value=""/><br>

        <script type="text/javascript">
            var weeknumber = moment().format('w');
            $('#week-number').attr('value', weeknumber);
            /*Date.prototype.getWeek = function() {
              var onejan = new Date(this.getFullYear(),0,1);
              return Math.ceil((((this - onejan) / 86400000) + onejan.getDay()+1)/7);
            }
            var test = (new Date()).getWeek();
            alert(test);*/
        </script>

        <div>
          <label for="select-day">День недели:</label>
          <select name="select_day" id="select-day">
            <option value="Понедельник">Понедельник</option>
            <option value="Вторник">Вторник</option>
            <option value="Среда">Среда</option>
            <option value="Четверг">Четверг</option>
            <option value="Пятница">Пятница</option>
          </select><br>
        </div>

        <div>
          <label for="select-operation">Действие:</label>
          <select name="select_operation" id="select-operation">
            <option value="Установка" selected>Установка</option>
            <option value="Программирование">Программирование</option>
            <option value="Переключение">Переключение</option>
            <option value="Профилактика">Профилактика</option>
            <option value="Ремонт">Ремонт</option>
            <option value="Демонтаж">Демонтаж</option>
          </select><br>
        </div>

        <div>
          <label for="select-quantity">Количество:</label>
          <select name="select_quantity" id="select-quantity">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select><br>
        </div>

        <div>
        <label for="select-equipment">Наименование:</label>
        <select name="select_equipment" id="select-equipment">
          <option value="телефонного аппарата" selected>телефонного аппарата</option>
          <option value="телефонной линии">телефонной линии</option>
          <option value="МФУ">МФУ</option>
        </select><br>
        </div>

        <div>
          <label for="select-address">Адрес:</label>
          <select name="select_address" id="select-address">
            <option value="Московская, 72" selected>Московская, 72</option>
            <option value="Горького, 55">Горького, 55</option>
            <option value="Челюскинцев, 114">Челюскинцев, 114</option>
            <option value="Челюскинцев, 116">Челюскинцев, 116</option>
            <option value="Радищева, 24">Радищева, 24</option>
            <option value="Радищева, 30">Радищева, 30</option>
            <option value="Шевченко, 3">Шевченко, 3</option>
            <option value="Рабочая, 29/35">Рабочая, 29/35</option>
            <option value="Рабочая, 29/39">Рабочая, 29/39</option>
            <option value="Кутякова, 9">Кутякова, 9</option>
            <option value="Киселева, 76">Киселева, 76</option>
            <option value="Вольская, 138/5">Вольская, 138/5</option>
            <option value="Б. Садовая, 162/166">Б. Садовая, 162/166</option>
            <option value="Университетская, 45/51">Университетская, 45/51</option>
            <option value="Соборная, 22">Соборная, 22</option>
            <option value="Чардым-Дубрава">Чардым-Дубрава</option>
            <option value="Октябрьское ущелье, 9">Октябрьское ущелье, 9</option>
          </select><br>
        </div>
        <div>
          <label for="select-building">cтроение:</label>
          <select name="select_building" id="select-building">
            <option value="Строение 1" selected>Строение 1</option>
            <option value="Строение 2">cтроение 2</option>
            <option value="Строение 3">cтроение 3</option>
            <option value="Строение 4">cтроение 4</option>
            <option value="Строение 5">cтроение 5</option>
            <option value="Строение 6">cтроение 6</option>
          </select><br>
        </div>

        <div>
          <label>Кабинет: </label>
          <input id="room" type="text" name="room" /><br>
        </div>

        <div class="job-link">
          <input type="button" id="btn" value="Записать в хронометраж" />
        </div>

        <div class="report">
          <div class="report-button">
          <a class="report-link" href="report.php">Еженедельный отчет</a>
        </div>

        <div class="quart-report-button">
          <a class="quart-report-link" href="quart_report.php">Ежеквартальный отчет</a>
        </div>
        </div>

        

    </form>

    <div id="result_form" class="week-display">
      <div class="monday"></div>
      <div class="thuesday"></div>
      <div class="wednesday"></div>
      <div class="thursday"></div>
      <div class="friday"></div>
      <form class="visiting" id="visit-form">
        <div class="prev-visit"></div>
        <div id="next-visit"></div>
        <label for="next-visit-input">Выбрать обход на следующую неделю: </label>
        <select id="next-visit-input" name="next_visit_input">
          <option value="Московская, 72 строение 1, 1 этаж">Московская, 72 строение 1, 1 этаж</option>
          <option value="Московская, 72 строение 1, 2 этаж">Московская, 72 строение 1, 2 этаж</option>
          <option value="Московская, 72 строение 1, 3 этаж">Московская, 72 строение 1, 3 этаж</option>
          <option value="Московская, 72 строение 1, 4 этаж">Московская, 72 строение 1, 4 этаж</option>
          <option value="Московская, 72 строение 1, 5 этаж">Московская, 72 строение 1, 5 этаж</option>
          <option value="Московская, 72 строение 1, 6 этаж">Московская, 72 строение 1, 6 этаж</option>
          <option value="Московская, 72 строение 1, 7 этаж">Московская, 72 строение 1, 7 этаж</option>
          <option value="Московская, 72 строение 1, 8 этаж">Московская, 72 строение 1, 8 этаж</option>
          <option value="Московская, 72 строение 1, 9 этаж">Московская, 72 строение 1, 9 этаж</option>
          <option value="Московская, 72 строение 1, 10 этаж">Московская, 72 строение 1, 10 этаж</option>
          <option value="Московская, 72 строение 1, 11 этаж">Московская, 72 строение 1, 11 этаж</option>
          <option value="Московская, 72 строение 2">Московская, 72 строение 2</option>
          <option value="Московская, 72 строение 3">Московская, 72 строение 3</option>
          <option value="Московская, 72 строение 4">Московская, 72 строение 4</option>
          <option value="Московская, 72 строение 5">Московская, 72 строение 5</option>
          <option value="Московская, 72 строение 6">Московская, 72 строение 6</option>
          <option value="Челюскинцев, 114">Челюскинцев, 114</option>
          <option value="Челюскинцев, 116">Челюскинцев, 116</option>
          <option value="Горького, 55">Горького, 55</option>
          <option value="Рабочая, 29/35">Рабочая, 29/35</option>
          <option value="Рабочая, 29/39">Рабочая, 29/39</option>
          <option value="Шевченко, 3">Шевченко, 3</option>
        </select>
        <div class="visit-link">
          <input type="button" id="visit-btn" value="Сохранить" />
        </div>
      </form>
    </div> 

    <div class="clearfix"></div>

    <script src="js/ajax.js"></script>
</body>
</html>