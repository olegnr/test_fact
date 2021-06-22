
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Тестовое задание</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <!-- Custom styles  -->
        <link href="css/style.css" rel="stylesheet">

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- bootstrap.min.js -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- maskedinput -->
        <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
        <!-- Custom js -->
        <script src="js/custom.js" type="text/javascript"></script>
    </head>

    <body>
        <div class="container">

            <h1 align="center">Пользователи</h1>

            <p class="h3">Данные о пользователях</p>
            <table id="users_info" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Отчество</th>
                        <th scope="col">Должность</th>
                        <th scope="col">Номер телефона</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
            <p class="h3">Создание нового пользователя</p>
            <form>
                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Фамилия">
                </div>
                <div class="form-group">
                    <label for="last_name">Имя</label>
                    <input type="text" class="form-control" id="first_name" placeholder="Имя">
                </div>
                <div class="form-group">
                    <label for="last_name">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" placeholder="Отчество">
                </div>
                <div class="form-group">
                    <label for="last_name">Должность</label>
                    <input type="text" class="form-control" id="position" placeholder="Должность">
                </div>
                <div class="form-group">
                    <label for="last_name">Номер телефона</label>
                    <input type="text" class="form-control" id="phone_mobile" placeholder="Номер телефона">
                </div>
                <div class="form-check">
                </div>
                <button id="create_user" type="button" class="btn btn-primary">Создать пользователя</button>
            </form>

        </div> <!-- /container -->

        <!-- Modal -->
        <div class="modal fade" id="accept_modal" tabindex="-1" role="dialog" aria-labelledby="accept_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="accept_modalLabel">Уведомление</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="accept_message" class="modal-body">
                        
                    </div>
                    <div id="modal_buttons" class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>