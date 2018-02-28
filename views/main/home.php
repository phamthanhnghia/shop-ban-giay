<!DOCTYPE html>
<!-- saved from url=(0064)https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>
    <?php include "include/css.php"; ?>
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary border-bottom">
        <a class="navbar-brand text-dark" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled text-dark" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">Sticky footer with fixed navbar</h1>
      <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body &gt; .container</code>.</p>
      <p>Back to <a href="https://getbootstrap.com/docs/4.0/examples/sticky-footer">the default sticky footer</a> minus the navbar.</p>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
    <?php include "include/js.php"; ?>
<div id="rtcc-desktop-capture-installed"></div></body></html>