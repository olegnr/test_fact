$(document).ready(function() {
	
	//Маска для телефона
    $("#phone_mobile").mask("+7(999) 999-9999");
    
    //Загрузка данных о пользователях
    function get_user_info(){
        //Сначала очищаем
        $('#users_info > tbody').html("");
        $.ajax({
            url: 'functions.php',
            type: "POST",
            data : {
                type_request: 'get_user_info'               
            },
            async: false,
            dataType: 'json',
            success: function (data)
            {
                var table_rows;
                jQuery.each(data, function (key, val) {

                    table_rows +=   '<tr>' + 
                                        '<th scope="row">' + (key + 1) + '</th>' +
                                        '<td>' + val.date_create + '</td>' +
                                        '<td>' + val.first_name + '</td>' +
                                        '<td>' + val.last_name + '</td>' +
                                        '<td>' + val.patronymic + '</td>' +
                                        '<td>' + val.phone_mobile + '</td>' +
                                        '<td>' + val.position + '</td>' +
                                        '<td><button type="button" user_id = "' + val.id + '" class="delete_user btn btn-danger">Удалить</button></td>' +
                                    '</tr>';
                });
                $('#users_info > tbody').append(table_rows);
            },
            error: function (jqXHR, exception) {
                //console.log(exception);
                //console.log(jqXHR);
            },
        });
    }

    //Первоначальная загрузка данных о пользователе
    get_user_info();

    //Добавление нового пользователя
    $('.container').on('click', '#create_user', function() {
		var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var patronymic = $('#patronymic').val();
        var position = $('#position').val();
        var phone_mobile = $('#phone_mobile').val();

        $.ajax({
            url: 'functions.php',
            type: "POST",
            data : {
                type_request: 'create_user',
                first_name: first_name,   
                last_name: last_name,  
                patronymic: patronymic,  
                position: position,  
                phone_mobile: phone_mobile            
            },
            async: false,
            success: function (data)
            {
                get_user_info();
                $("#accept_message").html(data);  //Добавляем в модальное окно ответ сервера
                var button_accept = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Ок</button>';
                $("#modal_buttons").html(button_accept);  //Добавляем в модальное кнопку "ок"
                $("#accept_modal").modal('show');
                
            },
            error: function (jqXHR, exception) {
                //console.log(exception);
                //console.log(jqXHR);
            },
        });
	}); 

    //Модальное окно с подтверждением удаления пользователя
    $('.container').on('click', '.delete_user', function() {
		var user_id =  $(this).attr('user_id');
        var message = 'Вы действительно хотите удалить пользователя ?';
        var button_accept = '<button id = "accept_delete_user" user_id = "' + user_id + '" type="button" class="btn btn-danger" data-dismiss="modal">Удалить</button>' +
                             '<button id = "cancel_delete_user" type="button" class="btn btn-dark" data-dismiss="modal">Отмена</button>'
        $("#accept_message").html(message);
        $("#modal_buttons").html(button_accept);
        $("#accept_modal").modal('show');
    }); 
   
    //Удаление пользователя
    $('#accept_modal').on('click', '#accept_delete_user', function() {
        var user_id =  $(this).attr('user_id');
        console.log(user_id);
        $.ajax({
            url: 'functions.php',
            type: "POST",
            data : {
                type_request: 'delete_user',
                user_id: user_id 
            },
            async: false,
            success: function (data)
            {
                get_user_info();
            },
            error: function (jqXHR, exception) {
                //console.log(exception);
                //console.log(jqXHR);
            },
        });
        
    }); 



  
	
});