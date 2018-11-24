$(document).ready(function() {

  /*reacts to any kind of inputs modification (add or delete)*/
  $(document).on('input', '.log', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var warning = $("span", input.parent());
    var thumbs = $("i", input.parent());
    var verif = /^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;

    /*if the input's not empty*/
    if (no_blank) {

      /*if the modified input is the email one*/
      if (input.hasClass("email")) {

        /*test if the input value is a valid email or not*/
        if (verif.test(input.val())) {

          /*the input value is an email*/
          warning.text("Adresse mail indiquée");
          $('.email').removeClass("invalid").addClass("valid");
          $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
        } else {

          /*the input value is not an email*/
          warning.text("Veuillez indiquer votre adresse mail");
          $('.email').removeClass("valid").addClass("invalid");
          $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
        }
      }

      /*if the modified input is the password one (in "log", the password field is valid only if the field's not empty)*/
      else if (input.hasClass("pwd")) {
        warning.text("Mot de passe indiqué");
        $('.pwd').removeClass("invalid").addClass("valid");
        $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
      }
    }

    /*if the input's empty*/
    else {

      /*if the modified input is the email one*/
      if (input.hasClass("email")) {
        warning.text("Veuillez indiquer votre adresse mail");
        $('.email').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
      }

      /*if the modified input is the password one*/
      else if (input.hasClass("pwd")) {
        warning.text("Veuillez indiquer votre mot de passe");
        $('.pwd').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
      }
    }

    /*if all inputs are valid, the submit button is shown*/
    if ($('.email').hasClass("valid") && $('.pwd').hasClass("valid")) {
      $('.log-submit').removeClass("invisible").addClass("visible");
    } else {
      $('.log-submit').removeClass("visible").addClass("invisible");
    }
  });
});
