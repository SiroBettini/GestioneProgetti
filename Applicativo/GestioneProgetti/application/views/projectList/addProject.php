<div class="d-flex justify-content-center align-items-center vh-100">
    <h1 class="text-center me-5">Nuovo progetto</h1>
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>projects/add">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control">

            <label for="desc">Descrizione</label>
            <input type="text" name="desc" id="desc" class="form-control">

            <label for="start">Data di inizio</label>
            <input type="date" name="start" id="start" class="form-control">

            <label for="usr">Collaboratore</label>
            <select name="usr" id="usr" class="form-select">
                <?php foreach($users as $usr):?>
                <option value="<?php echo $usr->getId()?>"><?php echo $usr->getName() . " " . $usr->getSurname()?></option>
                <?php endforeach;?>
            </select>
            <br>
            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="<?php echo URL ?>projects">Annulla</a>
                <input type="submit" class="btn btn-primary" name="login" value="Crea">
            </div>
        </form>
    </div>
</div>