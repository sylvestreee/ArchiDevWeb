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

  /*set the min and max of the price range, and show its current status*/
  $(function() {
    $("#slider-range").slider({
      max: 70,
      min: 0,
      range: true,
      values: [0, 70],
      slide: function(event, ui) {
        $("#range").val("Entre " + ui.values[0] + " et " + ui.values[1] + "€");
      }
    });
    $("#range").val("Entre " + $("#slider-range").slider("values", 0) + " et " + $("#slider-range").slider("values", 1) + "€");
  });
});
