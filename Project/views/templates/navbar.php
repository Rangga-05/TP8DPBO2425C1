<?php
//Ambil page saat ini, beri nilai default 'lecturer' jika kosong
$currentPage = $_GET['page'] ?? 'lecturer';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-5">
    <div class="container-fluid">

        <a class="navbar-brand fs-4" href="index.php">Lecturers Manajemen System</a>

        <div class="collapse navbar-collapse justify-content-center">
            
            <ul class="navbar-nav fs-4">

                <li class="nav-item mx-5">
                    <a class="nav-link <?= $currentPage == 'lecturer' ? 'active' : '' ?>"
                       href="index.php?page=lecturer">
                        Lecturers
                    </a>
                </li>

                <li class="nav-item mx-5">
                    <a class="nav-link <?= $currentPage == 'department' ? 'active' : '' ?>"
                       href="index.php?page=department">
                        Departments
                    </a>
                </li>

                <li class="nav-item mx-5">
                    <a class="nav-link <?= $currentPage == 'course' ? 'active' : '' ?>"
                       href="index.php?page=course">
                        Courses
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>