wp.blocks.registerBlockType("ssbcodeblocks/timeline", {
    title: "Timeline SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Timeline SSB block");
    },
    save: function(){
      return null
    }
  });
  