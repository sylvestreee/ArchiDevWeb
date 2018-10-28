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
      if(no_blank) {

        //email input
        if(input.hasClass("email")) {

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
        else {
          if(!input.hasClass("valid")) {
            input.removeClass("invalid").addClass("valid");
            nb_input++;
          }
        }
      }
      else {

        //email input
        if(input.hasClass("email")) {
          input.removeClass("valid").addClass("invalid");
          $("i", $('.email').parent()).removeClass("visible").addClass("invisible");
          $("span", $('.email').parent()).removeClass("visible").addClass("invisible");
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
