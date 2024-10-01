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
'start_date' => '2021-04-29',
'end_date' => '2021-04-29',
'text' => 'some text 2'
)
);

//$jsonEvents = json_encode($arEvents);
header("Content-Type: application/json");
echo json_encode($arEvents);
?>