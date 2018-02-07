<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="www.kerneldev.com">
    <meta name="author" content="sapnesh_naik">

	<title>Laravel Search Autocomplete tutorial</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('starter-template.css')}}" rel="stylesheet">
 	<style>
    	.twitter-typeahead,
    	.tt-hint,
    	.tt-input,
    	.tt-menu{
        	width: auto ! important;
        	font-weight: normal;
        
    	}
 	</style>
  </head>
  <body>

    <div class="container">

      <div class="starter-template" style="align-text:center">
		<h1>Laravel Search Autocomplete</h1>
		<br>
		<input type="text" id="search" placeholder="Type to search users" autocomplete="off" >
	  </div>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Import typeahead.js -->
	<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- Initialize typeahead.js on the input -->
	<script>
    	$(document).ready(function() {
    		var bloodhound = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.whitespace,
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				remote: {
					url: '/user/find?q=%QUERY%',
					wildcard: '%QUERY%'
				},
			});
			
			$('#search').typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			}, {
				name: 'users',
				source: bloodhound,
				display: function(data) {
					return data.name  //Input value to be set when you select a suggestion. 
				},
				templates: {
					empty: [
						'<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
					],
					header: [
						'<div class="list-group search-results-dropdown">'
					],
					suggestion: function(data) {
					return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.name + '</div></div>'
					}
				}
			});
        });
	</script>

  </body>
</html>
