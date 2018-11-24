var inputs = [0, 0, 0, 0, 0];

/*show the datepicker when clicking on the calendar icon*/
$(document).ready(function() {
  $(".fa-calendar-alt").click(function() {
    $("#birthday").datepicker();
    $("#birthday").datepicker("show");
  });

  /*used to know how many fields are valid*/
  function nb_invalid(inputs) {
    var nb_invalid = 0;
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i] != 0) {
        nb_invalid++;
      }
    }
    return nb_invalid;
  }

  /*reacts to any kind of inputs modification (add or delete)*/
  $(document).on('input', '.account', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var verif_email = /^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var verif_pwd = /^(?=.*\d)(?=.*[A-Z]).{6,}$/;
    var verif_date = /^((((0[1-9]|[12][0-9]|3[01])[- /.](0[13578]|1[02]))|((0[1-9]|[12][0-9]|30)[- /.](0[469]|11))|((0[1-9]|[12][0-8])[- /.](02)))[- /.]\d{4})|((0[1-9]|[12][0-9])[- /.](02)[- /.](([0-9]{2}(04|08|[2468][048]|[13579][26])|2000)))$/;
    var verif_name = /^[a-zA-Z -]*[^0-9]$/;

    /*if the modified input is a checkbox one*/
    if (input.hasClass("check-1") || input.hasClass("check-2") || input.hasClass("check-3")) {

      /*if the modified input is the checkbox #1 one*/
      if (input.hasClass("check-1")) {

        /*unchecked the other checkbox*/
        $('.check-2').prop('checked', false);
        $('.check-3').prop('checked', false);
      }

      /*if the modified input is the checkbox #2 one*/
      else if (input.hasClass("check-2")) {

        /*unchecked the other checkbox*/
        $('.check-1').prop('checked', false);
        $('.check-3').prop('checked', false);
      }

      /*if the modified input is the checkbox #3 one*/
      else if (input.hasClass("check-3")) {

        /*unchecked the other checkbox*/
        $('.check-1').prop('checked', false);
        $('.check-2').prop('checked', false);
      }
    }

    /*if the modified input is not a checkbox one*/
    else {

      /*if the input's not empty*/
      if (no_blank) {

        /*if the modified input is the name one*/
        if (input.hasClass("name")) {

          /*test if the input value is a valid name or not*/
          if (verif_name.test(input.val())) {

            /*the input value is a valid name*/
            $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
            inputs[0] = 0;
          } else {

            /*the input value is not a valid name*/
            $("i", $('.name').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.name').parent()).removeClass("invisible").addClass("visible");
            inputs[0] = 1;
          }
        }

        /*if the modified input is the first name one*/
        else if (input.hasClass("fname")) {

          /*test if the input value is a valid first name or not*/
          if (verif_name.test(input.val())) {

            /*the input value is a valid first name*/
            $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
            inputs[1] = 0;
          } else {

            /*the input value is not a valid first name*/
            $("i", $('.fname').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.fname').parent()).removeClass("invisible").addClass("visible");
            inputs[1] = 1;
          }
        }

        /*if the modified input is the email one*/
        else if (input.hasClass("email")) {

          /*test if the input value is a valid email or not*/
          if (verif_email.test(input.val())) {

            /*the input value is a valid email*/
            $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
            inputs[2] = 0;
          } else {

            /*the input value is not a valid email*/
            $("i", $('.email').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.email').parent()).removeClass("invisible").addClass("visible");
            inputs[2] = 1;
          }
        }

        /*if the modified input is the birthday one*/
        else if (input.hasClass("birthday-input")) {

          /*test if the input value is a valid date or not*/
          if (verif_date.test(input.val())) {

            /*the input value is a valid date*/
            $('.thumbs-birthday').removeClass("visible").addClass("invisible");
            $('.warning-birthday').removeClass("visible").addClass("invisible");
            inputs[3] = 0;
          } else {

            /*the input value is not a valid date*/
            $('.thumbs-birthday').removeClass("invisible").addClass("visible");
            $('.warning-birthday').removeClass("invisible").addClass("visible");
            inputs[3] = 1;
          }
        }

        /*if the modified input is the password one*/
        else if (input.hasClass("pwd")) {

          /*test if the input value is a valid password or not*/
          if (verif_pwd.test(input.val())) {

            /*the input value is a valid password*/
            $("i", $('.pwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.pwd').parent()).removeClass("visible").addClass("invisible");

            /*if the input value is equal to the confirm password one*/
            if (input.val() == $('.vpwd').val()) {
              $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              inputs[4] = 0;
            } else {

              /*if the input value is not equal to the confirm password one*/
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
              inputs[4] = 1;
            }
          }

          /*the input value is not a valid password*/
          else {
            $("i", $('.pwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.pwd').parent()).removeClass("invisible").addClass("visible");
            inputs[4] = 1;

            /*if the input value is equal to the confirm password one*/
            if (input.val() == $('.vpwd').val()) {
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
              inputs[4] = 1;
            } else {

              /*if the input value is not equal to the confirm password one*/
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
              inputs[4] = 1;
            }
          }
        }

        /*if the modified input is the confirm password one*/
        else if (input.hasClass("vpwd")) {

          /*if the input value is equal to the password one*/
          if (input.val() == $('.pwd').val()) {

            /*if the password value is valid*/
            if (verif_pwd.test($('.pwd').val())) {
              $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              inputs[4] = 0;
            } else {

              /*if the password value is not valid*/
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
              inputs[4] = 1;
            }
          } else {

            /*if the input value is not equal to the password one*/
            $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            inputs[4] = 1;
          }
        }
      }

      /*if the input's empty*/
      else {

        /*if the modified input is the name one*/
        if (input.hasClass("name")) {
          $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
          inputs[0] = 0;
        }

        /*if the modified input is the first name one*/
        else if (input.hasClass("fname")) {
          $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
          inputs[1] = 0;
        }

        /*if the modified input is the email one*/
        else if (input.hasClass("email")) {
          $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
          inputs[2] = 0;
        }

        /*if the modified input is the birthday one*/
        else if (input.hasClass("birthday-input")) {
          $('.thumbs-birthday').removeClass("visible").addClass("invisible");
          $('.warning-birthday').removeClass("visible").addClass("invisible");
          inputs[3] = 0;
        }

        /*if the modified input is the password one*/
        else if (input.hasClass("pwd")) {
          $("i", $('.pwd').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.pwd').parent()).removeClass("visible").addClass("invisible");

          /*if the confirm password value is empty*/
          if ($('.vpwd').val().length == 0) {
            inputs[4] = 0;
            $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
          } else {

            /*if the confirm password value is not empty*/
            inputs[4] = 1;
          }
        }

        /*if the modified input is the confirm password one*/
        else if (input.hasClass("vpwd")) {

          /*if the password value is empty*/
          if ($('.pwd').val().length == 0) {
            $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            inputs[4] = 0;
          } else {

            /*if the confirm password value is not empty*/
            inputs[4] = 1;
          }
        }
      }
    }

    /*if at least one input is not valid, the submit button is not shown*/
    if (nb_invalid(inputs) == 0) {
      $('.account-buttons').removeClass("invisible").addClass("visible");
    } else {
      $('.account-buttons').removeClass("visible").addClass("invisible");
    }
  });
});
