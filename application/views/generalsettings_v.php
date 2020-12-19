<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mohamed Syam">

    <title>Control Panel | <?php echo $userdata[0]['s_name'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <script src="<?php echo base_url();?>js/jquery.min.js.download"></script>

    <script src="<?php echo base_url();?>js/0a3b9034e109d88d72f83c9e6c9d13b7.js.download"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-select.min.css" />
	<style>
	.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}










.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('nav_v.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">General Settings</h1>
						<?php echo validation_errors(); ?>
						<div class="panel panel-default">
					  <div class="panel-heading">System Settings</div>
					  <div class="panel-body">
					  <?php echo form_open('GeneralSettings/save');?>
					  <label  class="col-lg-2">Company Name</label>
					<div class="col-lg-3">
					  <input type="text" class="form-control" value="<?php echo $c_data[0]['s_name'];?>" name="name">
					  
					</div>
					<br>
					<br>
					<br>
					  
					<label  class="col-lg-2">System TimeZone</label>
					<div class="col-lg-3">
					  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="timezone"  >
                        <?php
                        
                            echo '<option disabled selected></option>';
                            foreach ($time as $u):?>
                               <option <?php if($u->t_id==$c_data[0]['s_timezone_id']){echo "selected";}?>  value ="<?php echo $u->t_id;?>"><?php echo $u->t_name;?></option>
                         <?php   endforeach;?>
                       
                        
						
                    </select>
					</div>
					<br>
					<br>
					<br>
				
					  <div class="col-lg-3">
					  <button type="submit" class="btn btn-primary">Save</button>
					  
					</div>
					<?php echo form_close();?>
					  </div>
					</div>
					
					<?php if(!empty($error)): ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $error; ?>
                </div>
            <?php endif;?>
					<div class="panel panel-default">
			  <div class="panel-heading">Logo</div>
			  <div class="panel-body">
			  
			  
			  
			  
			  			<div class="col-md-4"> 
			
			
			<?php if(!empty($c_data[0]['s_logo'])):?>
			
			<img src="<?php echo base_url().'/images/'.$c_data[0]['s_logo'];?>" class="img-thumbnail"   width="150"/>
			<br><br>
			<?php endif;?>
			
			<?php echo form_open_multipart('GeneralSettings/update');?>

            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
			<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
			<span class="input-group-btn">
				<!-- image-preview-clear button -->
				<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
					<span class="glyphicon glyphicon-remove"></span> Clear
				</button>
				<!-- image-preview-input -->
				<div class="btn btn-default image-preview-input">
					<span class="glyphicon glyphicon-folder-open"></span>
					<span class="image-preview-input-title">Browse</span>
					<input type="file" accept="image/png, image/jpeg, image/jpg"  height="300" width="300" name="userfile"/> <!-- rename it -->
				</div><button class="btn btn-primary "><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Update</button>
				<?php if(!empty($c_data[0]['s_logo'])):?>
				
				<button class="btn btn-danger " formaction="GeneralSettings/remove"><span class="glyphicon glyphicon-minus-sign"  aria-hidden="true"></span> Remove</button>
				<?php endif;?>
				</span>
				
				</div>
				
			
		
			
			<?php form_close();?>
		
    </div>
			  
			  
			  
			  </div>
			</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	
	<script>
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>

<script src="<?php echo base_url();?>js/bootstrap-select.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>js/startmin.js"></script>
</body>

</html>
