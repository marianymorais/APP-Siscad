<section class="blog-page">
    <div class="container">
        <a href="index.php?controller=Semesters&action=sem">
            <h1 class="tit-mat"><?php echo($seme)?></h1>
        </a>
             <!-- Widgets -->
         <?php $i = 1; ?>
        <?php foreach ($matters as $matter) :?>
            <a href="index.php?controller=Grades&action=grad&seme=<?php echo $seme?>&mat=<?php echo($matter->getName());?>">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-<?php echo $i;?> hover-expand-effect">
                    
                        <div class="content">
                            <div class="text"><?php echo $matter->getName();?></div>
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