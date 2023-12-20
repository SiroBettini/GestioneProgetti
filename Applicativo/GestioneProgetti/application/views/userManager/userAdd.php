<div class="d-flex justify-content-center align-items-center vh-100">
    <h1 class="text-center me-5">Creazione utente</h1>
    <div class="shadow p-5 rounded bg-dark bg-opacity-25 text-dark">
        <form method="POST" action="<?php echo URL ?>userAdd/createUser">
            <label for="user">Nome</label>
            <input type="text" name="name" id="user" class="form-control">
            <label for="user">Cognome</label>
            <input type="text" name="surname" id="user" class="form-control">
            <label for="user">Email</label>
            <input type="text" name="email" id="user" class="form-control">
            <label for="user">Numero Telefono</label>
            <input type="text" name="pnum" id="user" class="form-control">
            <label for="dropdown">Ruolo:</label>
            <select id="dropdown" name="role" class="form-select">
                <option value="contributor">contributor</option>
                <option value="admin">admin</option>
                <option value="superadmin">superadmin</option>
            </select>
            <label for="user">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
            <label for="user">Ripeti Password</label>
            <input type="password" name="reppass" id="reppass" class="form-control">
            <br>
            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="<?php echo URL ?>userManager">Annulla</a>
                <input type="submit" class="btn btn-primary" name="create" value="Crea">
            </div>
        </form>
    </div>

</div>
