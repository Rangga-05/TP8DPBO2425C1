<?php include "views/templates/header.php"; ?>

<div class="container mt-4 flex-grow-1">
    
    <h2 class="fs-1 mb-4"><?= isset($data['id']) ? "Edit Lecturer" : "Add Lecturer" ?></h2>

    <form method="POST" action="index.php?page=lecturer&action=<?= $action ?>" class="fs-5">

        <?php if (isset($data['id'])): ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <?php endif; ?>

        <div class="mb-5">
            <label class="form-label">Name</label>
            <input type="text" 
                   class="form-control form-control-lg"
                   name="name" 
                   value="<?= $data['name'] ?? '' ?>" 
                   required>
        </div>

        <div class="mb-5">
            <label class="form-label">NIDN</label>
            <input type="text" 
                   class="form-control form-control-lg"
                   name="nidn" 
                   value="<?= $data['nidn'] ?? '' ?>" 
                   required>
        </div>

        <div class="mb-5">
            <label class="form-label">Phone</label>
            <input type="text" 
                   class="form-control form-control-lg"
                   name="phone" 
                   value="<?= $data['phone'] ?? '' ?>">
        </div>

        <div class="mb-5">
            <label class="form-label">Join Date</label>
            <input type="date" 
                   class="form-control form-control-lg"
                   name="join_date" 
                   value="<?= $data['join_date'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-primary btn-lg fs-4 mt-3"> 
            <?= isset($data['id']) ? "Update" : "Save" ?>
        </button>

        <a href="index.php?page=lecturer" class="btn btn-secondary btn-lg fs-4 mt-3">Back</a>

    </form>
</div>

<?php include "views/templates/footer.php"; ?>