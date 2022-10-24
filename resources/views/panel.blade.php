<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <style>
        .user,
        .postanswer,
        .blogpost{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            margin: 20px;
        }
    </style>

</head>
<body>
    <div class="user">
        <input type="text" class="username" placeholder="username">
        <input type="text" class="user_email" placeholder="user_email">
        <input type="text" class="user_password" placeholder="user_password">
        <button class="createuser">CreateUser</button>
    </div>

    <div class="blogpost">
        <input type="text" class="title" placeholder="title">
        <input type="text" class="content" placeholder="content">
        <input type="text" class="blogpost_user_id" placeholder="blogpost_user_id">
        <button class="createpost">CreatePost</button>
    </div>

    <div class="postanswer">
        <input type="text" class="answer_content" placeholder="answer_content">
        <input type="text" class="answer_user_id" placeholder="answer_user_id">
        <input type="text" class="answer_blogpost_id" placeholder="answer_blogpost_id">
        <button class="createanswer">CreateAnswer</button>
    </div>

    <div class="temp">
        @foreach($users as $user)
            <p>{{ $user->email }}</p>

            @foreach($user->posts as $post)
                <p>___{{ $post->content }}</p>

                @foreach($post->answers as $answer)
                    <p>_______{{ $answer->content }}</p>
                @endforeach

            @endforeach

        @endforeach
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

$(document).on("click", ".createuser", function () {
//BEGIN
    var name = $('.username').val();
    var email = $('.user_email').val();
    var password = $('.user_password').val();

    $.ajax({
            type: "POST",
            data:{
                'name': name,
                'email': email,
                'password': password,
                '_token': '{{ csrf_token() }}',
            },
            url: "{{ route('panel.create_user') }}",
            success: function (response) {
                alert(response);
            }
        });
//END
});

$(document).on("click", ".createpost", function () {
//BEGIN
    var title = $('.title').val();
    var content = $('.content').val();
    var user_id = $('.blogpost_user_id').val();

    $.ajax({
            type: "POST",
            data:{
                'title': title,
                'content': content,
                'user_id': user_id,
                '_token': '{{ csrf_token() }}',
            },
            url: "{{ route('panel.create_post_with_id') }}",
            success: function (response) {
                alert(response);
            }
        });
//END
});

$(document).on("click", ".createanswer", function () {
//BEGIN
    var content = $('.answer_content').val();
    var user_id = $('.answer_user_id').val();
    var post_id = $('.answer_blogpost_id').val();

    $.ajax({
            type: "POST",
            data:{
                'content': content,
                'user_id': user_id,
                'post_id': post_id,
                '_token': '{{ csrf_token() }}',
            },
            url: "{{ route('panel.create_answer_with_id') }}",
            success: function (response) {
                alert(response);
            }
        });
//END
});

</script>