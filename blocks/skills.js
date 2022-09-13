wp.blocks.registerBlockType("ssbcodeblocks/skills", {
    title: "Skills SSB",
    supports: {
        align: ["full"]
    },
    edit: function(){
        return wp.element.createElement("div", {className: "placeholder-block"}, "Skills SSB block");
    },
    save: function(){
        return null
    }
});
  