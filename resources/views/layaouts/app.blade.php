<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="utf-8">
		<title>To Do List</title>
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>
		<script src="{{ asset('js/app.js') }}" type="text/js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
		
		<script type="text/javascript">
			$(function() {
				$('#datetimepicker').datetimepicker({  
					format: 'DD/MM/YYYY'
				});
			});
		</script>

		<script>
			$('.row').mouseenter(function () {
				$(this).append(`
					@if( $tache->est_fait == 0)
						<div class="col-md-auto" id="modif">
							<button id="modifier" ><span class="glyphicon glyphicon-edit"></span></button>
						</div>
					@endif
				`),
				$(this).append(`
					<div class="col-md-auto" id="supprimer">
						<form action="/tache/{{ $tache->id }}"  method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token()}}">
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger">
								<span class="glyphicon glyphicon-trash"></span>
							</button>
						</form>
					</div>
				</div>
				`);
			}).mouseleave(function(){
				$('#supprimer').remove(),
				$('#calen').remove(),
				$('#modifier').remove();    
			});
		</script>

		<script>
			$("#modifier").click(function(e){
				e.preventDefault(),
				$('#tache').removeAttr("disabled"),
				
				$('.row').append(`		
					@if( $tache->est_fait == 0)
						<div class="col-md-auto" id="calen">
							<button><i class="glyphicon glyphicon-calendar"></i></button>
						</div>
					@endif
				`);
			});
		</script>

	</body>
</html>