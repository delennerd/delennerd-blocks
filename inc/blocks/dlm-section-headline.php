<?php
/**
 * Section Headline
 *
 * @package DelennerdBlocks
 * @author  Pascal Lehnert <mail@delennerd.de>
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'dlm_blocks_section_headline');

/**
 * Add custom Gutenberg blocks
 */
function dlm_blocks_section_headline()
{
    Block::make( __('Dlm BS Buttons') )
        ->set_category( 'delennerd-theme', __('Delennerd Theme'), 'smiley' )
        ->set_keywords( [ __('headline'), __('image'), __('content') ] )
        ->set_mode( 'both' )
        ->add_tab(
            'Content',
            array(
                Field::make( 'text', 'title', __('Section Title') ),
                Field::make( 'text', 'subtitle', __('Section Subtitle') ),
            ) 
        )
        ->add_tab(
            'Styling',
            array(
                Field::make( 'select', 'headline_alignment', __( 'Alignment' ) )
                    ->set_width( 50 )
                    ->set_default_value( 'left' )
                    ->add_options( array(
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                    ) ),

                Field::make( 'separator', 'separator_style_title', 'Title' ),
                Field::make( 'textarea', 'title_css', __( 'Title custom CSS' ) )
                    ->set_rows( 3 ),
                Field::make( 'select', 'title_html_tag', __( 'HTML Tag' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'h3' )
                    ->add_options( array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                    ) ),
                Field::make( 'select', 'title_font_size', __( 'Font size' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'normal' )
                    ->add_options( array(
                        'inherit'  => __( 'Headline Tag' ),
                        'normal'  => __( 'Normal' ),
                        'big'  => __( 'Big' ),
                        'bigger'  => __( 'Bigger' ),
                    ) ),
                Field::make( 'select', 'title_color', __( 'Color' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'inherit' )
                    ->add_options( array(
                        'inherit'  => __( 'Default' ),
                        'primary'  => __( 'Primary' ),
                        'secondary'  => __( 'Secondary' ),
                        'thirdy'  => __( 'Thirdy' ),
                        'black'  => __( 'Black' ),
                        'white'  => __( 'White' ),
                        'light-grey'  => __( 'Light Grey' ),
                        'custom1'  => __( 'Custom 1' ),
                        'custom2'  => __( 'Custom 2' ),
                    ) ),

                Field::make( 'separator', 'separator_style_subtitle', 'Subtitle' ),
                Field::make( 'textarea', 'subtitle_css', __( 'Subtitle custom CSS' ) )
                    ->set_rows( 3 ),
                Field::make( 'checkbox', 'subtitle_display', __( 'Display Subtitle' ) )
                    ->set_width( 30 )
                    ->set_default_value( true ),
                Field::make( 'select', 'subtitle_position', __( 'Subtitle Position' ) )
                    ->set_width( 70 )
                    ->add_options( array(
                        'top' => __( 'Above title' ),
                        'bottom' => __( 'Under title' ),
                    ) ),
                Field::make( 'select', 'subtitle_html_tag', __( 'HTML Tag' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'h5' )
                    ->add_options( array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                    ) ),
                Field::make( 'select', 'subtitle_font_size', __( 'Font size' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'normal' )
                    ->add_options( array(
                        'inherit'  => __( 'Headline Tag' ),
                        'normal'  => __( 'Normal' ),
                        'big'  => __( 'Big' ),
                        'bigger'  => __( 'Bigger' ),
                    ) ),
                Field::make( 'select', 'subtitle_color', __( 'Color' ) )
                    ->set_width( 100/3 )
                    ->set_default_value( 'inherti' )
                    ->add_options( array(
                        'inherit'  => __( 'Default' ),
                        'primary'  => __( 'Primary' ),
                        'secondary'  => __( 'Secondary' ),
                        'thirdy'  => __( 'Thirdy' ),
                        'black'  => __( 'Black' ),
                        'white'  => __( 'White' ),
                        'light-grey'  => __( 'Light Grey' ),
                        'custom1'  => __( 'Custom 1' ),
                        'custom2'  => __( 'Custom 2' ),
                    ) ),
                Field::make( 'checkbox', 'subtitle_show_border', __( 'Show Border' ) )
                    ->set_width( 20 )
                    ->set_default_value( false ),
                Field::make( 'select', 'subtitle_border_color', __( 'Border Color' ) )
                    ->set_width( 40 )
                    ->set_default_value( 'inherit' )
                    ->add_options( array(
                        'inherit'  => __( 'Default' ),
                        'primary'  => __( 'Primary' ),
                        'secondary'  => __( 'Secondary' ),
                        'thirdy'  => __( 'Thirdy' ),
                        'black'  => __( 'Black' ),
                        'white'  => __( 'White' ),
                        'light-grey'  => __( 'Light Grey' ),
                        'custom1'  => __( 'Custom 1' ),
                        'custom2'  => __( 'Custom 2' ),
                    ) ),
                Field::make( 'select', 'subtitle_border_width', __( 'Border Width' ) )
                    ->set_width( 40 )
                    ->set_default_value( 'inherti' )
                    ->add_options( array(
                        'fullwidth'  => __( 'Full width' ),
                        'maxwidth1'  => __( 'With Max-Width 1' ),
                        'maxwidth2'  => __( 'With Max-Width 2' ),
                    ) ),
            )
        )
        ->set_render_callback(
            function ( $fields, $attributes, $inner_blocks ) {
                $title = $fields['title'] ?: '';
                $subtitle = $fields['subtitle'] ?: '';
            
                $headlineClasses = array(
                    'section-headline'
                );

                $titleClasses = array(
                    'section-headline__title'
                );

                $subtitleClasses = array(
                    'section-headline__subtitle'
                );

                /************
                /** Global
                /***********/

                if ( $fields['headline_alignment'] ) {
                    array_push( $headlineClasses, "text-{$fields['headline_alignment']}" );
                }

                /************
                /** Title
                ************/

                if ( !empty($fields['title_css']) ) {
                    array_push( 
                        $titleClasses, 
                        $fields['title_css']
                    );
                } 

                if ( !empty($fields['title_font_size']) ) {
                    array_push( 
                        $titleClasses, 
                        "section-headline__title--font-{$fields['title_font_size']}" 
                    );
                }

                if ( !empty($fields['title_color']) && $fields['title_color'] !== 'inherit' ) {
                    array_push( 
                        $titleClasses, 
                        "text-{$fields['title_color']}" 
                    );
                }

                /************
                /** Subtitle
                ************/

                if ( !empty($fields['subtitle_css']) ) {
                    array_push( 
                        $subtitleClasses, 
                        $fields['subtitle_css']
                    );
                } 

                if ( !empty($fields['subtitle_font_size']) ) {
                    array_push( 
                        $subtitleClasses, 
                        "section-headline__subtitle--font-{$fields['subtitle_font_size']}" 
                    );
                }

                if ( !empty($fields['subtitle_color']) && $fields['subtitle_color'] !== 'inherit' ) {
                    array_push( 
                        $subtitleClasses, 
                        "text-{$fields['subtitle_color']}" 
                    );
                }

                if ( !empty($fields['subtitle_display']) ) {

                }
            ?>

            <div class="<?php echo implode( ' ', $headlineClasses ); ?>">
                <?php if ( $fields['subtitle_display'] && $fields['subtitle_position'] === 'top' ) : ?>
                    <?php echo sprintf( 
                        '<%1$s class="%2$s">%3$s</%1$s>',
                        $fields['subtitle_html_tag'] ?? 'h5',
                        implode( ' ', $subtitleClasses ),
                        esc_html($subtitle)
                     ); ?>
                <?php endif; ?>

                <?php echo sprintf( 
                    '<%1$s class="%2$s">%3$s</%1$s>',
                    $fields['title_html_tag'],
                    implode( ' ', $titleClasses ),
                    esc_html($title)
                ); ?>

                <?php if ( $fields['subtitle_display'] && $fields['subtitle_position'] === 'bottom' ) : ?>
                    <?php echo sprintf( 
                        '<%1$s class="%2$s">%3$s</%1$s>',
                        $fields['subtitle_html_tag'] ?? 'h5',
                        implode( ' ', $subtitleClasses ),
                        esc_html($subtitle)
                     ); ?>
                <?php endif; ?>
            </div><!-- /.section-headline -->

                <?php
            } 
        );
}