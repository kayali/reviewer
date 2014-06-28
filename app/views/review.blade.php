@extends('layout')

@section('header')


{{HTML::script('/assets/src/js/jquery-2.1.1.js')}}
{{HTML::script('/assets/jquery-ui-1.11.0.custom/jquery-ui.min.js')}}
{{HTML::style('/assets/jquery-ui-1.11.0.custom/jquery-ui.min.css')}}


{{HTML::style('/assets/bootstrap/css/bootstrap.css')}}

{{HTML::script('/assets/chart/Chart.js')}}


{{HTML::script('/assets/src/js/jquery-ui-slider-pips.js')}}
{{HTML::style('/assets/src/css/jquery-ui-slider-pips.css')}}

@stop

@section('content')

<style type="text/css">

.slider-wrapper{
	padding: 15px 0px;
}

.row-padding{
	padding-top: 7px;
}
element.style {
}
.datetime {
	color: #333;
	font-size: 13px;
	font-weight: 400;
}
.block{
	clear: both;
}
</style>


<br><br>

<div class="container" >

	<div class="col-md-8 col-md-offset-2 ">



		<div class="row">
			<?php if( empty( $user )  || !in_array( $organization_id,  $user['reviews'] )){ ?>	
			<button type="button" class="btn btn-primary pull-right add-review-button">
				Review {{$org->o_name}}
			</button>
			<?php } else { ?>
				You have already reviewed {{$org->o_name}}.
			<?php } ?>
		</div>

		<div class="review-form-wrapper" style = 'display:none;' >
			<h2>Review {{$org->o_name}}</h2>
			{{ Form::open(array('url' => 'review2', 'method' => 'post', 'class' =>'review-form' )) }}

			<input type="hidden" class="" name="organization_id" value="{{$organization_id}}" /> 
			<div class="row" >

				<div class="col-md-6" >
					@foreach ( $items as $key => $item )
					<div class="row row-padding" >

						<div class="col-md-7" >
							{{Form::label('', $item['name'] ); }}
							<input type="hidden" class="" name="categories[{{$key}}][category_id]" value="{{$item['id']}}" />
							<input type="hidden" class="answer{{$key}}" name="categories[{{$key}}][value]" value="" />
						</div>
						<div class="col-md-5" >
							<div class="slider-wrapper" >
								<div class="slider" ></div>
							</div>
						</div>
					</div>
					@endforeach	
				</div>
				<div class="col-md-6 preview-container" >
					<h4>Your review text</h4>	
					<p class="review-text">
					</p>
				</div>

			</div>
			<div class="row" >
				
				<button type="button" class="btn btn-success pull-right submit-review-button">
					Submit
				</button>
				
				<button type="button" class="btn btn-defaul pull-right cancel-review-button">
					Cancel
				</button>
				
			</div>

			{{ Form::close() }}

		</div>

		<h3>Top 5 reviews</h3>

		<div class="reviews-list">
		</div>

	</div>

</div>


<script type="text/javascript">
	
	var items = <?php echo json_encode($items); ?>;
	var organization_id = <?php echo $organization_id; ?>;


	$(".slider").each(function(index, value){
		// first we need a slider to work with
		var $slider = $(this).slider({ 
			max: 5 , 
			min : 1 , 
			value: 2, 
			slide: function( event, ui ) {
				$(".answer"+index).val( ui.value);
				submitReviewForm();
			}
		});	
		// and then we can apply pips to it!
		$slider.slider("float",{ formatLabel: function(value) {
			return "<b class=''>"+  value  +"</b>";
		}});

		loadTopRevies();
	});

	$(document).on( 'submit', ".review-form", function( event ){

		event.preventDefault();	

		var form = $(this);
		var data = form.serializeArray();	

		$.post(form.attr('action'), data , function(resp, textStatus, xhr) {
			if( resp.success ){
				$(".cancel-review-button").click();
				loadTopRevies();				
			}
		},'json');
	});
		

function submitReviewForm(){

	var form = $(".review-form");
	var data = form.serializeArray();	
	$.post( "<?php echo URL::route('preview');?>", data , function(resp, textStatus, xhr) {
		
		$(".review-text").html( resp.evaluation );

	},'json');
}


function loadTopRevies(){
    $.get( "<?php echo URL::route('top',array('organization_id'=>1));?>", function( resp ){
		$(".reviews-list").html( resp );


		$(".org-percentage").each(function(){

			var $element = $(this);

			var percentage = ( parseInt( $element.attr('percentage')) / 5 )*100;
			var doughnutData = [
			{
				value: percentage ,
				color:"#F7464A"
			},
			{
				value : (100-percentage),
				color : "#46BFBD"
			}		
			];
			var myDoughnut = new Chart( $element.get(0).getContext("2d")).Doughnut(doughnutData);
		});	

	});
}


$(document).on( "click", ".add-review-button", function(){
	$(".review-form-wrapper").slideDown('slow');
	$(".add-review-button").fadeOut();
});

$(document).on( "click", ".submit-review-button", function(){
	$(".review-form").submit();
});

$(document).on( "click", ".cancel-review-button", function(){
	$(".add-review-button").fadeIn();
	$(".review-form-wrapper").slideUp('slow');
});



</script>
@stop
