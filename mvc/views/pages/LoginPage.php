<form action="./Login/Auth" autocomplete="off" method="POST">
    <div class="form_auth_filed">
        <label for="email">Email</label>
        <input value="<?php echo (isset($data['Email']) ? $data['Email'] : '')   ?>" type="text" name="email" placeholder="username@gmail.com">
        <p class="error_input"><?php echo (isset($data['Error']['email']) ? $data['Error']['email'] : '')   ?></p>
    </div>
    <div class="form_auth_filed" style="margin: 20px 0;">
        <label for="password">Password</label>
        <div style="position: relative;">
            <input value="<?php echo (isset($data['Password']) ? $data['Password'] : '')   ?>" class="inputPass" type="password" name="password" placeholder="Password">
            <i class="fa-solid fa-eye-slash fa-eye  eyeshow"></i>
        </div>
        <p class="error_input">
            <?php echo (isset($data['Error']['password']) ? $data['Error']['password'] : '')   ?>
        </p>
    </div>
    <div class="form_auth_filed">
        <button name="btnLogin" class="btnSign" type="submit">Sign in</button>
    </div>
</form>
<div class="loginsocia">
    <div class="loginsocial_item">
        <img src="public/img/Group 2212.png" alt="">
    </div>
    <div class="loginsocial_item">
        <img src="public/img/Vector.png" alt="">
    </div>
    <div class="loginsocial_item">
        <img src="public/img/Vector (1).png" alt="">
    </div>
</div>
<p style="margin:10px 0 ;text-align: center;">Don't have an account yet? <a href="Register">Register</a></p>