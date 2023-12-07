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
        </tr>
    <?php endforeach;?>
    </tbody>
</table>