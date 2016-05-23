<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-md-12">
        <h3 class="text-primary">Veiling <span style="float:right;">Resterende tijd 00:00:00</span></h3>
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
                <p>
                                Een fiets is een voertuig dat door spierkracht wordt aangedreven. De snelheid kan variëren aangezien de gebruiker zelf kan bepalen hoeveel energie hij/zij in het aandrijven steekt. De hedendaagse fiets bestaat uit ten minste twee wielen, een frame, een zadel, een stuur en een trapas met pedalen. Sommige fietsen hebben een (hulp)motor. Fietsen met een elektrische motor als aandrijving worden ook wel "e-bikes" genoemd. Tot 1966 was de wettelijke term in Nederland rijwiel. In Vlaanderen wordt ook het Franse vélo gebruikt.
                                Het grootste deel van de fietsen heeft een kettingaandrijving, hoewel een asaandrijving of riemaandrijving ook mogelijk zijn.
                                Van de fiets zijn andere vervoermiddelen afgeleid, zoals de vooral in Azië populaire riksja en becak, en enkele gemotoriseerde varianten die als uitvindingen een "eigen" leven zijn gaan leiden: de bromfiets, snorfiets, scooter en motorfiets.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="well">
            <p class="clear"> <span style="font-weight:bold;">Verkoper</span><span style="float:right;">Peter Petersen</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Plaatsnaam</span><span style="float:right;">Lienden</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Land</span><span style="float:right;">Nederland</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Verzendmethode</span><span style="float:right;">Pakketpost</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Verzendkosten</span><span style="float:right;">&euro;14,00</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Betalingswijze</span><span style="float:right;">Paypal</span>
            </p>
        </div>

        <div class="well">
            <p class="clear"> <span style="font-weight:bold;">Begin veiling</span><span style="float:right;">28-04-2016 14:00</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Eind veiling</span><span style="float:right;">28-04-2016 16:00</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bod</span><span style="float:right;">&euro;9,99</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Hoogste bieder</span><span style="float:right;">Jan Jansen</span>
            </p>
            <p class="clear"> <span style="font-weight:bold;">Start bod</span><span style="float:right;">&euro;1,00</span>
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