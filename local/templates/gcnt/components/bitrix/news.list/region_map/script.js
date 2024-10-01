$(document).ready(function (){
   $('body').on('mouseleave','.region_map',function (){
       $('.popup_map').hide();
       $('.region_map > svg > path').attr('data-hovered','false');
   });
   $('body').on('hover','.region_map > svg > path',function (){
       $('.region_map > svg > path').attr('data-hovered','false');
       $(this).attr('data-hovered','true');
       let relativeY = $(this).offset().top - $(".region_map").offset().top;
       let relativeX = $(this).offset().left - $(".region_map").offset().left;

       let element = document.getElementById($(this).attr('id')).getBBox();
       let element_width = element.width;
       let element_height = element.height;

       let element_half_width = parseFloat(element_width) /2;
       let element_half_height = parseFloat(element_height) /2;

       let point_position_x = parseFloat(relativeX) + element_half_width - 75 ;
       let point_position_y = parseFloat(relativeY) + element_half_height - 65 ;

       point_position_x += 'px';
       point_position_y += 'px';

       let name = $(this).attr('data-name');
       let kdu = $(this).attr('data-kdu-value');
       let ctrk = $(this).attr('data-ctrk-value');
       $('.popup_map').show().css('top',point_position_y).css('left',point_position_x);
       $('.popup_map .name').html(name);
       $('.popup_map .link_block a.kdu').attr('href',kdu);
       $('.popup_map .link_block a.ctrk').attr('href',ctrk);
   })
});