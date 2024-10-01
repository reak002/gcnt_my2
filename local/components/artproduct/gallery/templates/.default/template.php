<?php
/**
 * @var $arResult
 */
?>
<div class="gallery">
	<div class="left">
		<div class="img">
			<div class="bg_img" style="background-image: url(<?=$arResult['GALLERY'][0]?>);">
			</div>
            <img alt="img" src="<?=$arResult['GALLERY'][0]?>">
		</div>
	</div>
	<div class="right">
		<div class="slide">
            <div class="other_img_list splide">
                <div class="splide__track">
                    <ul class="splide__list">
						<?foreach($arResult['GALLERY'] as $image):?>
                            <li class="splide__slide">
                                <img src="<?=$image?>" alt="img">
                            </li>
						<?endforeach;?>
                    </ul>
                </div>
            </div>

		</div>
	</div>
</div>
