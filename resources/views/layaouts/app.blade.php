<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="utf-8">
		<title>To Do List</title>
		<link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
	</head>
	<body>
		<div class="container">
			@yield('content')
		</div>
		<script src="{{ asset(mix('/js/app.js')) }}" type="text/js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.datetimepicker').datetimepicker({
					format: 'DD/MM/YYYY'
				});

				$('.bi-calendar2-week-fill').on('click',function(){
					$('.datetimepicker').focus();
				});
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
										$(this).find(".editTache").hide();
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