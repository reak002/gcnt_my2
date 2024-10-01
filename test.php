<?php

/**
 * @var $id
 * @var $start_date
 * @var $end_date
 * @var $text
 */

$arEvents = array(
	array(
		'id' => 1,
		'start_date' => '2021-04-27',
		'end_date' => '2021-04-27',
		'text' => 'some text'
	),
	array(
		'id' => 2,
		'start_date' => '2021-04-29 13:00',
		'end_date' => '2021-04-29 15:00',
		'text' => 'some text 2 <a href="/afisha/">link</a>'
	)
);

$jsonEvents = json_encode($arEvents);

?>

<!doctype html>
<html>
<head>
	<title> Getting started with dhtmlxScheduler</title>
	<meta charset="utf-8">
	<script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
	<link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler_material.css"
		  rel="stylesheet" type="text/css" charset="utf-8">
	<style>
        html, body{
            margin:0px;
            padding:0px;
            height:100%;
            overflow:hidden;
        }

        tr td:nth-child(6),
        tr td:nth-child(7){
            width: 5%;
        }
        tr td.dhx_after:nth-child(6) div,
        tr td.dhx_after:nth-child(7) div,
        tr td:nth-child(6) div,
        tr td:nth-child(7) div{
            background: rgba(177, 29, 72, 0.1)
        }


	</style>
</head>
<body>
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
	<div class="dhx_cal_navline">
		<div class="dhx_cal_prev_button">&nbsp;</div>
		<div class="dhx_cal_next_button">&nbsp;</div>
		<div class="dhx_cal_today_button"></div>
		<div class="dhx_cal_date"></div>
<!--		<div class="dhx_cal_tab" name="day_tab"></div>-->
<!--		<div class="dhx_cal_tab" name="week_tab"></div>-->
<!--		<div class="dhx_cal_tab" name="month_tab"></div>-->
	</div>
	<div class="dhx_cal_header"></div>
	<div class="dhx_cal_data"></div>
</div>
<script>



    scheduler.locale = {
        date: {
            month_full: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
            month_short: ["Янв.", "Фев.", "Мар.", "Апр.", "Май", "Июн.",
                "Июл.", "Авг.", "Сен.", "Окт.", "Ноя.", "Дек."],
            day_full: ["Восресенье", "Понедельник", "Вторник", "Среда", "Четверг",
                "Пятница", "Суббота"],
            day_short: ["Вс.", "Пн.", "Вт.", "Ср.", "Чт.", "Пт.", "Сб."]
        },
        labels: {
            dhx_cal_today_button:"Текущий",
        }
    }
    scheduler.init('scheduler_here', new Date(2021,3,29), "month");
    scheduler.parse(<?=$jsonEvents?>);
</script>
</body>
</html>