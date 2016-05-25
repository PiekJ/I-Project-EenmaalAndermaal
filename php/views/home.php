<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?php echo get_url(true); ?>veilingen" method="get">
            <div class="input-group input-group-lg search-group">
                <input type="text" name="search" class="form-control search-form-control" placeholder="Zoeken...">
                <select name="rubriek" class="form-control rubriek-form-control">
                    <option value="0" selected>Alle rubrieken</option>
                </select>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" value="Zoeken">
                </span>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Aanbevolen veilingen</h3>
    </div>
</div>

<div class="row">
    <?php for ($i = 0; $i < 4; $i++) { ?>
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

<div class="row">
    <div class="col-md-12">
        <h3>Aflopende veilingen</h3>
    </div>
</div>

<div class="row">
    <?php for ($i = 0; $i < 4; $i++) { ?>
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