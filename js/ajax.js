
$( document ).ready(function() {

//off select if value another select change
  var selAddress = $('#select-address');
  var selBuilding = $('#select-building');
  

  selAddress.change(function() {
    if ( selAddress.val() !== 'Московская, 72' ) {
      selBuilding.attr('disabled', 'disabled');
      selBuilding.css({'color': '#212121'});
    } else {
      selBuilding.removeAttr('disabled', '');
      selBuilding.css({'color': '#fff'});
    }
  });

    loadAjax('get_json.php');
    loadVisit('get_visit.php');

    $('#visit-btn').click(function() {
      sendVisitForm('next-visit', 'visit-form', 'visit-ajax.php');
      return false;
    });

    $("#btn").click( function(){
      var roomVal = $('#room').val();
      var reg = /^(\d{1,4}\/?\d{0,1}?|проходная|вахта|пост полиции|типография)$/;
      if (roomVal === '' ) {
        alert('Введите номер кабинета');
      } else if ( reg.test(roomVal) ) {
          sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
          return false; 
      } else {
         alert('Введите корректный номер кабинета');
      }
		}
	);
} );

function sendVisitForm(next_visit, visit_form, url) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: $("#"+visit_form).serialize(),
    success: function(response) {
      result = $.parseJSON(response);
      var str = 'Обход на следующей неделе: ' + result.visit;
      $('#next-visit').html(str);
    }
  })
}

/*Load Ajax if Add New String*/
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно

        	result = $.parseJSON(response);

          var jobStr = getVariableString(result);

          addDOMStructure(result, jobStr);
    	},
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправленны.');
    	}
 	});
}


/*First Load Ajax*/

function loadAjax(url) {
    $.ajax ({
        url: url,
        success: function(data) {
            decodeContent = $.parseJSON(data);

            for (var i = 0; i < decodeContent.length; i++) {

                if (decodeContent[i].week === weeknumber || (decodeContent[i].day === 'Пятница' && decodeContent[i].week == Number(weeknumber) + 1)) {

                  var jobStr = getVariableString(decodeContent[i]);

                  addDOMStructure(decodeContent[i], jobStr);
                }
            }
        }
    });
}

function loadVisit(url) {
  $.ajax ({
    url: url,
    success: function(data) {
      result = $.parseJSON(data);
      for (var i = 0; i < result.length; i++) {
        if((result[i].week)[0] == "0") {
          if (result[i].week === "0" + weeknumber) {
            var str = 'Обход на следующей неделе: ' + result[i].visit;
            $('#next-visit').html(str);
          }
          if (result[i].week == ("0" + (weeknumber - 1))) {
            var str = 'Обход на этой неделе: ' + result[i].visit;
            $('.prev-visit').html(str);
          }

        } else {

          if (result[i].week === weeknumber) {
            var str = 'Обход на следующей неделе: ' + result[i].visit;
            $('#next-visit').html(str);
          }
          if (result[i].week == String(weeknumber - 1)) {
            var str = 'Обход на этой неделе: ' + result[i].visit;
            $('.prev-visit').html(str);
          }
        } 
      }
    }
  })
}


/* Build String For Front */
function getVariableString(arr) {
  var str;
  if (arr.address === 'Московская, 72') {
            str = arr.operation + ' ' + arr.quantity + ' ' + 
                arr.equipment + ' ' + arr.address + ' ' + arr.building + ', каб.' + arr.room;
          } else {
            str = arr.operation + ' ' + arr.quantity + ' ' + 
                arr.equipment + ' ' + arr.address + ', каб.' + arr.room;
          }
  return str;
}

/* Change Structure Front if Add New String or Parse DB File */

function addDOMStructure(arr, displayStr) {
  if (arr.day === 'Понедельник' && $('div.mon').length < 8) {
      $('<div class="mon"></div>').appendTo('#result_form .monday').html(displayStr);

  } else if (arr.day === 'Вторник' && $('div.thu').length < 8) {
      $('<div class="thu"></div>').appendTo('#result_form .thuesday').html(displayStr);

  } else if (arr.day === 'Среда' && $('div.wed').length < 8) {
      $('<div class="wed"></div>').appendTo('#result_form .wednesday').html(displayStr);

  } else if (arr.day === 'Четверг' && $('div.thur').length < 8) {
      $('<div class="thur"></div>').appendTo('#result_form .thursday').html(displayStr);

  } else if (arr.day === 'Пятница' && $('div.fri').length < 8) {
      $('<div class="fri"></div>').appendTo('#result_form .friday').html(displayStr);

  } else {
      alert('Выберете другой день недели');
  }
}
