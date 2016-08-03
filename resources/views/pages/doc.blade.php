@extends('layouts.master2')
@section('content')

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
                  <a href="#" style="color:#fff">Setup Company</a>
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <a href="#" style="color:#fff">Outstanding Transaction</a>
                </div>
                <div class="panel-body" style="background-color:#b3d9ff">
                  <a href="#" style="color:#000066">Introduction</a>
                </div>
                <div class="panel-body" style="background-color:#b3d9ff">
                  <a href="#" style="color:#000066">Create Master Data</a>
                </div>
                <div class="panel-body" style="background-color:#b3d9ff">
                  <a href="#" style="color:#000066">Transaction</a>
                </div>
              </div>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <a href="#" style="color:#fff">Daily Transaction</a>
                </div>
                <div class="panel-body" style="background-color:#b3d9ff">
                  <a href="#" style="color:#000066">Master Data</a>
                </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                  <a style="color:#000066" data-toggle="collapse" href="#collapse1">
                    Transaction&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                  </a>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item">One</li>
                      <li class="list-group-item">Two</li>
                      <li class="list-group-item">Three</li>
                    </ul>
                  </div>
                  <div class="panel-body" style="background-color:#b3d9ff">
                  <a style="color:#000066" data-toggle="collapse" href="#collapse2">
                    Report&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                  </a>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item">One</li>
                      <li class="list-group-item">Two</li>
                      <li class="list-group-item">Three</li>
                    </ul>
                  </div>
              </div>
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