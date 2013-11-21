<?php
if (!defined('CMS')) exit; //restrict direct access to file
?>
<label>Syntax:</label>
<select class="ipMode">
    <?php

        foreach ($syntaxes as $syntaxId=>$syntaxValue){

               ?>
            <option value="<?php echo $syntaxId;?>"<?php

            if ($mode==$syntaxId){
            ?>selected<?php
            }
            ?>>
                <?php
                echo $syntaxValue;
                ?>
            </option>

    <?php
        }
    ?>
</select>

    <label>Highlight row:</label>
<select class="hlLine">
    <option value="0">None</option>
<?php
    for ($line = 1; $line<50; $line++){
        ?><option value="<?php
            echo $line; ?>"><?php
            echo $line;
        ?></option>
        <?php
    }
?>
</select>
    <button class="ipHlRowButton" type="button">Current row</button>
<label>Show line numbers</label><input type="checkbox" class="showLines">

<textarea class="ipCode"><?php
    print $this->esc($code);
    ?></textarea>