<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- <link href="public/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>material.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="font.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <nav class="navbar navbar-fixed-top" style="background-color: white;">
          <div class="container max-width-900 wi-navbar" style="height: 73px;">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" #toggler>
                      <span>
                          <img src="http://cdn.appwinit.com/small-menu/image.png" alt="menu" srcset="http://cdn.appwinit.com/small-menu/image@2x.png 2x, http://cdn.appwinit.com/small-menu/image@3x.png 3x" style="height: 19px; width: 25px;margin-top: 3px;"/>
                      </span>
                  </button>
                  <a class="navbar-brand" href="http://www.appwinit.com/"><img src="http://cdn.appwinit.com/logo/image.png" alt="Logo" srcset="http://cdn.appwinit.com/logo/image@2x.png 2x, http://cdn.appwinit.com/logo/image@3x.png 3x" style="height: 22px; width: 77px;"/></a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right desktop">
                      <li><a href="http://www.appwinit.com/">Home</a></li>
                      <li><a href="http://www.appwinit.com/how-it-works">How it works</a></li>
                      <li><a href="http://www.appwinit.com/business">Business</a></li>
                      <li><a href="http://www.appwinit.com/faq/parking-tickets">FAQ</a></li>
                      <li><a href="http://www.appwinit.com/contact">Contact</a></li>
                      <li><a href="http://blog.appwinit.com">Blog</a></li>
                      <!-- <li *ngIf="!userService.authenticated"><a routerLink="/log-in" routerLinkActive="active">Log in</a></li> -->
                      <!-- <li *ngIf="!userService.authenticated"><a class="bordered  sign-up-button" routerLink="/sign-up" routerLinkActive="active">Sign Up</a></li> -->
                  </ul>

                  <ul class="nav navbar-nav navbar-right mobile">
                      <li><a href="http://www.appwinit.com/">Home</a></li>
                      <li><a href="http://www.appwinit.com/how-it-works">How it works</a></li>
                      <li><a href="http://www.appwinit.com/business">Business</a></li>
                      <li><a href="http://www.appwinit.com/faq/parking-tickets">FAQ</a></li>
                      <li><a href="http://www.appwinit.com/contact">Contact</a></li>
                      <li><a href="http://blog.appwinit.com">Blog</a></li>
                      <!-- <li *ngIf="!userService.authenticated"><a routerLink="/log-in" routerLinkActive="active">Log in</a></li> -->
                      <!-- <li *ngIf="!userService.authenticated"><a class="bordered  sign-up-button" routerLink="/sign-up" routerLinkActive="active">Sign Up</a></li> -->
                  </ul>
              </div>
          </div>
      </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="public/js/bootstrap.min.js"></script> -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
