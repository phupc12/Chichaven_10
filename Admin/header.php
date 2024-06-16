<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="../App/views/public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="../App/views/public/images/bowl-2.png">
    <style>
        .navbar-brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        .nav-link {
            padding: 0.75rem 1rem;
        }
        .navbar-nav .nav-item {
            margin-left: 10px;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ddd;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-toggler {
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../App/views/public/images/bowl-2.png" alt="Logo">
                Admin Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=adddm"><i class="bi bi-list"></i> Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=addsp"><i class="bi bi-box-seam"></i> Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=dskh"><i class="bi bi-people"></i> Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=dsbl"><i class="bi bi-chat-dots"></i> Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=dsdh"><i class="bi bi-receipt"></i> Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=logout" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wFQTMtbH84IRU8l8I1Rgs0BBsl3CdNQaTlIuPnj2F/9MdL3zu2EXwZpH1f5s8Ajt" crossorigin="anonymous"></script>
</body>
</html>
