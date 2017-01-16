isAjaxCalled = false;
token = $('meta[name="csrf-token"]').attr('content');
url = location.origin;

offset = 10;

isAjaxCalled = true;
isActive = false;

$(document).ready(function() {

    $(window).scroll(function() {
        if (isAjaxCalled) {
            var hT = $('.load-part').offset().top,
                hH = $('.load-part').outerHeight(),
                wH = $(window).height(),
                wS = $(this).scrollTop();
            if (wS > (hT + hH - wH) && !isActive) {
                isActive = true;
                $('.load-part').addClass('submit');

                data = {_token: token, offset: offset};

                if (location.search != 0){
                    var search = location.search.split('=')[1]; 
                    if (search != "") {
                        data.search = search;
                    }
                }

                var fullUrl = url; 
                if (window.location.pathname == '/top-posts') {
                    fullUrl += '/post/top-posts-paginate';
                }else if(window.location.pathname == '/') {
                    fullUrl += '/post/paginate';
                }

                $.ajax({
                    type: "POST",
                    url: fullUrl,
                    data: data,
                    success: function(response) {
                        if (response.status == 'success') {
                            isAjaxCalled = true;
                            $('.load-part').removeClass('submit').before(response.content)
                            offset += 10;
                        } else {

                            isAjaxCalled = false;

                            $('.load-part').removeClass('submit');

                            $('.load-part').html('<br><br><h2 style="color:grey; font-weight: bold;"><center><small>' + response.message + '</small></center></h2>')
                        }
                        isActive = false;

                    }
                });
                // isActive = false

            }
        }
    });


    /*Ajax call for likes*/
    $(document).on('click', '.heart', function(event){
        var that = $(this);
        if (that.hasClass('active')) { //Has already been liked
            return false;
        }
        var post_id = that.data('post-id');
        data = {_token: token, post_id: post_id}

        $.ajax({
            type: "POST",
            url: url + '/post/like/store',
            data: data,
            success: function(response) {
                if (response.status == 'success') {
                    console.log(response)
                    // $('.load-part').removeClass('submit').before(response.content)
                    that.addClass('active');
                    console.log(response.likes_count);
                    that.children('.likes_count').html(response.likes_count);
                } else {

                }

            }
        });
    })

});

/*$(window).scroll(function () {
    var artTop = $('article.question').last().offset().top;
    if (location.pathname == '/') {


        if ($(window).scrollTop() >= artTop - 550 && isAjaxCalled) {

            isAjaxCalled = false;

            $('.load-part').addClass('active');
            $.ajax({
                type: "POST",
                url: url + '/post/paginate',
                data: {_token: token, offset: offset},
                success: function (response) {
                    if (response.status == 'success') {
                        isAjaxCalled = true;
                        $('.load-part').removeClass('active');

                        $('.tab-inner-warp .tab-inner').append(response.content)

                        offset += 10;
                    } else {

                        isAjaxCalled = false;

                        $('.load-part').removeClass('active');

                        $('.tab-inner-warp .tab-inner').append('<h2>' + response.message + '</h2>')
                    }

                }
            });
        }
    }
});
*/

$(function() {
    $('.navigation_mobile').on('click', function() {
        $(this).find('ul').slideToggle()
    })
});

