<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            background: linear-gradient(100deg, #cfe2f3,#eaf3bb);
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #333333;
        }
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            margin:20px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .Button {
            background-color: #4CAF50;
            color: #ffffff;
            margin:20px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="image/forgot.jpg" alt="Image" style="max-width: 100px;">
        <h2>Forgot Password</h2>
        <p>Please enter your email address to reset your password.</p>
        <form action="reset_password.php" method="post">
            <input type="email" name="email"  id="email" placeholder="Enter your email" required>
            <input type="submit" name="send-reset-link" value="Send Link">
        </form>
        <a href="login.php" class="Button">Go Back</a>
    </div>
</body>
</html>
