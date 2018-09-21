<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                    <input type="hidden" value="1" name="post_id">
                </div>
                
                <div class="row">
                    <div clas="col-md-12">
                        @foreach($comments as $comment)
                        <div>
                            <p>Name: {{ $comment->name }}</p>
                            <p>Comment:{{ $comment->comment }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <form action="comments" method="POST" id="comment_form">
                    {{ csrf_field() }}
                    <div>
                        <h3>Make a comment</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" placeholder="Comment" id="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add comment" class="form-control btn btn-success">
                    </div>
                </form>
                
                <span id="comment_msg"></span>
                <br />
                <span id="display_comment"></span>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#comment_form').on('submit', function(e){
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"comment",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data){
                    if(data.error) != ''){
                        $('#comment_form')[0].reset();
                        $('#comment_msg').html(data.error);
                    }
                }
            });
        });
    });
</script>