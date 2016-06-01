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
                <h4>Gekozen rubriek</h4>
                <form method="post" class="col-md-3" action="">
                    <p><?=((isset($_GET['rubriek']) ? get_rubriek_by_id($_GET['rubriek']) : "Kies een rubriek."))?></p>
                    <button type="submit" class="btn btn-primary">Verder</button> 
                </form>
        </div>

<?php echo display_view('template_footer'); ?>