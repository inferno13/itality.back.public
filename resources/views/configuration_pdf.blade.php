<?php 
$public_path = public_path();

$glassWidth = 351 * 1.15;
$glassHeight = 1257 * 1.15;

$height = 2000;
$perimetr = 1000;

$topImageWidth = 630;

$side = 'right';

$sideLeft = ($side === 'right' ? 'right' : 'left');
$sideRight = ($side === 'right' ? 'left' : 'right');

$glasses_count = 4;
$glassMarginRight = 226;
?>
<style>
    @page { margin: 35px; }
    body { margin: 35px; padding: 35px; }
</style>

<html>
<head>
</head>
<body style="font-family:'dejavu sans';margin: 0;padding:0;border:0;">
    <div style="clear:both;height: 150px; margin-bottom: 100px; background-color: #434a5c; padding-top: 50px; color:#fff; font-size: 18px;">
        <div style="height:20px;font-size:60px;padding-left:40px; display:inline-block;margin-right: 550px;">
            ГРАФИТ 8мм. / ПРОЗРАЧНОЕ / ПОЛИРОВКА + ЗАКАЛКА
        </div>
        <div style="height:20px;font-size:60px;display:inline-block;">
            2502‑2093
        </div>
    </div>
    <div style="clear:both;height: <?=$topImageWidth+61?>px;">

         <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>" style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s1.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>" style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s2.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>"
          style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s4.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>"
             style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s2.png')); ?>" alt="">
    </div>
    <div style="clear:both;height: <?=$topImageWidth+250?>px;">

         <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>" style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s3.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>" style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s2.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>"
          style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s3.png')); ?>" alt="">

          <img width="<?php echo e($topImageWidth); ?>" height="<?php echo e($topImageWidth); ?>"
             style="display:block; float: left;margin-right: 60px;width:<?php echo e($topImageWidth); ?>px;" src="<?php echo e(asset('pdf_images/s4.png')); ?>" alt="">
    </div>
    <!-- <div style="width: <?php echo e($glassWidth); ?>px; background-color: #e6e6e6; height: <?php echo e($glassHeight); ?>px"> </div> -->

    <div style="page-break-after: <?= $glasses_count === 5 ? 'always' : 'none'; ?>;">
    <?php for((($side === 'right') ? $i = min($glasses_count, 4, 5) : $i = 1); (($side === 'right') ? $i >= 1 :$i <= min($glasses_count, 4, 5)); (($side === 'right') ? $i-- : $i++)): ?>
        <!-- Height -->
        <div style="border: 2px solid #c3c3c3;width: 58px;height: <?php echo e($glassHeight); ?>px; float:left; position: relative; ">
            <div style="position: absolute;left:-55px;top:50%;margin-top:-50px;width:100px;font-size:40px;transform: rotate(-90deg);background: #fff;border-right: 0;">
                    <?php echo e($height); ?>

            </div>
        </div>

        <!-- Perimetr -->
        <div style="background:rgba(0,0,0,0.1); border: 1px solid #c3c3c3;width: <?php echo e($glassWidth); ?>px;height: <?php echo e($glassHeight); ?>px; float:left;margin-right: <?php echo e($glassMarginRight); ?>px; position: relative;">
            <div style="position: absolute;left:0;top:-58px;width:<?php echo e($glassWidth); ?>px;height: 58px;border: 2px solid #c3c3c3;border-bottom: 0;">
                <div style="position: absolute;top:-35px;background: #fff;left:50%;font-size:40px;margin-left:-60px;width:120px;text-align: center">
                    <?php echo e($perimetr); ?>

                </div>
            </div>

            <!-- top right value -->
            <div style="position: absolute;left:0px;top:0px;width:<?php echo e((($glassWidth + 30)*1.2)*0.89); ?>px;height: 170px;border: 2px solid #c3c3c3;border-left: 0;">
                <div style="position: absolute;font-size:40px;line-height:1;right:-40px;top:62px;transform: rotate(-90deg);background: #fff;">
                    10
                </div>
            </div>

            <!-- middle right value -->
            <div style="position: absolute;left:0px;top:0px;width:<?php echo e((($glassWidth + 60)*1.25)*0.9); ?>px;height: <?php echo e(($glassHeight - 163)*0.96); ?>px;border: 2px solid #c3c3c3;border-left: 0;">
                <div style="position: absolute;right:-50px;top:50%;width:100px;margin-top:-120px;transform: rotate(-90deg);background: #fff;font-size:40px;">
                    1000
                </div>
            </div>

            <!-- top top left s1 -->
            <div style="position: absolute;right: 0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                    S1
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S1
            </div>

            <!-- middle top s2 -->
            <div style="position: absolute;right:0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S2
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S2
            </div>

            <!-- middle top s3 -->
            <div style="position: absolute;right:0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S3
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S3
            </div>

            <!-- left top -->
            <div style="position: absolute;right:0;top:140px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                K1
            </div>
                <!-- right top -->
            <div style="position: absolute;left:0;top:140px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                P2
            </div>

            <!-- Faska -->
        <div style="position:absolute;top:0;right:60px;width:2px;border-left:2px dashed red;height:<?php echo e($glassHeight); ?>px;"></div>

            <div style="color:#000;position:absolute;top:<?php echo e($glassHeight/2-10); ?>px;<?php echo e('left:-'.($glassHeight/2-370)); ?>px;line-height:26px;text-align:center;width:<?php echo e($glassHeight); ?>px;font-size:36px;height:30px;transform: rotate(-90deg);">
                фаска с обратной (тыльной) стороны
            </div> 

            <div style="position:absolute;top:0;left:60px;width:2px;border-left:2px dashed red;height:<?php echo e($glassHeight); ?>px;">
            </div>

            <div style="color:#000;position:absolute;top:<?php echo e($glassHeight/2-10); ?>px;<?php echo e('left:-'.($glassHeight/2-30)); ?>px;line-height:26px;text-align:center;width:<?php echo e($glassHeight); ?>px;font-size:36px;height:30px;transform: rotate(-90deg);">
                фаска с обратной (тыльной) стороны
            </div>

            <!-- right middle bottom -->
            <div style="position: absolute;right:0;top:<?php echo e(($glassHeight - 190)*0.96); ?>px; background: red; color:#fff; font-size:38px; width:85px; height:60px; text-transform: uppercase;text-align: center">
                15
            </div>

            <!-- right middle bottom -->
            <div style="position: absolute; left:0;top:<?php echo e(($glassHeight - 190)*0.96); ?>px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                10
            </div>

            <!-- left bottom -->
            <div style="position: absolute;right:55px;top:<?php echo e($glassHeight-59); ?>px;background: red;color:#fff;font-size:38px;width:70px;height:59px;line-height:45px;text-transform: uppercase;text-align: center;padding-left: 2px">
                11
            </div>
            <div style="position: absolute;right:0px;top:<?php echo e($glassHeight+1); ?>px;border: 2px solid #c3c3c3;width: 85px;height: 40px;text-align: center">
                <div style="position: absolute;top:18px;right:15px;line-height:1;background:#fff;font-size: 38px;width:55px;">
                    10
                </div>
            </div>

            <div style="position: absolute;left:55px;top:<?php echo e($glassHeight-59); ?>px;background: red;color:#fff;font-size:38px;width:70px;height:59px;line-height:45px;text-transform: uppercase;text-align: center">
                12
            </div>
            <div style="position: absolute;left:0px;top:<?php echo e($glassHeight+1); ?>px;border: 2px solid #c3c3c3;width: 85px;height: 40px;text-align: center">
                <div style="position: absolute;top:18px;right:15px;line-height:1;background:#fff;font-size: 38px;width:55px;">
                    13
                </div>
            </div>

            <!-- top -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:100px;top:630px;background: red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                10
            </div>

            <!-- side-bottom -->
            <div style="position: absolute;<?php echo e($sideRight); ?>:150px;top:800px;color:#000;font-size:36px;width:75px;line-height:1;text-align: center">
                9
            </div>
            <!-- side -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:260px;top:795px;background: red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                8
            </div>

            <!-- top-bottom -->
            <div style="transform: rotate(-90deg);position: absolute;<?php echo e($sideLeft); ?>:115px;top:725px;color:#000;font-size:36px;line-height:1;border-radius:30px;text-align: center">
                5
            </div>
            <!-- bottom -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:100px;top:795px;background:red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                6
            </div>

    
            <div style="position: absolute;<?php echo e($sideLeft); ?>:30px;color:#000;top:800px;font-size:36px;line-height:1;border-radius:30px;text-align:center">
                1
            </div>

            <div style="width:150px;transform: rotate(-90deg);color:#000;position: absolute;<?php echo e($sideLeft); ?>:55px;top:895px;font-size:36px;line-height:1;border-radius:30px;text-align:center">
                2
            </div>
            <!-- <div style="position: absolute;<?php echo e($sideRight); ?>:0;top:170px;background: red;color:#fff;font-size:12px;width:30px;height:20px;text-transform: uppercase;text-align: center">
                3
            </div> -->
        </div>
    <?php endfor; ?>
        <?php if($glasses_count < 5): ?>
        <div style="height: 250px; margin-top:1740px; background-color: #e7edf9; width: 100%; font-size: 40px; position: relative;">
            <div>
                <div style="display: inline-block; padding-left: 50px; padding-top: 90px;">
                    Дата проекта:
                </div>
                <div style="display: inline-block; padding-left: 85px; padding-top: 90px;">
                    29.09.2022
                </div>
            </div>
            <div>
                <div style="display: inline-block; padding-left: 50px;">
                    Спроектировал:
                </div>
                <div style="display: inline-block; padding-left: 50px;">
                    Кузнецов Роман Александрович
                </div>
            </div>
            <div style="display: inline-block; height: 210px; width: 210px; background-color: #fff;  position: absolute; right: 20px; top: 20px;">
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <?php if($glasses_count == 5): ?>
        <!-- Height -->
        <div style="clear:both; margin-top:150px;">
            <!-- Height -->
        <div style="border: 2px solid #c3c3c3;width: 58px;height: <?php echo e($glassHeight); ?>px; float:left; position: relative; ">
            <div style="position: absolute;left:-55px;top:50%;margin-top:-50px;width:100px;font-size:40px;transform: rotate(-90deg);background: #fff;border-right: 0;">
                    <?php echo e($height); ?>

            </div>
        </div>

        <!-- Perimetr -->
        <div style="background:rgba(0,0,0,0.1); border: 1px solid #c3c3c3;width: <?php echo e($glassWidth); ?>px;height: <?php echo e($glassHeight); ?>px; float:left;margin-right: <?php echo e($glassMarginRight); ?>px; position: relative;">
            <div style="position: absolute;left:0;top:-58px;width:<?php echo e($glassWidth); ?>px;height: 58px;border: 2px solid #c3c3c3;border-bottom: 0;">
                <div style="position: absolute;top:-35px;background: #fff;left:50%;font-size:40px;margin-left:-60px;width:120px;text-align: center">
                    <?php echo e($perimetr); ?>

                </div>
            </div>

            <!-- top right value -->
            <div style="position: absolute;left:0px;top:0px;width:<?php echo e((($glassWidth + 30)*1.2)*0.89); ?>px;height: 170px;border: 2px solid #c3c3c3;border-left: 0;">
                <div style="position: absolute;font-size:40px;line-height:1;right:-40px;top:62px;transform: rotate(-90deg);background: #fff;">
                    10
                </div>
            </div>

            <!-- middle right value -->
            <div style="position: absolute;left:0px;top:0px;width:<?php echo e((($glassWidth + 60)*1.25)*0.9); ?>px;height: <?php echo e(($glassHeight - 163)*0.96); ?>px;border: 2px solid #c3c3c3;border-left: 0;">
                <div style="position: absolute;right:-50px;top:50%;width:100px;margin-top:-120px;transform: rotate(-90deg);background: #fff;font-size:40px;">
                    1000
                </div>
            </div>

            <!-- top top left s1 -->
            <div style="position: absolute;right: 0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                    S1
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S1
            </div>

            <!-- middle top s2 -->
            <div style="position: absolute;right:0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S2
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S2
            </div>

            <!-- middle top s3 -->
            <div style="position: absolute;right:0;top:0px;width:85px;height:60px;background: red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S3
            </div>
            <div style="position: absolute;left:0;top:0px;width:85px;height:60px;background:red;color:#fff;font-size:38px;text-transform: uppercase;text-align: center">
                S3
            </div>

            <!-- left top -->
            <div style="position: absolute;right:0;top:140px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                K1
            </div>
                <!-- right top -->
            <div style="position: absolute;left:0;top:140px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                P2
            </div>

            <!-- Faska -->
        <div style="position:absolute;top:0;right:60px;width:2px;border-left:2px dashed red;height:<?php echo e($glassHeight); ?>px;"></div>

            <div style="color:#000;position:absolute;top:<?php echo e($glassHeight/2-10); ?>px;<?php echo e('left:-'.($glassHeight/2-370)); ?>px;line-height:26px;text-align:center;width:<?php echo e($glassHeight); ?>px;font-size:36px;height:30px;transform: rotate(-90deg);">
                фаска с обратной (тыльной) стороны
            </div> 

            <div style="position:absolute;top:0;left:60px;width:2px;border-left:2px dashed red;height:<?php echo e($glassHeight); ?>px;">
            </div>

            <div style="color:#000;position:absolute;top:<?php echo e($glassHeight/2-10); ?>px;<?php echo e('left:-'.($glassHeight/2-30)); ?>px;line-height:26px;text-align:center;width:<?php echo e($glassHeight); ?>px;font-size:36px;height:30px;transform: rotate(-90deg);">
                фаска с обратной (тыльной) стороны
            </div>

            <!-- right middle bottom -->
            <div style="position: absolute;right:0;top:<?php echo e(($glassHeight - 190)*0.96); ?>px; background: red; color:#fff; font-size:38px; width:85px; height:60px; text-transform: uppercase;text-align: center">
                15
            </div>

            <!-- right middle bottom -->
            <div style="position: absolute; left:0;top:<?php echo e(($glassHeight - 190)*0.96); ?>px;background: red;color:#fff;font-size:38px;width:85px;height:60px;text-transform: uppercase;text-align: center">
                10
            </div>

            <!-- left bottom -->
            <div style="position: absolute;right:55px;top:<?php echo e($glassHeight-59); ?>px;background: red;color:#fff;font-size:38px;width:70px;height:59px;line-height:45px;text-transform: uppercase;text-align: center;padding-left: 2px">
                11
            </div>
            <div style="position: absolute;right:0px;top:<?php echo e($glassHeight+1); ?>px;border: 2px solid #c3c3c3;width: 85px;height: 40px;text-align: center">
                <div style="position: absolute;top:18px;right:15px;line-height:1;background:#fff;font-size: 38px;width:55px;">
                    10
                </div>
            </div>

            <div style="position: absolute;left:55px;top:<?php echo e($glassHeight-59); ?>px;background: red;color:#fff;font-size:38px;width:70px;height:59px;line-height:45px;text-transform: uppercase;text-align: center">
                12
            </div>
            <div style="position: absolute;left:0px;top:<?php echo e($glassHeight+1); ?>px;border: 2px solid #c3c3c3;width: 85px;height: 40px;text-align: center">
                <div style="position: absolute;top:18px;right:15px;line-height:1;background:#fff;font-size: 38px;width:55px;">
                    13
                </div>
            </div>

            <!-- top -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:100px;top:630px;background: red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                10
            </div>

            <!-- side-bottom -->
            <div style="position: absolute;<?php echo e($sideRight); ?>:150px;top:800px;color:#000;font-size:36px;width:75px;line-height:1;text-align: center">
                9
            </div>
            <!-- side -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:260px;top:795px;background: red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                8
            </div>

            <!-- top-bottom -->
            <div style="transform: rotate(-90deg);position: absolute;<?php echo e($sideLeft); ?>:115px;top:725px;color:#000;font-size:36px;line-height:1;border-radius:30px;text-align: center">
                5
            </div>
            <!-- bottom -->
            <div style="position: absolute;<?php echo e($sideLeft); ?>:100px;top:795px;background:red;color:#fff;font-size:36px;width:60px;height:60px;line-height:40px;border-radius:30px;text-align:center">
                6
            </div>

    
            <div style="position: absolute;<?php echo e($sideLeft); ?>:30px;color:#000;top:800px;font-size:36px;line-height:1;border-radius:30px;text-align:center">
                1
            </div>

            <div style="width:150px;transform: rotate(-90deg);color:#000;position: absolute;<?php echo e($sideLeft); ?>:55px;top:895px;font-size:36px;line-height:1;border-radius:30px;text-align:center">
                2
            </div>
            <!-- <div style="position: absolute;<?php echo e($sideRight); ?>:0;top:170px;background: red;color:#fff;font-size:12px;width:30px;height:20px;text-transform: uppercase;text-align: center">
                3
            </div> -->
        </div>
        </div>
    <?php endif; ?>

    <?php if($glasses_count == 5): ?>
        <div style="height: 310px; margin-top:1600px; background-color: #e7edf9; width: 100%; font-size: 40px; position: relative;">
            <div style="display: inline-block; padding-left: 50px; padding-top: 90px;">
                Дата проекта стекла:
            </div>
            <div style="display: inline-block; padding-left: 50px; padding-top: 90px;">
                29.09.2022
            </div>
            <div style="display: inline-block; padding-left: 50px; padding-top: 90px;">
                Кузнецов Роман Александрович
            </div>
            <div style="display: inline-block; height: 250px; width: 250px; background-color: #fff;  position: absolute; right: 30px; top: 30px;">
            </div>
        </div>
    <?php endif; ?>
</body>
</html><?php /**PATH /var/www/calc/back/resources/views/configuration_pdf.blade.php ENDPATH**/ ?><?php /**PATH /var/www/calc/back/resources/views/configuration_pdf.blade.php ENDPATH**/ ?>