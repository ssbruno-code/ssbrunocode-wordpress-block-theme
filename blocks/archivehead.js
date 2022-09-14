wp.blocks.registerBlockType("ssbcodeblocks/archivehead", {
    title: "Archive Head SSB",
    supports: {
      align: ["full"]
    },
    edit: function(){
      return wp.element.createElement("div", {className: "placeholder-block"}, "Archive Head SSB block");
    },
    save: function(){
      return null
    }
  });
  