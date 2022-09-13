wp.blocks.registerBlockType("ssbcodeblocks/contact", {
    title: "Contact SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Contact SSB block");
    },
    save: function(){
      return null
    }
  });
  