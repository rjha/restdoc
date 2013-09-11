<?php
    
    if(!file_exists("settings.ini")) {
        printf("No settings file found. Aborting");
        exit ;
    }

    $settings = parse_ini_file("settings.ini");

    if(!array_key_exists("yaml.index",$settings)) {
        printf("{yaml.index} key is not defined in settings. Aborting");
        exit ;
    }

    $index_yaml = $settings["yaml.index"];

    if(!file_exists($index_yaml)) {
        printf("index YAML file {%s} Not Found",$index_yaml);
        exit;
    }

    // YAML parser
    include('Spyc.php');
    $brand_name = array_key_exists("brand.name",$settings) ? $settings["brand.name"] : ""  ;
    $api_version = array_key_exists("api.version",$settings) ? $settings["api.version"] : "v1.0"  ;
    $detail_url = "detail.php?token=" ;
    $data = Spyc::YAMLLoad($index_yaml);

?>


<!doctype html>
<html>
<head>

<meta charset="UTF-8">
<title><?php echo $brand_name ?> REST API Documentation</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">
<style> body {padding-top :90px; } </style>           


</head>


<body>
	<div class="row">
		<div class="col-lg-offset-1 col-lg-11">
			<nav class="navbar navbar-top" role="navigation">
        	<!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex5-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
              <a class="navbar-brand" href="/"><?php echo $brand_name ?></a>
	        </div>

       
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
          </ul>
        </nav>
		</div>
	</div> <!-- top toolbar  -->
	
	
	<div class="row">
		<div class="col-lg-offset-1 col-lg-8">
			<ol class="breadcrumb">
				<li><a href="/">Home</a></li>
                <li class="active"><?php echo $brand_name ?> Rest API</li>
			</ol>
		</div>
		
	</div> <!--  breadcrumbs  -->
	
	<div class="row">
		<div class="col-lg-offset-1 col-lg-11">
			<div class="page-header">
            <h1><?php echo $brand_name ?> Rest API</h1>
			</div>
	 	
	 	</div>
	</div>
	
	
	<div class="row">
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-8">
			<table class="table table-hover">
					<thead>
						<tr>
						<th>Resource</th>
						<th>Description</th>
						</tr>
					
					</thead>
										
					<tbody>
                        <?php foreach($data as $api ) {  
                            $token = "#" ;
                            if(array_key_exists("file_name",$api)){ $token = base64_encode($api["file_name"]); }
                            $api_url = $detail_url.$token ; ?>
						<tr>
                            <td><a href="<?php echo $api_url?>"><b><?php echo $api["name"] ?> </b></a></td>
                            <td><?php echo $api["description"] ?> </td> 
						</tr>

                        <?php } ?> 
					</tbody>
				
				</table>
		</div>
		<div class="col-lg-2"> 
			<!-- sidebar --> &nbsp;
		</div>
	</div>
	
</body>
</html>
