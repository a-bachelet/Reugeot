// Dès que le document est chargé lance cette fonction.
$(document).ready(function() {

    // Fonction qui cache les messages flash au bout de 3 secondes.
    var flashes = $('.flash');
    flashes.each(function(flash) {
       setTimeout(function() {
          flashes.slideUp();
       }, 3000);
    });

    // Fonction qui modifie l'apparence des checkbox.
    $('input').iCheck({
       checkboxClass: 'icheckbox_flat',
       radioClass: 'iradio_flat'
    });

    // Fonctions qui affichent les noms des fichiers dans les inputs de type file.
    $('#profile_pic').on('change', function () {
       $('#profile_pic_text').val(this.files[0].name);
    });

    // Gestion de l'upload de l'image de profil.
    $('#profilePicForm').on('submit', function (event) {
        event.preventDefault();
        var file = document.forms['profilePicForm']['profile_pic'].files[0];
        var formData = new FormData();
        formData.append('profile_pic', file);
        var ajax = new XMLHttpRequest();
        var progress_bar = $('#profile-pic-progress-bar');
        ajax.upload.addEventListener('progress', function (event) {
            var percent = Math.round((event.loaded/event.total)*100);
            progress_bar.attr('aria-valuenow', percent);
            progress_bar.css('width', percent + '%');
            progress_bar.html(percent + '%');
        }, false);
        ajax.addEventListener('load', function(event) {
            progress_bar.attr('aria-valuenow', 0);
            progress_bar.css('width', 0 + '%');
            progress_bar.html('');
            var img = $('#profile-thumbnail');
            var src = img.attr('src');
            img.attr('src', src);
        }, false);
        ajax.addEventListener('error', function (event) {
            alert('Erreur lors du chagement du chargement de l\'image !');
            progress_bar.attr('aria-valuenow', 0);
            progress_bar.css('width', 0 + '%');
            progress_bar.html('');
            var img = $('#profile-thumbnail');
            var src = img.attr('src');
            img.attr('src', src);
        }, false);
        ajax.addEventListener('abort', function (event) {
            alert('Erreur lors du chagement du chargement de l\'image !');
            progress_bar.attr('aria-valuenow', 0);
            progress_bar.css('width', 0 + '%');
            progress_bar.html('');
            var img = $('#profile-thumbnail');
            var src = img.attr('src');
            img.attr('src', src);
        }, false);
        alert(window.location.hostname);
        ajax.open('POST', 'http://' + window.location.hostname + window.location.pathname + '/profile-pic');
        ajax.send(formData);
    });

});