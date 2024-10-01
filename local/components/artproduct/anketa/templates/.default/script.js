$(document).ready(function (){
    let body = $('body');
    body.on('focus','input[type="date"]',function (){
        $(this).attr('data-date-fill','no_empty');
    });
    body.on('focusout','input[type="date"]',function (){
        if($(this).val().length < 1){
            $(this).attr('data-date-fill','empty');
        }
    });
    body.on('click','.btn.btn_next', function (){
        let $current = $(this).closest('.form');
        let $current_id = parseInt( $current.attr('data-form-pos'));
        if($current.attr('data-form-visible') === 'true'){
            let nex_id = $current_id+1;
            let $all_ct = +$('.forms_list').attr('data-all-ct-form');
            if(nex_id <= $all_ct){
                if(is_valid_form($current)) {
                    let $next = $('[data-form-pos="' + nex_id + '"]');
                    $current.attr('data-form-visible', 'false');
                    $next.attr('data-form-visible', 'true');
                }
            }else if(nex_id == $all_ct+1){
                if(is_valid_form($current)) {
                    $('[name="personal_anketa"]').submit();
                }
            }
        }

    });
    body.on('click','.btn.btn_pre', function (){
        let $current = $(this).closest('.form');
        let $current_id = parseInt( $current.attr('data-form-pos'));
        if($current.attr('data-form-visible') === 'true'){
            let prev_id = $current_id-1;
            if(prev_id > 0){
                let $next = $('[data-form-pos="'+prev_id+'"]');
                $current.attr('data-form-visible','false');
                $next.attr('data-form-visible','true');
            }
        }
    });
    body.on('click','[name="G_12__PERSSTATUS[]"]',function (){
        $('[data-type-input="PERSSTATUS"]').prop('disabled', true);
        let place = $(this).attr('data-persstatus-place');
        $('#'+place).prop('disabled', false);
    });
})

function is_valid_form(form){
    let all_valid = true;
    let input_list = $(form).find('input, select');

    input_list.each(function() {
        if(!$(this)[0].checkValidity()){
            $(this)[0].reportValidity();
            all_valid = false;
            return false;
        }
    });
    return all_valid;

}

