<?php
$m = [
    'JANVIER',
    'FEVRIER',
    'MARS',
    'AVRIL',
    'MAI',
    'JUIN',
    'JUILLET',
    'AOUT',
    'SEPTEMBRE',
    'OCTOBRE',
    'NOVEMBRE',
    'DECEMBRE'
];
$d = [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche',
];

$month = $date->month;
$monthL = $m[$date->month - 1];
$day = $date->day;
$dayL = $d[$date->i18nFormat('e') - 1]; // @see http://www.icu-project.org/apiref/icu4c/classSimpleDateFormat.html#details

?>
<div class="calendar-one" title="<?= $date->i18nFormat('dd/MM/yyy HH:mm') ?>" <?php if(isset($onclick) && !empty($onclick)) echo 'onclick="location.href=\'' . $onclick . '\';"' ?>>
    <div class="calendar-block">
        <div class="calendar-month"><?= $monthL ?></div>
        <div class="calendar-day">
            <div class="calendar-day-numeral"><?= $day ?></div>
            <div class="calendar-day-literal"><?= $dayL ?></div>
        </div>
    </div>
    <?php if(!isset($time) || $time === true): ?>
    <div class="calendar-time">
        <span class="calendar-hour"><?= $date->hour ?><span> : <span class="calendar-hour"><?= $date->minute ?></span>
    </div>
    <?php endif; ?>
</div>
