<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <form action="/" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Имя<sup>*</sup>:</label>
                    <input type="text" class="form-control <? if ($errors['name']): ?>is-invalid<? endif; ?>"
                           id="inputName" name="name" aria-describedby="nameHelp" value="<?= $fields['name'] ?? '' ?>">
                    <div id="nameHelp" class="form-text">Это поле обязательно для заполнения</div>
                    <div class="invalid-feedback"><?= $errors['name'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="inputSurname" class="form-label">Фамилия:</label>
                    <input type="text" class="form-control" id="inputSurname" name="surname"
                           aria-describedby="surnameHelp" value="<?= $fields['surname'] ?? '' ?>">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email<sup>*</sup>:</label>
                    <input type="email" class="form-control <? if ($errors['email']): ?>is-invalid<? endif; ?>"
                           id="inputEmail" name="email" aria-describedby="emailHelp"
                           value="<?= $fields['email'] ?? '' ?>">
                    <div id="emailHelp" class="form-text">Это поле обязательно для заполнения</div>
                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                </div>
                <div class="mb-3">
                    <label for="inputMessage" class="form-label">Текст сообщения</label>
                    <textarea class="form-control" id="inputMessage" rows="3"
                              name="text"><?= $fields['message'] ?? '' ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Отправить">
            </form>
        </div>
    </div>
</div>