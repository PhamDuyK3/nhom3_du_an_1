<?php get_header('', 'Trang chủ') ?>
<main class="px-10">
    <section class="bg-[#F9F9F9] pb-[31px] mb-[31px]">
        <h3 class="font-['Yeseva One'] text-[30px] py-[27px]">Sản phẩm</h3>
        <?php foreach ($notifications as $notification) : ?>
            <?php foreach ($notification['msgs'] as $msg) : ?>
                <div class="w-full text-center py-4 px-3 bg-<?php echo $notification['type'] ?>-500 text-white mb-3"><?php echo $msg ?></div>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <div class="grid grid-cols-5 gap-4">
            <?php foreach ($result as $product) : ?>

                <div>
                        <a href="?mod=detail&id=<?= $product['id'] ?>">
                        <img src="public/images/<?= $product['images'] ?>" alt="">
                        <div class="text-center">
                            <p class="pt-8 font-[500] pb-4"><?= $product['title'] ?></p>
                            <span class="text-[#FF0101]"><?= $product['price'] ?> đ </span><span class="text-[#B6B3B3]">1.678.000 ₫</span> <span class="text-[13px]">(-20%)</span>
                        </div>
                    </a>
                    </div>
            <?php endforeach ?>

        </div>
        


    </section>
</main>
<?php get_footer('') ?>