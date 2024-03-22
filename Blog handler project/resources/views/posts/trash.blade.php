<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Enabled</th>
                <th>Published At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deletedPosts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->enabled}}</td>
                <td>{{$post->published_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
