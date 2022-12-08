<?php get_header('', 'Thanh Toán') ?>
<main>
  <section class="flex justify-between">
  <div class="flex w-full  shadow-md my-10">
        <div class="w-full bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Thanh toán</h1>
                <h2 class="font-semibold text-2xl"><?= count($products) ?> Sản phẩm</h2>
            </div>
            <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Đơn Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số Tiền</h3>
            </div>
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
                            <span class="text-red-500 text-xs"><?= $product[6] ?></span>
                        </div>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product[3]) ?></span>
                    <div class="flex justify-center w-1/5">
                        <div class="mx-2 text-center w-8"><?= $product[2] ?></div>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm"><?= currency_format($product[4]) ?></span>
                    <?php $price_total += $product[4] ?>
                </div>
            <?php endforeach ?>
            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-3/5">
                    <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">Tổng:</span>
                    </div>
                </div>
                <div class="flex justify-center w-2/5">
                    <div class="mx-2 text-center w-8 text-red-500 font-[700]"><?= currency_format($price_total) ?></div>
                </div>
            </div>
            <a href="?mod=cart" class="flex font-semibold text-indigo-600 text-sm mt-10">

            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
            <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
            </svg>
                Quay lại
            </a>
        </div>
                


    </div>

    <div class="w-[800px] block h-screen shadow p-4 flex items-center justify-center">
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-amber-500  mb-12">
                Địa Chỉ Giao Hàng
            </div>
            <?php foreach ($notifications as $notification) : ?>
                <?php foreach ($notification['msgs'] as $msg) : ?>
                    <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <form action="" method="post" class="">
            <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Họ Và Tên
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="name"placeholder="Tên " >
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        Số Điện Thoại
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" name="phone" placeholder="84+">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
    Địa Chỉ
      </label>
      <textarea name="address" class="focus:outline-none border w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"></textarea>
    </div>
  </div>
  <div class="flex justify-between items-center -mx-3 mb-2">
  <div class="flex justify-center my-6">
    <button class=" rounded-full  p-3 w-full sm:w-56   bg-[#662d91] from-sky-600  to-teal-300 text-white text-lg font-semibold ">
                        Thanh toán
    </button>
                </div>
            </form>
        </div>
    </div>
  </section>
</main>
<?php get_footer('') ?>