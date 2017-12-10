<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div id="title" style="text-align: center;">
    <h1>Articles</h1>
</div>
<hr>
<div id="content">
    <ul>
        @foreach ($articles as $article)
            <li style="margin: 50px 0;">
                <div class="title">
                    <a href="{{ url('article/'.$article->id) }}">
                        <h4>{!! $article->title !!}</h4>

                    </a>
                    <p>{!! $article->created_at !!}</p>
                </div>
                <div class="body">
                    <p>{!! $article->body !!}</p>
                </div>
            </li>
        @endforeach
            {{ $articles->links() }}
    </ul>
</div>

</body>
</html>