const {
    registerBlockType
} = wp.blocks;
// import { registerBlockType } from '@wordpress/blocks';
// import { RichText } from '@wordpress/block-editor';
const {
    RichText,
    InspectorControls
} = wp.blockEditor;
const {
    ToggleControl,
    PanelBody,
    PanelRow,
    CheckboxControl,
    SelectControl,
    ColorPicker,
    Button,
    IconButton,
    TextControl,
} = wp.components;
const {
	Fragment,
} = wp.element;
// import { TextControl, TextareaControl } from '@wordpress/components';
const { __ } = wp.i18n; // Import __() from wp.i18n
 
registerBlockType('delennerd/bs-button-block', {
	title: 'DLM Buttons',
    icon: 'smiley',
    category: 'common',
    keywords: [
        'buttons',
        'delennerd'
    ],
    supports: {
        anchor: true,
        customClassName: true,
    },
    attributes: {
        buttons: {
			type: 'array',
			default: [],
		},
        
        buttonText: {
            type: 'string',
        },
        linkHref: {
            type: 'string',
            default: '#',
        },
        linkTarget: {
            type: 'string',
            default: '_self',
        },
        linkCustomTarget: {
            type: 'string',
            default: '',
        },
        style: {
            type: 'string',
            default: 'btn-primary',
        },
        cssClass: {
            type: 'string',
            default: '',
        },
        cssId: {
            type: 'string',
            default: '',
        },
        align: {
            type: 'string',
            default: 'left',
        },

        toggle: {
			type: 'boolean',
			default: true
		},
		favoriteAnimal: {
			type: 'string',
			default: 'dogs'
		},
		favoriteColor: {
			type: 'string',
			default: '#DDDDDD'
		},
		activateLasers: {
			type: 'boolean',
			default: false
		},
    },

    edit: ( props ) => {
        const { attributes, setAttributes } = props;

        const updateButtonText = value => {
            setAttributes({ buttonText: value });
        }

        const handleAddButton = () => {
            const buttons = [ ...props.attributes.buttons ];
            
            console.log( buttons );

            buttons.push( {
                buttonText: '',
            } );
            props.setAttributes( { buttons } );
        };

        const handleRemoveButton = ( index ) => {
            const buttons = [ ...props.attributes.buttons ];
            buttons.splice( index, 1 );
            props.setAttributes( { buttons } );
        };

        const handleButtonChange = ( buttonText, index ) => {
            const buttons = [ ...props.attributes.buttons ];
            buttons[ index ].buttonText = buttonText;
            props.setAttributes( { buttons } );
        };

        let buttons, 
            buttonDisplay;

        if ( attributes.buttons.length ) {
            buttonDisplay = attributes.buttons.map( ( button, index ) => {
                return <div key={ index }>
                    <TextControl
                        className="grf__location-address"
                        placeholder="350 Fifth Avenue New York NY"
                        value={ props.attributes.buttons[ index ].buttonText }
                        onChange={ ( address ) => handleButtonChange( buttonText, index ) }
                    />
                    <IconButton
                        className="grf__remove-location-address"
                        icon="no-alt"
                        label="Delete location"
                        onClick={ () => handleRemoveButton( index ) }
                    />

                    {/* <PanelRow>
                        <TextControl 
                            label="Button Text"
                            value={ attributes.buttonText }
                            onChange={ updateButtonText }
                        />
                    </PanelRow>
                    <PanelRow>
                        <SelectControl
                            label="Button Style"
                            value={attributes.style}
                            options={[
                                {label: "Primary", value: 'primary'},
                                {label: "Secondary", value: 'secondary'},
                                {label: "Outline Primary", value: 'outline-primary'},
                                {label: "Outline Secondary", value: 'outline-secondary'},
                                {label: "Outline Custom", value: 'outline-custom'},
                                {label: "Outline Custom Primary", value: 'outline-custom btn-outline-custom--primary'},
                                {label: "Outline Custom Secondary", value: 'outline-custom btn-outline-custom--secondary'},
                                {label: "Success", value: 'success'},
                                {label: "Danger", value: 'danger'},
                                {label: "Warning", value: 'warning'},
                                {label: "Outline Success", value: 'outline-success'},
                                {label: "Outline Danger", value: 'outline-danger'},
                                {label: "Outline Warning", value: 'outline-warning'},
                                {label: "link", value: 'Link'},
                            ]}
                            onChange={(newval) => setAttributes({ style: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <TextControl 
                            label="Button Link"
                            value={ attributes.linkHref }
                            onChange={(newval) => setAttributes({ linkHref: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <SelectControl
                            label="Link target"
                            value={attributes.linkTarget}
                            options={[
                                {label: "Self", value: '_self'},
                                {label: "Blank", value: '_blank'},
                                {label: "Custom", value: 'custom'},
                            ]}
                            onChange={(newval) => setAttributes({ linkTarget: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <TextControl 
                            label="Custom target"
                            value={ attributes.linkCustomTarget }
                            onChange={(newval) => setAttributes({ linkCustomTarget: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <TextControl 
                            label="Additional CSS Class"
                            value={ attributes.cssClass }
                            onChange={(newval) => setAttributes({ cssClass: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <TextControl 
                            label="Additional CSS ID"
                            value={ attributes.cssId }
                            onChange={(newval) => setAttributes({ cssId: newval })}
                        />
                    </PanelRow> */}
                </div>;
            } );

            buttonDisplay = props.attributes.buttons.map( ( button, index ) => {
            return <p key={ index }>{ button.buttonText }</p>;
        } );
        }

        return ( [
            <InspectorControls key="1">
                <PanelBody title={ __( 'Buttons' ) }>
                    { buttons }
                    <Button
                        isDefault
                        onClick={ handleAddButton.bind( this ) }
                    >
                        { __( 'Add Button' ) }
                    </Button>
                </PanelBody>

                {/* <PanelBody
                    title="Most awesome settings ever"
                    initialOpen={true}
                > */}

                    {/* <PanelRow>
                        <ToggleControl
                            label="Toggle me"
                            checked={attributes.toggle}
                            onChange={(newval) => setAttributes({ toggle: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <SelectControl
                            label="What's your favorite animal?"
                            value={attributes.favoriteAnimal}
                            options={[
                                {label: "Dogs", value: 'dogs'},
                                {label: "Cats", value: 'cats'},
                                {label: "Something else", value: 'weird_one'},
                            ]}
                            onChange={(newval) => setAttributes({ favoriteAnimal: newval })}
                        />
                    </PanelRow>
                    <PanelRow>
                        <ColorPicker
                            color={attributes.favoriteColor}
                            onChangeComplete={(newval) => setAttributes({ favoriteColor: newval.hex })}
                            disableAlpha
                        />
                    </PanelRow>
                    <PanelRow>
                        <CheckboxControl
                            label="Activate lasers?"
                            checked={attributes.activateLasers}
                            onChange={(newval) => setAttributes({ activateLasers: newval })}
                        />
                    </PanelRow> */}
                {/* </PanelBody> */}
            </InspectorControls>,

            <div key="2" className={ props.className }>
                <h2>Blocks</h2>
                { buttonDisplay }

                {/* <Button 
                    // isPrimary
                    label={ attributes.linkHref }
                    showTooltip="true"
                    href={ attributes.linkHref }
                    isLink="false"
                    target={ attributes.linkTarget }
                    className={'btn btn-' + attributes.style}
                >{ attributes.buttonText }</Button> */}
			</div>,
        ] );
    },

    save: ( props ) => {
        return null;
        // const { attributes } = props;
        // return (
        //     <div>
        //         <RichText.Content 
        //             tagName="button"
        //             value={ attributes.buttonText }
        //         />
        //     </div>
        // );
    },
});