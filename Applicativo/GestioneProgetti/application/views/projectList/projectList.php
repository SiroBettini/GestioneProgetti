<h1 class="text-center m-4">Progetti attuali</h1>
<div class="row row-cols-1 row-cols-md-4 g-4 w-100">
    <?php foreach ($pjs as $proj):?>
    <div class="col">
        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title"><?php echo $proj->getTitle()?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $proj->getStart()?></h6>
                <p class="card-text"><?php echo $proj->getDesc()?></p>
                <div class="card-footer d-flex justify-content-around">
                    <a href="#" onclick="showModal('<?php echo $proj->getTitle()?>','<?php echo $proj->getId()?>')" class="card-link btn btn-danger">Elimina</a>
                    <a href="#" class="card-link btn btn-primary">Modifica</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
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