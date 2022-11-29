<?php
include __DIR__ . '/partials/header.php';

session_start();
$password = $_SESSION['password'];


?>

<body>
    <div class="container text-center">
        <div class="d-flex flex-column p-3 align-items-center justify-content-center">
            <h2 class="text-capitalize">La tua password:</h2>
            <?php if (isset($password)) { ?>
            <h3>
                <?php echo $password ?>
            </h3>
            <?php } ?>
        </div>
    </div>
</body>