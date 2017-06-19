<h4>Image de Profil :</h4>
<img id="profile-thumbnail" class="img-thumbnail" src="<?= WEB_ROOT . $params['user']->getProfilePic(); ?>">
<form id="profilePicForm" class="form-horizontal" method="POST">
    <br>
    <div class="input-group">
                            <span for="profile_pic" class="input-group-btn">
                                <label for="profile_pic" class="btn btn-success" type="button">Parcourir...</label>
                            </span>
        <input type="file" id="profile_pic" name="profile_pic" class="hidden">
        <input id="profile_pic_text" type="text" class="form-control">
    </div>
    <br>
    <div class="progress">
        <div
            id="profile-pic-progress-bar"
            class="progress-bar progress-bar-info"
            role="progressbar"
            aria-valuenow="0"
            aria-valuemin="0"
            aria-valuemax="100"
            style="width: 0%;"
        ></div>
    </div>
    <div class="" id="profile-pic-upload-response"></div>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>