var inputs = [0, 0, 0];

/*used to know how many fields are valid*/
$(document).ready(function() {
  function nb_valid(inputs) {
    var nb_valid = 0;
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i] != 0) {
        nb_valid++;
      }
    }
    return nb_valid;
  }

  /*reacts to any kind of inputs modification (add or delete)*/
  $(document).on('input', '.sign', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var warning = $("span", input.parent());
    var thumbs = $("i", input.parent());
    var verif_email = /^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var verif_pwd = /^(?=.*\d)(?=.*[A-Z]).{6,}$/;

    /*if the input's not empty*/
    if (no_blank) {

      /*if the modified input is the email one*/
      if (input.hasClass("email")) {

        /*test if the input value is a valid email or not*/
        if (verif_email.test(input.val())) {

          /*the input value is a valid email*/
          warning.text("Adresse mail indiquée");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
          inputs[0] = 1;
        } else {

          /*the input value is not a valid email*/
          warning.text("Veuillez indiquer une adresse mail");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[0] = 0;
        }
      }

      /*if the modified input is the password one*/
      else if (input.hasClass("pwd")) {

        /*test if the input value is a valid password or not*/
        if (verif_pwd.test(input.val())) {

          /*the input value is a valid password*/
          warning.text("Mot de passe indiqué");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
          inputs[1] = 1;

          /*if the input value is equal to the confirm password one*/
          if (input.val() == $('.vpwd').val()) {
            $("span", $('.vpwd').parent()).text("Mot de passe confirmé");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
            inputs[2] = 1;
          } else {

            /*if the input value is not equal to the confirm password one*/
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        }

        /*the input value is not a valid password*/
        else {
          warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[1] = 0;

          /*if the input value is equal to the confirm password one*/
          if (input.val() == $('.vpwd').val()) {
            $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          } else {

            /*if the input value is not equal to the confirm password one*/
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        }
      }

      /*if the modified input is the confirm password one*/
      else if (input.hasClass("vpwd")) {

        /*if the input value is equal to the password one*/
        if (input.val() == $('.pwd').val()) {

          /*if the password value is valid*/
          if (inputs[1] == 1) {
            warning.text("Mot de passe confirmé");
            $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
            inputs[2] = 1;
          } else {

            /*if the password value is not valid*/
            warning.text("Le mot de passe choisi est invalide");
            $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        } else {

          /*if the input value is not equal to the password one*/
          warning.text("Les mots de passe ne correspondent pas");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[2] = 0;
        }
      }
    }

    /*if the input's empty*/
    else {

      /*if the modified input is the email one*/
      if (input.hasClass("email")) {
        warning.text("Veuillez indiquer une adresse mail");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[0] = 0;
      }

      /*if the modified input is the password one*/
      else if (input.hasClass("pwd")) {
        warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[1] = 0;

        /*if the confirm password value is not empty*/
        if ($('.vpwd').val().length > 0) {
          $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
          $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[2] = 0;
        }
      }

      /*if the modified input is the confirm password one*/
      else if (input.hasClass("vpwd")) {
        warning.text("Les mots de passe ne correspondent pas");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[2] = 0;
      }
    }

    /*if all inputs are valid, the submit button is shown*/
    if (nb_valid(inputs) == 3) {
      $('.sign-submit').removeClass("invisible").addClass("visible");
    } else {
      $('.sign-submit').removeClass("visible").addClass("invisible");
    }
  });
});
