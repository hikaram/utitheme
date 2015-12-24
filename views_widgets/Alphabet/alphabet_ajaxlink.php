<div class="alphabet" id="alphabet">
    <div class="alphabet-list">
        <? if (in_array('en', $this->showLangs)) : ?>
            <ul class="pagination" style="margin: 5px 0;">
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'A'", $onClick)?>" style="height: 30px"><span>A</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'B'", $onClick)?>" style="height: 30px"><span>B</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'C'", $onClick)?>" style="height: 30px"><span>C</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'D'", $onClick)?>" style="height: 30px"><span>D</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'E'", $onClick)?>" style="height: 30px"><span>E</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'F'", $onClick)?>" style="height: 30px"><span>F</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'G'", $onClick)?>" style="height: 30px"><span>G</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'H'", $onClick)?>" style="height: 30px"><span>H</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'I'", $onClick)?>" style="height: 30px"><span>I</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'J'", $onClick)?>" style="height: 30px"><span>J</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'K'", $onClick)?>" style="height: 30px"><span>K</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'L'", $onClick)?>" style="height: 30px"><span>L</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'M'", $onClick)?>" style="height: 30px"><span>M</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'N'", $onClick)?>" style="height: 30px"><span>N</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'O'", $onClick)?>" style="height: 30px"><span>O</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'P'", $onClick)?>" style="height: 30px"><span>P</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Q'", $onClick)?>" style="height: 30px"><span>Q</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'R'", $onClick)?>" style="height: 30px"><span>R</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'S'", $onClick)?>" style="height: 30px"><span>S</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'T'", $onClick)?>" style="height: 30px"><span>T</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'U'", $onClick)?>" style="height: 30px"><span>U</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'V'", $onClick)?>" style="height: 30px"><span>V</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'W'", $onClick)?>" style="height: 30px"><span>W</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'X'", $onClick)?>" style="height: 30px"><span>X</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Y'", $onClick)?>" style="height: 30px"><span>Y</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Z'", $onClick)?>" style="height: 30px"><span>Z</span></a></li>
            </ul>
        <? endif; ?>
        
        <? if (in_array('ru', $this->showLangs)) : ?>
            <ul class="pagination pagination-sm" style="margin: 5px 0;">
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'А'", $onClick)?>"><span>А</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Б'", $onClick)?>"><span>Б</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'В'", $onClick)?>"><span>В</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Г'", $onClick)?>"><span>Г</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Д'", $onClick)?>"><span>Д</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Е'", $onClick)?>"><span>Е</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ж'", $onClick)?>"><span>Ж</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'З'", $onClick)?>"><span>З</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'И'", $onClick)?>"><span>И</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Й'", $onClick)?>"><span>Й</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'К'", $onClick)?>"><span>К</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Л'", $onClick)?>"><span>Л</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'М'", $onClick)?>"><span>М</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Н'", $onClick)?>"><span>Н</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'О'", $onClick)?>"><span>О</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'П'", $onClick)?>"><span>П</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Р'", $onClick)?>"><span>Р</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'С'", $onClick)?>"><span>С</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Т'", $onClick)?>"><span>Т</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'У'", $onClick)?>"><span>У</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ф'", $onClick)?>"><span>Ф</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Х'", $onClick)?>"><span>Х</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ц'", $onClick)?>"><span>Ц</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ч'", $onClick)?>"><span>Ч</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ш'", $onClick)?>"><span>Ш</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Щ'", $onClick)?>"><span>Щ</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Э'", $onClick)?>"><span>Э</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ю'", $onClick)?>"><span>Ю</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Я'", $onClick)?>"><span>Я</span></a></li>
            </ul>
        <? endif; ?>
        
        <? if (in_array('fi', $this->showLangs)) : ?>
            <ul class="pagination" style="margin: 5px 0;">
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'A'", $onClick)?>"><span>A</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'B'", $onClick)?>"><span>B</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'C'", $onClick)?>"><span>C</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'D'", $onClick)?>"><span>D</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'E'", $onClick)?>"><span>E</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'F'", $onClick)?>"><span>F</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'G'", $onClick)?>"><span>G</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'H'", $onClick)?>"><span>H</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'I'", $onClick)?>"><span>I</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'J'", $onClick)?>"><span>J</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'K'", $onClick)?>"><span>K</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'L'", $onClick)?>"><span>L</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'M'", $onClick)?>"><span>M</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'N'", $onClick)?>"><span>N</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'O'", $onClick)?>"><span>O</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'P'", $onClick)?>"><span>P</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Q'", $onClick)?>"><span>Q</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'R'", $onClick)?>"><span>R</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'S'", $onClick)?>"><span>S</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Š'", $onClick)?>"><span>Š</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'T'", $onClick)?>"><span>T</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'U'", $onClick)?>"><span>U</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'V'", $onClick)?>"><span>V</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'W'", $onClick)?>"><span>W</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'X'", $onClick)?>"><span>X</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Y'", $onClick)?>"><span>Y</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Z'", $onClick)?>"><span>Z</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ž'", $onClick)?>"><span>Ž</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Å'", $onClick)?>"><span>Å</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ä'", $onClick)?>"><span>Ä</span></a></li>
                <li><a href="javascript:void(0)" onClick="<?=str_replace('%%letter%%', "'Ö'", $onClick)?>"><span>Ö</span></a></li>
            </ul>
        <? endif; ?>        
        
        
        
    </div>
</div>
