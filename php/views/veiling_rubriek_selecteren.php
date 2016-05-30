<?php echo display_view('template_header'); ?>

<div class="container">
            <div class="col-md-12">
                <h3>Groep</h3>
                <div >
                                                               
               <?php $setrubrieken=get_rubrieken('rubrieken');
               generateRubriekenTreeList($setrubrieken, -1);
                ?>    
                    

                </div>
            </div>
        </div>
        <div class="container">
            <div>
                <h4>Gekozen rubriek</h4>
                <p><?php echo $rubrieknamen ?></p>
                <p>
                    <a href="#" class="btn btn-warning btn-md" role="button">Verder </a>  
                </p>
            </div>

        </div>

<?php echo display_view('template_footer'); ?>