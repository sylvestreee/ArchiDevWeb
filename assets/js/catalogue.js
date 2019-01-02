$(document).ready(function() {

  /*show / hide a filter option*/
  $(document).on('click', '.discover', function() {
    var targetClass = $(this).attr("data-target");
    var $target = $("." + targetClass);

    var valid = $target.hasClass("invisible");
    if (valid) {
      $(this).removeClass("fa-plus-circle").addClass("fa-minus-circle");
      $target.removeClass("invisible").addClass("visible");

    } else {
      $(this).removeClass("fa-minus-circle").addClass("fa-plus-circle");
      $target.removeClass("visible").addClass("invisible");
    }
  });
});
