<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestione progetti</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="navbar-nav">
                <a class="nav-link" href="<?php echo URL;?>home/homePage">Home</a>
                <a class="nav-link" href="<?php echo URL;?>projects">Progetti</a>
                <a class="nav-link" href="<?php echo URL;?>archive">Archivio</a>
<!--                <span class="border-end border-dark-subtle"><a class="nav-link me-2" href="--><?php //echo URL;?><!--addProject">Crea</a></span>-->
                <a class="nav-link" href="<?php echo URL;?>home/logOut">Logout <span class="bi bi-box-arrow-in-left"></span></a>
            </div>
        </div>
    </div>
</nav>