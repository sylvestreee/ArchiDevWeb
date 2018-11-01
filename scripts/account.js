var inputs = [0, 0, 0, 0, 0];

$(document).ready(function() {
  $(".fa-calendar-alt").click(function() {
    $("#birthday").datepicker();
    $("#birthday").datepicker("show");
  });

  function nb_invalid(inputs) {
    var nb_invalid = 0;
    for(var i = 0; i < inputs.length; i++) {
      if(inputs[i] != 0) {
        nb_invalid++;
      }
    }
    return nb_invalid;
  }

  $(document).on('input', '.account', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var verif_email=/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
    var verif_pwd=/^(?=.*\d)(?=.*[A-Z]).{6,}$/;
    var verif_date=/^((((0[1-9]|[12][0-9]|3[01])[- /.](0[13578]|1[02]))|((0[1-9]|[12][0-9]|30)[- /.](0[469]|11))|((0[1-9]|[12][0-8])[- /.](02)))[- /.]\d{4})|((0[1-9]|[12][0-9])[- /.](02)[- /.](([0-9]{2}(04|08|[2468][048]|[13579][26])|2000)))$/;
    var verif_name=/^[a-zA-Z -]*[^0-9]$/;

    //checkbox input
    if(input.hasClass("check-1") || input.hasClass("check-2") || input.hasClass("check-3")) {

      //check-1
      if(input.hasClass("check-1")) {
        $('.check-2').prop('checked',false);
        $('.check-3').prop('checked',false);
      }

      //check-2
      else if(input.hasClass("check-2")) {
        $('.check-1').prop('checked',false);
        $('.check-3').prop('checked',false);
      }

      //check-3
      else if(input.hasClass("check-3")) {
        $('.check-1').prop('checked',false);
        $('.check-2').prop('checked',false);
      }
    }

    //not checkbox input
    else {

      //input's not empty
      if(no_blank) {

        //name input
        if(input.hasClass("name")) {

          //valid
          if(verif_name.test(input.val())) {
            $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
            inputs[0] = 0;
          }

          //not valid
          else {
            $("i", $('.name').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.name').parent()).removeClass("invisible").addClass("visible");
            inputs[0] = 1;
          }
        }

        //fname input
        else if(input.hasClass("fname")) {

          //valid
          if(verif_name.test(input.val())) {
            $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
            inputs[1] = 0;
          }

          //not valid
          else {
            $("i", $('.fname').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.fname').parent()).removeClass("invisible").addClass("visible");
            inputs[1] = 1;
          }
        }

        //email input
        else if(input.hasClass("email")) {

          //valid
          if(verif_email.test(input.val())) {
            $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
            inputs[2] = 0;
          }

          //not valid
          else {
            $("i", $('.email').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.email').parent()).removeClass("invisible").addClass("visible");
            inputs[2] = 1;
          }
        }

        //birthday input
        else if(input.hasClass("birthday-input")) {

          //valid
          if(verif_date.test(input.val())) {
            $('.thumbs-birthday').removeClass("visible").addClass("invisible");
            $('.warning-birthday').removeClass("visible").addClass("invisible");
            inputs[3] = 0;
          }

          //not valid
          else {
            $('.thumbs-birthday').removeClass("invisible").addClass("visible");
            $('.warning-birthday').removeClass("invisible").addClass("visible");
            inputs[3] = 1;
          }
        }

        //password input
        else if(input.hasClass("pwd")) {

          //valid
          if(verif_pwd.test(input.val())) {
            $("i", $('.pwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.pwd').parent()).removeClass("visible").addClass("invisible");

            if(input.val() == $('.vpwd').val()) {
              $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              inputs[4] = 0;
            }
            else {
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
              inputs[4] = 1;
            }
          }

          //not valid
          else {
            $("i", $('.pwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.pwd').parent()).removeClass("invisible").addClass("visible");
            inputs[4] = 1;

            if(input.val() == $('.vpwd').val()) {
              console.log("hey2");
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
              inputs[4] = 1;
            }
            else {
              //if($('.vpwd').val().length > 0) {
                $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
                $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
                $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
              //}
              inputs[4] = 1;
            }
          }
        }

        //confirm password input
        else if(input.hasClass("vpwd")) {
          if(input.val() == $('.pwd').val()) {
            if(verif_pwd.test($('.pwd').val())) {
              $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
              inputs[4] = 0;
            }
            else {
              $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
              $("span", $('.vpwd').parent()).text("Le mot de passe choisi est invalide");
              inputs[4] = 1;
            }
          }
          else {
            $("i", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.vpwd').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
            inputs[4] = 1;
          }
        }
      }

      //input's empty
      else {

        //name input
        if(input.hasClass("name")) {
          $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
          inputs[0] = 0;
        }

        //fname input
        else if(input.hasClass("fname")) {
          $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
          inputs[1] = 0;
        }

        //email input
        else if(input.hasClass("email")) {
          $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
          inputs[2] = 0;
        }

        //birthday input
        else if(input.hasClass("birthday-input")) {
          $('.thumbs-birthday').removeClass("visible").addClass("invisible");
          $('.warning-birthday').removeClass("visible").addClass("invisible");
          inputs[3] = 0;
        }

        else if(input.hasClass("pwd")) {
          $("i", $('.pwd').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.pwd').parent()).removeClass("visible").addClass("invisible");
          if($('.vpwd').val().length == 0) {
            inputs[4] = 0;
            $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).text("Les mots de passe ne correspondent pas");
          }
          else {
            inputs[4] = 1;
          }
        }

        else if(input.hasClass("vpwd")) {
          if($('.pwd').val().length == 0) {
            $("i", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            $("span", $('.vpwd').parent()).removeClass("visible").addClass("invisible");
            inputs[4] = 0;
          }
          else {
            inputs[4] = 1;
          }
        }
      }
    }
    //console.log(nb_input);
    console.log(nb_invalid(inputs));

    //at least one input is valid
    if(nb_invalid(inputs) == 0) {
      $('.account-buttons').removeClass("invisible").addClass("visible");
    }

    else {
      $('.account-buttons').removeClass("visible").addClass("invisible");
    }
  });
});
