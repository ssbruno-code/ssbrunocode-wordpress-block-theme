wp.blocks.registerBlockType("ssbcodeblocks/ssbhero", {
  title: "Hero Area SSB",
  supports: {
    align: ["full"]
  },
  edit: function(){
    return wp.element.createElement("div", {className: "placeholder-block"}, "Hero Area SSB block");
  },
  save: function(){
    return null
  }
});
