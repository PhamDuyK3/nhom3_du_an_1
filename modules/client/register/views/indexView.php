<?php get_header('', 'Đăng ký') ?>
<main class="flex justify-center py-[50px] px-10">
    <!-- ---------------------------------------------------------------- -->
    <div class="w-full w-[500px] ">
    <?php foreach ($notifications as $notification) : ?>
            <?php foreach ($notification['msgs'] as $msg) : ?>
                <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <form class="w-full max-w-lg"  method="POST" >
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="full_name">
        Tên Đầy Đủ
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="full_name" name="full_name" type="text" placeholder="Nhập Vào Họ Tên">
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
        Số Điện Thoại
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone" name="phone" type="text" placeholder="Liên hệ">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Email">
        Email
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Email" type="text" placeholder="Email" name="email">
    </div>
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pass">
        Mật Khẩu
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="pass" name="pass" type="password" placeholder="******************">
    </div>
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pass">
        Nhập Lại Mật Khẩu
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="re_pass" name="re_pass" type="password" placeholder="******************">
    </div>
  </div>
  <div class="text-center">
                <button class=" bg-[#662d89] hover:bg-violet-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Tạo Tài Khoản
                </button>
    </div>
</form>
    </div>
   
</main>
<?php get_footer('') ?>