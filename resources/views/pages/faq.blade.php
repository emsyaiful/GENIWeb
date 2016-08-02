@extends('layouts.master2')
@section('content')
 <section id="about-us" class="parallax">
    <div class="container">
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
                                <li>	Laporan Aging pada report Account Payable/Account Receivable Aging, </li>
                                <li>	Laporan Due pada report Account Payable/Account Receivable Due, </li>
                                <li>	Laporan history penerimaan dan pembayaran pada report Account Payable/Account Receivable History, </li>
                                <li>	Laporan Balance Sheet, </li>
                                <li>	Laporan Trial Balance, </li>
                                <li>	Laporan Profit &amp; Loss, </li>
                                <li>	Laporan Cash Flow dan</li>
                                <li>	GL Report.</li>
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
@stop