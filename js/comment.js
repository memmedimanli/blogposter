$(document).ready(function(){
   $('textarea.textarea2').keypress(function(e){     
        
        key = e.which;
        post_id = $(this).attr("id");
        if(key == 13){
            e.preventDefault();
        var tdata= $("#" + post_id).val();
        var that = $(this);
        //alert(tdata);


        $.ajax({
            type : "POST",
            url : "http://ramin.io/blogposter/index.php/site/addComment",
            //dataType: json, 
            data : {
                'tdata' : tdata,
                'post_id' : post_id
            },

            success:function(data)
            {
                var inp = $.parseJSON(data);
                var comment = "<div class='comment_body'><img src = 'http://ramin.io/blogposter/image/buser.jpg' width='40' height='40'><div class='comment_username'>" 
                    + inp.username + 
                    "<br></div><div class='comment_date'><p>"
                    + inp.date+
                    "<br></p></div><div class='comment_context'>"
                    +tdata+
                    "<br></div></div>";

                //alert(comment);
                $("#" + post_id + ".comment").append(comment);
                $(".textarea2").val('');
                //alert(data);
                //console.log(data);
                
                //alert(inp.date);
            }
        });
    }
    });
});
