<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        .title{
            display: block;
            font-size: 30px;
        }

        .note{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <span class="title">{{ $post->title }}</span>
    <span class="note">Post owner: {{ $user->email }}</span>
    @if(count($post->answers) > 0)
        @foreach($post->answers as $answer)
            <p>{{ $answer->content }}</p>
        @endforeach
    @else
        <p>No answers yet</p>
    @endif
</body>
</html>