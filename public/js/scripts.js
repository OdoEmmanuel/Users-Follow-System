$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.follow-button').click(function(){
        let user_id = $(this).data('id');
        let object = $(this);
        var currentFollowerCount = parseInt($(this).parent("div").find(".follower").text());


        $.ajax({

            type: 'POST',
            url: '/ajax',
            data: {user_id: user_id},
            success: function(data){

                console.log(data.success);

                if($.isEmptyObject(data.success)){

                    object.find("strong").text("Follow");
                    object.parent("div").find(".follower").text(currentFollowerCount + 1);
                } else {

                    object.find("strong").text("UnFollow");
                    object.parent("div").find(".follower").text(currentFollowerCount - 1);

                }
            }

        });


    });






});
