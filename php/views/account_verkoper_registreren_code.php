<?php echo display_view('template_header'); ?>
            
            <div class="textfield col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <p>
                   Afhankelijk van welke identificatiemethode u heeft gekozen, heeft u een code ontvangen via post of e-mail.<br>
                Voer de code hieronder in.
                </p>
            </div>
            <div class="row">
                <form class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="code">Code</label>   
                            <input type="text" class="form-control" id="code">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Bevestig</button>    
                </form>
            </div>
            
<?php echo display_view('template_footer'); ?>