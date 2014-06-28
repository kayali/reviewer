@foreach ( $top_reviews as $key => $top_review )


<div class="row row-padding10" >
	<div class="media col-md-10">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://lorempixel.com/64/64/" alt="...">
		</a>
		<div class="media-body">
			<div class="row">
				<h4 class="media-heading col-md-9">Anynoumus</h4>
				<span class="col-md-3"><?php echo date( 'F j, Y', strtotime( $top_review->date ) ) ?></span>
			</div>
			<p>{{$top_review->eval_verbalized}}</p>
		</div>
	</div>
	<div class="col-md-2">
		<canvas id="canvas" class='org-percentage' percentage="{{$top_review->avg}}" height="80" width="80"></canvas>
	</div>
</div>

@endforeach	


