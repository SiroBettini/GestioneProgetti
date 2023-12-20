<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>Login">
            <label for="user">Username</label>
            <input type="text" name="user" id="user" class="form-control">
            <label for="user">Password</label>
            <input type="password" name="pswd" id="pswd" class="form-control">
            <br>
            <input type="submit" class="btn btn-primary" name="login">
        </form>
            <?php
                session_start();
                if (isset($_SESSION['error_message'])):
            ?>
            <div>
                <?php
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                ?>
            </div>
            <?php endif;?>
    </div>
</div>