/**
 * BLOCK: cta-block
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
// import './editor.scss';
// import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

registerBlockType('delennerd-blocks/custom-cta', {
    title: 'Delennerd Call to Action',
    description: 'Block to generate a custom Call to Action',
    icon: 'format-image',
    category: 'widgets',
    keywords: [
		__( 'call to action' ),
		__( 'cta' ),
	],

    attributes: {
        title: {
            type: 'string'
        },
        subtitle: {
            type: 'string'
        }
    },

    // custom functions


    // built-in functions
    edit(props) {},

    save() {
        null
    },
});