<?php

foreach($model->attributeDescriptions() as $field => $desc){
?>
    <div class="alert alert-success extInputInfo" role="alert" id="<?= $field ?>_inputInfo">
        <p><?= $desc ?></p>
    </div>
<?php 
}

//Hide all and show them only when the input field is active
//the first info field is always shown by default until the user specifically selects something
$this->registerJs(
        "$('.extInputInfo').slice(1).hide(); "
);

//However, show 

//Show only the information pertaining to the currently active input field
foreach($model->attributeDescriptions() as $field => $desc){
    $inputFieldId = $formId.'-'.$field;
    $infoFieldId  = $field.'_inputInfo';
    $this->registerJs(
            "$('#$inputFieldId').focusin(function(evt){ $('#$infoFieldId').show();});
             $('#$inputFieldId').focusout(function(evt){ $('#$infoFieldId').hide();});  
            ");
}

