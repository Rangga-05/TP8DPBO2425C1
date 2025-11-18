<?php include "views/templates/header.php"; ?>

<div class="container mt-4 flex-grow-1">

    <h2 class="fs-1 mb-4"><?= isset($data['id']) ? "Edit Course" : "Add Course" ?></h2>

    <form method="POST" action="index.php?page=course&action=<?= $action ?>" class="fs-5">

        <?php if (isset($data['id'])): ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <?php endif; ?>

        <div class="mb-5">
            <label class="form-label">Title</label>
            <input type="text" 
                   class="form-control form-control-lg"
                   name="title" 
                   value="<?= $data['title'] ?? '' ?>" 
                   required>
        </div>

        <div class="mb-5">
            <label class="form-label">Lecturer</label>
            <select name="lecturer_id" class="form-select form-select-lg" required>
                <option value="">Select Lecturer</option>
                <?php foreach ($lecturers as $lecturer): ?>
                    <option value="<?= $lecturer['id'] ?>" 
                        <?= (isset($data['lecturer_id']) && $data['lecturer_id'] == $lecturer['id']) ? 'selected' : '' ?>>
                        <?= $lecturer['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-5">
            <label class="form-label">Credit</label>
            <input type="number" 
                   class="form-control form-control-lg"
                   name="credit" 
                   value="<?= $data['credit'] ?? '' ?>" 
                   required>
        </div>

        <div class="mb-5">
            <label class="form-label">Semester</label>
            <input type="number" 
                   class="form-control form-control-lg"
                   name="semester" 
                   value="<?= $data['semester'] ?? '' ?>" 
                   required>
        </div>

        <button type="submit" class="btn btn-primary btn-lg fs-4 mt-3">
            <?= isset($data['id']) ? "Update" : "Save" ?>
        </button>

        <a href="index.php?page=course" class="btn btn-secondary btn-lg fs-4 mt-3">Back</a>

    </form>
</div>

<?php include "views/templates/footer.php"; ?>