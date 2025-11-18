<?php include "views/templates/header.php"; ?>

<div class="container mt-4 flex-grow-1">

    <?php 
    //Tampilkan pesan ERROR
    if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger fs-5 text-center mb-4" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
        <?php 
        //Hapus pesan error agar tidak muncul lagi saat refresh
        unset($_SESSION['error']); 
    endif; 
    
    //Tampilkan pesan SUKSES
    if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success fs-5 text-center mb-4" role="alert">
            <?= $_SESSION['success']; ?>
        </div>
        <?php 
        //Hapus pesan sukses agar tidak muncul lagi saat refresh
        unset($_SESSION['success']); 
    endif;
    ?>

    <h2 class="text-center fs-1 mb-4">Course List</h2>

    <table class="table table-bordered table-striped fs-5">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Lecturer</th>
                <th>Credit</th>
                <th>Semester</th>
                <th width="180">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['lecturer_name'] ?></td>
                    <td><?= $row['credit'] ?></td>
                    <td><?= $row['semester'] ?></td>
                    <td>
                        <a href="index.php?page=course&action=edit&id=<?= $row['id'] ?>" 
                           class="btn btn-secondary btn-sm">Edit</a>

                        <a href="index.php?page=course&action=delete&id=<?= $row['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="index.php?page=course&action=create" 
       class="btn btn-primary w-100 fs-4">
       Add New
    </a>

</div>

<?php include "views/templates/footer.php"; ?>