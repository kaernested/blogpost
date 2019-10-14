<?php
$page_title = 'Add a job';
$page_id = 'add_job';
include('header.php');

?>
<div id="userContainer" class="loggedIn">
    <p id="userLoggedIn">Welcome to Firebase web login Example. You're currently logged in.</p>
    <button class="logOutBtn" onclick="logout()">Logout</button>
</div>

<div id="loginContainer" class="loginContainer">
    <div class="emailWrapper">
        <label>Email</label>
        <br>
        <input type="text" name="email" placeholder="Your email..." class="inputCustom" id="email_field">
    </div>

    <div class="passwordWrapper">
        <label>Password</label>
        <br>
        <input type="password" name="password" placeholder="Your password..." class="inputCustom" id="password_field">
    </div>

    <button type="submit" name="login" class="loginBtn" onclick="login()">Login</button>

</div>

<?php include('footer.php'); ?>