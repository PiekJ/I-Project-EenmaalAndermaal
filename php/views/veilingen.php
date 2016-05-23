<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-cs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="veiling-rubrieken">
            <ul>
            <?php
                $previousDepthLevel = 0;
                foreach (get_data_view('rubrieken') as $rubriek) {
                
                    $rubrieknaam = str_replace('  ', '', $rubriek['rubrieknaam']);

                    if ($previousDepthLevel > $rubriek['depth_level'])
                    {
                        echo '</ul></li>';
                    }

                    if ($rubriek['heeftSubrubriek'] == 1)
                    {
                        printf('<li><span>%s</span><ul>', $rubrieknaam);
                    }
                    else
                    {
                        printf('<li><a href="%sveilingen/%s">%s</a></li>', get_url(true), $rubrieknaam, $rubrieknaam);
                    }
                
                    $previousDepthLevel = $rubriek['depth_level'];
                } 
            ?>
            </ul>
        </div>
    </div>

    <?php for ($i = 0; $i < 24; $i++) { ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="veiling-card">
            <div class="veiling-card-img">
                <img src="//placehold.it/300x300" alt="image">
            </div>

            <div class="veiling-card-content">
                <div class="clear">
                    <h4 class="veiling-card-title">Veiling item #1</h4>

                    <p class="veiling-card-time">00:00:20</p>
                </div>

                <div class="clear">
                    <p class="veiling-card-price">&euro; 0,00</p>

                    <a href="#" class="btn btn-primary veiling-card-button">Bieden</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php echo display_view('template_footer'); ?>