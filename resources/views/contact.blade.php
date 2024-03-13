@extends('layouts.app')

@section('content')
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<div class="slideshow" style="background-image: url({{asset('img/retailoutlet.jpg')}})">
    <h1 class="page-title" style="color: white;">Contact Us</h1>
</div>
<div id="order-online" class="container-fluid dls-block">
    <div class="container">
            <h2 class="block-title">Where We Are</h2>
    </div>
    <iframe style="width: 100%; height: 500px;" id="gmap_canvas" src="https://maps.google.com/maps?q=The%20Central%20Yangon&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    <div class="container">
        <h2 class="block-title">Leave A Message</h2>
        <div class="container">
			<div style="text-align:center">
			    <p>Swing by for a cup of coffee, or leave us a message:</p>
			</div>
			<div class="row">
			    <div class="column">
			      <img src="{{asset('img/aboutus.jpg')}}" style="width:100%">
			    </div>
			    <div class="column form-group">
			      <form action="/action_page.php" class="form">
			      	{{csrf_field()}}
			        <label for="fname">Name</label>
			        <input type="text" id="fname" name="firstname" placeholder="Your Name.." class="form-control">
			        <label for="lname">Email</label>
			        <input type="text" id="lname" name="lastname" placeholder="Your Email.." class="form-control">
			        <label for="subject">Subject</label>
			        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" class="form-control"></textarea>
			        <input type="submit" value="Submit">
			      </form>
			    </div>
			</div>
		</div>
	</div>
</div>

@stop