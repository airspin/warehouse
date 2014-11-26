function onEditHandler(elem) {
    var tr = $(elem).closest('tr');
    var title = tr.find('.colTitle').text();
    var descr = tr.find('.colDescr').text();
    var enctype = tr.find('.colEnc').text();
    $(".editTable input[name='itemId']").val(tr.attr('itemId'));
    $(".editTable input[name='action']").val('editing');
    $(".col2 h3").text('Редактирование элемента '+title);
    showEditTable(title, descr, enctype);
    $(".edit").fadeIn('slow');
}
function onDeleteHandler(elem) {
    var tr = $(elem).closest('tr');
    $(".editTable input[name='itemId']").val(tr.attr('itemId'));
    $(".editTable input[name='action']").val('deleting');
    sendEditForm();
}
function okButtonHandler() {
    sendEditForm();

}
function applyHandler() {
        sendMoveForm();


}
function sendEditForm() {
    var form = $(".editForm");
    var fd = {};
    fd.action = form.find('input[name="action"]').val();
    fd.itemId = form.find('input[name="itemId"]').val();
    fd.title = form.find('input[name="title"]').val();
    fd.descr = form.find('input[name="descr"]').val();
    fd.enctype = form.find('input[name="enctype"]').val();
    lock();
    $.ajax({
        url: 'editor.php',
        data: fd,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            refreshTable(data.value);
        },
        error: function(ee) {

        },
        complete: function(ee) {
            unLock();
            $(".edit").fadeOut('slow');
        }
    });

}



function showRep() {

    var number = $(".selec").val();



    $.ajax({
        url: 'genMoveTableJSON.php',
        data: {num:number},
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $(".report .repp").html("");
            $(".report .repp").append(data.value);
        },
        error: function(ee) {
       alert('error');
        }
    });


}



function sendMoveForm() {
    var form = $(".editForm");
    var fd = {};
    fd.action = form.find('input[name="action"]').val();
    fd.itemId = form.find('input[name="itemId"]').val();
    fd.title = form.find('input[name="title"]').val();
    fd.descr = form.find('input[name="descr"]').val();
    fd.enctype = form.find('input[name="enctype"]').val();
    lock();
    $.ajax({
        url: 'editor.php',
        data: fd,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            refreshTable(data.value);
        },
        error: function(ee) {

        },
        complete: function(ee) {
            unLock();
        }
    });
}

function addElem(elem) {
    $(".col2 h3").text('Добавление нового элемента');
    $(".editTable input[name='action']").val('adding');
    showEditTable('','','');
}
function showEditTable(title, descr, enctype) {
    $(".editTable input[name='title']").val(title);
    $(".editTable input[name='descr']").val(descr);
    $(".editTable input[name='enctype']").val(enctype);
    $(".editTable").slideDown();
}

function refreshTable(code) {
    $(".spravContainer").html(code);
}

function lock() {
//return;
    $('.dark').css('display', 'block');
    $('.dark').stop();
    $('.dark').animate({
        opacity: 0.7
    }, 300);

}
function unLock() {
    $('.dark').stop();
    $('.dark').animate({
        opacity: 0
    }, 300, function() {
        $('.dark').css('display', 'none');
    });

}

function appendTdWithName($tbody, name, cl){
    var obj = $('<td><input name="'+name+'" type="text" class="'+cl+'"/></td>');
  //  obj.find("input").attr('name', name);
    $tbody.append(obj);
}

function appendTD($tr, name){
    var obj = $('<td class="'+name+'" class="'+name+'"></td>');
    $tr.append(obj);
}


function delRow(obj) {
    var tr = $(obj).closest("tr");
    var nInp = $(obj).closest("form").find('input[name="nums"]');
    var n = tr.attr("num");
    var v = nInp.val();
    if (v.indexOf(","+n+",") != -1) {
        nInp.val(v.replace(","+n+",", ","));
    }
    tr.remove();

    var curTop = parseInt($("#tel").css("top").substr(0, $("#tel").css("top").length-2));
    $("#tel").stop();
    $("#tel").animate({
        top: curTop - 25
    });

}

$(document).ready(function(){
    $(".spravTable .colEdit a").on("click", function(e){
        onEditHandler(this);
    });
    $(".spravTable .colDel a").on("click", function(e){
        deleteItem(this);
    });
    $(".addButton").on("click", function(e){
        addElem();
        $(".edit").fadeIn('slow');
    });
    $(".okButton").on("click", function(e){
        okButtonHandler();
    });

//    $(".apply").on("click", function(e){
//        applyHandler();
//    });


    $(".addTr").on("click", function(){
        var tr = $('<tr></tr>');
        var nInp = $(".MoveForm").find('input[name="nums"]');
        var nms = nInp.val();
        var ns = nms.split(",");
        var max = 0;
        for (var i = 0; i < ns.length; ++i) {
            if (ns[i].length > 0 && parseInt(ns[i]) > max) max = parseInt(ns[i]);
        }
        var nextNum = max + 1;
        tr.attr("num", nextNum+"");
        appendTD(tr, 'title-'+nextNum);
        tr.find('.title-'+nextNum).append($('.sel').parent().html());
        tr.find('.title-'+nextNum).find(".sel").attr("name", 'title-'+nextNum);

        appendTdWithName(tr, 'quant-'+nextNum, '');
        tr.append($('<td><span class="delCol" onclick="delRow(this)">x</span></td>'))
        $('.move > tbody').append(tr);

        nInp.val(nms+nextNum+",");

        var curTop = parseInt($("#tel").css("top").substr(0, $("#tel").css("top").length-2));
        $("#tel").stop();
        $("#tel").animate({
            top: curTop + 25
        });
    });



    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Пред',
        nextText: 'След',
        changeMonth: true,
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $('#datepicker').datepicker();
    $('.moveb').css("left", "-100%");
    $('.moveb').stop(true);
    $('.moveb').animate({
        left: "0%"
    }, 700);
    $('.apply').on('click', function(e){
        $('.moveb').stop(true);
        $('.bear').stop(true);
        $('.bear').animate({
            left: "200%"
        }, 99999999);
        $('.moveb').animate({
            left: "200%"
        }, 3000, function(){
            $(this).find('form.MoveForm').submit();
        });

    });


    $(".view").click(function(){
        $(".report").toggle('slow');
        $(".moveb").toggle('slow');

    });



    $(".report").hide();
    $(".selec")[0].selectedIndex=-1;

    $(".selec").onChange=function() {
        showRep(sel);
    };
});