<?php echo display_view('template_header'); ?>

            <div class="col-md-12">
                <h3 > 1. Gekozen rubriek</h3>
                <div class="col-md-12">
                    <p> Fietsen > Mountainbike <a href="#" style="color:#ffa034;">wijzigen</a></p>
                </div>
            </div>

            <form method="post">
                <div class="col-md-12">
                    <h3> 2. Titel en beschrijving</h3>
                    
                    <div class="col-md-6">
                        <p> Titel </p>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Titel" name="titel" required>
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <p> Land </p>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Land" name ="land" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p> Beschrijving </p>
                        <textarea class="form-control" rows="3" name ="beschrijving"></textarea>
                    </div>
                    
                    <div class="col-md-6">
                        <p> plaatsnaam </p>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Plaatsnam" name="plaatsnaam" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3 > 3. Foto(s)</h3>
                        <label class="file">
                            <input type="file" id="file">
                            <span class="file-custom"></span>
                        </label>
                    <div class="col-md-12">

                    <h3> 4. Startprijs, betaling en verzending</h3>
                        <div class="col-md-3">
                            <p> Startprijs </p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="startprijs" name="startprijs" required>
                            </div>
                            <p> betalingswijze </p>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="betalingswijze" name="betalingswijze" required>
                                </div>
                        </div>

                        <div class="col-md-3">
                            <p> Betalingsinstructie* </p>
                            <textarea class="form-control" rows="4" name="betalingsinstructie"></textarea>
                        </div>

                        <div class="col-md-3">
                            <p> Verzendkosten* </p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="In euro's" name="verzendkosten" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <p> verzendinstructie* </p>
                            <textarea class="form-control" rows="4" name="verzendinstructies"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h3> 5. Looptijd</h3>

                        <div class="col-md-6">
                            <p> Veiling start dag* </p>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="REQ" name="startdatum" required>
                            </div>
                            <p>Veiling Start tijd* </p>
                            <div class="input-group">
                                <input type="time" class="form-control" placeholder="REQ" name="starttijd" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p> Veiling eind dag* </p>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="REQ" name="einddatum" required>
                            </div>
                            <p> Veiling eind tijd* </p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder=" ">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <input type="submit" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </form>

<?php echo display_view('template_footer'); ?>