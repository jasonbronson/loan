<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php wp_head();?>
	  <meta name="description" content="<?php echo get_field('description'); ?>">
</head>
<body <?php body_class(); ?>>

<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">
       <img src='<?php echo DIST_URI.'images/logo.png' ?>' class="mainlogo img-fluid">
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Student Loans <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calculators</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
      </ul>

      <ul class="navbar-nav mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link header-login" href="#"> Log In </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <!--input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"-->
        <button class="btn btn-outline-primary my-2 my-sm-0 find-my-loan-btn" type="submit">Fund My Loan</button>
      </form>
    </div>
  </nav>