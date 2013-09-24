<?
  $temperatura = `cat /tmp/pachube*.out|grep Temp_2880AA9A30064|cut -d, -f2`;
?>

<a href="#" class="span2 btn btn-primary btn-lg">Temperatura Placas<br><?=$temperatura?></a>

