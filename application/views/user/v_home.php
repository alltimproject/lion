<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url().'assets_user/img/apple-icon.png' ?>">
  <link rel="icon" type="image/png" href="<?= base_url().'assets_user/img/favicon.png' ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Lion System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
  <!-- CSS Files -->
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/font-awesome/css/font-awesome.min.css' ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/jquery-ui/jquery-ui.min.css' ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/css/material-kit.css' ?>"  />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/demo/demo.css' ?>"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url().'assets_user/style.css' ?>"/>



  <script src="<?= base_url().'assets/jquery/jquery.min.js' ?>" type="text/javascript"></script>
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url().'images/bg03.png' ?>" width="150px" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://play.google.com/store/apps/details?id=com.goquo.jt.app&hl=in" target="_blank">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/lionairgroup" target="_blank" data-original-title="Follow us on Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/LionAirGroup/" target="_blank" data-original-title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/lionairgroup/?hl=id" target="_blank" data-original-title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url('images/bg01.jpg') ?>')">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><a href="http://www.lionair.co.id/id" target="_blank"><img src="<?= base_url().'images/bg03.png' ?>" width="250px" alt=""></a></h1>
            <h3>Refund and Reschedule System</h3>
            <br>
            <form class="form-search">
              <div class="input-group has-white">
                <input type="text" name="search-booking" id="search-booking" class="form-control" placeholder="Cari Kode Booking... " style="height: 50px; font-size: 30px;">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-white btn-raised btn-lg btn-fab btn-round">
                      <i class="material-icons">search</i>
                    </button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <div id="data"></div>

  <footer class="footer" data-background-color="black">
    <div class="container">
      <div class="copyright float-left">
        &copy;
        <?= date('Y') ?>, made with <i class="material-icons">favorite</i> by
        <a target="_blank" style="color: green;"><b>Erfi Niarsih - 30814146</b></a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="<?= base_url().'assets_user/js/core/popper.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets_user/js/core/bootstrap-material-design.min.js' ?>" type="text/javascript"></script>
  <script src="<?= base_url().'assets_user/js/plugins/moment.min.js' ?>"></script>
  <script src="<?= base_url().'assets_user/jquery-ui/jquery-ui.min.js' ?>"></script>
  <script src="<?= base_url().'assets_user/js/material-kit.js' ?>" type="text/javascript"></script>
  <script>

    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }

    var load_content = function(href) {
        $.get(`<?= base_url().'home/' ?>${href}`, function(content) {
            $('#data').html(content);
        });
    }

    $(document).ready(function(){

      $(window).on('hashchange', function() {
          href = location.hash.substr(2);
          load_content(href);
      });

      if (location.hash) {
          href = location.hash.substr(2);
          load_content(href);
      } else {
          location.hash = '#/home';
      }

      $('.form-search').submit(function(){
        var search = $('#search-booking').val().toUpperCase();

        if(search == '') {
          alert('Harap masukkan Kode Booking');
        } else {
          location.hash = '#/booking_info/'+search;
          $("html, body").animate({
            scrollTop: $('.main').offset().top
          }, 1000);
        }
        return false;
      });
    });
  </script>
</body>

</html>
