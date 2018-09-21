<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
</head>
<body>
    <div class="container col-md-6">
            <div class="content">
                <form action="articles" method="POST" id="comment_form">
                    {{ csrf_field() }}
                    <div>
                        <h3>Write the article's name</h3>
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" placeholder="Article name" name="article_name" id="article_name">
                    </div>
                    <div class="form-group">
                        <input type="button" value="Add article" class="form-control btn btn-success" id="article_button">
                    </div>
                </form>
            </div>
        <?php $count = 0; ?>
        @foreach($articles as $article)
            <h4>{{ $article->name }}</h4>
            <div style="margin-left:10px;">
                <button type='button' class='btn btn-success' name='add_message' id='add_message{{$count}}' onclick="addMessage()">Reply</button>
            </div>
            <?php $count++; ?>
            @include('comments', ['comments' => $article->comments, 'parent' => 0])
        @endforeach

    </div>
</body>
<script>
    function addMessage(){
        this.append("<div id='user_dialog' title='Add message' class='form-group'> " + 
            "<div class='form-group'>" + 
                "<label>Your name</label>" + 
                "<input type='text' class='form-control' name='name_message' id='name_message' />" + 
                "<label>Message</label>" + 
                "<input type='text' class='form-control' name='text_message' id='text_message' />" + 
            "</div>" + 
            "<div class='form-group'>" + 
                "<input type='hidden' class='form-control' name='article_id' id='article_id' />" + 
                "<button type='button' class='btn btn-info' name='save' id='save' >Save</button>" + 
            "</div>" + 
        "</div>");
    }
    
    $(document).ready(function(){
        
        $('#article_button').on('click', function(e){
            e.preventDefault();
            var form_data = $(this).parent.serialize();
            $("#comment_form").validate();
            if($("#comment_form").valid()){
                console.log(form_data);
                $.ajax({
                    url:"articles",
                    method:"POST",
                    data:form_data,
                    dataType:"JSON",
                    success:function(data){
                        if(data.error != ''){
                            $('#comment_form')[0].reset();
                            $('#comment_msg').html(data.error);
                        }
                    }
                });
            }
        });
        
        $("#comment_form").validate({
            rules: {
                article_name: {required: true},
            },errorPlacement: function(error, element) {
                error.insertBefore(element);
            },
            errorElement: "span",
        });
    });

</script>
</html>

