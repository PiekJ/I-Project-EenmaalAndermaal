<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-md-12">
        <h3 class="text-primary"><?php echo_data_view('veiling', 'titel'); ?> <span style="float:right;" class="countdown" data-countdown="<?php echo count_down_veiling(get_data_view('veiling')); ?>"></span></h3>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div id="theCarousel" class="carousel clear">
            <div class="carousel-inner">
                <?php 
                    $active = true;
                    foreach (get_data_view('bestanden') as $bestand) {
                        printf('<div class="item %s"><img  src="%s%s" alt="%s" class="img-responsive"></div>', ($active) ? 'active' : '', get_url(), $bestand['filenaam'], null);
                        $active = false;
                    }
                ?>
            </div>

            <a class ="carousel-control left" href = "#theCarousel" data-slide = "prev">
                <span class="icon-prev"></span>
            </a>
            <a class ="carousel-control right" href = "#theCarousel" data-slide = "next">
                <span class="icon-next"></span>
            </a>
        </div>

        <div style="padding-top:10px;">
            <?php 
                foreach (get_data_view('bestanden') as $bestand) {
                    printf('<img src="%s%s" alt="%s" style="width: 100px; height: 100px" class="img-thumbnail">', get_url(), $bestand['filenaam'], null);
                }
            ?>
            
            <h4 class="text-primary"> Beschrijving </h4>
            <div class="well" style="word-wrap: break-word;">
                <?php echo strip_tags(preg_replace(['/<style\\b[^>]*>(.*?)<\\/style>/s', '/<script\\b[^>]*>(.*?)<\\/script>/s'], '', get_data_view('veiling', 'beschrijving')), '<br><b><strong><i><u><small><p>'); ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="well">
            <p class="clear"> <span style="font-weight:bold;">Verkoper</span><span style="float:right;"><?php echo_data_view('veiling', 'verkoper'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Plaatsnaam</span><span style="float:right;"><?php echo_data_view('veiling', 'plaatsnaam'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Land</span><span style="float:right;"><?php echo_data_view('veiling', 'landnaam'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Verzendmethode</span><span style="float:right;"><?php echo_data_view('veiling', 'verzendinstructies'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Verzendkosten</span><span style="float:right;">&euro; <?php echo_data_view('veiling', 'verzendkosten'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Betalingswijze</span><span style="float:right;"><?php echo_data_view('veiling', 'betalingswijze'); ?></span>
            </p>
        </div>

        <div class="well">
            <p class="clear"> <span style="font-weight:bold;">Begin veiling</span><span style="float:right;"><?php echo get_data_view('veiling', 'looptijdBeginDag')->format('m-d-Y'); ?> <?php echo get_data_view('veiling', 'looptijdBeginTijd')->format('H:i:s'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Eind veiling</span><span style="float:right;"><?php echo get_data_view('veiling', 'looptijdEindDag')->format('m-d-Y'); ?> <?php echo get_data_view('veiling', 'looptijdEindTijd')->format('h:i:s'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Start bod</span><span style="float:right;">&euro; <?php echo_data_view('veiling', 'startprijs'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bieder</span><span style="float:right;"><?php echo_data_view('veiling', 'koper'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bod</span><span style="float:right;">&euro; <?php echo_data_view('veiling', 'verkoopPrijs'); ?></span>
            </p>
            <p class="clear"><span style="font-weight:bold;">Jouw bod</span> 
                <?php if (get_data_view('veiling', 'veilingGesloten') == 0) { ?>
                <?php if (is_user_logged_in()) { ?>
                <?php if (get_data_view('bod_error') !== null) { 
                    if (get_data_view('bod_error')) { ?>
                    <div class="alert alert-success">Bod toegevoegd</div>
                <?php } else { ?>
                    <div class="alert alert-danger">Uw bod is niet toegevoegd!</div>
                <?php } } ?>
                <form method="post">
                    <div class="input-group">
                        <input type="text" name="bod" class="form-control" placeholder="Bod" value="<?php echo get_data_view('veiling', 'minimalBod'); ?>">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="Bied">
                        </span>
                    </div>
                </form>
                <?php } else { ?>
                    <span style="float:right;">Log in om te kunnen bieden</span>
                <?php } } else { ?>
                    <span style="float:right;">Deze veiling is gesloten</span>
                <?php } ?>
            </p>
        </div>
            
    </div>
</div>

<?php echo display_view('template_footer'); ?>