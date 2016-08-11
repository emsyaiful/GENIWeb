<div id="single-portfolio">
	<div id="portfolio-details" class="container">
		<a class="close-folio-item" href="#"><i class="fa fa-times"></i></a>
		@foreach($data as $berita)
		<div class="row">
			<div class="col-sm-4">
				<img class="img-responsive" src="[[ $berita['news_image'] ]]" alt="">
				<p><span>Date:</span>[[ $berita['news_timecreated'] ]]</p>
			</div>
			<div class="col-sm-8">
				<div class="project-info">
					<h2>[[ $berita['news_title'] ]]</h2>
					{!! html_entity_decode($berita['news_content']) !!}
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>