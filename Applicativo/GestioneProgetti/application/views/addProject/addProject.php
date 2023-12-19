<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>projects/add">
            <label for="user">Titolo</label>
            <input type="text" name="title" id="title" class="form-control">
            <label for="user">Descrizione</label>
            <input type="password" name="desc" id="desc" class="form-control">
            <label for="user">Descrizione</label>
            <input type="password" name="desc" id="desc" class="form-control">
            <br>
            <input type="submit" class="btn btn-primary" name="login">
        </form>
    </div>
</div>