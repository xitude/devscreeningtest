/*
#######################################
# Consider the following jQuery snippet
#######################################
*/

$(function() {
    $(document).on('click', '.js-scrollto', function(e) {
        var $this = $(this),
            $target;
        if (!!$this.data('target')) {
            $target = $('#'+$this.data('target'));
        } else if (!!$this.attr('href')) {
            var href = $this.attr('href').replace(window.location.pathname,"");
            if ("#" == href[0]) {
                $target = $(href);
            }
        }
        if (!!$target && $target.length) {
            var hash = $target.attr("id"),
                targetTop = $target.offset().top,
                windowTop = $(window).scrollTop();
            $target.removeAttr("id");
            $("html,body").animate({
                scrollTop: targetTop
            }, Math.abs(targetTop - windowTop), function() {
                $target.attr("id", hash);
            });
        }
    });
});
/*

Now answer the following questions:

a) What is the purpose of this snippet?

b) What special considerations does it make for using a destination anchor (<a href="#foo" />)?

c) Can you spot any mistakes or things that could be improved?

*/

/*
###########################################################
# Rewrite the following jQuery snippet in native JavaScript
###########################################################
 */

$(document).on('click', '.js-confirm', function(e) {
    var $this = $(this),
        message = 'Are you sure?';
    if (!!$this.data('confirm')) message = $this.data('confirm');
    if (!window.confirm(message)) e.preventDefault();
});
