<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi So'rov</title>
</head>
<body>
    <h2>Yangi so'rov qabul qilindi!</h2>
    <p><strong>Ismi:</strong> {{ $contactRequest->name }}</p>
    <p><strong>Email:</strong> {{ $contactRequest->email }}</p>
    <p><strong>Mavzu:</strong> {{ $contactRequest->subject }}</p>
    <p><strong>Xabar:</strong> {{ $contactRequest->message }}</p>
</body>
</html>
