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
                    <a href="<?php echo URL;?>userModify/modifyUserPage/<?php echo $user->getId() ?>" class="card-link btn btn-primary"><span class="bi bi-pen"></span></a>
                    <a href="#" onclick="showModal('<?php echo $user->getName()?>','<?php echo $user->getSurname()?>','<?php echo $user->getId()?>')" class="card-link btn btn-danger"><span class="bi bi-trash"></span></a>
                </div>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="<?php echo URL;?>userAdd" class="card-link btn btn-success"><img src="<?php echo URL;?>application/libs/images/plus-solid.svg"></a>



<!-- Delete confirm modal -->
<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confermare?</h5>
                <a type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close" onclick="closeModal()"></a>
            </div>
            <div class="modal-body" id="modalBodyContent">
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Annulla</a>
                <a type="button" class="btn btn-danger" data-dismiss="modal" href="#" id="delProj">Elimina</a>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal(name,surname,id) {
        var modalBody = document.getElementById('modalBodyContent');
        modalBody.innerHTML = 'Vuoi davvero eliminare il seguente utente: <b>' + name + " " + surname +'</b>';
        var modalAction = document.getElementById("delProj");
        modalAction.href = '<?php echo URL . "userDelete/delete/"?>' + id;
        $('#deleteModal').modal('show');
    }
    function closeModal(){
        $('#deleteModal').modal('hide');
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>