<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>userAdd/createUser">
            <h1>Creazione utente</h1>
            <label for="user">Nome</label>
            <input type="text" name="name" id="user" class="form-control">
            <label for="user">Cognome</label>
            <input type="text" name="surname" id="user" class="form-control">
            <label for="user">Email</label>
            <input type="text" name="email" id="user" class="form-control">
            <label for="user">Numero Telefono</label>
            <input type="text" name="pnum" id="user" class="form-control">
            <label for="dropdown">Ruolo:</label>
            <select id="dropdown" name="role" class="form-control">
                <option value="contributor">contributor</option>
                <option value="admin">admin</option>
                <option value="superadmin">superadmin</option>
            </select>
            <label for="user">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
            <label for="user">Ripeti Password</label>
            <input type="password" name="reppass" id="reppass" class="form-control">
            <label for="user">Ripetiaaaaaaaaaaaaaa </label>
            <br>
            <input type="submit" class="btn btn-primary" name="create">
        </form>
    </div>

</div>