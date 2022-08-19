wp.domReady(() => {

    // Buttons

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-primary",
        label: "Primary",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-secondary",
        label: "Secondary",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-outline-primary",
        label: "Outline Primary",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-outline-secondary",
        label: "Outline Secondary",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-outline-custom",
        label: "Custom",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-outline-custom--primary",
        label: "Custom Outline Primary",
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "btn-outline-custom--secondary",
        label: "Custom Outline Secondary",
    });

    // Lists
    
    wp.blocks.registerBlockStyle("core/list", {
        name: "2col-list",
        label: "2-Spaltige Liste",
    });

    wp.blocks.unregisterBlockStyle("core/button", "default");
    wp.blocks.unregisterBlockStyle("core/button", "fill");
    wp.blocks.unregisterBlockStyle("core/button", "outline");
});
