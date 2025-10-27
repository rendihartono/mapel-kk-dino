<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #74ebd5, #ACB6E5);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
      width: 320px;
      text-align: center;
    }

    .login-box h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .login-box input {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .login-box button {
      width: 95%;
      padding: 12px;
      background: #4CAF50;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Form</h2>
   <form action="proses_login.php" method="post"> 

 <label for="username">Username:</label> 

 <input type="text" id="username" name="username" required><br> 

 <label for="password">Password:</label> 

 <input type="password" id="password" name="password" required><br> 

 <input type="submit" value="Login"> 

 </form> 

</body> 

</html>