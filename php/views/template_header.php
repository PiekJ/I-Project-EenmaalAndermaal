<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo get_data_view('title') . ' - ' . get_data_view('sitename'); ?></title>

        <link rel="stylesheet" href="<?php echo get_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_url(); ?>css/template.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="header-logo" src="<?php echo get_url(); ?>images/logo.png" alt="<?php echo get_data_view('sitename'); ?>">

                    <h1 class="header-title"><?php echo get_data_view('sitename'); ?></h1>
                </div>
            </div>

            <nav class="navbar navbar-default navbar-template">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (get_data_view('menu') == 0) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>">Home</a></li>
                            <li class="<?php echo (get_data_view('menu') == 1) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>veilingen">Veilingen</a></li>
                            <?php if (false) { // if user is logged in ?>
                            <li class="<?php echo (get_data_view('menu') == 2) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>veiling/create">Start nieuwe vieling</a></li>
                            <li class="<?php echo (get_data_view('menu') == 3) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>account/verkoper/registreren">Aanmaken verkoopaccount</a></li>
                            <?php } ?>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <?php if (!false) { // if user is not logged in ?>
                            <li class="<?php echo (get_data_view('menu') == 4) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>account/login">Login</a></li>
                            <li class="<?php echo (get_data_view('menu') == 5) ? 'active' : ''; ?>"><a href="<?php echo get_url(); ?>account/registreren">Registreren</a></li>
                            <?php } else { ?>
                            <li><span>Welkom NAAM</span></li>
                            <li><a href="<?php echo get_url(); ?>account/logout">Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-pagetitle"><?php echo get_data_view('title'); ?></h2>

                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo get_data_view('sitename'); ?></a></li>
                        <li class="active"><?php echo get_data_view('title'); ?></li>
                    </ul>
                </div>
            </div>