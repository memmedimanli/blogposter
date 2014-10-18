$(document).ready(function(){
    $(".delete").click(function(e){
        e.preventDefault();
        post_id = $(this).attr("post");

        $.ajax({
            type: "POST",
            url:  "http://ramin.io/blogposter/index.php/site/deletePost",
            data: {
                "post_id": post_id
            },
            success: function(data) {
                var d = $.parseJSON(data);
                // alert(d.message);
                if(d.status == "ok")
                    window.location = "http://ramin.io/blogposter/index.php/site/profile";
            }

        });
    });

});
