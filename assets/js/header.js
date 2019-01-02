$(document).ready(function() {
    
    $('input').on('keypress', function(e) {
    return e.which !== 13;
    });
    
    $(document).on('click', '.dropdown-menu li a', function() {
        $(this).parents('.dropdown').find('.btn').html($(this).text());
        $(this).parents('.dropdown').find('.btn').val($(this).data('value'));
        console.log($(this).data('value'));
        $('.search').attr('name', $(this).data('value'));
    });

    $(document).on('input', '.search', function() {
        var input = $(this);
        var min = input.val().length >= 3;
        if(min) {
            $('.search-submit').removeClass("invisible").addClass("visible");
        }
        else {
            $('.search-submit').removeClass("visible").addClass("invisible");
        }
    });
});