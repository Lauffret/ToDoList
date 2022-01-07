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
				$('.datetimepicker').hover(
					function(){
						$('.this').datetimepicker({  
							format: 'DD/MM/YYYY'
						});
					}
				)
			});
		</script>

		<script type="text/javascript">
			$(function(){
				$('.editTache').hide();
				
				$('.liste').hover(
					function(){
						$(this).on('click',".modifier",
							function () {
								$('.liste').mouseover(
									function(){ 
										$(this).find(".btnModif").hide(),
										$(this).find(".tache").hide(),
										$(this).find(".editTache").show();
									}
								).mouseleave(
									function(){  
										$(this).find(".tache").show(),
										$(this).find(".editTache").hide(),
										location.reload();
									}
								);
							}
						)
					}
				);
			});
		</script>

		<script>
			$(document).ready(function(){
				$('.btnSupp').hide(),
				$('.btnModif').hide();
				
				$('.liste').mouseover(
					function(){ 
						$(this).find('.dateTable').hide(),
						$(this).find('.btnSupp').show(),
						$(this).find('.btnModif').show();
					}
				).mouseout(
					function(){  
						$(this).find('.dateTable').show(),
						$(this).find('.btnSupp').hide(),
						$(this).find('.btnModif').hide();
					}
				);
			});
		</script>
	</body>
</html>