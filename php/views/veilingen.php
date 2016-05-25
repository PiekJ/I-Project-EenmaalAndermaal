<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-cs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="veiling-rubrieken">
            <ul>
                <li><span>Fietsen</span>
                    <ul>
                        <li><a href="#">Elektrische fietsen</a></li>
                        <li><a href="#">Kinderfietsen</a></li>
                        <li><a href="#">Mountainbikes</a></li>
                        <li><a href="#">Racefietsen</a></li>
                        <li><a href="#">Stadsfietsen</a></li>
                        <li><a href="#">Bakfietsen</a></li>
                        <li><a href="#">Omafietsen</a></li>
                    </ul>
                </li>
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