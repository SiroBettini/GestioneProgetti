<div class="d-flex justify-content-center align-items-center vh-100">
    <h1 class="text-center me-5">Modifica progetto</h1>
    <div class="shadow p-5 rounded bg-dark bg-opacity-25 text-dark">
        <form method="POST" action="<?php echo URL ?>projects/update/<?php echo $currProj->getId()?>">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $currProj->getTitle()?>">

            <label for="desc">Descrizione</label>
            <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $currProj->getDesc()?>">

<!--            <label for="usr">Collaboratore</label>-->
<!--            <select name="usr" id="usr" class="form-control">-->
<!--                --><?php //foreach($users as $usr):?>
<!--                <option value="--><?php //echo $usr->getId()?><!--">--><?php //echo $usr->getName() . " addProject.php" . $usr->getSurname()?><!--</option>-->
<!--                --><?php //endforeach;?>
<!--            </select>-->
            <label for="state">Stato</label>
            <select name="state" id="state" class="form-select">
                <option value="assigned">Assegnato</option>
                <option value="ongoing">In sviluppo</option>
                <option value="testing">In fase di test</option>
                <option value="finished">Finito</option>
            </select>
            <br>
            <div class="d-flex justify-content-between">
                <a class="btn btn-secondary" href="<?php echo URL ?>projects">Annulla</a>
                <input type="submit" class="btn btn-primary" name="login" value="Modifica">
            </div>
        </form>
    </div>
</div>