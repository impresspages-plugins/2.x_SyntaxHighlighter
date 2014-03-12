<pre class="brush: <?php
print esc($syntax);
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
print esc($showLines);
?>"><?php
    print esc($code);
    ?></pre>
<?php if (ipIsManagementState()) { ?>
    <script>
        if (typeof SyntaxHighlighter !== 'undefined'){
            SyntaxHighlighter.highlight();
        }
    </script>
<?php } ?>