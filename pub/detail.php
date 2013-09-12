<?php

    if(!file_exists("settings.ini")) {
        printf("No settings file found. Aborting");
        exit ;
    }

    $settings = parse_ini_file("settings.ini");

    // read token to get YAML file name
    $file_name = null ;
    if(array_key_exists("token",$_REQUEST)) {
        $file_name = base64_decode($_REQUEST["token"]);
    }


    if($file_name == null || !file_exists($file_name)) {
        printf("YAML file {%s} for API not found",$file_name);
        exit ;
    }

    // YAML parser
    include('Spyc.php');
    $brand_name = array_key_exists("brand.name",$settings) ? $settings["brand.name"] : ""  ;
    $api_version = array_key_exists("api.version",$settings) ? $settings["api.version"] : "v1.0"  ;

    $data = Spyc::YAMLLoad($file_name);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $data["resource"] ?> </title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">
<style> body {padding-top : 90px; } </style>

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
                <li><a href="index.php"><?php echo $brand_name ?>&nbsp;REST API</a></li>
                <li class="active"> <?php echo $data["resource"] ?> </li>
			</ol>
		</div>
		
	</div> <!--  breadcrumbs  -->
	
	<div class="row">
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-11">
			<div class="page-header">
            <h1><?php echo $data["resource"] ?></h1>
				<p>
                <span class="label label-info">API version <?php echo $data["version"] ?></span>
				</p>
			</div>
		</div>
	</div>
	
	
	

	<div class="row">
		<div class="col-lg-1">&nbsp;</div>
		<div class="col-lg-8">
            <p> <?php echo $data["description"] ?>
			<div class="panel">
				<div class="panel-heading">
					<h4>Resource URL</h4>
				</div>
				<div class="panel-body" class="para">
                    <p><?php echo $data["resource_url"] ?> </p>
				</div>

			</div>
            
	        <div class="panel">
				<div class="panel-heading">
					<h4>Parameters</h4>
				</div>
                <table class="table">
                <tr>
                   <th>Parameter</th><th>Description</th><th>Optional</th><th>Default</th>
                </tr>
                    <tbody>
                        <?php foreach($data["parameters"] as $param) { ?>
                        <tr>
                            <td><b><?php echo $param["name"] ?> </b></td>
                            <td><?php echo $param["description"] ; ?>  </td>
                            <td><?php if ($param["optional"]) { echo "True" ; } ?></td>
                            <td><?php if ($param["default"]) { echo $param["default"] ; } ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


			<h3>Example</h3>

			<table class="table">
				<tbody>
					<tr>
                        <td><?php echo $data["method"] ?> </td>
                        <td><?php echo $data["sample_url"] ?> </td>
					</tr>
				</tbody>
			</table>

            <div>
                <h4> Request </h4>
                <pre> <code> <?php echo $data["sample_request"] ?> </code> </pre>
            </div>

			<div>
                <h4> Response </h4>
				<pre> <code> <?php echo $data["sample_response"] ?> </code> </pre>
            </div>
            <div>
                <h4> Error Response </h4>
                <pre> <code> <?php echo $data["sample_error"] ?> </code> </pre>
            </div>
           
        </div> <!-- col-8 -->

        <div class="col-lg-2">
			<h3>Resource Information</h3>
			<table class="table">

				<tbody>
					<tr>
						<td><b>Rate Limited</b></td>
                        <td><?php if ($data["rate_limited"]) { echo "True" ;} else { echo "False" ;} ?></td>
					</tr>
					<tr>
						<td><b>Response Format</b></td>
                        <td><?php echo $data["response_format"]?> </td>
					</tr>
					<tr>
						<td><b>Authentication</b></td>
                        <td><?php echo $data["authentication"]?> </td>
					</tr>

				</tbody>
			</table>
		</div> <!-- col:2 -->
	</div>

</body>
</html>
