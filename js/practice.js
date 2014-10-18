$(document).ready(function(){
    $("#post").submit(function(){     
       // e.preventDefault();

        var tdata= $("#post").serializeArray();
        var that = $(this);


        $.ajax({
            type : that.attr('method'),
            url : that.attr('action'),
            dataType : json, 
            data : tdata,

            success:function(tdata)
            {
                alert('SUCCESS!!');
            }
        });
    });
});