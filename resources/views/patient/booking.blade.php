 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Booking</title>
	<link rel="stylesheet" href="">

</head>
<body>  
		 @foreach($a as $key)
				 Name:- {{$key->book->first_name}} {{$key->book->last_name}} <br/>
				 Schedule:- {{$id->days}}<br/>
				 Time:-  From :{{$id->From}} To: {{$id->to}}<br/>
				
		 @endforeach
</body>
</html>
