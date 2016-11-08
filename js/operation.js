
$('#operationform-firstnumber').on('input', function() {
    check($(this), "second");
});

$('#operationform-secondnumber').on('input', function() {
    check($(this), 'third');
});

$('#button-save').on('click', function(e) {
    $.ajax({
        'type': 'post',
        'dataType': 'json',
        'data': $('#operation-form').serialize()
    }).success(function(json) {
        showResult(json.result);
    });

    e.preventDefault();
});
//подставляем результат
function showResult(number)
{
    document.getElementById('label-result').innerHTML = 'Result: ' + number;
}
// проверяем на валидность
function validate(value){
    if(isNaN(value)){
        return false
    }else{
        var regex = /^[0-9]{3,15}$/gi;

        if(regex.exec(value)){
            return true
        }
    }

    return false;
}
// проверяем на валидность и показываем новые поля
function check(input, id){

    var value = input.val();

    var nextElement = document.getElementById(id);

    if(id == 'second')
    {
        var thirdElement = document.getElementById('third');

        if(!validate(value))
        {
            if(thirdElement.style.display == '')
            {
                thirdElement.style.display = 'none';
            }
        }
    }

    if(validate(value))
    {
        highLight(input, true);

        if(nextElement.style.display == 'none')
        {
            nextElement.style.display = '';
        }
    }else{
        highLight(input, false);

        if(nextElement.style.display == '')
        {
            nextElement.style.display = 'none';
        }
    }
}
// запрещаем отправку форму по enter
$(document).ready(function() {
    $('#operation-form').keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function highLight(input, isvalid)
{
    var div = input.parent().closest('div')[0];
    var errorDiv = input.parent().closest('div').find('#error')[0];

    if(!isvalid)
    {
        errorDiv.style.display = '';
        div.className += ' has-error';
    }else{
        errorDiv.style.display = 'none';
        div.className = 'col-md-3 col-sm-6 col-xs-12';
    }
}