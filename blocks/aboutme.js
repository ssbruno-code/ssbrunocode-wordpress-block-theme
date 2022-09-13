wp.blocks.registerBlockType("ssbcodeblocks/aboutme", {
    title: "About me SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "About me SSB block");
    },
    save: function(){
      return null
    }
  });
  