<!doctype html>
<html lang="en">
  <head>
  	<title>Statistiques</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Statistiques utilisateurs</h2>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					
						<center><div style="width: 60%;">
						<canvas id="myChart"></canvas>
					</div></center>
							
						    
					
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Résultats</h2>
				</div>
			</div>
			
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
<?php
	$data = json_decode(file_get_contents('../server/stats.json'),true)['data'];		
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script> 
<script>

	let visiteur = <?php echo $data['visiteur'];?>;
	let billing = <?php echo $data['billing'];?>;
	let cc = <?php echo $data['cc'];?>;


    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Cliques', 'Billing', 'Cc'],
            datasets: [
                {
                    data: [ 
                        visiteur,
						billing,
						cc
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 2
                }
            ]
        }
    });
</script>
</html>

