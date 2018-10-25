var nb_input = 0;

$(document).ready(function() {
  $(".fa-calendar-alt").click(function() {
    $("#birthday").datepicker();
    $("#birthday").datepicker("show");
  });

  $(document).on('input', '.field', function() {
    //console.log("heit");
    var input = $(this);
    var no_blank = input.val().length > 0;

    if(no_blank) {
      nb_input++;
      console.log(nb_input);
      $('.buttons').removeClass("invisible").addClass("visible");
    }
    else {
      nb_input--;
      console.log(nb_input);
      if(nb_input == 0) {
        console.log("hey");
        $('.buttons').removeClass("visible").addClass("invisible");
      }
    }
  });

  $(document).on('click', '.discover', function () {
      var targetClass = $(this).attr("data-target");
      var $target = $("." + targetClass);

      var valid = $target.hasClass("invisible");
      if(valid) {
        $(this).removeClass("fa-plus-circle").addClass("fa-minus-circle");
        $target.removeClass("invisible").addClass("visible");

      } else {
        $(this).removeClass("fa-minus-circle").addClass("fa-plus-circle");
        $target.removeClass("visible").addClass("invisible");
      }
  });
});
