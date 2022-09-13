wp.blocks.registerBlockType("ssbcodeblocks/footer", {
    title: "Footer SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Footer SSB block");
    },
    save: function(){
      return null
    }
  });
  