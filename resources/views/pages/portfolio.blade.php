<div id="single-portfolio">
	<div id="portfolio-details" class="container">
		<a class="close-folio-item" href="#"><i class="fa fa-times"></i></a>
		@foreach($data as $berita)
		<div class="row">
			<div class="col-sm-6">
				<img class="img-responsive" src=[[ $berita['news_image'] ]] alt="">
			</div>
			<div class="col-sm-6">
				<div class="project-info">
					<h3>[[ $berita['news_title'] ]]</h3>
					{!! html_entity_decode($berita['news_content']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="project-details">
				<p><span>Date:</span>[[ $berita['news_timecreated'] ]]</p>
			</div>
		</div>
		@endforeach
	</div>
</div>