<?php echo display_view('template_header'); ?>

    <?php
    
        if(get_data_view('errors') !== null){
            foreach(get_data_view('errors') as $error){
                echo '<div class="alert alert-danger">' .
                $error .
                '</div>';
            }
        }
    
    ?>

            <div class="col-md-12">
                <h3 > 1. Gekozen rubriek</h3>
                <div class="col-md-12">

                    <p>                            <?php
                                if(isset($_POST['rubrieknummer']) && rubriek_valid($_POST['rubrieknummer'])){
                                    $reeks = get_rubriek_reeks($_POST['rubrieknummer'], -1);
                                    $i = 0;
                                    $length = count($reeks);
                                    foreach(array_reverse($reeks) as $rubriek){
                                        if ($i != $length - 1) {
                                            echo $rubriek['rubrieknaam'] . " > ";   
                                        }
                                        else{
                                            echo "<strong>" . $rubriek['rubrieknaam'] . "</strong>";
                                        }
                                        $i++;
                                    }  
                                }
                                else{
                                    echo "Geen rubriek gekozen.";
                                } 
                            ?></p>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">

                <div class="input-group">
                    <input type="hidden" class="form-control" value="<?php echo $_POST['rubrieknummer'] ?>" name="rubrieknummer">
                </div>
                
                <div class="col-md-12">
                    <h3> 2. Titel en beschrijving</h3>
                    
                    <div class="col-md-6">
                        <p> Titel* </p>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Titel" name="titel" value="<?=get_data_view('gegevens','titel')?>" required>
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <p> Land* </p>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Land" name ="land" value="<?=get_data_view('gegevens','land')?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p> Beschrijving* </p>
                        <textarea class="form-control" rows="3" name ="beschrijving" value="<?=get_data_view('gegevens','beschrijving')?>" required></textarea>
                    </div>
                    
                    <div class="col-md-6">
                        <p> plaatsnaam </p>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Plaatsnam" name="plaatsnaam" value="<?=get_data_view('gegevens','plaatsnaam')?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3 > 3. Foto(s)</h3>
                        <label class="file">
                            <input type="file" class="multi with-preview" maxlength="4" accept="png|jpg|jpeg|gif" data-maxfile="1024" name="filenaam[]"/>
                            <span class="file-custom"></span>
                        </label>
                    </div>
                    <div class="col-md-12">

                    <h3> 4. Startprijs, betaling en verzending</h3>
                        <div class="col-md-3">
                            <p> Startprijs* </p>
                            <div class="input-group">
                                <input type="number" min="1" step="0.01" class="form-control" placeholder="startprijs" name="startprijs" value="<?=get_data_view('gegevens','startprijs')?>"required>
                            </div>
                            <p> betalingswijze* </p>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="betalingswijze" name="betalingswijze" value="<?=get_data_view('gegevens','betalingswijze')?>" required>
                                </div>
                        </div>

                        <div class="col-md-3">
                            <p> Betalingsinstructie </p>
                            <textarea class="form-control" rows="4" name="betalingsinstructie" value="<?=get_data_view('gegevens','betalingsinstructie')?>" ></textarea>
                        </div>

                        <div class="col-md-3">
                            <p> Verzendkosten* </p>
                            <div class="input-group">
                                <input type="number" min ="1" step="0.01" class="form-control" placeholder="In euro's" name="verzendkosten" value="<?=get_data_view('gegevens','verzendkosten')?>" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p> verzendinstructies </p>
                            <textarea class="form-control" rows="4" name="verzendinstructies" value="<?=get_data_view('gegevens','verzendinstructies')?>" ></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h3> 5. Looptijd</h3>

                        <div class="col-md-6">
                            <p> Veiling start dag* </p>
                            <div class="input-group">
                                <input type="date" class="form-control"  name="startdatum" value="<?=get_data_view('gegevens','startdatum')?>" required>
                            </div>
                            <p>Veiling Start tijd* </p>
                            <div class="input-group">
                                <input type="time" class="form-control"  name="starttijd" value="<?=get_data_view('gegevens','starttijd')?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p> Veiling eind dag* </p>
                            <div class="input-group">
                                <input type="date" class="form-control"  name="einddatum" value="<?=get_data_view('gegevens','einddatum')?>" required>
                            </div>
 
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <input type="submit" name="formulier" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </form>

<?php echo display_view('template_footer'); ?>