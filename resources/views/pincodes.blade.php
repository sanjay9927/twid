<!DOCTYPE html>
<html>
<head>
<title>PinCode List</title>
	<!-- Boot strap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>
<body>

<table class="table">
  <thead>
    <tr>
      <th scope="col">PinCode</th>
      <th scope="col">Office Name</th>
      <th scope="col">District Name</th>
      <th scope="col">State Name</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($pincodes as $key=>$pincode)
    <tr>
      <td>{{$pincode['pincode']}}</td>
      <td>{{$pincode['office_name']}}</td>
      <td>{{$pincode['district_name']}}</td>
      <td>{{$pincode['state_name ']}}</td>
    </tr>
    @endforeach
    {{ $pincodes->links() }}
  </tbody>
</table>
</body>
</html>