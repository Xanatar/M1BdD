<?php
$this->assign('title', 'Informations');
$this->Html->script('http://maps.googleapis.com/maps/api/js', ['block' => 'script']);
$this->Html->scriptBlock('function initialize() {
  var myLatLng = new google.maps.LatLng(' . $data['contact']['geoposition'] . ');
  var mapProp = {
    center:myLatLng,
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: "C\'est ici qu\'on est !"
  });
}
google.maps.event.addDomListener(window, \'load\', initialize);', ['block' => 'script']);
?>
<article class="main-content">
    <h3>Gérants</h3>
    <ul>
        <?php foreach ($data['authors'] as $author): ?>
            <li><?= $author ?></li>
        <?php endforeach; ?>
    </ul>
    <h3>Contacts</h3>
    <strong>Téléphone : </strong><a href="tel:<?= $data['contact']['telephone'] ?>"><?= $data['contact']['telephone'] ?></a>
    <br>
    <strong>Mail : </strong><a href="mailto:<?= $data['contact']['email'] ?>"><?= $data['contact']['email'] ?></a>
    <br>
    <strong>Adresse : </strong><?= $data['contact']['address'] ?>
    <div id="googleMap" style="width:500px;height:380px;"></div>
</article>
