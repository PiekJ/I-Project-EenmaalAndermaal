<select name="rubriek" class="form-control rubriek-form-control">
    <option value="0">Alle rubrieken</option>
    
    <?php
        function generateHomeRubriekenTreeList(&$rubrieken, $hoofdrubriek, $depth = 0)
        {
            $filterRubrieken = array_filter($rubrieken, function($rubriek) use ($hoofdrubriek){
                return $rubriek['hoofdrubriek'] == $hoofdrubriek;
            });

            usort($filterRubrieken, function($a, $b) {
                return $a['volgnr'] - $b['volgnr'];
            });

            $offset = str_repeat('&nbsp;', $depth);

            foreach ($filterRubrieken as $rubriek)
            {
                $rubrieknaam = $offset . $rubriek['rubrieknaam'];

                if ($rubriek['heeftSubrubriek'])
                {
                    printf('<option value="%d" disabled>%s</option>', $rubriek['rubrieknummer'], $rubrieknaam);

                    generateHomeRubriekenTreeList($rubrieken, $rubriek['rubrieknummer'], $depth + 1);
                }
                else
                {
                    printf('<option value="%d">%s</option>', $rubriek['rubrieknummer'], $rubrieknaam);
                }
            }
        }

        $rubrieken = get_data_view('rubrieken');
        generateHomeRubriekenTreeList($rubrieken, -1);
    ?>
</select>