<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title; ?></title>

<?php $this->load->view('head_resources'); ?>


</head>
<body>
<?php $this->load->view('navbar'); echo "\n"; ?>

<div id="content" class="container">

<?php echo $alert; ?>

<?php echo $contents; ?>

<?php $this->load->view('footer'); echo "\n"; ?>

</div>

</body>
</html>