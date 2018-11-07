var inputs = [0, 0, 0];

$(document).ready(function() {
  function nb_valid(inputs) {
    var nb_valid = 0;
    for(var i = 0; i < inputs.length; i++) {
      if(inputs[i] != 0) {
        nb_valid++;
      }
    }
    return nb_valid;
  }

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

        //valid
        if(verif_email.test(input.val())) {
          warning.text("Adresse mail indiquée");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
          inputs[0] = 1;
        }

        //not valid
        else {
          warning.text("Veuillez indiquer une adresse mail");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[0] = 0;
        }
      }

      //password input
      else if(input.hasClass("pwd")) {

        //valid
        if(verif_pwd.test(input.val())) {
          warning.text("Mot de passe indiqué");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
          inputs[1] = 1;

          if(input.val() == $('.vpwd').val()) {
            $("span", $('.vpwd').parent()).text("Mot de passe confirmé");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
            inputs[2] = 1;
          }
          else {
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        }

        //not valid
        else {
          warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[1] = 0;

          if(input.val() == $('.vpwd').val()) {
            $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
          else {
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        }
      }

      //confirm password input
      else if(input.hasClass("vpwd")) {
        if(input.val() == $('.pwd').val()) {
          if(inputs[1] == 1) {
            warning.text("Mot de passe confirmé");
            $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
            inputs[2] = 1;
          }
          else {
            warning.text("Le mot de passe choisi est invalide");
            $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
            inputs[2] = 0;
          }
        }
        else {
          warning.text("Les mots de passe ne correspondent pas");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[2] = 0;
        }
      }
    }

    //input's empty
    else {

      //email input
      if(input.hasClass("email")) {
        warning.text("Veuillez indiquer une adresse mail");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[0] = 0;
      }

      //password input
      else if(input.hasClass("pwd")) {
        warning.text("Votre mot de passe doit être composé de 6 caractères minimum (au moins 1 majusule et 1 chiffre)");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[1] = 0;
        if($('.vpwd').val().length > 0) {
          $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
          $("i", $('.vpwd').parent()).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
          inputs[2] = 0;
        }
      }

      //confirm password input
      else if(input.hasClass("vpwd")) {
        warning.text("Les mots de passe ne correspondent pas");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        inputs[2] = 0;
      }
    }

    console.log(nb_valid(inputs));

    //all input valid
    if(nb_valid(inputs) == 3) {
      $('.sign-submit').removeClass("invisible").addClass("visible");
    }

    else {
      $('.sign-submit').removeClass("visible").addClass("invisible");
    }
  });
});
