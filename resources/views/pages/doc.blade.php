@extends('layouts.master2')
@section('content')

<style type="text/css">
  .linkdoc:hover {
    cursor:pointer;
  }
</style>

<section id="dokumentasi" style="padding: 20px 0">
    <div class="container">
      <div class="row">
        <div class="text-center wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Dokumentasi</h2>
        </div> 
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
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
        <div class="col-sm-9 wow fadeInUp" id="isidoc" style="overflow:auto; height:470px; border:1px; border-style:solid; border-radius:4px; border-color:#003399" width=100%>
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

@stop