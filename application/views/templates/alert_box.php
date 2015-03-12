<? if($alert['exists']): ?>
<div class="alert alert-<?=$alert['type']?> alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?=$alert['message']?>

</div>
<? endif; ?>