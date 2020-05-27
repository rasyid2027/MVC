<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mbr']['name']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['mbr']['no_member']; ?></h6>
            <p class="card-text"><?= $data['mbr']['email']; ?></p>
            <p class="card-text"><?= $data['mbr']['region']; ?></p>
            <a href="<?= BASEURL; ?>/member" class="card-link">Back</a>
        </div>
    </div>
</div>