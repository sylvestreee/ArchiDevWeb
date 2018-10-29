var nb_input = 0;

$(document).ready(function() {
  $(".fa-calendar-alt").click(function() {
    $("#birthday").datepicker();
    $("#birthday").datepicker("show");
  });

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

        if(input.hasClass("valid")) {
          input.removeClass("valid").addClass("invalid");
          if(nb_input != 0) {
            nb_input--;
          }
        }
        else {
          input.removeClass("invalid").addClass("valid");
          if(!$('.check-2').hasClass("valid") && !$('.check-3').hasClass("valid")) {
            nb_input++;
          }
          else {
            $('.check-2').removeClass("valid").addClass("invalid");
            $('.check-3').removeClass("valid").addClass("invalid");
          }
        }
      }

      //check-2
      else if(input.hasClass("check-2")) {
        $('.check-1').prop('checked',false);
        $('.check-3').prop('checked',false);

        if(input.hasClass("valid")) {
          input.removeClass("valid").addClass("invalid");
          if(nb_input != 0) {
            nb_input--;
          }
        }
        else {
          input.removeClass("invalid").addClass("valid");
          if(!$('.check-1').hasClass("valid") && !$('.check-3').hasClass("valid")) {
            nb_input++;
          }
          else {
            $('.check-1').removeClass("valid").addClass("invalid");
            $('.check-3').removeClass("valid").addClass("invalid");
          }
        }
      }

      //check-3
      else if(input.hasClass("check-3")) {
        $('.check-1').prop('checked',false);
        $('.check-2').prop('checked',false);

        if(input.hasClass("valid")) {
          input.removeClass("valid").addClass("invalid");
          if(nb_input != 0) {
            nb_input--;
          }
        }
        else {
          input.removeClass("invalid").addClass("valid");
          if(!$('.check-1').hasClass("valid") && !$('.check-2').hasClass("valid")) {
            nb_input++;
          }
          else {
            $('.check-1').removeClass("valid").addClass("invalid");
            $('.check-2').removeClass("valid").addClass("invalid");
          }
        }
      }
    }
    else {

      //input's not empty
      if(no_blank) {

        if(input.hasClass("pseudo")) {
          if(!input.hasClass("valid")) {
            input.removeClass("invalid").addClass("valid");
            nb_input++;
          }
        }

        //name input
        else if(input.hasClass("name")) {

          //valid
          if(verif_name.test(input.val())) {
            if(!input.hasClass("valid")) {
              input.removeClass("invalid").addClass("valid");
              $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
              nb_input++;
            }
          }

          //not valid
          else {
            $('.name').removeClass("valid").addClass("invalid");
            $("i", $('.name').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.name').parent()).removeClass("invisible").addClass("visible");
            if(nb_input != 0) {
              nb_input--;
            }
          }
        }

        //fname input
        else if(input.hasClass("fname")) {

          //valid
          if(verif_name.test(input.val())) {
            if(!input.hasClass("valid")) {
              input.removeClass("invalid").addClass("valid");
              $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
              nb_input++;
            }
          }

          //not valid
          else {
            $('.fname').removeClass("valid").addClass("invalid");
            $("i", $('.fname').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.fname').parent()).removeClass("invisible").addClass("visible");
            if(nb_input != 0) {
              nb_input--;
            }
          }
        }

        //email input
        else if(input.hasClass("email")) {

          //valid
          if(verif_email.test(input.val())) {
            if(!input.hasClass("valid")) {
              input.removeClass("invalid").addClass("valid");
              $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
              $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
              nb_input++;
            }
          }

          //not valid
          else {
            $('.email').removeClass("valid").addClass("invalid");
            $("i", $('.email').parent()).removeClass("invisible").addClass("visible");
            $("span", $('.email').parent()).removeClass("invisible").addClass("visible");
            if(nb_input != 0) {
              nb_input--;
            }
          }
        }

        //birthday input
        else if(input.hasClass("birthday-input")) {

          //valid
          if(verif_date.test(input.val())) {
            if(!input.hasClass("valid")) {
              input.removeClass("invalid").addClass("valid");
              $('.thumbs-birthday').removeClass("visible").addClass("invisible");
              $('.warning-birthday').removeClass("visible").addClass("invisible");
              nb_input++;
            }
          }

          //not valid
          else {
            $('.birthday-input').removeClass("valid").addClass("invalid");
            $('.thumbs-birthday').removeClass("invisible").addClass("visible");
            $('.warning-birthday').removeClass("invisible").addClass("visible");
            if(nb_input != 0) {
              nb_input--;
            }
          }
        }

        else {
          if(!input.hasClass("valid")) {
            input.removeClass("invalid").addClass("valid");
            nb_input++;
          }
        }
      }

      //input's empty
      else {

        //pseudo input
        if(input.hasClass("pseudo")) {
          input.removeClass("valid").addClass("invalid");
          if(nb_input != 0) {
            nb_input--;
          }
        }

        //name input
        else if(input.hasClass("name")) {
          input.removeClass("valid").addClass("invalid");
          $("i", $('.name').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.name').parent()).removeClass("visible").addClass("invisible");
          if(nb_input != 0) {
            nb_input--;
          }
        }

        //fname input
        else if(input.hasClass("fname")) {
          input.removeClass("valid").addClass("invalid");
          $("i", $('.fname').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.fname').parent()).removeClass("visible").addClass("invisible");
          if(nb_input != 0) {
            nb_input--;
          }
        }

        //email input
        else if(input.hasClass("email")) {
          input.removeClass("valid").addClass("invalid");
          $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
          if(nb_input != 0) {
            nb_input--;
          }
        }

        //birthday input
        else if(input.hasClass("birthday-input")) {
          input.removeClass("valid").addClass("invalid");
          $('.thumbs-birthday').removeClass("visible").addClass("invisible");
          $('.warning-birthday').removeClass("visible").addClass("invisible");
          if(nb_input != 0) {
            nb_input--;
          }
        }
        else {
          input.removeClass("valid").addClass("invalid");
          if(nb_input != 0) {
            nb_input--;
          }
        }
      }
    }
    console.log(nb_input);

    //at least one input is valid
    if(nb_input > 0) {
      $('.account-buttons').removeClass("invisible").addClass("visible");
    }

    else {
      $('.account-buttons').removeClass("visible").addClass("invisible");
    }
  });
});
