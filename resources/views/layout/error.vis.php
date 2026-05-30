<html>
<head>
	<title>Exception !</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
body {
	font-family: Calibri, Verdana, Arial;
	font-size: 14px;
}
div.trace-items {
	padding-left: 50px;
}
div.trace-items div.trace-item {
	padding: 3px;
	margin-top: 9px;
	margin-bottom: 0px;
	background-color: #eee;
}
div.headr {
	margin-top: 15px;
	margin-bottom: 15px;
	height: 58px;
	display: block;
	border-top: 3px double #333;
	border-bottom: 3px double #333;
	background-color: #fef;
}
div.headr > div:first-child {
	padding-left: 15px;
	display: inline-block;
	width: 70%;
}
div.headr > div:last-child {
	position: absolute;
	right: 0 !important;
	text-align: center;
	display: inline-block;
	width: 10%;
}
	</style>
</head>
<body>
	<div class="headr">
		<div>
			<h1>Exception !</h1>
		</div>
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
		</div>
	</div>
	<div>
		<b>Message:</b>
		<span>{{ $exception['message'] }}</span>
	</div>
	<div>
		<b>Exception:</b>
		<span>{{ $exception['exception'] ?? 'Unspecified' }}</span>
	</div>
	<div>
		<b>File (line):</b>
		<span>{{ $exception['file'] ?? 'none' }}&nbsp;({{ $exception['line'] ?? 0 }})</span>
	</div>
	<div>
		<b>Stack Trace:</b>
	</div>
	<div class="trace-items">
		@foreach ($exception['trace'] as $item)
		<div class="trace-item">
			<div>
				<b>File (line):</b>
				<span>{{ $item['file'] ?? 'none' }}&nbsp;({{ $item['line'] ?? 0 }})</span>
			</div>
			<div>
				<b>Function:</b>
				<span>{{ $item['function'] ?? 'Unspecified' }}</span>
			</div>
		</div>
		@endforeach
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>