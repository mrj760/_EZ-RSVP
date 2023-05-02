<!-- This page will allow new users to create an account by providing 
their name, email address, and a password. 
Also contains a link to the login page. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/_global.css" />
    <script src="../script/_global.js"></script>
</head>

<body>
        <div class="background">
            <h1>Signup</h1>
            <form action-="" method="POST">
                <!--Username-->
                <label for="username" class="lable">Username</label>
                <br>
                <input type="name" id="username" name="username" placeholder="Enter Username" required autofocus>
                <br>
                <!--Email-->
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
                <br>

                <!--User Password-->
                <label for="userPassword">Password</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <br>

                <!--Sign Up Button, move to user dashboard-->
                <input type="submit" value="Signup" class="button" href="user_dashboard.html" />
                <br>
                <a href="user_login.html">Already have an account? Login here</a>
                <br>
        </div>
    
</body>

</html>