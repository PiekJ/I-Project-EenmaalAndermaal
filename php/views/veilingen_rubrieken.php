<ul>
    <?php
        function generateRubriekenTreeList(&$rubrieken, $hoofdrubriek)
        {
            $filterRubrieken = array_filter($rubrieken, function($rubriek) use ($hoofdrubriek){
                return $rubriek['hoofdrubriek'] == $hoofdrubriek;
            });

            usort($filterRubrieken, function($a, $b) {
                return $a['volgnr'] - $b['volgnr'];
            });

            foreach ($filterRubrieken as $rubriek)
            {
                $rubrieknaam = str_replace('  ', '', $rubriek['rubrieknaam']);

                if ($rubriek['heeftSubrubriek'])
                {
                    $id = 'rubriek-collapse-' . $rubriek['rubrieknummer'];

                    printf('<li><a href="#%s" data-toggle="collapse">%s</a><ul class="collapse" id="%s">', $id, $rubrieknaam, $id);

                    generateRubriekenTreeList($rubrieken, $rubriek['rubrieknummer']);

                    echo '</ul></li>';
                }
                else
                {
                    printf('<li><a href="%sveilingen/%s">%s</a></li>', get_url(true), urlencode($rubrieknaam), $rubrieknaam);
                }
            }
        }

        $rubrieken = get_data_view('rubrieken');
        generateRubriekenTreeList($rubrieken, -1);
    ?>
</ul>