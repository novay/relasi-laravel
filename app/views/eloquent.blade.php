<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Halo Eloquent</title>
		<!-- CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<style type="text/css"> body { padding-top:50px; } </style>
	</head>
	<body class="container">
		<div class="col-sm-8 col-sm-offset-2">
			@foreach ($mahasiswa as $temp)
				<h3>{{ $temp->nama }} <small>[{{ $temp->nim }}]</small></h3>
				<h5>Hobi : 
					@foreach($temp->hobi as $tampung) 
						<small>{{ $tampung->hobi }}, </small> 
					@endforeach
				</h5>
				<h4>
					<li>Nama Wali : <strong>{{ $temp->wali->nama }}</strong></li>
					<li>Dosen Pembimbing : <strong>{{ $temp->dosen->nama }}</strong></li>
				</h4>
				<hr/>
			@endforeach
		</div>
	</body>
</html>