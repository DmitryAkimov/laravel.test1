@extends('layout.mdm')
@section('title', 'New FR')
@section('content')

    <div id="sendmessage" style="display: none;">
        Ваше сообщение отправлено!
    </div>
    <div id="senderror" style="display: none;">
        При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора
        <span></span>
    </div>

    <form id="funds_request_create" class="form-horizontal" class="validateform" enctype="multipart/form-data" method="post" action = "/funds_request/store">

        <fieldset>
            {{ csrf_field() }}
            <!-- Form Name -->
            <legend>Заявка на получение денежных средств</legend>
        <input id="email" name="email"  type="hidden" value = "{{$email}}">

            <!-- ФИО-->
            <div class="form-group row ">
                <label class="col-2 control-label" for="employeeFIO">Заявитель</label>
                <div class="col-10">
                    <input id="EmployeeFIO" name="employeeFIO" type="text" placeholder="ФИО получателя"
                        class="form-control input-md" required="">
                </div>
            </div>

            <!-- Статья затрат -->
            <div class="form-group row ">
                <label class="col-2 control-label" for="cost_item">Статья ДС</label>
                <div class="col-10">
                    <select id="cost_item" class="form-control">
                        <option value="1">Бензин</option>
                        <option value="2">Покупка хоз товаров</option>
                    </select>
                </div>
            </div>

            <!-- Сумма и валюта-->
            <div class="form-group row">
                <label class="col-2 control-label" for="amount">Сумма</label>
                <div class="col-4">
                    <input id="amount" name="amount" type="number" placeholder="1.0" step="0.01" class="form-control input-md" required="" min="1" max="100000">
                    <span class="help-block">Введите сумму расходов</span>
                </div>

                <div class="col-4">
                    <select id="currency" class="form-control">
                        <option value="RUR">Рубли</option>
                        <option value="EUR">Евро</option>
                        <option value="USD">Доллары</option>
                    </select>
                </div>
            </div>

            <!-- Описание -->
            <div class="form-group row">
                <label class="col-2 control-label" for="description">Назначение</label>
                <div class="col-10">
                    <textarea class="form-control" id="description"
                        name="description">прошу ...</textarea>
                </div>
            </div>

            <!-- File Button -->
            <div class="form-group row">
                <label class="col-2 control-label" for="attach1">Файл 1</label>
                <div class="col-10">
                    <input id="attach1" name="attach1" class="input-file" type="file" accept="image/*,application/pdf">
                </div>
            </div>

            <!-- File Button -->
            <div class="form-group row">
                <label class="col-2 control-label" for="attach2">Файл 2</label>
                <div class="col-10">
                    <input id="attach2" name="attach2" class="input-file" type="file" accept="image/*,application/pdf">
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="buttonSave">Double Button</label>
                <div class="col-md-8">
                    <button id="buttonSave" type="submit" name="buttonSave" class="btn btn-success">Сохранить</button>
                    <button id="buttonCancel" type ="reset" class="btn btn-danger">Отмена</button>
                </div>
            </div>

        </fieldset>
    </form>

    <script>
/*         $(document).ready(function() {
            $('#funds_request_create').on('submit', function(e) {
                e.preventDefault();
                console.log($('#funds_request_create').serialize());
                $.ajax({
                    type: 'POST',
                    url: '/funds_request/store',
                    data: $('#funds_request_create').serialize(),
     
                    success: function(data) {
                        console.log('POST Ok');
                        console.log(data);
                        if (data.result) {
                            $('#senderror').hide();
                            $('#sendmessage').show();
                        } else {
                            $('#senderror').show();
                            $('#sendmessage').hide();
                        }
                    },
                    error: function() {
                        $('#senderror').show();
                        $('#sendmessage').hide();
                    }
                });
            });
        }); */

    </script>

@endsection
