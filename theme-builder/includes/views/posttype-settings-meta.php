<div class="yotta-meta-section">
    
    <div class="section-block">
        <label for="yotta_template_type"><?php echo esc_html__('Type of Template', 'yottahead_')?></label>
        <?php if( !empty($type) ){
            ?>
            <select name="drdtdata[type]" id="yotta_template_type">
            <?php
            foreach($type as $k=>$v):
                $selected = selected( ($data['type']) ?? '', $k, 'selected');
                ?>
                    <option value="<?php echo esc_attr($k);?>" <?php echo esc_attr($selected);?> >
                <?php
                echo esc_html($v);
                ?>
                </option>
                <?php
            endforeach;
            ?>
            </select>
            <?php
        }?>
    </div>

    <div class="section-block display-settings">
        <label for="yotta_template_display"><?php echo esc_html__('Disply on', 'yottahead_')?></label>
        <?php if( !empty($display) ){
            ?>
            <select name="drdtdata[display][]" id="yotta_template_display" multiple>
            <?php
            $selected = '';
            foreach($display as $k=>$v):
                if( is_array($v) && !empty($v) ){
                    $title = ($v['title']) ??  ucfirst( str_replace(['_', '-'], ' ', $k) ) ;
                    ?>
                    <optgroup label="<?php echo esc_attr($title);?>">
                    <?php
                    $options = ($v['options']) ?? [];
                    foreach( $options as $kd=>$d){
                        $selected = in_array($kd, ($data['display']) ?? []) ? 'selected' : '';
                        ?>
                        <option value="<?php echo esc_attr($kd)?>" <?php echo esc_attr($selected); ?>>
                        <?php
                        echo esc_html($d);
                        ?>
                       </option>
                    <?php
                    }
                    ?>
                   </optgroup>
                    <?php
                } else {
                    $selected = in_array($k, ($data['display']) ?? []) ? 'selected' : '';
                    ?>
                    <option value="<?php echo esc_attr($k);?>" <?php echo esc_attr($selected); ?>>
                    <?php
                    echo esc_html($v);
                    ?>
                    </option>
                    <?php
                }
            endforeach;
            ?>
            </select>
            <?php
        }?>
    </div>
    <div class="active-404-page">
        <?php  $get_currnt_value = get_post_meta($post->ID, 'is_themeim_404_active', true); ?>


        <div class="themeim-error"></div>
        
        <div class="switch switch--horizontal ">
        <input data-post-id = <?php echo esc_attr($post->ID); ?> id="radio-a" type="radio" name="is_themeim_404_active" value="no" <?php checked( $get_currnt_value, 'no' ); ?> class="is-active-404"/>
        <label for="radio-a">Off</label>
        <input data-post-id = <?php echo esc_attr($post->ID); ?> id="radio-b" type="radio" name="is_themeim_404_active" value="yes" <?php checked( $get_currnt_value, 'yes' ); ?> class="is-active-404"/>
        <label for="radio-b">On</label><span class="toggle-outside"><span class="toggle-inside"></span></span>
        </div>
        <small>This this template as 404 page</small>
    </div>
</div>

<?php 