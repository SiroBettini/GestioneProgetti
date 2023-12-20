<div class="d-flex justify-content-center align-items-center">
    <h1 class="text-center m-4">Progetti attuali</h1>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once 'application/controller/userControl.php';
    $uc = new UserControl();
    if(!$uc->isContributor()): ?>
        <a class="btn btn-success" href="<?php echo URL . "projects/new"?>"><span class="bi bi-plus-lg"></span></a>
    <?php endif; ?>
</div>
<div class="d-flex justify-content-center">
    <div class="col-10">
        <div class="row row-cols-1 row-cols-md-3 g-4 w-100">
            <?php foreach ($pjs as $proj):?>
                <div class="col">
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $proj->getTitle()?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Stato: <?php echo $proj->getState()?>, <?php echo $proj->getStart()?></h6>
                            <p class="card-text"><?php echo $proj->getDesc()?></p>
                            <?php
                            if(!$uc->isContributor()):?>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="#" onclick="showModal('<?php echo $proj->getTitle()?>','<?php echo $proj->getId()?>')" class="card-link btn btn-danger"><span class="bi bi-trash"></span></a>
                                    <a href="<?php echo URL?>projects/edit/<?php echo $proj->getId()?>" class="card-link btn btn-primary"><span class="bi bi-pencil-square"></span></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
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
</div>

<!-- Script for modal -->
<script>
    function showModal(title,id) {
        var modalBody = document.getElementById('modalBodyContent');
        modalBody.innerHTML = 'Vuoi davvero eliminare il progetto: <b>' + title + '</b>';
        var modalAction = document.getElementById("delProj");
        modalAction.href = '<?php echo URL . "projects/delete/"?>' + id;
        $('#deleteModal').modal('show');
    }
    function closeModal(){
        $('#deleteModal').modal('hide');
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>