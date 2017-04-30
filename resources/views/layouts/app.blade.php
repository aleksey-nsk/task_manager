<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Task Manager</title>    
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	</head>
	<body>
    	<div class="main_container">

			<div class="header">
				{{ $header }}
			</div>
			
			@yield('content')

			<div class="footer">
				<a href="https://github.com/aleksey-nsk/task_manager" target="_blank">
					Source cod on GitHub
				</a>
			</div>  

    	</div> <!-- /main_container -->
	</body>
</html>
