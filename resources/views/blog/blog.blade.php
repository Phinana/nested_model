<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>

    <style>
        .container{
            width: 100%;
        }

        .item_list{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .title{
            font-size: 30px;
        }

        .note{
            font-size: 12px;
            margin-bottom: 30px;
        }

        .item:hover{
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="item_list">
            <span class="title">
                All Posts Listed
            </span>
            <span class="note">(Items are clickable)</span>

            @foreach($post_list as $post)
                <div class="item" value="{{ $post->id }}"><a href="{{ route('blog.post_info', ['id' => $post->id]) }}"><p>{{ $post->title }}</p></a></div>
            @endforeach
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

</script>