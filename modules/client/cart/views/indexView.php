<?php get_header('', 'Giỏ hàng') ?>
<main>
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Giỏ hàng của tôi</h1>
                <h2 class="font-semibold text-2xl"><?= count($products) ?> Sản phẩm</h2>
            </div>
            
            <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                    <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/6 text-center">Đơn Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/4 text-center">Số Tiền</h3>
            </div>
            <form action="" method="post">
                <?php $price_total = 0 ?>
                <?php foreach ($products as $key => $product) : ?>
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5">
                            <!-- product -->
                            <div class="w-20">
                                <img class="w-full object-cover" src="public/images/<?= $product[0] ?>" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm"><?= $product[1] ?></span>
                                <span class="text-red-500 text-xs">Thương Hiệu: <?= $product[6] ?></span>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5">
                            <input class="mx-2 border text-center w-10" name="quantity[<?= $key ?>]" type="number" value="<?= $product[2] ?>">
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product[3]) ?></span>
                        <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product[4])  ?></span>
                        <?php $price_total += $product[4] ?>
                        <a href="?mod=cart&action=delete&id=<?= $key ?>" class="font-semibold hover:text-red-500 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></a>

                    </div>
                <?php endforeach ?>
                <div class="flex justify-between items-center">
                    <button type="submit" class="mt-4 inline-block px-6 py-2.5 bg-[#662d91] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Cập nhật</button>
                    <a href="?mod=cart&action=delete" class="mt-4 inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Xóa Toàn Bộ Giỏ Hàng</a>
                </div>
            </form>

            <a href="?" class="flex font-semibold text-indigo-600 text-sm mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Tiếp tục mua sắm
            </a>
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Thông Tin Đơn Hàng</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Tạm Tính (<?= count($products) ?> sản phẩm)</span>
                <span class="font-semibold text-sm"><?= currency_format($price_total) ?></span>
            </div>
            <div>
                <label class="font-medium inline-block mb-3 text-sm uppercase">Mua sắm</label>
                <select class="block p-2 text-gray-600 w-full text-sm">
                    <option>Phí giao hàng - 30.000</option>
                </select>
            </div>
            <div class="border-t mt-8 ">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Tổng Cộng</span>
                    <span><?= currency_format($price_total) ?></span>
                </div>
                <a href="?mod=pay" class="bg-green-500 font-semibold hover:bg-indigo-600  p-3 text-sm text-white uppercase w-full">Đặt Hàng</a>
            </div>
        </div>

    </div>
</main>
<?php get_footer('') ?>