@extends('Backend.index')

@section('title','Payment')

@section('content')

<div class="container-fluid">
	<div class="row">
		<h2 class="content-heading">Payment Mensuel: {{$montant[0]}} dh</h2>
	</div>
	<hr>
</div>

		{!! Form::open(['route' => 'Payment_pending' ,'method' => 'post','files'=> true,'class'=>'etud_form']) !!}


<div class="container-fluid">
	<div class="row">
		<div class="months">
			<div class="month-line">
				@foreach($Months as $month)
						<div class="col-md-3 col-lg-3 month">
							<h3>{{$month}}</h3>
							<div class="month-content">
								@foreach($Payments as $pay)
								@if($pay->month == $month)
									@if($pay->reste > 0)
										<div class="alert" style="background: #d9edf7">
									@else
										<div class="alert">
									@endif
										<p>Montant :<b>{{$montant[0]}}</b></p>
										<p>Déjà payé :<b>{{$pay->payed}}</b></p>
										<p>Reste :<b>{{$pay->reste}}</b></p>
										@if($pay->reste > 0)
											<a href="{{ route('Comp_Payment') }}/{{$id_etud}}/{{$pay->id}}/{{$month}}" id="reste" class="form-control btn-primary">Payer le Reste</a href="#0">

										@endif
									</div>
								@break
								@endif
								@endforeach
								@if(!in_array($month, $payed_months))
									<a href="{{ route('Payment') }}/{{$id_etud}}/{{$month}}" id="pay" class="form-control btn-success">payer</a href="#0">
								@endif
							</div>
						</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="my-spacer"></div>
	<div class="my-spacer"></div>
</div>

<style type="text/css">
.months{
	width: 100%;
}
.month-line{
	height: 200px;
}
.month{
	display: inline-table;
	border: 1px solid #ccc;
	height: 200px;
	width: 200px;
}
.month-content{
	height: 100%;
	width: 100%;
	/*padding: 20px;*/
	text-align: center;
}
.month-content #pay{
	margin: 0 auto;
	margin-top: 30%;
	max-width: 40%;
}
.month-content #reste{
	background: #868e96;
	border: 0px;
}
.month-content #reste:hover{
	background: #61676d;
}
.month h3{
	margin: 0px;
	color: white;
	text-align: center;
	/*border: 1px solid #007bff;*/
	background: #007bff;
	position: absolute;
    width: 100%;
    transform: translateX(-10px);
}
.alert{
	margin-top: 20%;
	background: #d6e9c6;
}
.alert p{
	color: #3c763d;
	text-align: center;
}

</style>
@endsection


@section('myscript')

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.pay-mth-3,.pay-mth-2').hide();
		$('input[name="method"]').change(function () {
			switch ($(this).val()){ 
				case 'cheque': 
					$('.pay-mth-1,.pay-mth-3').hide();
					$('.pay-mth-2').show();
					break;
				case 'virement': 
					$('.pay-mth-1,.pay-mth-2').hide();
					$('.pay-mth-3').show();
					break;
				case 'espece': 
					$('.pay-mth-3,.pay-mth-2').hide();
					$('.pay-mth-1').show();
					break;
			}
		});
		$('#left').hide();

		$('input[name="payed"]').change(function() {
			if($(this).val() == 'left')
			{
				$('#left').show();
			}
			else{
				$('#left').hide();
			}
		});

		
	});
</script>

@endsection