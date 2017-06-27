<?php
//Get page ID
if(is_object($post))
{
    $obj_page = get_page($post->ID);
}
$current_page_id = '';

if(isset($obj_page->ID))
{
    $current_page_id = $obj_page->ID;
}
elseif(is_home())
{
    $current_page_id = get_option('page_on_front');
}
?>

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
