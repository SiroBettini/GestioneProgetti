<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>userModify/applyModify/<?php echo $user->getId();?>">
            <h1>Modifica utente</h1>
            <label for="user">Nome</label>
            <input value="<?php echo $user->getName();?>" type="text" name="name" id="user" class="form-control">
            <label for="user">Cognome</label>
            <input value="<?php echo $user->getSurname();?>" type="text" name="surname" id="user" class="form-control">
            <label for="user">Email</label>
            <input value="<?php echo $user->getEmail();?>" type="text" name="email" id="user" class="form-control">
            <label for="user">Numero Telefono</label>
            <input value="<?php echo $user->getPhoneNumber();?>" type="text" name="pnum" id="user" class="form-control">
            <label for="dropdown">Ruolo:</label>
            <select id="dropdown" name="role" class="form-control">
                <option <?php echo $contributor;?> value="contributor">contributor</option>
                <option <?php echo $admin;?> value="admin">admin</option>
                <option <?php echo $superadmin;?> value="superadmin">superadmin</option>
            </select>
            <label for="user">Password</label>
            <input value="<?php echo $user->getPassword();?>" type="password" name="pass" id="pass" class="form-control">
            <br>
            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="<?php echo URL ?>userManager">Annulla</a>
                <input type="submit" class="btn btn-primary" name="create" value="Modifica">
            </div>
        </form>
    </div>
</div>
