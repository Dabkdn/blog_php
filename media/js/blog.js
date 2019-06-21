$(document).ready(function(){
    let blog_id = parseInt($('.blog-id').text());

    $(".like-btn").click(function() {
        $.ajax({
            url: `index.php?ctl=blogs&act=like&id=${blog_id}`,
            type: 'post',
            contentType: "application/json",
            data: JSON.stringify({}),
            beforeSend: function() {
            },
            success: function(response){
                if(parseInt(response) == -1) {
                    window.location.href = 'index.php?ctl=login'
                }
                $(".like-btn .like").text(response);
            },
            error: function(xhr){
                console.log(xhr)
            }
        });
    });

    $("#add-comment-btn").click(function() {
        let comment = $('#comment-input').val();
        let commentQuantity = parseInt($(".comment-label").text().trim());
        if(comment != '' && comment != null) {
            $.ajax({
                url: `index.php?ctl=blogs&act=comment`,
                type: 'post',
                data: {
                    blog_id: blog_id,
                    comment: comment
                },
                success: function(response){
                    if(parseInt(response) == -1) {
                        window.location.href = 'index.php?ctl=login'
                    }
                    var result="";
                    var jsondata= JSON.parse(response);
                    for(var x=0;x<jsondata.length;x++){
                        result += "<div><label>"+jsondata[x].fullname+"</label><p>"+jsondata[x].content+"</p></div>";
                    }  
                    $(".comment-list").html(result);
                    $(".comment-label").text(commentQuantity+1);
                    $("#comment-input").val("");
                },
                error: function(xhr){
                    console.log(xhr)
                }
            });
        }
    });
});

