<h1 class="text-center m-4">Progetti attuali</h1>

<div class="row">
    <?php foreach ($pjs as $proj):?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $proj->getTitle()?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $proj->getTitle()?></h6>
            <p class="card-text"><?php echo $proj->getDesc()?></p>
            <div>
            <a href="#" class="card-link btn btn-danger">Elimina</a>
            <a href="#" class="card-link btn btn-primary">Modifica</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>