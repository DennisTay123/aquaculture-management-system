<!DOCTYPE html>
<html>

<head>
    <title>Complete Your Registration</title>
</head>

<body>
    <h1>Complete Your Registration</h1>
    <p>Please click the link below to complete your registration:</p>
    <a href="{{ url('register/complete/' . $token) }}">Complete Registration</a>
</body>

</html>