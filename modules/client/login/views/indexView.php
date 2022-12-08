<?php get_header('', 'Đăng nhập') ?>
<main>
<div class="w-full max-w-xs mx-auto mt-9 mb-6">
   
 <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >
 <?php foreach ($notifications as $notification) : ?>
                        <?php foreach ($notification['msgs'] as $msg) : ?>
                            <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
 <form class="space-y-4 md:space-y-6" action="#" method="POST">
    <div class="mb-4">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Username
      </label>
      <input type="email" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
    </div>
    <div class="mb-6">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Password
      </label>
      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class=" text-white bg-[#662d91] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Sign In
      </button>
      <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 ">
        Forgot Password?
      </a>
    </div>
    <h3 class="text-center font-[600] ">BẠN ĐÃ CÓ TÀI KHOẢN CHƯA?</h3>
                        <div>
                        <a href="?mod=register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Tạo Tài Khoản
                        </a>
                        "có nhiều lợi ích: thanh toán nhanh hơn, giữ nhiều hơn một địa chỉ, theo dõi đơn đặt hàng và hơn thế nữa."
                        </div>
  </form>
 </div>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
</main>
<?php get_footer('') ?>
