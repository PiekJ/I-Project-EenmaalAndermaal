<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?php echo get_url(true); ?>veilingen" method="get">
            <div class="input-group input-group-lg search-group">
                <input type="text" name="search" class="form-control search-form-control" placeholder="Zoeken...">
                <?php echo get_data_view('rubrieken'); ?>
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
    
    <div class="col-md-12">
        <div>
            <?php 
                $i = 0;
                foreach (get_data_view('aanbevolen_veilingen') as $veiling) { 
                    if ($i++ % 4 == 0)
                    {
                        echo '<div class="row">';
                    }
                        ?>
                        <div class="col-md-3" onclick="location.href='<?php echo get_url(true) . 'veiling/' . $veiling['voorwerpnummer']; ?>';">
                            <div class="veiling-card">
                                <div class="veiling-card-img">
                                    <img src="<?php echo (!empty($veiling['filenaam'])) ? get_url() . 'pics/' . $veiling['filenaam'] : '//placehold.it/300x300'; ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>">
                                </div>

                                <div class="veiling-card-content">
                                    <div class="clear">
                                        <h4 class="veiling-card-title"><?php echo htmlspecialchars($veiling['titel']); ?></h4>

                                        <p class="veiling-card-time countdown" data-countdown="<?php echo count_down_veiling($veiling); ?>"></p>
                                    </div>

                                    <div class="clear">
                                        <p class="veiling-card-price">&euro; <?php echo (!empty($veiling['verkoopPrijs'])) ? $veiling['verkoopPrijs'] : $veiling['startprijs']; ?></p>

                                        <a href="<?php echo $veiling_url; ?>" class="btn btn-primary veiling-card-button">Bieden</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Aflopende veilingen</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
            <?php 
                $i = 0;
                foreach (get_data_view('aflopende_veilingen') as $veiling) { 
                    if ($i++ % 4 == 0)
                    {
                        echo '<div class="row">';
                    }
                        ?>
                        <div class="col-md-3" onclick="location.href='<?php echo get_url(true) . 'veiling/' . $veiling['voorwerpnummer']; ?>';">
                            <div class="veiling-card">
                                <div class="veiling-card-img">
                                    <img src="<?php echo (!empty($veiling['filenaam'])) ? get_url() . 'pics/' . $veiling['filenaam'] : '//placehold.it/300x300'; ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>" alt="<?php echo htmlspecialchars($veiling['titel']); ?>">
                                </div>

                                <div class="veiling-card-content">
                                    <div class="clear">
                                        <h4 class="veiling-card-title"><?php echo htmlspecialchars($veiling['titel']); ?></h4>

                                        <p class="veiling-card-time countdown" data-countdown="<?php echo count_down_veiling($veiling); ?>"></p>
                                    </div>

                                    <div class="clear">
                                        <p class="veiling-card-price">&euro; <?php echo (!empty($veiling['verkoopPrijs'])) ? $veiling['verkoopPrijs'] : $veiling['startprijs']; ?></p>

                                        <a href="<?php echo $veiling_url; ?>" class="btn btn-primary veiling-card-button">Bieden</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
        </div>
</div>

<?php echo display_view('template_footer'); ?>