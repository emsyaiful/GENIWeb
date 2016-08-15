@extends('layouts.master')
@section('content')
<br><br><br>
<section id="services">
    <div class="container">
      <div class="row">
        <div class="heading wow" data-wow-duration="1000ms" data-wow-delay="300ms">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Fitur Dari GEN1</h2>
            <p>Gen1 terdapat modul yang diperlukan untuk finance & Accounting. Anda dapat menggunakannya dimanapun anda berada, karena Gen1 menggunakan Cloud System Integration.</p><br>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-user"></i>
            </div>
            <div class="service-info">
              <h3>User Friendly</h3>
              <p>Sistem dibuat semudah anda ketika menggunakannya. Mudah untuk dipelajari dan digunakan.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-users"></i>
            </div>
            <div class="service-info">
              <h3>Multi User</h3>
              <p>Sistem Gen1 dapat diakses dengan multi user, dimana akses data usaha anda dapat dilakukan oleh banyak user dari perusahaan anda.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-cloud-upload"></i>
            </div>
            <div class="service-info">
              <h3>Cloud System Integration</h3>
              <p>Sistem Gen1 terintegrasi dengan server cloud, dimana data yang anda simpan sangat aman. Dan kapanpun anda membutuhkan data anda akan selalu tersedia.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
            <div class="service-icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <div class="service-info">
              <h3>Real Time</h3>
              <p>Sistem akan selalu memberikan akses data secara real time yang ter-update kepada anda dan seluruh user anda.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
            <div class="service-icon">
              <i class="fa fa-book"></i>
            </div>
            <div class="service-info">
              <h3>General Ledger Report</h3>
              <p>Sistem Gen1 modul Finance & Accounting menyediakan fitur General Ledger Report, dimana anda dapat memonitor seluruh data keuangan anda kapanpun dan dimanapun.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
            <div class="service-icon">
              <i class="fa fa-cogs"></i>
            </div>
            <div class="service-info">
              <h3>Opening Balance Setup</h3>
              <p>System Gen1 modul Finance & Accounting menyediakan Opening Balance Setup, dimana anda dapat melakukan setup saldo awal pada saat pertama kali anda menggunakan modul ini.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->

  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Berita</h2>
        </div>
      </div> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3" ng-repeat="berita in data | limitTo:4">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="folio-image">
              <img class="img-responsive" src={{berita.news_image}} alt="" style="height:300px">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>{{berita.news_title}}</h3>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="detailberita/{{berita.news_id}}" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href={{berita.news_image}} data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
  </section><!--/#portfolio-->

  <style type="text/css">
    .linkdoc:hover {
      cursor:pointer;
    }
  </style>

  <section id="dokumentasi" style="padding: 20px 0;">
      <div class="container" style="margin:5% auto">
        <div class="row"></div>
        <div class="row">
          <div class="text-center wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Dokumentasi</h2>
          </div> 
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="about-info wow">
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <a  style="color:#fff" class="linkdoc" data-id="setupcompany">Setup Company</a>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    Outstanding Transaction
                  </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                    <a  style="color:#000066" class="linkdoc" data-id="introoutstanding">Introduction</a>
                  </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                    <a  style="color:#000066" class="linkdoc" data-id="createmasterdata">Create Master Data</a>
                  </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                    <a  style="color:#000066" class="linkdoc" data-id="transaction">Transaction</a>
                  </div>
                </div>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    Daily Transaction
                  </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                    <a  style="color:#000066" class="linkdoc" data-id="masterdata">Master Data</a>
                  </div>
                    <div class="panel-body" style="background-color:#b3d9ff">
                    <a style="color:#000066" data-toggle="collapse" href="#collapse1">
                      Transaction&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                      <ul class="list-group">
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="desc_button">Penjelasan Tombol</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="ap">Account Payable (AP)</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="ar">Account Receivable (AR)</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="payment">Payment</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="receipt">Receipt</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="je">Journal Entry</a>
                        </li>
                      </ul>
                    </div>
                    <div class="panel-body" style="background-color:#b3d9ff">
                    <a style="color:#000066" data-toggle="collapse" href="#collapse2">
                      Report&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      <ul class="list-group">
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="apaging">AP Aging</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="araging">AR Aging</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="apdue">AP Due</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="ardue">AR Due</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="profit_loss">Profit &amp; Loss</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="balance_sheet">Balance Sheet</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="trial_balance">Trial Balance</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="gl_report">GL Report</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="ap_history">AP History</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="ar_history">AR History</a>
                        </li>
                        <li class="list-group-item" style="background-color:#e6f3ff">
                          <a  style="color:#666666" class="linkdoc" data-id="cashflow">Cash Flow</a>
                        </li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-9 wow fadeInUp" id="isidoc" style="overflow:auto; height:950px; border:1px; border-style:solid; border-radius:4px; border-color:#003399" width=100%>
            <div class="panel" id="setupcompany">
                              <div class="content_section">
                                  <h1>Setup Company</h1>

                                  <ul class="list">
                                      <li>Setelah login pertama kali, anda akan melihat form setup company</li>
                                      <li>Isi data identitas perusahaan anda dengan minimal required field (*) terisi</li>
                                      <li>Kemudian klik next</li>
                                      <li>Tentukan period fiscal anda pada form period fiscal</li>
                                      <li>Kemudian klik next</li>
                                      <li>Muncul pop-up konfirmasi untuk menyelesaikan setting awal anda atau tetap melanjutkan untuk menginputkan saldo awal anda. Bila anda ingin menginputkan saldo awal, klik create outstanding transaction. Bila anda merasa tidak memerlukan saldo awal, klik Finish Setup</li>
                                      <li>Pembuatan Outstanding Transaction hanya berlaku satu kali yaitu di awal ketika anda setup company, dan apabila anda telah memilih finish setup maka anda tidak akan bisa mengisikan saldo awal</li>
                                  </ul>
                                  <img src="docimg/img/1CompanySetup.jpg" width="80%" height="80%"><br><br>
                              </div>
                          </div> <!-- end of aboutus -->
          </div>
        </div>
      </div>
      <br><br>
    </section> <!--/#about-us-->

  <script>
    $(".linkdoc").click(function(){
        var id = $(this).data("id");
        $("#isidoc").load("detaildoc.txt #"+id);
        window.location.href = "#"+id;
    });
  </script>

<section id="faq" class="parallax">
    <div class="container" style="margin:5% auto">
      <div class="row">
        <div class="text-center wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Pertanyaan Populer</h2>
        </div> 
      </div>
      <div class="row"><br><br>
        <div class="col-sm-4">
          <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="lead"><b><a href="#" class="clickevent" data-id="umum" style="color:#fff">Pertanyaan Umum</a></b></p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="38">38%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
              <p class="lead"><b><a href="#" class="clickevent" data-id="aktif" style="color:#fff">Masa Aktif Akun</a></b></p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="17">17%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead"><b><a href="#" class="clickevent" data-id="modul" style="color:#fff">Modul</a></b></p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="30">30%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="lead"><b><a href="#" class="clickevent" data-id="bayar" style="color:#fff">Pembayaran</a></b></p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="15">15%</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div id="tag1">
            <h3>Pertanyaan Umum</h3>
              <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="1" style="color:#fff">
                    <b>Apa perbedaan Gen1 dengan trial dan berbayar?</b>
                  </a>
                </li>
                <div id="tag11" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Gen1 trial merupakan fasilitas penuh yang dapat anda dapatkan secara gratis dengan berbatas waktu. Untuk perpanjangan periode tersebut akan dikenakan tarif sesuai ketentuan yang berlaku. Caranya, silahkan isi form registrasi dengan menekan tombol SIGN-UP pada menu HOME. Cek email anda, dan ikuti petunjuk verifikasi. Pada Gen1 berbayar, anda dapat segera menikmati fasilitas penuh Gen1 sesuai periode yang dipilih</p>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="2" style="color:#fff">
                    <b>Apakah Gen1 hanya bisa di akses pada PC saja?</b>
                  </a>
                </li>
                <div id="tag12" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>System Gen1 berbasis web. Sehingga memudahkan anda dalam mengakses Gen1 tidak hanya melalui PC, namun pada perangkat lain seperti smartphone, cukup dengan menggunakan browser.</p>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="3" style="color:#fff">
                    <b>Minimal spesifikasi apa yang dapat mengakses Gen1?</b>
                  </a>
                </li>
                <div id="tag13" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Minimal untuk browser seperti firefox versi 40.0 dan chrome.</p>
                </div>
              </ul>
            </div>
            <div id="tag2" hidden>
              <h3>Masa Aktif Akun</h3>
              <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="4" style="color:#fff">
                    <b>Apa yang terjadi bila masa trial habis?</b>
                  </a>
                </li>
                <div id="tag24" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Akun anda akan menjadi non-active. Anda tidak akan dapat mengakses ke dalam Gen1 hingga konfirmasi pembayaran dilakukan. Kami akan menyimpan data anda hingga user yang anda miliki telah aktif kembali.</p>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="5" style="color:#fff">
                    <b>Apa yang terjadi bila masa aktif habis?</b>
                  </a>
                </li>
                <div id="tag25" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Sebelum masa aktif habis, kami akan mengirimkan peringatan kepada anda melalui email bahwa akun yang anda miliki akan segera habis masa aktifnya dan segera diperpanjang. Akun yang tidak diperpanjang, akan memiliki masa tenggang selama 15 hari terhitung batas masa aktif berakhir sebelum akun user benar-benar menjadi non-active.</p>
                </div>
              </ul>
            </div>
            <div id="tag3" hidden>
              <h3>Modul</h3>
              <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="7" style="color:#fff">
                    <b>Apakah terdapat module lain selain Finance &amp; Accounting pada Gen1?</b>
                  </a>
                </li>
                <div id="tag37" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Apabila anda membutuhkan beberapa module lain selain Finance &amp; Accounting, anda dapat menghubungi kami melalui email atau telpon yang tercantum pada halaman about us yang telah tersedia.</p>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="8" style="color:#fff">
                    <b>Pada modul Finance &amp; Accounting Gen1 report apa saja yang dapat dihasilkan?</b>
                  </a>
                </li>
                <div id="tag38" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Pada modul Finance &amp; Accounting Gen1, anda dapat melihat : </p>
                            <ul style="list-style: circle;">
                                <li>  Laporan Aging pada report Account Payable/Account Receivable Aging, </li>
                                <li>  Laporan Due pada report Account Payable/Account Receivable Due, </li>
                                <li>  Laporan history penerimaan dan pembayaran pada report Account Payable/Account Receivable History, </li>
                                <li>  Laporan Balance Sheet, </li>
                                <li>  Laporan Trial Balance, </li>
                                <li>  Laporan Profit &amp; Loss, </li>
                                <li>  Laporan Cash Flow dan</li>
                                <li>  GL Report.</li>
                            </ul>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="9" style="color:#fff">
                    <b>Apa yang harus dipersiapkan untuk memulai awal system Gen1 modul Finance &amp; Accounting?</b>
                  </a>
                </li>
                <div id="tag39" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Terdapat 2 cara pada saat anda memulai awal modul Finance &amp; Accounting, yaitu pertama dengan menggunakan setup saldo awal maka anda perlu memasukkan outstanding transaction perusahaan, dan atau yang kedua anda tidak perlu menggunakan saldo awal.</p>
                </div>
              </ul>
            </div>
            <div id="tag4" hidden>
              <h3>Pembayaran</h3>
              <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="10" style="color:#fff">
                    <b>Bagaimana cara melakukan pembayarannya?</b>
                  </a>
                </li>
                <div id="tag410" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Silahkan melakukan registrasi terlebih dahulu, dan anda akan mendapatkan email info cara pembayaran dari kami. Kemudian lakukan pembayaran sesuai pilihan anda pada ATM atau Bank yang tersedia. Photo atau screenshoot bukti pembayaran, klik pada Payment Confirmation dan attach bukti pembayaran tersebut. Kami akan segera menginformasikan melalui email anda bahwa akun user anda telah aktif.</p>
                </div>
                <li class="list-group-item list-group-item-action list-group-item-info" style="background-color:rgb(2, 143, 204)">
                  <a href="#" class="listtanya" data-id="11" style="color:#fff">
                    <b>Apabila telah melakukan pembayaran, apakah masa aktif pada akun saya jadi bertambah?</b>
                  </a>
                </li>
                <div id="tag411" hidden class="list-group-item list-group-item-action list-group-item-info hidden">
                  <p>Setelah kami melakukan verifikasi maka masa aktif pada akun anda akan segera aktif. Dan kami akan menginformasikan melalui email anda bahwa akun user anda telah diperpanjang.</p>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
  </section> <!--/#about-us-->

<script>
  $(".clickevent").click(function(){
    var id = $(this).data("id");
    if(id=="umum"){
      $("#tag1").show();
      $("#tag2").hide();
      $("#tag3").hide();
      $("#tag4").hide();
    }else if(id=="aktif"){
      $("#tag2").show();
      $("#tag1").hide();
      $("#tag3").hide();
      $("#tag4").hide();
    }else if(id=="modul"){
      $("#tag3").show();
      $("#tag2").hide();
      $("#tag1").hide();
      $("#tag4").hide();
    }else if(id=="bayar"){
      $("#tag4").show();
      $("#tag2").hide();
      $("#tag3").hide();
      $("#tag1").hide();
    }
  });

  $(".listtanya").click(function(){
    var id = $(this).data("id");
    var tag = $(this).closest("div").attr("id");
    var kode = "#"+tag+id;
    if($(kode).is(":visible")){
      $(kode).hide();
    }else{
      $(kode).show();
      $(kode).removeClass("hidden");
    }
  });
</script>

  <section id="contact">
    <!-- <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms"></div> -->
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
        <br>
          <div class="text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Hubungi Kami</h2>
            <p>Sekarang adalah saat yang sempurna untuk menghubungi kami.
            Mungkin kami sibuk, tapi anda akan selalu menjadi prioritas utama kami.</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" id="name" name="name" class="form-control" placeholder="Nama" required="required" style="color:black">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" id="email" name="email" class="form-control" placeholder="Alamat Email" required="required" style="color:black">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" id="subject" class="form-control" placeholder="Subyek" required="required" style="color:black">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Isi Pesan" required="required" style="color:black"></textarea>
                </div>                        
                <div class="form-group">
                  <!-- <div id="success"></div> -->
                  <button type="submit" class="btn-submit">Kirim</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div id="google-map" class="wow fadeIn" data-latitude="-7.280136" data-longitude="112.684398" data-wow-duration="1000ms" data-wow-delay="400ms"></div><br>
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="col-sm-6">
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Alamat:</span> Darmo Villa B-5 Jl. Simpang Darmo Permai Selatan Surabaya </li>
                </ul>
                </div>
                <div class="col-sm-6">
                <ul class="address">
                  <li><i class="fa fa-phone"></i> <span> Telp:</span> 031 7314646  </li>
                  <li><i class="fa fa-globe"></i> <span> Fax:</span> 031 7314747 </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:info@bios-it.co.id"> info@bios-it.co.id</a></li>
                </ul>
                </div>
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->

@stop