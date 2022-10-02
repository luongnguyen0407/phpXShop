<form action="./Register/Auth" autocomplete="off" method="POST">
    <div class="form_auth_filed">
        <label for="email">Email</label>
        <input value="<?php echo (isset($data['Email']) ? $data['Email'] : '') ?>" type=" text" name="email" placeholder="username@gmail.com">
        <p class="error_input"><?php echo (isset($data['Error']['email']) ? $data['Error']['email'] : '')   ?></p>
    </div>
    <div class="form_auth_filed">
        <label for="username">User Name</label>
        <input value="<?php echo (isset($data['Username']) ? $data['Username'] : '') ?>" type=" text" name="username" placeholder="User Name">
        <p class="error_input"><?php echo (isset($data['Error']['username']) ? $data['Error']['username'] : '')   ?></p>
    </div>
    <div class="form_auth_filed">
        <label for="password">Password</label>
        <div style="position: relative;">
            <input value="<?php echo (isset($data['Password']) ? $data['Password'] : '') ?>" class=" inputPass" type="password" name="password" placeholder="Password">
            <i class="fa-solid fa-eye-slash fa-eye  eyeshow"></i>
        </div>
        <p class="error_input"><?php echo (isset($data['Error']['password']) ? $data['Error']['password'] : '')   ?></p>

    </div>
    <div class="form_auth_filed">
        <label for="confirmPass">Confirm Password</label>
        <div style="position: relative;">
            <input value="<?php echo (isset($data['ConPassword']) ? $data['ConPassword'] : '') ?>" id=" confirmPass" class="inputPass" type="password" name="confirmPass" placeholder="Confirm Password">
            <i class="fa-solid fa-eye-slash fa-eye  eyeshow"></i>
        </div>
        <p class="error_input"><?php echo (isset($data['Error']['conPassword']) ? $data['Error']['conPassword'] : '')   ?></p>

    </div>
    <div class="form_auth_filed">
        <button class="btnSign" name="btnRegister">Register</button>
    </div>
</form>
<p style="margin:10px 0 ;text-align: center;">You have an account yet? <a href="Login">Login</a></p>