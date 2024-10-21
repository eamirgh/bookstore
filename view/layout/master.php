<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:8080/bookstore/app.css">
    <script src="http://localhost:8080/bookstore/tailwind.js"></script>
    <title><?php echo $title ?? '' ?></title>
</head>

<body>
    <?php require_once(__DIR__ . './../inc/header.php'); ?>
    <main class="text-gray-600 body-font">
        <?php echo $content ?? ''; ?>
    </main>
    <?php require_once(__DIR__ . './../inc/footer.php'); ?>
</body>

</html>