wp.blocks.registerBlockType("ssbcodeblocks/archiveposts", {
    title: "Archive Posts SSB",
    supports: {
        align: ["full"]
    },
    edit: function(){
        return wp.element.createElement("div", {className: "placeholder-block"}, "Archive Posts SSB block");
    },
    save: function(){
        return null
    }
});
  