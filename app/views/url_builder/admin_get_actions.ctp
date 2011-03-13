<div style="display: none">
    <?php $output = '' ?>
    <script type="text/javascript">
        $(document).ready(function() {
        <?php foreach ($actions as $key => $action) : ?>
        <?php $output.= "<li>" . $this->Html->link($action['label'], "#{$key}", array('id' => "action_{$key}_ancor")) . "</li>" ?>

        $("#action_<?php echo $key ?>_ancor").click(function() {

            <?php if($action['thirdStep']): ?>

                $.ajax({
                    url: "<?php echo $action['thirdStep']['url'] ?>",
                    dataType: 'script',
                    cache: false,

                    beforeSend: function(jqXHR, settings) {
                        Spinner.showRighted();
                    },

                    success: function(data, textStatus, jqXHR) {
                        $("#thirdUrlBuilderBox").fadeOut(400, function() {
                            $("#urlBuilderModelValuesBox").html(data);
                        });
                    },

                    complete: function() {
                        Spinner.hide(function(){
                            $("#thirdUrlBuilderBox").fadeIn(400, function() {
                                $(this).css({
                                    display: 'block'
                                });
                            });
                        });
                    }
                });

            <?php else: ?>
                $("#url_builder_input_field").val("<?php echo Router::url($action['url']) ?>");
                $("#thirdUrlBuilderBox").fadeOut(600);
                UrlBuilder.hide();
            <?php endif ?>
            
            });
        <?php endforeach ?>
        });
    </script>
</div>
<h4><?php __( Inflector::humanize($model) . " actions list") ?>:</h4>
<ul id="avaliableActions" class="urlBuilderList">
    <?php echo $output ?>
</ul>