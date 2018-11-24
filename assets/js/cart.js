$(document).ready(function() {
  $(document).on('input', '.num', function() {
    var input = $(this);

    /*the number of a game copies can't go under one*/
    if (input.val() < 1) {
      console.log("lol");
      input.val(1);
    }
  });
});
