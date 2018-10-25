$(document).ready(function() {

  // on click listener on all ".discover" elements
  // open the menu
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


  $("#stars li").on("mouseover", function() {
    var onStar = parseInt($(this).data("value"), 10);
    //console.log(onStar);
    $(this).parent().children('li.star').each(function(e) {
      if(e < onStar) {
        //console.log("hey");
        $(this).addClass("hover");
      }
      else {
        //console.log("hey2");
        $(this).removeClass("hover");
      }
    });
  }).on("mouseout", function() {
    $(this).parent().children('li.star').each(function(e) {

      $(this).removeClass("hover");
    });
  });

  $("#stars li").on('click', function() {
    var onStar = parseInt($(this).data('value'), 10);
    console.log
    var stars = $(this).parent().children('li.star');
    for(i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass("selected");
    }
    for(i = 0; i < onStar; i++) {
      $(stars[i]).addClass("selected");
    }
  });

  $('.discover-5').click(function(event) {
    var valid = $('.rating-stars').hasClass("invisible");
    if(valid) {
      $('.discover-5').removeClass("fa-plus-circle").addClass("fa-minus-circle");
      $('.rating-stars').removeClass("invisible").addClass("visible");
    }
    else
    {
      $('.discover-5').removeClass("fa-minus-circle").addClass("fa-plus-circle");
      $('.rating-stars').removeClass("visible").addClass("invisible");
    }
  });

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

      $('.discover-6').click(function(event) {
    var valid = $('.price').hasClass("invisible");
    if(valid) {
      $('.discover-6').removeClass("fa-plus-circle").addClass("fa-minus-circle");
      $('.price').removeClass("invisible").addClass("visible");
    }
    else
    {
      $('.discover-6').removeClass("fa-minus-circle").addClass("fa-plus-circle");
      $('.price').removeClass("visible").addClass("invisible");
    }
  });
});
