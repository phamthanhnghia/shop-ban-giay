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

      <!-- Fixed navbar -->
      <nav class="nav-shoses-top">
        <div id="header-top" class="hidden-xs hidden-sm">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="menu_header_top">
                        <li>
                            <a href="#" class="hotline-header">Hotline : 0907798131</a>
                        </li>
                        <li>
                            <a href="#">Tìm cửa hàng</a>
                        </li>
                        <li>
                          <a href="#">Liên hệ hợp tác</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right" >
                        <ul class="links customer-header">
                          <li>
                            <a href="#">Kiểm tra đơn hàng</a>
                          </li>
                          <li class="divide-menu">|</li>
                          <li>
                            <a href="#">Đăng nhập</a>
                          </li>
                          <li class="divide-menu">|</li>
                          <li>
                            <a href="#">Đăng ký</a>
                          </li>
                        </ul>
                    </div>

              </div>
          </div>
        </div>
      </nav>

      <nav id="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
sdfsdf
            </div>
            <div class="col-lg-6 col-md-5 ">
sfđf
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
sdfsd
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
sdfsdf
            </div>
          </div>
        </div>
      </nav>

      <nav id="menu">
        <header>
          <h2>Menu</h2>
        </header>
      </nav>

    <!-- Begin page content -->



    <main id="panel">
      <header>
        <h2>Panel</h2>
      </header>
      <main role="main" class="container">


      </main>
      <footer class="footer">
        <div class="container">
          <span class="text-muted">Place sticky footer content here.</span>
        </div>
      </footer>
    </main>



    <?php include "include/js.php"; ?>

    <script>
      var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
      });
    </script>
</body></html>
