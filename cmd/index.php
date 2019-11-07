<?php
if (isset($_POST['cmd'])) {
	$cmd1=$_POST["cmd"];
	$radioval=$_REQUEST["myradio"];
	$rn1=$_POST["rename1"];
	$rn2=$_POST["rename2"];
}
?>
<html>
<head>
<title>Shell</title>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="script.js">
	</script>
</head>

<body>
<div class="container" align="center">
<form action="" method="post" class="form-group">
<b>Select File or Folder:</b><br>
<input type="radio" name="myradio" value="file" class="form-check-input" id="materialUnchecked"><b>Rclone File</b><br>
<input type="radio" name="myradio" value="folder" class="form-check-input" id="materialUnchecked"><b>Rclone Folder</b><br>
<input type="radio" name="myradio" value="custom" class="form-check-input" id="materialUnchecked"><b>Custom Command</b><br>
<input type="radio" name="myradio" value="remove" class="form-check-input" id="materialUnchecked"><b>Remove all files from rapidleech</b><br>
<input type="radio" name="myradio" value="rename" class="form-check-input" id="materialUnchecked"><b>Rename a File or Foler</b><br>
<input type="text" class="form-control" name="cmd" placeholder="Enter your folder or file name here" id="enter"><br>
<div clas=="control-group" style="display:none;">
	<label class="control-label" for="rename0" id="rename0"></label>
	<div class="controls" id="rename0">
		<input type="text" class="form-control" name="rename1" placeholder="Original Name"><b> To </b>
		<input type="text" class="form-control" name="rename2" placeholder="Modified Name">
	</div>
	</div>
	<input type="submit" value="Exceute" class="btn btn-primary" name="execute"><br><br>
</form>
	
<?php if($radioval == "file") : ?>
<?php		$cmd=shell_exec("rclone copy /app/files/" .$cmd1. " Telegram:Telegram"); ?>
		<?php if ($cmd) : ?>
		<div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php endif; ?>
		
<?php elseif($radioval == "folder") : ?>
			<?php $cmd=shell_exec("rclone copy /app/files/" .$cmd1. " -L Telegram:Telegram/".$cmd1); ?>
		<?php	if ($cmd) : ?>
		<div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php endif; ?>
<?php elseif($radioval == "custom") : ?>
			<?php $cmd=shell_exec("cd && ".$cmd1); ?>
		<?php	if ($cmd) : ?>
		<div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php endif; ?>
<?php elseif($radioval == "remove") : ?>
			<?php $cmd=shell_exec("cd files && rm -rf *"); ?>
		<?php	if ($cmd) : ?>
		<div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php endif; ?>

<?php elseif($radioval == "rename") : ?>
			<?php $cmd=shell_exec("mv ".$rn1." ".$rn2); ?>
		<?php	if ($cmd) : ?>
		<div class="pb-2 mt-4 mb-2">
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php endif; ?>

<?php elseif (!$cmd && $_SERVER['REQUEST_METHOD'] == 'POST') : 
		{
			echo "Error kindly contact @hackedyouagain";
		}
?>
<?php endif; ?>
</div>
</body>
</html>
