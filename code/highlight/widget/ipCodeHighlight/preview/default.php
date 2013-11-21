<?php
if (!defined('CMS')) exit; //restrict direct access to file
?>
<pre class="brush: <?php
print $this->esc($syntax);
?>,
    auto-links: false,
    toolbar: false,
    html-script: false,<?php
    if (intval($hlLine)>0){
        ?>highlight: <?php
        echo $hlLine;
        ?>,
        <?php
    }
?>
    gutter: <?php
print $this->esc($showLines);
?>"><?php
    print $this->esc($code);
    ?></pre>
<?php if ($site->managementState()) { ?>
    <script>
        if (typeof SyntaxHighlighter !== 'undefined'){
            SyntaxHighlighter.highlight();
        }
    </script>
<?php } ?>