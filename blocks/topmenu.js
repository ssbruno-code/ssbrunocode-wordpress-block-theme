wp.blocks.registerBlockType("ssbcodeblocks/topmenu", {
    title: "Top Menu SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Top Menu SSB block");
    },
    save: function(){
      return null
    }
  });
  