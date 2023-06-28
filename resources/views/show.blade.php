<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>

    <h2>{{ $user->name }}</h2>
    <p>Email: {{ $user->email }}</p>
    <p>Age: {{ $user->age }}</p>

    <h3>Posts</h3>
    @foreach ($user->posts as $post)
        <div>
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach

    <h3>Comments</h3>
    @foreach ($user->comments as $comment)
        <div>
            <p>{{ $comment->content }}</p>
            <p>Posted on: {{ $comment->created_at }}</p>
        </div>
    @endforeach
</body>
</html>
