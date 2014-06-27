@extends('layout')

@section('header')


{{HTML::script('/assets/src/js/jquery-2.1.1.js')}}
{{HTML::script('/assets/jquery-ui-1.11.0.custom/jquery-ui.min.js')}}
{{HTML::style('/assets/jquery-ui-1.11.0.custom/jquery-ui.min.css')}}


{{HTML::style('/assets/bootstrap/css/bootstrap.css')}}



{{HTML::script('/assets/src/js/jquery-ui-slider-pips.js')}}
{{HTML::style('/assets/src/css/jquery-ui-slider-pips.css')}}

@stop

@section('content')


<br><br>

<div class="container" >

	<form class="review-form" >
	<div class="row" >

		<div class="col-md-6" >

			@foreach ( $items as $key => $item )
			<div class="row" >

				<div class="col-md-3" >
					<label>{{ $item['name'] }}</label>
					<input type="hidden" class="answer{{$key}}" name="answers[{{$key}}]" value="" />
				</div>
				<div class="col-md-9" >
					<div class="slider" ></div>
				</div>
			</div>
			@endforeach	
		</div>
	</div>

	</form>


	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://lorempixel.com/64/64/" alt="...">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Anynoumus</h4>
			sad asdasd asdasdas d asd as dasd as d as das d a sd as
		</div>
	</div>

	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://lorempixel.com/64/64/" alt="...">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Anynoumus</h4>
			sad asdasd asdasdas d asd as dasd as d as das d a sd as
		</div>
	</div>

	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://lorempixel.com/64/64/" alt="...">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Anynoumus</h4>
			sad asdasd asdasdas d asd as dasd as d as das d a sd as
		</div>
	</div>

</div>


<script type="text/javascript">
var items = <?php echo json_encode($items); ?>

$(".slider").each(function(index, value){
	// first we need a slider to work with
	var $slider = $(this).slider({ 
		max: 5 , 
		min : 1 , 
		value: 2, 
 		slide: function( event, ui ) {
        	$(".answer"+index).val( ui.value);
      	}
	});	
	// and then we can apply pips to it!
	$slider.slider("float",{ formatLabel: function(value) {
		return "<b class=''>"+ items[ index ].labels[ value ] +"</b>";
	}});
});

$(document).on( 'submit', ".review-form", function( event ){

	event.preventDefault();
	var data = $(".review-form").serializeArray();	

	console.log( data );

	// $.post('/path/to/file', data , function(data, textStatus, xhr) {
		
	// });

});
	


</script>
@stop
