<table class="table table-striped table-hover">
    <h1>Lista Utenti</h1>
    <thead>
    <tr><th>Nome</th><th>Cognome</th><th>Email</th><th>Numero di telefono</th><th>Ruolo</th></tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->getName() ?></td>
            <td><?php echo $user->getSurname() ?></td>
            <td><?php echo $user->getEmail() ?></td>
            <td><?php echo $user->getPhoneNumber() ?></td>
            <td><?php echo $user->getRole() ?></td>
            <td>
                <div style="float: right">
                    <a href="<?php echo URL;?>userModify" class="card-link btn btn-primary"><img src="<?php echo URL;?>application/libs/images/pen-solid.svg"></i></a>
                    <a href="#" class="card-link btn btn-danger"><img src="<?php echo URL;?>application/libs/images/trash-can-solid.svg"></a>
                </div>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="<?php echo URL;?>userAdd" class="card-link btn btn-success"><img src="<?php echo URL;?>application/libs/images/plus-solid.svg"></a>
