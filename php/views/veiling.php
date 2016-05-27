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
                <div class="item active">
                    <img  src="<?php echo get_url(); ?>images/Omafiets1.png" alt="omafiets" class="img-responsive">
                </div>
                <div class="item">
                    <img  src="<?php echo get_url(); ?>images/logo.png" alt="omafiets" class="img-responsive">
                </div>
                <div class="item">
                    <img  src="<?php echo get_url(); ?>images/Omafiets3.jpg" alt="omafiets" class="img-responsive">
                </div>
                <div class="item">
                    <img  src="<?php echo get_url(); ?>images/fiets.jpg" alt="Mooiefiets" class="img-responsive">
                </div>
            </div>

            <a class ="carousel-control left" href = "#theCarousel" data-slide = "prev">
                <span class="icon-prev"></span>
            </a>
            <a class ="carousel-control right" href = "#theCarousel" data-slide = "next">
                <span class="icon-next"></span>
            </a>
        </div>

        <div style="padding-top:10px;">
            <img  src="<?php echo get_url(); ?>images/fiets.jpg" alt="Mooiefiets" width="100" heigth="100" class="img-thumbnail">
            <img  src="<?php echo get_url(); ?>images/fiets.jpg" alt="Mooiefiets" width="100" heigth="100" class="img-thumbnail">
            <img  src="<?php echo get_url(); ?>images/fiets.jpg" alt="Mooiefiets" width="100" heigth="100" class="img-thumbnail">
            <img  src="<?php echo get_url(); ?>images/fiets.jpg" alt="Mooiefiets" width="100" heigth="100" class="img-thumbnail">
            
            <h4 class="text-primary"> Beschrijving </h4>
            <div class="well">
                <p><?php echo strip_tags(get_data_view('veiling', 'beschrijving'), '<br>'); ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="well">
            <p class="clear"> <span style="font-weight:bold;">Verkoper</span><span style="float:right;"><?php echo 'Pietje Puk'; ?></span>
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
            <p class="clear"> <span style="font-weight:bold;">Begin veiling</span><span style="float:right;"><?php echo get_data_view('veiling', 'looptijdBeginDag')->format('m-d-Y'); ?> <?php echo get_data_view('veiling', 'looptijdBeginTijd')->format('h:i:s'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Eind veiling</span><span style="float:right;"><?php echo get_data_view('veiling', 'looptijdEindDag')->format('m-d-Y'); ?> <?php echo get_data_view('veiling', 'looptijdEindTijd')->format('h:i:s'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bod</span><span style="float:right;">&euro; <?php echo_data_view('veiling', 'verkoopPrijs'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bieder</span><span style="float:right;"><?php echo_data_view('veiling', 'koper'); ?></span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Start bod</span><span style="float:right;">&euro; <?php echo_data_view('veiling', 'startprijs'); ?></span>
            </p>
            <p class="clear"><span style="font-weight:bold;">Jouw bod</span> 
                <form method="POST">
                    <div class="input-group">
                        <input type="text" name="bod" class="form-control" placeholder="Bod">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="Bied">
                        </span>
                    </div>
                </form>
            </p>
        </div>

        <h4> Uw e-mailadres voor extra informatie </h4>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="email" class="form-control" placeholder="Emailadres">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" value="Opvragen">
                </span>
            </div>
        </form>
            
    </div>
</div>

<?php echo display_view('template_footer'); ?>