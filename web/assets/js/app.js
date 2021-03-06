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
       if (this.files[0] && this.files[0].name) {
           $('#profile_pic_text').val(this.files[0].name);
       } else {
           $('#profile_pic_text').val('');
       }
    });
    $('#vehicle_pic').on('change', function () {
        if (this.files[0] && this.files[0].name) {
            $('#vehicle_pic_text').val(this.files[0].name);
        } else {
            $('#vehicle_pic_text').val('');
        }
    });

    // Gestion de l'upload de l'image de profil.
    $('#profilePicForm').on('submit', function (event) {
        var responseDiv = $('#profile-pic-upload-response');
        responseDiv.stop().hide();
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
            var response = JSON.parse(event.target.responseText);
            responseDiv.addClass('alert');
            if (response['error']) {
                responseDiv.removeClass('alert-success');
                responseDiv.addClass('alert-danger');
            } else {
                responseDiv.removeClass('alert-danger');
                responseDiv.addClass('alert-success');
            }
            responseDiv.html(response['message']);
            responseDiv.stop().slideDown();
            setTimeout(function() {responseDiv.stop().slideUp()}, 3000);
            var img = $('#profile-thumbnail');
            var src = img.attr('src');
            var date = new Date();
            img.attr('src', src + '?time=' + date.getTime());
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
        ajax.open('POST', 'http://' + window.location.hostname + window.location.pathname + '/profile-pic');
        ajax.send(formData);
    });

    // Formulaire d'inscription (checkbox)
    var professional = $('#professional');
    var company_fgs = $('.company_fg');
    company_fgs.stop().slideUp();
    professional.on('ifChecked', function (event) {
        company_fgs.stop().slideDown();
    });
    professional.on('ifUnchecked', function (event) {
       company_fgs.stop().slideUp(function () {
           $('.company_fg :input').val('');
       });
    });

    // Compteur Accéléré pour la page d'accueil de l'administration
    $('.admin-home-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    // Formulaire d'ajout / d'édition de véhicules
    $('#vehicleForm').on('submit', function (event) {

        event.preventDefault();

        var vehicle_pic = document.forms['vehicleForm']['vehicle_pic'].files[0];
        var model = document.forms['vehicleForm']['model'].value;
        var vehicle_category = document.forms['vehicleForm']['vehicle_category'].value;
        var vehicle_brand = document.forms['vehicleForm']['vehicle_brand'].value;
        var price_without_taxes = document.forms['vehicleForm']['price_without_taxes'].value;
        var professional = $('#professional').parent('[class*="icheckbox_flat"]').hasClass('checked') ? 'on' : 'off';
        var active = $('#active').parent('[class*="icheckbox_flat"]').hasClass('checked') ? 'on' : 'off';
        var progress_bar = $('#vehicle-pic-progress-bar');

        var formData = new FormData();
        formData.append('vehicle_pic', vehicle_pic);
        formData.append('model', model);
        formData.append('vehicle_category', vehicle_category);
        formData.append('vehicle_brand', vehicle_brand);
        formData.append('price_without_taxes', price_without_taxes);
        formData.append('professional', professional);
        formData.append('active', active);

        var ajax = new XMLHttpRequest();

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
            var response = JSON.parse(event.target.responseText);
            if (response['valid'] === true) {
                var flashMessage = [];
                flashMessage['type'] = 'success';
                flashMessage['message'] = 'Le véhicule a bien été ajouté.';
            }
            $('.flashes').append("<div class='alert alert-"+flashMessage['type']+" alert-dismissible flash'>"+flashMessage['message']+"</div>");
            setTimeout(function () {
                $('.flash').slideUp();
            }, 3000);
            console.log(response);
        }, false);

        ajax.addEventListener('error', function (event) {
            alert('Erreur lors du chagement du chargement de l\'image !');
            progress_bar.attr('aria-valuenow', 0);
            progress_bar.css('width', 0 + '%');
            progress_bar.html('');
        }, false);

        ajax.addEventListener('abort', function (event) {
            alert('Erreur lors du chagement du chargement de l\'image !');
            progress_bar.attr('aria-valuenow', 0);
            progress_bar.css('width', 0 + '%');
            progress_bar.html('');
        }, false);

        ajax.open('POST', 'http://' + window.location.hostname + window.location.pathname);
        ajax.send(formData);

    });

    // Ajout des véhicules dans le panier
    $('.basketVehicleAddButton').on('click', function (event) {
        var id = $(this).attr('vehicle');
        $('#addBasketVehicleIdInput').val(id);
    });

    // Ajouter / Retirer des véhicules du panier
    $('.basketIndexAddVehicleButton').on('click', function (event) {
        var id = $(this).attr('vehicle');
        $('#basketIndexAddVehiculeInputId').val(id);
    });
    $('.basketIndexRemoveVehicleButton').on('click', function (event) {
        var id = $(this).attr('vehicle');
        $('#basketIndexRemoveVehiculeInputId').val(id);
    });

});