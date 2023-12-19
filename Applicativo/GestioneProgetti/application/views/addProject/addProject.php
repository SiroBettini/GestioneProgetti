<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow p-5 rounded bg-dark text-white">
        <form method="POST" action="<?php echo URL ?>projects/add">
            <label for="user">Titolo</label>
            <input type="text" name="title" id="title" class="form-control">

            <label for="desc">Descrizione</label>
            <input type="text" name="desc" id="desc" class="form-control">

            <label for="start">Data di inizio</label>
            <input type="date" name="start" id="start" class="form-control">

            <label for="usr">Collaboratore</label>
            <select name="usr" id="usr" class="form-control">
                <?php foreach($users as $usr):?>
                <option value="<?php echo $usr->getId()?>"><?php echo $usr->getName() . " " . $usr->getSurname()?></option>
                <?php endforeach;?>
            </select>

            <br>
            <input type="submit" class="btn btn-primary" name="login">
        </form>
    </div>
</div>