$(document).ready(function() {
  $(document).on('input', '.sign', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var warning = $("span", input.parent());
    var thumbs = $("i", input.parent());
    var verif_email=/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var verif_pwd=/^(?=.*\d)(?=.*[A-Z]).{6,}$/;

    //input's not empty
    if(no_blank) {

      //email input
      if(input.hasClass("email")) {
        if(verif_email.test(input.val())) {
          warning.text("Adresse mail indiquée");
          $('.email').removeClass("invalid").addClass("valid");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
        }
        else {
          warning.text("Veuillez indiquer une adresse mail");
          $('.email').removeClass("valid").addClass("invalid");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        }
      }

      //password input
      else if(input.hasClass("pwd")) {
        if(verif_pwd.test(input.val())) {
          warning.text("Mot de passe indiqué");
          $('.pwd').removeClass("invalid").addClass("valid");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
        }
        else {
          warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
          $('.pwd').removeClass("valid").addClass("invalid");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        }
      }

      //confirm password input
      else if(input.hasClass("vpwd")) {
        if(input.val() == $('.pwd').val()) {
          warning.text("Mot de passe confirmé");
          $('.vpwd').removeClass("invalid").addClass("valid");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
        }
        else {
          warning.text("Les mots de passe ne correspondent pas");
          $('.vpwd').removeClass("valid").addClass("invalid");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        }
      }
    }

    //input's empty
    else {

      //email input
      if(input.hasClass("email")) {
        warning.text("Veuillez indiquer une adresse mail");
        $('.email').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
      }

      //password input
      else if(input.hasClass("pwd")) {
        warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
        $('.pwd').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
      }

      //confirm password input
      else if(input.hasClass("vpwd")) {
        warning.text("Les mots de passe de correspondent pas");
        $('.vpwd').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");

      }
    }

    if($('.email').hasClass("valid") && $('.pwd').hasClass("valid") && $('.vpwd').hasClass("valid")) {
      console.log("hey");
      $('.sign-submit').removeClass("invisible").addClass("visible");
    }

    else {
      $('.sign-submit').removeClass("visible").addClass("invisible");
    }
  });
});
