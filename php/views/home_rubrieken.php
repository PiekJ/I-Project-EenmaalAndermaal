<select name="rubriek" class="form-control rubriek-form-control">
    <option value="0">Alle rubrieken</option>
<?php foreach (get_data_view('rubrieken') as $rubriek) {
    printf('<option value="%d">%s</option>', $rubriek['rubrieknummer'], str_replace('  ', '&nbsp;&nbsp;', $rubriek['rubrieknaam']));
} ?>
</select>