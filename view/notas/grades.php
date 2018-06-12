<section class="blog-page">
    <div class="container">
        <a href="index.php?controller=Semesters&action=sem">
            <h3 class="tit-mat"><?php echo($seme)?></h3>
        </a>
        <a href="index.php?controller=Matters&action=mat&seme=<?php echo $seme;?>">
            <h1 class="tit-mat"><?php echo($mat)?></h1>
        </a>
             <!-- Widgets -->
         <?php $i = 1;
                $contadorDivi = 1;
                $contadorJS = 1; 
                $vet = array();
                $color = array();
                $color[1] = "#E91E63";
                $color[2] = "#00BCD4";
                $color[3] = "#8BC34A";
                $color[4] = "#FF9800";
                $color[5] = "#AB47BC";?>
<?php if ($grades == 'No grade')
{?>
    <div class="text"><?php echo $grades;?></div>
<?php 
} else{?>                
        <?php foreach ($grades as $grade => $value) :?>
            <?php foreach ($value as $va => $n) :?>
                <?php 
                    if($contadorDivi%2 == 0){?>
                         <div id="chart_div<?php echo $contadorDivi;?>" style="width: 320px;"></div>
                    <?php } 
                ?>
            <?php $contadorDivi++;
            endforeach; ?>
            <?php 
            if($i==5) 
                      {
                        $i=0;
                      }
                      $i++; 
        endforeach;} ?>
        
    </div><!-- /.container -->
</section>
<script>
    function drawNotas() {
        <?php $i = 1;
              $j = $i +1;?>

        <?php foreach ($grades as $grade => $value) :?>
            <?php foreach ($value as $va => $n) :?>

                <?php if($contadorJS%2 == 0){?>

                    var data<?php echo $contadorJS;?> = new google.visualization.DataTable();
                    data<?php echo $contadorJS;?>.addColumn('string', 'Notas');
                    data<?php echo $contadorJS;?>.addColumn('number', 'Nota Individual');
                    data<?php echo $contadorJS;?>.addColumn('number', 'Média da Turma');

                    data<?php echo $contadorJS;?>.addRows([
                        ['<?php echo substr($grade, 0, 3);?>', <?php echo $vet['nota'];?>,<?php echo $n;?>]
                    ]);

                    var options = {
                        colors: ['<?php echo $color[$i];?>', '<?php echo $color[$j];?>'],

                    };
                    var notadiv<?php echo $contadorJS;?> = new google.charts.Bar(document.getElementById('chart_div<?php echo $contadorJS;?>'));
                    notadiv<?php echo $contadorJS;?>.draw(data<?php echo $contadorJS;?>, options);

                    <?php  
                       if($j == 5)
                       {
                        $i=0;
                        $j=$i+1;
                       }

                    $i++;
                    $j++;?>

                <?php }
                else{

                    $vet = array();
                    $vet['nota'] = $n;
                    }?>
                
            <?php $contadorJS++;
            endforeach; ?>
        <?php endforeach; ?> 
        
        
    }
    </script>
    <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawNotas);
</script>
