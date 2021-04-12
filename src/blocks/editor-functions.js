wp.domReady( () => {
  
  wp.blocks.registerBlockStyle( 'core/button', {
     name: 'primary',
     label: 'Orange Button',
  } );

  wp.blocks.registerBlockStyle( 'core/button', {
     name: 'arrow-cta',
     label: 'Arrow Link',
  } );

  wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
} );
