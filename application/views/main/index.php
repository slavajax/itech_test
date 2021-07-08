<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <form action="/" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Имя<sup>*</sup>:</label>
                    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">Это поле обязательно для заполнения</div>
                </div>
                <div class="mb-3">
                    <label for="inputSurname" class="form-label">Фамилия:</label>
                    <input type="text" class="form-control" id="inputSurname" name="surname" aria-describedby="surnameHelp">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email<sup>*</sup>:</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Это поле обязательно для заполнения</div>
                </div>
                <div class="mb-3">
                    <label for="inputMessage" class="form-label">Текст сообщения</label>
                    <textarea class="form-control" id="inputMessage" rows="3" name="text"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Отправить">
            </form>
        </div>
    </div>
</div>