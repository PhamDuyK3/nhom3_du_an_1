<?php get_header('', 'test') ?>
<main class="">
        <section>
            <div class="bg-[#FE000F] mt-12 text-center">
                <p class="text-[#ffff]">Chào mừng bạn đến với Hệ Thống Thế Giới Đồng Hồ Chính Hãng Watchstore.vn</p>
            </div>
           
        </section>
        <section class="mx-auto">
        <a href=""><img class="w-full" src="public/images/home/1520153249908.jpg" alt=""></a>
        </section>
        <section class="bg-[#F9F9F9] text-[15px] flex justify-center space-x-[75px] mb-[21px]">
    </section>
        <section>
            <h3 class="text-[#000] text-center font-[600] text-[30px] mt-5">Thương hiệu</h3>
            <div class="grid grid-cols-3 max-w-6xl mx-auto gap-20 mt-9">
            <?php foreach ($categories as $category) : ?>
                <div>
                <a href="?mod=product&cate_id=<?= $category['id'] ?>"><img src="public/images/<?= $category['image']?>" alt="">
                    <div class="absolute -mt-10 text-center w-[330px]">
                      <h2 class="font-[700] text-[#]"><?= $category['name'] ?></h2></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!------------------>
        </section>
        <section>
            <h2 class="text-center text-[30px] font-[600] mt-8">SẢN PHẨM </h2>
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-3 gap-24 pt-16">
                <?php foreach ($products as $product) : ?>
                    <div>
                        <a href="?mod=detail&id=<?= $product['id'] ?>">
                        <img src="public/images/<?= $product['image'] ?>" alt="">
                        <div class="text-center">
                            <p class="pt-8 font-[500] pb-4"><?= $product['name'] ?></p>
                            <span class="text-[#FF0101]"><?= $product['price'] ?> đ </span>
                        </div>
                    </a>
                    </div>
                    <?php endforeach ?>
                <!-- ------------------------------------ -->
                </div>
                
            </div>
        </section>
</main>
<?php get_footer('') ?>