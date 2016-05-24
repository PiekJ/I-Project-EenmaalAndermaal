<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-cs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="veiling-rubrieken">
            <?php echo get_data_view('rubrieken'); ?>
        </div>
    </div>

    <?php foreach (get_data_view('veilingen') as $veiling) { ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="veiling-card">
            <div class="veiling-card-img">
                <img src="<?php echo (!empty($veiling['filenaam'])) ? get_url() . 'pics/' . $veiling['filenaam'] : '//placehold.it/300x300'; ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>">
            </div>

            <div class="veiling-card-content">
                <div class="clear">
                    <h4 class="veiling-card-title"><?php echo htmlspecialchars($veiling['titel']); ?></h4>

                    <p class="veiling-card-time"><?php echo '00:00:00'; ?></p>
                </div>

                <div class="clear">
                    <p class="veiling-card-price">&euro; <?php echo (!empty($veiling['verkoopPrijs'])) ? $veiling['verkoopPrijs'] : $veiling['startprijs']; ?></p>

                    <a href="#" class="btn btn-primary veiling-card-button">Bieden</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php echo display_view('template_footer'); ?>