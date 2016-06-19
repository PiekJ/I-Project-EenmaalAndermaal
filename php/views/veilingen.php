<?php echo display_view('template_header'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="veiling-rubrieken">
            <?php echo get_data_view('rubrieken'); ?>
        </div>
    </div>

    <div class="col-md-9">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <ul class="pager top-pager">
                            <li class="previous <?php echo (get_data_view('pagination_current') == 0) ? 'disabled' : ''; ?>"><a href="<?php echo get_data_view('pagination_url') . (get_data_view('pagination_current') - 1); ?>"><span aria-hidden="true">&larr;</span> Nieuwer</a></li>
                            <li class="next <?php echo (count(get_data_view('veilingen')) < get_data_view('pagination_max')) ? 'disabled' : ''; ?>"><a href="<?php echo get_data_view('pagination_url') . (get_data_view('pagination_current') + 1); ?>">Ouder <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php 
                $veilingen = get_data_view('veilingen');
                if (!empty($veilingen))
                {

                    $i = 0;
                    foreach ($veilingen as $veiling) { 
                        if ($i++ % 3 == 0)
                        {
                            echo '<div class="row">';
                        }

                        $veiling_url = get_url(true) . 'veiling/' . $veiling['voorwerpnummer'];
                            ?>
                            <div class="col-md-4" onclick="location.href='<?php echo $veiling_url; ?>';">
                                <div class="veiling-card">
                                    <div class="veiling-card-img">
                                        <img src="<?php echo (!empty($veiling['filenaam'])) ? get_url() . $veiling['filenaam'] : '//placehold.it/300x300'; ?>" alt="<?php echo htmlspecialchars($veiling['titel'], ENT_HTML5, 'ISO-8859-15'); ?>">
                                    </div>

                                    <div class="veiling-card-content">
                                        <div class="clear">
                                            <h4 class="veiling-card-title"><?php echo htmlspecialchars($veiling['titel'], ENT_HTML5, 'ISO-8859-15');; ?></h4>

                                            <p class="veiling-card-time countdown" data-countdown="<?php echo count_down_veiling($veiling); ?>"></p>
                                        </div>

                                        <div class="clear">
                                            <p class="veiling-card-price">&euro; <?php echo (!empty($veiling['verkoopPrijs'])) ? $veiling['verkoopPrijs'] : $veiling['startprijs']; ?></p>

                                            <a href="<?php echo $veiling_url; ?>" class="btn btn-primary veiling-card-button">Bieden</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        if ($i % 3 == 0)
                        {
                            echo '</div>';
                        }
                    }
                    if ($i % 3 != 0)
                    {
                        echo '</div>';
                    }
                }
                else
                {
                    echo '<p>Er zijn geen veilingen gevonden.</p>';
                }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <ul class="pager bottom-pager">
                            <li class="previous <?php echo (get_data_view('pagination_current') == 0) ? 'disabled' : ''; ?>"><a href="<?php echo get_data_view('pagination_url') . (get_data_view('pagination_current') - 1); ?>"><span aria-hidden="true">&larr;</span> Nieuwer</a></li>
                            <li class="next <?php echo (count(get_data_view('veilingen')) < get_data_view('pagination_max')) ? 'disabled' : ''; ?>"><a href="<?php echo get_data_view('pagination_url') . (get_data_view('pagination_current') + 1); ?>">Ouder <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo get_data_view('pagination'); ?>
    </div>
</div>

<?php echo display_view('template_footer'); ?>