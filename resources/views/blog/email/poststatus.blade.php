<!DOCTYPE html>
<html>
<head>
    <title>Post Status Updated</title>
</head>
<body>
    <h2>Hello {{ $post->user->name }},</h2>

    <p>Your post titled <strong>"{{ $post->title }}"</strong> has been updated to status:</p>
    <h3>{{ ucfirst($status) }}</h3>

    <p>Thank you for using our platform.</p>
</body>
</html>
