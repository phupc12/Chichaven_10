
<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    if(!isset($_SESSION['user'])) $_SESSION['user']=[];
    if(!isset($_SESSION['error'])) $_SESSION['error']=[];
    include "App/dao/pdo.php";
    include "App/dao/mail.php";
    include "App/dao/sanpham.php";
    include "App/dao/binhluan.php";
    include "App/dao/thanhtoan.php";
    include "App/dao/taikhoan.php";
    include "App/views/global.php";
    include "App/views/header.php";
    //home
    $spnew = loadall_sanpham_home();
    //shop
    if (isset($_POST['listok']) && ($_POST['listok'])) {
        $kyw = $_POST['kyw'];
        $iddm = $_POST['iddm'];
    } else {
        $kyw = '';
        $iddm = 0;
    }
    $listdanhmuc = loadall_danhmuc();
    $spshow = loadall_sanpham_shop($kyw, $iddm);
    //homefooter
    $spfooter = loadall_sanpham_home_footer();
    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act = $_GET['act'];
        switch ($act) {
            case 'sanphamchitiet':
                
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=load_sanpham($id);
                    extract($onesp);
                    $spdm=load_sanphamdm($id, $iddm);
                    include "App/views/detail_products.php";
                }else{
                    include "App/views/home.php";
                }

                break;
            case 'shop':
                include "App/views/shop.php";
                break;
            case 'aboutus':
                include "App/views/aboutus.php";
                break;
            case 'services':
                include "App/views/services.php";
                break;
            case 'thanhtoan':
                require_once 'App/controllers/thanhtoan.php';
                break;
            case 'lichsu':
                require_once 'App/controllers/lichsu.php';
                break;
            case 'blog':
                include "App/views/blog.php";
                break;
            case 'contact':
                include "App/views/contact.php";
                break;
            case 'doi-mat-khau':
                require_once 'App/controllers/doimatkhau.php';
                break;
            case 'quen-mat-khau':
                require_once 'App/controllers/quenmatkhau.php';
                break;
            case 'addtocart':
                require_once "App/controllers/giohang.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])) {
                    array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                
                include "App/views/cart/viewcart.php";
                break;
            case 'login':
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    if (isset($_POST['email']) && isset($_POST['pass'])) {
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $checkusers = checkusers($pdo, $email, $pass);
                
                        if (is_array($checkusers)) {
                            if ($checkusers['role'] === 'admin' || $checkusers['role'] === 'user') {
                                $_SESSION['user'] = $checkusers;
                                header('Location: index.php');
                            }
                        } else {
                            if (!isset($_SESSION['loginError'])) {
                                echo '<script>alert("Đăng nhập thất bại! Sai email hoặc mật khẩu.");</script>';
                            }
                        }
                    }
                }
                include "App/views/login.php";
                break;
                
            case 'logout':
                unset($_SESSION['user']);
                header('Location: index.php');
                break;
            case 'register':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $phone=$_POST['phone'];
                    insert_taikhoan($name, $email, $img, $pass, $phone, $pdo);
                    $tb="Đăng ký thành công! Vui lòng đăng nhập.";
                }
                include "App/views/register.php";
                break;
            case 'test':
                require_once 'App/views/test.php';
                exit;
                break;
            default:
                show_404();
                break;
        }
    }else{
        include "App/views/home.php";
    }
    
    include "App/views/footer.php";
?>