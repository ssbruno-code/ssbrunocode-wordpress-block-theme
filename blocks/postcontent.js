wp.blocks.registerBlockType("ssbcodeblocks/postcontent", {
    title: "Post content SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Post content SSB block");
    },
    save: function(){
      return null
    }
  });
  