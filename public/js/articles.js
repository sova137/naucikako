/**
 * Created by Nikola on 9/30/2016.
 */
    $('.item').click(function() {
        $('.article').removeClass('current');

        $(this).parents('.article').addClass('current');
        $(this).parents('.article').children('.description').toggle();

    });

$(document).keypress(function(event) {
    if(event.which === 111) {
        $('.description').hide();

        $('.current').children('.description').show();
    }

    else if(event.which === 110) {
        var currentArticle = $('.current');
        var nextArticle = currentArticle.next();

        currentArticle.removeClass('current');
        nextArticle.addClass('current');
    }
});