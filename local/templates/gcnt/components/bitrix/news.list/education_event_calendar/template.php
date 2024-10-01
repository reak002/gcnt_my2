<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$this->addExternalJS("https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js");
$this->addExternalCSS("https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler_material.css");
?>
<div class="sh_wr">
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:900px;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">
            <svg width="35" height="8" viewBox="0 0 35 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.6" d="M0.646446 3.64644C0.451183 3.84171 0.451183 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.73079 4.34027 7.73079 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82842L1.70711 4L4.53553 1.17157C4.7308 0.976308 4.7308 0.659726 4.53553 0.464463C4.34027 0.269201 4.02369 0.269201 3.82843 0.464463L0.646446 3.64644ZM35 3.5L1 3.5L1 4.5L35 4.5L35 3.5Z" fill="#454545"/>
            </svg>
        </div>
        <div class="dhx_cal_next_button">
            <svg width="35" height="8" viewBox="0 0 35 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.6" d="M34.3536 3.64644C34.5488 3.84171 34.5488 4.15829 34.3536 4.35355L31.1716 7.53553C30.9763 7.73079 30.6597 7.73079 30.4645 7.53553C30.2692 7.34027 30.2692 7.02369 30.4645 6.82842L33.2929 4L30.4645 1.17157C30.2692 0.976308 30.2692 0.659726 30.4645 0.464463C30.6597 0.269201 30.9763 0.269201 31.1716 0.464463L34.3536 3.64644ZM-4.37114e-08 3.5L34 3.5L34 4.5L4.37114e-08 4.5L-4.37114e-08 3.5Z" fill="#454545"/>
            </svg>
        </div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_prev_cal_date"></div>
        <div class="dhx_cal_date"></div>
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>
</div>
</div>

<script>
    $(document).ready(function (){
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
        scheduler.attachEvent("onTemplatesReady",function(){
            //here you can place your code that creates a custom view
            // dhx_prev_cal_date
            // var newDate = scheduler.date.add(new Date(2019, 05, 29), 1, 'year');
            // var dateToStr_func = scheduler.date.date_to_str(scheduler.config.month_date);
            // return  dateToStr_func(date);
            console.log(scheduler.templates.month_date);
        });
        scheduler.init('scheduler_here', new Date(), "month");
        scheduler.parse(<?=$arResult["CALENDAR"]?>);
    });
</script>