/**
 * BLOCK: Gutenberg Repeater Field
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

const {
	__,
} = wp.i18n;
const {
	registerBlockType,
} = wp.blocks;
const {
	Button,
	TextControl,
    SelectControl,
    PanelBody,
    PanelRow,
} = wp.components;
const {
	InspectorControls,
} = wp.editor;
const {
	Fragment,
} = wp.element;

/**
 * Register: Repeater Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'delennerd/bootstrap-buttons', {
	title: __( 'DLM Bootstrap Buttons' ),
	icon: 'button',
	category: 'design',
	attributes: {
		buttons: {
			type: 'array',
			default: [],
		},
	},
	keywords: [
		__( 'delennerd buttons' ),
		__( 'Bootstrap' ),
	],
	edit: ( props ) => {
		const handleAddButton = () => {
			const buttons = [ ...props.attributes.buttons ];
			buttons.push( {
				text: 'My nice button',
                style: 'primary',
                linkHref: '#',
                linkTarget: '_self',
                linkTargetCustom: '',
                cssClass: '',
                cssId: '',
			} );
			props.setAttributes( { buttons } );
		};

		const handleRemoveButton = ( index ) => {
			const buttons = [ ...props.attributes.buttons ];
			buttons.splice( index, 1 );
			props.setAttributes( { buttons } );
		};

		const handleButtonChange = ( type, newValue, index ) => {
			const buttons = [ ...props.attributes.buttons ];
			// buttons[ index ].text = text;

            switch( type ) {
                case 'text':
                    buttons[ index ].text = newValue
                    break;
                case 'style':
                    buttons[ index ].style = newValue
                    break;
                case 'linkHref':
                    buttons[ index ].linkHref = newValue
                    break;
                case 'linkTarget':
                    buttons[ index ].linkTarget = newValue
                    break;
                case 'linkTargetCustom':
                    buttons[ index ].linkTargetCustom = newValue
                    break;
                case 'cssClass':
                    buttons[ index ].cssClass = newValue
                    break;
                case 'cssId':
                    buttons[ index ].cssId = newValue
                    break;
            }

			props.setAttributes( { buttons } );
		};

		let buttonFields,
			buttonDisplay;

		if ( props.attributes.buttons.length ) {
			buttonFields = props.attributes.buttons.map( ( button, index ) => {
				return <PanelBody key={ index } title={ button.text } initialOpen={ false }>
                    <div className="dlm-bs-button__wrapper">
                        <PanelRow>
                            <TextControl
                                label="Button Text"
                                className="dlm-bs-button__inputField"
                                Placeholder="My button text"
                                value={ props.attributes.buttons[ index ].text }
                                onChange={ ( newValue ) => handleButtonChange( 'text', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <SelectControl
                                label="Button Style"
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
                                    {label: "Link", value: 'link'},
                                ]}
                                value={ props.attributes.buttons[ index ].style }
                                onChange={ ( newValue ) => handleButtonChange( 'style', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <TextControl 
                                label="Button Link"
                                value={ props.attributes.buttons[ index ].linkHref }
                                onChange={ ( newValue ) => handleButtonChange( 'linkHref', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <SelectControl
                                label="Link target"
                                options={[
                                    {label: "Self", value: '_self'},
                                    {label: "Blank", value: '_blank'},
                                    {label: "Custom", value: 'custom'},
                                ]}
                                value={ props.attributes.buttons[ index ].linkTarget }
                                onChange={ ( newValue ) => handleButtonChange( 'linkTarget', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <TextControl 
                                label="Button Custom Target"
                                value={ props.attributes.buttons[ index ].linkTargetCustom }
                                onChange={ ( newValue ) => handleButtonChange( 'linkTargetCustom', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <TextControl 
                                label="Button CSS Class"
                                value={ props.attributes.buttons[ index ].cssClass }
                                onChange={ ( newValue ) => handleButtonChange( 'cssClass', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <TextControl 
                                label="Button CSS ID"
                                value={ props.attributes.buttons[ index ].cssId }
                                onChange={ ( newValue ) => handleButtonChange( 'cssId', newValue, index ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <Button 
                                isSecondary
                                lassName="dlm-bs-button__remove-button"
                                label="Delete button"
                                onClick={ () => handleRemoveButton( index ) }
                            >Delete Button</Button>
                        </PanelRow>
                    </div>
				</PanelBody>;
			} );

			buttonDisplay = props.attributes.buttons.map( ( button, index ) => {
				return <li className="delennerd-blocks-bs-buttons-item list-inline-item"><a key={ index } href="#" className={ 'btn btn-' + button.style }>{ button.text }</a></li>;
			} );
		}

		return [
			<InspectorControls key="1">
				<PanelBody title={ __( 'Buttons' ) }>
					{ buttonFields }
					<Button
						isPrimary
                        className="dlm-bs-button__add-button"
						onClick={ handleAddButton.bind( this ) }
					>
						{ __( 'Add Button' ) }
					</Button>
				</PanelBody>
			</InspectorControls>,
			<div key="2" className={ props.className }>
                <ul className="delennerd-blocks-bs-buttons-items list-inline">
				    { buttonDisplay }
                </ul>
			</div>,
		];
	},
	save: ( props ) => {
        return null;
	},
} );