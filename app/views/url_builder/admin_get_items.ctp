<div style="display: none">

    <?php $output = '' ?>
    
    <script type="text/javascript">

        $(document).ready(function() {

        <?php foreach ($items as $key => $item) : ?>
        <?php $output.= "<li>" . $this->Html->link($item, "#{$key}", array('id' => "item_{$key}_ancor")) . "</li>" ?>

            $("#item_<?php echo $key ?>_ancor").click(function() {
                    
                    $("#url_builder_input_field").val("<?php echo Router::url(array('controller' => Inflector::pluralize($model), 'action' => 'view', $key, 'admin' => false)) ?>");
                    
                    UrlBuilder.hide();
                    
            });

        <?php endforeach ?>

        });

    </script>

</div>

<h4><?php __( Inflector::humanize($model) . " items") ?>:</h4>
<ul id="avaliableActions" class="urlBuilderList">
    <?php echo $output ?>
</ul>