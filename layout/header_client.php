<?php if (is_login()) {
    $user = get_login();
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="border-b-4 border-[#662d91]">
            <div class="flex justify-between items-center  mb-3">
                <div class="pl-10 ">
                    <form class="flex" method="POST" action="?mod=product">
                        <input type="text" name="search" id="" class="py-2 outline-none w-[340px]  pl-[10px] bg-[#E8E8E8] rounded-l-[5px]" placeholder="search.......">
                        <button name="btn" type="submit" class=" px-3 flex items-center  bg-[#E8E8E8] rounded-r-[5px]">
                            <img src="public/images/bx_search-alt-2.png" alt="">
                        </button>
                    </form>
                </div>
                    <a href="?mod=home"class="absolute left-1/2 -translate-x-1/2"><img  src="public/images/home/image 1.png" alt=""></a>
                
               <div class="flex justify-between">
               <div class="login flex items-center">
                    <?php if (!empty($user)) : ?>
                        <a href="?mod=cart" class="w-[157px] h-[44px] border-[3px] bg-red rounded-[10px] items-center flex mr-[30px]">
                        <img src="public/images/cart4.svg" alt="" class="pl-[5px]">
                        <span class="px-[10px] text-[15] text-[#414141] text-center">Giỏ hàng</span>
                        <div class="bg-[#FFC107] w-[17px] h-[18px] text-center rounded-[3px] text-[13px] text-[#414141]">
                            <?= is_ss('cart') ? count($_SESSION['cart']) : 0 ?></div>
                    </a>
                        <img src="public/images/<?php echo $user['image'] ?>" alt="" class="w-[60px]  object-contain rounded-full">
                        <div class="pl-[10px]">
                            <div>
                                <a href="?mod=account" class="font-['Roboto Serif'] btn btn-sm btn-light-primary font-weight-bolder py-2  uppercase text-green-500 "><?php echo $user['full_name'] ?></a>
                            </div>
                            <a href="?role=client&mod=login&action=logout" class="btn btn-sm btn-light-primary font-weight-bolder py-2  text-red-400 underline">Đăng xuất</a>
                        </div>
                        <div class="cart flex pl-[75px]">
                </div>
                    <?php else : ?>
                       <button class="w-[100px] h-[50px] bg-green-500 text-[#ffffff] text-[18px] mr-[30px] rounded-md font-[600]">
                        <a href="http://localhost/nhom3/?mod=login">Đăng Nhập</a>
                       </button>
                       <button class="w-[100px] h-[50px] bg-green-500 text-[#ffffff] text-[18px] rounded-md font-[600]">
                        <a href="http://localhost/nhom3/?mod=register">Đăng Ký</a>
                       </button>
                    <?php endif ?>
                </div>
               
               </div>
            </div>
            <!-- banner_menu -->
        </header>
        <section class="border-b border-[#c0c0c0] py-5 " >
            <div class="pl-10 flex justify-center">
                <ul class="flex">
                    <li><a href="?mod=home" class="px-4 font-[500]">Trang Chủ</a></li>
                    <li><a href="?mod=account" class="px-4 font-[500]">Đồng Hồ Nam</a></li>
                    <li><a href="?mod=bill" class="px-4 font-[500]">Đồng Hồ Nữ</a></li>
                    <li><a href="?mod=cart" class="px-4 font-[500]">Luxury</a></li>
                </ul>
            </div>
        </section>