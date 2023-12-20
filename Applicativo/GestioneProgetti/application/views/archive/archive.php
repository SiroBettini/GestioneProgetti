<h1 class="text-center m-4">Archivio</h1>
<div class="d-flex justify-content-center">
    <div class="col-10">
        <div class="row row-cols-1 row-cols-md-4 g-4 w-100">
            <?php foreach ($pjs as $proj):?>
            <div class="col">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $proj->getTitle()?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Stato: <?php echo $proj->getState()?>, <?php echo $proj->getStart()?></h6>
                        <p class="card-text"><?php echo $proj->getDesc()?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>