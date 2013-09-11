<?
  $temperatura = `cat /tmp/pachube*.out|grep Temp_28F8C8A9300F|cut -d, -f2`;
?>

<a href="#" class="boton">Temperatura Placas<br><?=$temperatura?></a>

