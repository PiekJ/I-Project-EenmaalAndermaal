<?php echo display_view('template_header'); ?>

<div class="row">
            <div class="col-md-3">
                <h3>Groep</h3>
                                                               
               <?php 
               generateRubriekenSidewayList(get_rubrieken(), -1);
                ?>    
                    
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Gekozen rubriek</h4>
                        <p>
                            <?php
                                if(isset($_GET['rubriek']) && rubriek_valid($_GET['rubriek'])){
                                    $reeks = get_rubriek_reeks($_GET['rubriek'], -1);
                                    $i = 0;
                                    $length = count($reeks);
                                    foreach(array_reverse($reeks) as $rubriek){
                                        if ($i != $length - 1) {
                                            echo $rubriek['rubrieknaam'] . " > ";   
                                        }
                                        else{
                                            echo "<strong>" . $rubriek['rubrieknaam'] . "</strong>";
                                        }
                                        $i++;
                                    }  
                                }
                                else{
                                    echo "Kies een rubriek.";
                                } 
                            ?>
                        </p>
                        <form method="post" action="<?php echo get_url(true); ?>veiling/create/formulier">
                            <button type="submit" class="btn btn-primary">Verder</button>
                            <input type="hidden" value="<?=(isset($_GET['rubriek']) ? $_GET['rubriek'] : "")?>" name="rubrieknummer">
                        </form>
        </div>
</div>

<?php echo display_view('template_footer'); ?>