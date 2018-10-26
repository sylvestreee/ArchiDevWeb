$(document).ready(function() {
  $(document).on('input', '.sign', function() {
    var input = $(this);
    var no_blank = input.val().length > 0;
    var warning = $("span", input.parent());
    var thumbs = $("i", input.parent());
    var verif=/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;

    //input's not empty
    if(no_blank) {

      //email input
      console.log("no blank");
      if(input.hasClass("email")) {
        if(verif.test(input.val())) {
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
        warning.text("Mot de passe indiqué");
        $('.pwd').removeClass("invalid").addClass("valid");
        $(thumbs).removeClass("fa-thumbs-down").addClass("fa-thumbs-up");
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
        warning.text("Veuillez indiquer votre mot de passe");
        $('.pwd').removeClass("valid").addClass("invalid");
        $(thumbs).removeClass("fa-thumbs-up").addClass("fa-thumbs-down");
      }
    }

    if($('.email').hasClass("valid") && $('.pwd').hasClass("valid")) {
      console.log("hey");
      $('.log-submit').removeClass("invisible").addClass("visible");
    }

    else {
      $('.log-submit').removeClass("visible").addClass("invisible");
    }
  });
});
