<?php
if (isset($_SESSION['user']))
    extract($_SESSION['user']);
?>
<?php
require_once '../App/dao/pdo.php';

$conn = pdo_get_connection();

// Lấy tổng số người dùng
$sql = "SELECT COUNT(ID) FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totalUsers = $stmt->fetchColumn();

// Lấy số lượng người dùng theo vai trò
$sql = "SELECT role, COUNT(ID) as count FROM users GROUP BY role";
$stmt = $conn->prepare($sql);
$stmt->execute();
$userCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dataPointsUsers = [];
foreach ($userCounts as $userCount) {
    if ($userCount['role'] == 'admin') {
        $label = "Admin";
    } elseif ($userCount['role'] == 'manager') {
        $label = "Manager";
    } else {
        $label = "Users";
    }
    $dataPointsUsers[] = array("label" => $label, "y" => $userCount['count']);
}


// Lấy tổng số sản phẩm
$sql = "SELECT COUNT(id) FROM sanpham";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totalProducts = $stmt->fetchColumn();

// Lấy số lượng sản phẩm và tên danh mục theo từng danh mục
$sql = "SELECT sanpham.iddm, danhmuc.name as category_name, COUNT(sanpham.id) as count 
        FROM sanpham 
        JOIN danhmuc ON sanpham.iddm = danhmuc.id 
        GROUP BY sanpham.iddm, danhmuc.name";
$stmt = $conn->prepare($sql);
$stmt->execute();
$productCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dataPointsProducts = [];
foreach ($productCounts as $productCount) {
    $dataPointsProducts[] = array("label" => $productCount['category_name'], "y" => $productCount['count']);
}


// Tính toán phần còn lại cho các danh mục khác (nếu có)
$otherCategoriesPercentage = 100 - array_sum(array_column($dataPointsProducts, 'y'));
// Lấy số lượng đơn hàng theo trạng thái
$sql = "SELECT status, COUNT(token_order) as count FROM orders GROUP BY status";
$stmt = $conn->prepare($sql);
$stmt->execute();
$orderCounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dataPointsOrders = [];
foreach ($orderCounts as $orderCount) {
    $dataPointsOrders[] = array("label" => $orderCount['status'], "y" => $orderCount['count']);
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var userChart = new CanvasJS.Chart("userChartContainer", {
                animationEnabled: true,
                title: {
                    text: "Total Users"
                },
                subtitles: [{
                    text: "Jun 2024"
                }],
                data: [{
                    type: "column",
                    indexLabel: "{label}: {y}", // Hiển thị label và giá trị y trên mỗi cột
                    dataPoints: <?php echo json_encode($dataPointsUsers, JSON_NUMERIC_CHECK); ?>,
                    colors: ["#4F81BC", "#C0504E", "#9BBB59"]
                }]
            });
            userChart.render();

            var productChart = new CanvasJS.Chart("productChartContainer", {
                animationEnabled: true,
                title: {
                    text: "Total Products"
                },
                subtitles: [{
                    text: "Jun 2024"
                }],
                data: [{
                    type: "column",
                    indexLabel: "{label}: {y}", // Hiển thị label và giá trị y trên mỗi cột
                    dataPoints: <?php echo json_encode($dataPointsProducts, JSON_NUMERIC_CHECK); ?>,
                    colors: ["#B565A7", "#FF6F61", "#6B5B95", "#88B04B"]
                }]
            });
            productChart.render();
            var orderChart = new CanvasJS.Chart("orderChartContainer", {
                animationEnabled: true,
                title: {
                    text: "Total Orders by Status"
                },
                subtitles: [{
                    text: "Jun 2024"
                }],
                data: [{
                    type: "column",
                    indexLabel: "{label}: {y}", // Hiển thị label và giá trị y trên mỗi cột
                    dataPoints: <?php echo json_encode($dataPointsOrders, JSON_NUMERIC_CHECK); ?>,
                    colors: ["#4F81BC", "#C0504E", "#9BBB59", "#FFA500", "#6B8E23"]
                }]
            });
            orderChart.render();
        }
        
    </script>
</head>

<body>
<div class="container">
        <h2 class="text-center my-4">Xin chào <span class="spanbtn"><?= $name ?></span></h2>
        <div class="row">
            <div class="col-md-6">
                <div id="userChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="col-md-6">
                <div id="productChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="col-md-6">
            <h2 class="text-center my-4">Danh sách đơn hàng theo trạng thái</h2>
            <div id="orderChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>
</body>

</html>
