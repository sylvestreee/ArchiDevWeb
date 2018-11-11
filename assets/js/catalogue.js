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

  /*turn on / off a star when the mouse is / is not on it*/
  $("#stars li").on("mouseover", function() {
    var onStar = parseInt($(this).data("value"), 10);
    $(this).parent().children('li.star').each(function(e) {
      if (e < onStar) {
        $(this).addClass("hover");
      } else {
        $(this).removeClass("hover");
      }
    });
  }).on("mouseout", function() {
    $(this).parent().children('li.star').each(function(e) {
      $(this).removeClass("hover");
    });
  });

  /*turn on all stars before the one the user clicked on to show that a rating selection has been made*/
  $("#stars li").on('click', function() {
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass("selected");
    }
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass("selected");
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
