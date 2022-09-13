wp.blocks.registerBlockType("ssbcodeblocks/myprojects", {
    title: "My Projects SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "My Projects SSB block");
    },
    save: function(){
      return null
    }
  });
  