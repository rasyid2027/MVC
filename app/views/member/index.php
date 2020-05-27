<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
        <button type="button" class="btn btn-primary addDataButton" data-toggle="modal" data-target="#formModal">
            Add Member Data
        </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/member/search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="find members.." name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Member List</h3>
            <ul class="list-group">
                <?php foreach( $data['mbr'] as $mbr ){ ?>
                    <li class="list-group-item">
                        <?= $mbr['name']; ?>
                        <a href="<?= BASEURL; ?>/member/delete/<?= $mbr['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin..?')">delete</a>
                        <a href="<?= BASEURL; ?>/member/edit/<?= $mbr['id']; ?>" class="badge badge-success float-right showEditModal ml-1" data-toggle="modal" data-target="#formModal" data-id="<?= $mbr['id']; ?>">edit</a>
                        <a href="<?= BASEURL; ?>/member/detail/<?= $mbr['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </div>

</div>


<!-- modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Add Member Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/member/add" method="post">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="no_member">No.Member</label>
                    <input type="number" class="form-control" id="no_member" name="no_member">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="region">Example select</label>
                    <select class="form-control" id="region" name="region">
                    <option value="Wutai">Wutai</option>
                    <option value="Midgar">Midgar</option>
                    <option value="Slums">Slums</option>
                    <option value="Shinra">Shinra</option>
                    <option value="Wallmarket">Wallmarket</option>
                    </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add data</button>
                </form>
            </div>
        </div>
    </div>
</div>