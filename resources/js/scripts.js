$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.follow-button').click(function () {
        let user_id = $(this).data('id');
        let obj = $(this);

        var currentFollowerCount = parseInt($(this).parent('div').find('.follower').text());

        $.ajax({
            type: 'POST',
            url: '/follow',
            data: {
                user_id: user_id
            },
            success: function (data) {
                if($.isEmptyObject(data.success.attached)) {
                    obj.find('strong').text('Follow');
                    obj.parent('div').find('.follower').text(currentFollowerCount - 1);
                } else {
                    obj.find('strong').text('Unfollow');
                    obj.parent('div').find('.follower').text(currentFollowerCount + 1);
                }
            }
        });
    })
});