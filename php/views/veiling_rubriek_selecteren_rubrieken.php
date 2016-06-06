<ul class="list-group" id="rubriek-collapse--1">
    <?php
        function generateRubriekenSidewayList($rubrieken, $hoofdrubriek)
        {
            $filterRubrieken = array_filter($rubrieken, function($rubriek) use ($hoofdrubriek){
                return $rubriek['hoofdrubriek'] == $hoofdrubriek;
            });

            usort($filterRubrieken, function($a, $b) {
                return $a['volgnr'] - $b['volgnr'];
            });

            foreach ($filterRubrieken as $rubriek)
            {
                if ($rubriek['heeftSubrubriek'])
                {
                    $parent = 'rubriek-collapse-' . $hoofdrubriek;
                    $id = 'rubriek-collapse-' . $rubriek['rubrieknummer'];

                    printf('<li class="list-group-item"><div style="btn-group"><a href="#%s" data-toggle="collapse" data-parent="#%s" aria-controls="%s" class="dropdown-toggle">%s</a></div><ul class="list-group collapse dropdown-menu dropdown-menu-right" id="%s">', $id, $parent, $id, $rubriek['rubrieknaam'], $id);

                    generateRubriekenSidewayList($rubrieken, $rubriek['rubrieknummer']);
                    
                    echo '</ul></li>';
                }
                
                else{
                    $id = $rubriek['rubrieknummer'];
                    
                    printf('<li class="list-group-item"><div style="btn-group"><a href="' . get_url(true) . 'veiling/create?rubriek=%s">%s</a></div></li>', $id, $rubriek['rubrieknaam']); 
                }
                
                
            }
        }

        $rubrieken = get_data_view('rubrieken');
        generateRubriekenSidewayList($rubrieken, -1);
    ?>
</ul>