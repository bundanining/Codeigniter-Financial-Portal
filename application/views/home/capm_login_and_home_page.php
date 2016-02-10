<?php  if($this->session->userdata('CAPM_USER')) {    ?>
<!-- main page -->
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
		<meta name="keywords"    content="Bootstrap Tutorial"/>
		<meta name="description" content="Custom template making with bootstrap framework."/>	  
		<meta name="author"      content="Samer Sarker Khokon. 01719347580"/>	  
	  
		<?php $this->load->view('utility');?>
		
		
	  <title>IP: <?php echo $_SERVER['REMOTE_ADDR'];?></title>
	</head>
<body>   
	
	<div class="well">	
		<table width="100%">	
			<tr>
				<td width="35%"><img src="<?php echo base_url();?>img/iPortal.png"/></td>
				<td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="btn btn-primary" value="Login"/>
				<input type="button" class="btn btn-primary" value="Register"/>
				&nbsp;&nbsp;&nbsp;&nbsp;				
				</td>				
				<td width="35%"><img src="<?php echo base_url();?>img/Pic1.png"/></td>
			</tr>
		</table>
		
			<span class="glyphicon glyphicon-home"></span><a href="javascript:void(0);">Home</a>
			<span class="glyphicon glyphicon-user"></span>Online: <?php echo $this->session->userdata("CAPM_USER");?> &nbsp;
			<a href="<?php echo site_url();?>/mains/logout/" ><span class="glyphicon glyphicon-off"></span>Logout</a>

			<?php $this->load->view("home/capm_megamenu"); ?>
			<!-- end megamenu -->			
	</div>	
	
	<div class="container"> 
	    <div class="row">
		    <div class="col-md-12">
			    <marquee loop="-1">stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here</marquee>
			</div>
		</div>
	    <div class="row">
	        <div class="col-md-3">
		      <!-- left menu -->
			  <?php $this->load->view("home/todays_market_left_menu");?>
			</div>			
			
			<div class="col-md-9">	
			    <table width="100%">
				<tr><td>
                <?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
				</td></tr>
				<tr>
					<td>
						<div id="user_list_table"></div>				
					</td>
				</tr>
				</table>
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){
	    $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
	
	});
	</script>
	
</body>
</html>



<?php }else{?>

<!DOCTYPE html>
<html>
	<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
	  <meta name="keywords"    content="Bootstrap Tutorial"/>
	  <meta name="description" content="Custom template making with bootstrap framework."/>	  
	  <meta name="author"      content="Samer Sarker Khokon. 01719347580"/>	  
	   
	  <?php $this->load->view('utility');?>
		
	
	</head>
<body style="background:#efefef;">
    
	
	<br/><br/><br/>
	
	<div class="container">
	 
	  <div class="row">	    
	    <div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
		
		  <div class="panel panel-primary" id="headings">
            <div class="panel-heading">Iportal Sign In</div>
			<br/>
		    <table style="width:300px;margin-left:50px;" align="center">			
			<!-- <form style="width:400px;">-->
				<tr>
				<td><div class="form-group">
				  <label for="username">Username</label>
				  <input type="text" class="form-control" style="width:200px;" id="username" />
				</div>
				</td></tr>
				<tr><td>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control"  style="width:200px;" id="password"/>
				</div>
				</td></tr>
				<tr><td>
				<button type="button" class="btn btn-primary" id="signin">Login</button>
				&nbsp;<button type="button" class="btn btn-primary" id="signin_cancel">Cancel</button>
			    </td></tr>
				</table>
			<!-- </form>-->
			<br/>
		  </div>	
			
		</div> 
		<div class="col-md-4">&nbsp;</div>
		
		
	  </div>	   
	</div>
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	
	<script type="text/javascript">
		$(document).ready(function(){
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
			$("#username").focus();
			$("#username").keypress(function(ex){
			  var username = $("#username").val();
			  if(ex.which == 13){
			   if(username==""){
				  alert("Enter Username");
					$("#username").focus();
					return false;
			   }else{
			     $("#password").focus(); 
			   }
			  }
			});
			
			$("#password").keypress(function(ex){
			  var password = $("#password").val();
			  if(ex.which == 13){
			   if(password==""){
				  alert("Enter Password");
					$("#password").focus();
					return false;
			   }else{
			     $("#signin").focus(); 
			   }
			  }
			});			
			
			$("#signin").click(function(){
			   var username = $("#username").val();
			   var password = $("#password").val();
			   if(username==""){
					alert("Enter Username");
					$("#username").focus();
					return false;
				}else if(password==""){
					alert("Enter Password");
					$("#password").focus();
					return false;
				}else{
				   $.ajax({
					  type:"post",
					  url:"<?php echo site_url();?>/mains/capm_login_check",
					  data:"username="+username+"&password="+password,
					  cache:false,
					  success:function(st)
					  {
					    //alert(st);
					    if( st == 1){
							location.reload();
								//alert(st);
						}
						else
						{
						
						  alert("Please check your username or password");
						  
						  $("#username").val("");
						  $("#password").val("");
						  $("#username").focus();
						}
					  }					  
					});
				}
			});
			
			$("#signin_cancel").click(function(){
				$("#username").val("");
				$("#password").val("");
				$("#username").focus();
			});
		});
	</script>	
</body>
</html>	     
<?php }?>