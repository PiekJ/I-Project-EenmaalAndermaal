<?php echo display_view('template_header'); ?>

<!-- Alert wordt niet standaard getoond -->
<div class="alert alert-warning hidden">
    U moet ingelogd zijn om deze pagina te kunnen zien.
</div>
<!-- -->

<?php if (isset($_GET['username'])) { ?>
<div class="alert alert-danger">
    Verkeerde gebruikersnaam en of wachtwoord combinatie.
</div>
<?php } ?>

<div class="row">
<form action="<?php echo get_url(true); ?>account/login" method="post" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" name="username" placeholder="" value="<?php echo (isset($_GET['username'])) ? $_GET['username'] : ''; ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>    
            <input type="password" class="form-control" name="password" placeholder="">
        </div>
    </div>
    <div class="checkbox">
        <label value="onthouden"><input type="checkbox" name="rememberusername">Gebruikersnaam onthouden</label>
    </div>
    <div class="checkbox">
        <label value="blijven"><input type="checkbox" name="rememberme">Ingelogd blijven</label>
    </div>
                
    <button type="submit" class="btn btn-primary">Inloggen</button>
</form>
<p>Nog geen account? Maak er <a href="<?php echo get_url(true); ?>account/registreren">hier</a> één aan.</p>
<p>Wachtwoord vergeten? Klik <a href="<?php echo get_url(true); ?>account/vergeten">hier</a>.</p>

<?php echo display_view('template_footer'); ?>