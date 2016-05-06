<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/favicon.ico') }}">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/sticky-footer-navbar.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- CUSTOM PAGE CSS -->
    <link
      href="{{ asset('/js/plugins/data-tables/css/jquery.dataTables.min.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Amazon SES</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h3>Users</h3>
      </div>
      <div class="row">
		  @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
		  <div class="col-md-12">
			  <button id="sendmail" type="button" class="btn btn-primary" >Send email</button>
		  </div>
      </div>
      <div class="row table-responsive">
			<div class="col-md-12">			
			  <table id="data-table-simple" class="display" cellspacing="0" width="100%">
				  <thead>
					  <tr>
							<th class="no-sort"><INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" /></th>
						    <th>First Name</th>
							<th>Last Name</th>
							<th>City</th>
							<th>State</th>
							<th>Zip</th>
							<th>Email</th>
					  </tr>
				  </thead>
			   
				  <tfoot>
					  <tr>
						  <th></th>
						  <th>First Name</th>
						  <th>Last Name</th>
						  <th>City</th>
						  <th>State</th>
						  <th>Zip</th>
						  <th>Email</th>
					  </tr>
				  </tfoot>
			   
				  <tbody>
					<tr>
						<td><INPUT class="chk" type="checkbox" name="checkbox[]" value="thota2237@gmail.com"/></td>
						<td>Amara</td>
						<td>Thota</td>
						<td>Rajkot</td>
						<td>Gujarat</td>
						<td>360002</td>
						<td>thota2237@gmail.com</td>
					</tr>
					</tbody>
			  </table>
			</div>
		  </div>
		  
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </footer>
    
    <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<form class="formValidate" action="{!! url('/user-mail') !!}" name="frmUsermail" id="formValidate" method="post" >
					  <div class="form-group">
						<label for="email">To:</label>
						<input type="text" class="form-control" id="emails" name="emails" readonly required>
					  </div>
					  <div class="form-group">
						<label for="pwd">Subject:</label>
						<input type="text" class="form-control" id="subject" name="subject" required>
					  </div>
					  <div class="form-group">
						<label for="pwd">Body will be taken from blad templete file : amazon-ses/resources/views/emails/reminder.blade.php </label>
					  </div>
					  <div class="form-group">
						<label for="pwd">Attachment:</label>
						Attachment will be takes from : amazon-ses/public/upload, attached file is : Running_Horses_.jpg
					  </div>
					
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="Send mail">
		  </div>
		  {{ csrf_field() }}
		  </form>
		</div>
	  </div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset("/js/jquery.min.js") }}jquery.min.js"><\/script>')</script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- data-tables -->
	<script type="text/javascript" src="{{ asset('/js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/js/plugins/data-tables/data-tables-script.js')}}"></script>
	<script type="text/javascript">
        function checkAll(ele) {
			 var checkboxes = document.getElementsByTagName('input');
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 $(document).ready(function(){
			$('#data-table-simple').DataTable({
				"columnDefs": [ {
                  "targets": 'no-sort',
                  "orderable": false,
				} ],
				"aaSorting": [[1,'asc']]
			});
            $("#sendmail").on( "click", function() {
                if ($('.chk:checked').length) {
				  var chkId = '';
				  $('.chk:checked').each(function () {
					chkId += $(this).val() + ",";
				  });
				  chkId = chkId.slice(0, -1);
				  $('#emails').val(chkId);
				  $('#myModal').modal('show');
				}
				else {
				  alert('Please select user first');
				}
            });
        });
    </script>
  </body>
</html>
