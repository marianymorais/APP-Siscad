<section class="blog-page">
    <div class="container">
        <h1 class="tit-mat"> inicio</h1>
         <!-- Widgets -->
         <?php $i = 1; ?>
        <?php foreach ($semesters as $semestr) :?>
            <a href="index.php?controller=Matters&action=mat&seme=<?php echo $semestr->getName(); ?>">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-<?php echo $i;?> hover-expand-effect">
                    
                        <div class="content">
                            <div class="text"><?php echo $semestr->getName();?></div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
                if($i==5) 
                {
                    $i=0;
                }
                $i++;

            ?>
        <?php endforeach; ?>
        <!-- #END# Widgets -->
    </div><!-- /.container -->
</section>