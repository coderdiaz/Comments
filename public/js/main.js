$(document).ready(function () {
    $(".comment-container").delegate(".reply", "click", function () {
        var well = $(this).parent().parent();
        var cid = $(this).attr("cid");
        var token = $(this).attr('token');
        var form = '<form method="post" action="/replies">\n\
                        <input type="hidden" name="_token" value="' + token + '">\n\
                        <input type="hidden" name="comment_id" value="' + cid + '">\n\
                        <input type="text" name="name" placeholder="Name">\n\
                        <div class="form-group">\n\
                            <textarea class="form-control" name="reply" placeholder="Reply"></textarea>\n\
                        </div>\n\
                        <div class="form-group">\n\
                            <input class="btn btn-primary" type="submit">\n\
                        </div>\n\
                    </form>';
        well.find(".reply-form").append(form);
    });

    $(".comment-container").delegate(".reply-to-reply", "click", function () {
        var well = $(this).parent().parent();
        var cid = $(this).attr("rid");
        var token = $(this).attr("token")
        var form = '<form method="post" action="/replies">\n\
                        <input type="hidden" name="_token" value="' + token + '">\n\
                        <input type="hidden" name="comment_id" value="' + cid + '">\n\
                        <input type="text" name="name" placeholder="Name">\n\
                        <div class="form-group">\n\
                            <textarea class="form-control" name="reply" placeholder="Reply">\n\
                            </textarea>\n\
                        </div>\n\
                        <div class="form-group">\n\
                            <input class="btn btn-primary" type="submit">\n\
                        </div>\n\
                    </form>';

        well.find(".reply-to-reply-form").append(form);
    });

}); 