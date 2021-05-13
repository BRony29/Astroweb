// **************************** Fonctions JQuery ****************************

$(document).ready(function() {

    // bouton permettant de revenir en haut des pages
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '400');
    });


    // Bootstrap Tooltips
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Galerie fancybox
    $('[data-fancybox="gallery"]').fancybox({
        loop: true,
        protect: true,
        buttons: [
            "zoom",
            //"share",
            "slideShow",
            "fullScreen",
            //"download",
            "thumbs",
            "close"
        ],
        animationEffect: "zoom-in-out",
        animationDuration: 500,
        transitionEffect: "zoom-in-out",
        transitionDuration: 500,
    });

    // forum et site (modal de confirmation des suppressions et modifications)
    $('#supprimerModal, #supprimerModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-body input').val(recipient)
    })
    $('#modifierDouble, #modifierDouble2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var idmodif = button.data('idmodif')
        var sujetmodif = button.data('sujetmodif')
        var modal = $(this)
        modal.find('.modal-header input').val(idmodif)
        modal.find('.modal-body input').val(sujetmodif)
    })
    $('#ajouterModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-header input').val(recipient)
    })
    $('#modifierTriple').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var idmodif = button.data('idmodif')
        var sujetmodif = button.data('sujetmodif')
        var contenumodif = button.data('contenumodif')
        var modal = $(this)
        modal.find('.modal-header input').val(idmodif)
        modal.find('.modal-body input').val(sujetmodif)
        modal.find('.modal-body textarea').val(contenumodif)
    })
    $('#modifierFive').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var idmodif = button.data('idmodif')
        var sujetmodif = button.data('sujetmodif')
        var contenumodif = button.data('contenumodif')
        var lieu = button.data('lieu')
        var date = button.data('date')
        var modal = $(this)
        modal.find('.modal-footer input').val(idmodif)
        modal.find('.modal-body0 input').val(sujetmodif)
        modal.find('.modal-body3 textarea').val(contenumodif)
        modal.find('.modal-body1 input').val(lieu)
        modal.find('.modal-body2 input').val(date)
    })

    // config WysiBB
    $(function() {
        var optionsWbb = {
            buttons: "bold,italic,underline,fontcolor,justifycenter,|,smilebox,|,img,link,|,quote,|,removeFormat",
            lang: "fr",
            showHotkeys: "false",
            traceTextarea: "true",
            resize_maxheight: "350"
        }
        var optionsWbb2 = {
            buttons: "bold,italic,underline,fontcolor,justifycenter,|,smilebox,|,removeFormat",
            lang: "fr",
            showHotkeys: "false",
            traceTextarea: "true",
            resize_maxheight: "350"
        }
        var optionsWbb3 = {
            lang: "fr",
            showHotkeys: "false",
            traceTextarea: "true",
            resize_maxheight: "700"
        }
        var optionsWbb4 = {
            buttons: "bold,italic,underline,|,removeFormat",
            lang: "fr",
            showHotkeys: "false",
            traceTextarea: "true",
            resize_maxheight: "250"
        }
        $("#editor").wysibb(optionsWbb);
        $("#miniEditor").wysibb(optionsWbb2);
        $("#maxiEditor").wysibb(optionsWbb3);
        $("#ultraEditor").wysibb(optionsWbb4);
    })



});
// fin JQuery

// **************************** Fonctions Javascript ****************************

// Verification du format d'un mot de passe lors du changement

function checkPass() {
    'use strict';
    var champA = document.getElementById("motDePasse1").value;
    var champB = document.getElementById("motDePasse2").value;
    var div_comp = document.getElementById("divcomp");
    if (champA != '' && champB != '') {
        if (champA == champB) {
            divcomp.innerHTML = "";
            document.getElementById("btnValid").disabled = false;
        } else {
            divcomp.innerHTML = "<i>Les deux mots de passe doivent être identiques !</i>";
            divcomp.style.color = "red";
            document.getElementById("btnValid").disabled = true;
        }
    } else {
        divcomp.innerHTML = "<i>Le mot de passe ne doit pas être vide !</i>";
        divcomp.style.color = "red";
        document.getElementById("btnValid").disabled = true;
    }
}

function checkPass2() {
    'use strict';
    var champA = document.getElementById("motDePasse3").value;
    var champB = document.getElementById("motDePasse4").value;
    var div_comp = document.getElementById("divcomp2");
    if (champA != '' && champB != '') {
        if (champA == champB) {
            divcomp2.innerHTML = "";
            document.getElementById("btnValid2").disabled = false;
        } else {
            divcomp2.innerHTML = "<i>Les deux mots de passe doivent être identiques !</i>";
            divcomp2.style.color = "red";
            document.getElementById("btnValid2").disabled = true;
        }
    } else {
        divcomp2.innerHTML = "<i>Le mot de passe ne doit pas être vide !</i>";
        divcomp2.style.color = "red";
        document.getElementById("btnValid2").disabled = true;
    }
}

// Sidebar

function openNav() {
    'use strict';
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    'use strict';
    document.getElementById("mySidenav").style.width = "0";
}

// Forum

function checkSize50() {
    'use strict';
    var sujet = document.getElementById("sujet").value;
    var msgErreur = document.getElementById("msgErreur");
    if (sujet != "") {
        if (sujet.length > 50) {
            msgErreur.innerHTML = "<i>Le sujet est trop long :50 caractères maximum.</i>";
            msgErreur.style.color = "red";
            document.getElementById("btnSubmit").disabled = true;
        } else {
            msgErreur.innerHTML = "";
            document.getElementById("btnSubmit").disabled = false;
        }
    } else {
        msgErreur.innerHTML = "<i>Le sujet ne doit doit pas être vide !</i>";
        msgErreur.style.color = "red";
        document.getElementById("btnSubmit").disabled = true;
    }
}

function checkSize50_2() {
    'use strict';
    var sujet = document.getElementById("sujet2").value;
    var msgErreur = document.getElementById("msgErreur2");
    if (sujet != "") {
        if (sujet.length > 50) {
            msgErreur.innerHTML = "<i>Le sujet est trop long : 50 caractères maximum.</i>";
            msgErreur.style.color = "red";
            document.getElementById("btnSubmit2").disabled = true;
        } else {
            msgErreur.innerHTML = "";
            document.getElementById("btnSubmit2").disabled = false;
        }
    } else {
        msgErreur.innerHTML = "<i>Le sujet ne doit doit pas être vide !</i>";
        msgErreur.style.color = "red";
        document.getElementById("btnSubmit2").disabled = true;
    }
}

// function checkContenu() {
//     'use strict';
//     var sujet = document.getElementById("message").value;
//     var msgErreur = document.getElementById("msgErreur");
//     if (sujet == "") {
//         msgErreur.innerHTML = "<i>Le Message ne doit doit pas être vide !</i>";
//         msgErreur.style.color = "red";
//         document.getElementById("btnSubmit").disabled = true;
//     } else {
//         msgErreur.innerHTML = "";
//         document.getElementById("btnSubmit").disabled = false;
//     }
// }


// pamamètre de site : duree de timeout

function checkDuree() {
    'use strict';
    var duree = document.getElementById("duree").value;
    var div_duree = document.getElementById("divduree");
    if (duree >= 600 && duree <= 3600) {
        div_duree.innerHTML = "";
        document.getElementById("btnValid3").disabled = false;
    } else {
        div_duree.innerHTML = "<i>La durée doit être comprise en 600 et 3600 sec !</i>";
        div_duree.style.color = "red";
        document.getElementById("btnValid3").disabled = true;
    }
}

// pamamètre de site : poids des thumb

function checkThumb() {
    'use strict';
    var thumb = document.getElementById("thumb").value;
    var div_thumb = document.getElementById("divthumb");
    if (thumb >= 100 && thumb <= 500) {
        div_thumb.innerHTML = "";
        document.getElementById("btnValid4").disabled = false;
    } else {
        div_thumb.innerHTML = "<i>Le poids doit être compris en 100 et 500 ko !</i>";
        div_thumb.style.color = "red";
        document.getElementById("btnValid4").disabled = true;
    }
}

// pamamètre de site : poids des images

function checkTaille() {
    'use strict';
    var taille = document.getElementById("taille").value;
    var div_taille = document.getElementById("divtaille");
    if (taille >= 1 && taille <= 5) {
        div_taille.innerHTML = "";
        document.getElementById("btnValid5").disabled = false;
    } else {
        div_taille.innerHTML = "<i>Le poids doit être compris en 1 et 5 Mo !</i>";
        div_taille.style.color = "red";
        document.getElementById("btnValid5").disabled = true;
    }
}

// pamamètre de site : nbre d'essais avant verrouillage

function checkLimite() {
    'use strict';
    var limite = document.getElementById("limite").value;
    var div_limite = document.getElementById("divlimite");
    if (limite >= 1 && limite <= 5) {
        div_limite.innerHTML = "";
        document.getElementById("btnValid6").disabled = false;
    } else {
        div_limite.innerHTML = "<i>Le nombre d'essais doit être compris en 1 et 5 !</i>";
        div_limite.style.color = "red";
        document.getElementById("btnValid6").disabled = true;
    }
}