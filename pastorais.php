<?php
    // Naming this website page:
    $pageTitle = "Paróquia São Sebastião - Pastorais";

    // Including the header:
    include("models/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <!-- Customized Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">PASTORAIS</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">INÍCIO</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">PASTORAIS</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

</body>
</html>

<?php
    // Importing the pastorals forms:
    include("models/pastorals.php");
?>

<?php
    // Including the footer:
    include("models/footer.php");
?>
