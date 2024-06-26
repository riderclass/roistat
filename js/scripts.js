  /*Появление Модального окна*/
  $('#telephone').change(function() {
    if ($(this).val() !== '') {
      $('#telef').css('display', 'none');
    } else if ($(this).val() === '') {
      $('#telef').css('display', 'block');
    }
  });

  /*Проверяем поля формы перед отправкой*/

  function checkform(){
    var fieldvalue1 = $.trim($('#name').val());
    var fieldvalue2 = $.trim($('#company').val());
    var fieldvalue3 = $.trim($('#telephone').val());
    if(!fieldvalue1 || fieldvalue1 == "placeholdertext"){
      $('#error_box').html('Не заполнено поле Имя');
      $('#error_box').removeClass('hide');
      return false;
    } else if (
      !fieldvalue2 || fieldvalue2 == "placeholdertext"){
        $('#error_box').html('Не заполнено поле Компания');
        return false;
    }  else if (
      !fieldvalue3 || fieldvalue3 == "placeholdertext"){
        $('#error_box').html('Не заполнено поле Телефон');
        return false;
    } else if (!$("#cb").is(":checked")) {
      $('#error_box').html('Подтвердите согласие на обработку данных');
        return false;
    }
    
    else {
      alert('Данные отправлены');
      return true;
    }
   }
  
  
  