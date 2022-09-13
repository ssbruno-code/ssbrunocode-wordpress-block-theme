wp.blocks.registerBlockType("ssbcodeblocks/posts", {
    title: "Posts SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Posts SSB block");
    },
    save: function(){
      return null
    }
  });
  