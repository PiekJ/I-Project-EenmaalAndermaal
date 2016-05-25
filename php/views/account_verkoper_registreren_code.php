<?php echo display_view('template_header'); ?>

<?php 
    if(get_data_view('code_correct')){
            echo '<div class="alert alert-success">
            Gefeliciteerd! Uw account is bevordert tot een verkoopaccount.
            </div>';
    }
    if(get_data_view('code_correct') === false){
            echo '<div class="alert alert-danger">
            De gegeven code klopt niet.
            </div>';
    }
?>
            
            <div class="well col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <p>
                Afhankelijk van welke identificatiemethode u heeft gekozen, heeft u een code ontvangen via post of e-mail.<br>
                Voer de code hieronder in.
                </p>
            </div>
            <div class="row">
                <form method="post" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <label for="code">Code</label>   
                            <input type="text" class="form-control" name="code" id="code" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Bevestig</button>    
                </form>
            </div>
            
<?php echo display_view('template_footer'); ?>