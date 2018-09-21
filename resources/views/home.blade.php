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
            <div class="container">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form id="comment-form" method="post" action="comments" >
                                <div>
                                    <h3>Make a comment</h3>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" placeholder="Comment" id="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add comment" class="btn btn-primary" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="">Comments</div>
                            <div class="comment-container" >
                                @foreach($comments as $comment)
                                <div class="well">
                                    <i><b> {{ $comment->name }} </b></i>
                                    <span> {{ $comment->comment }} </span>
                                    <div style="margin-left:10px;">
                                        <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ $comment->name }}" token="{{ csrf_token() }}" class="reply">Reply</a>
                                        <div class="reply-form">
                                            <!-- Dynamic Reply form -->
                                        </div>
                                        @foreach($comment->replies as $rep)
                                        @if($comment->id === $rep->comment_id)
                                        <div class="well">
                                            <i><b> {{ $rep->name }} </b></i>
                                            <span> {{ $rep->reply }} </span>
                                            <div style="margin-left:10px;">
                                                <a rname="{{ $comment->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>
                                            </div>
                                            <div class="reply-to-reply-form">
                                                <!-- Dynamic Reply form -->
                                            </div>
                                        </div>
                                        @endif 
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>




