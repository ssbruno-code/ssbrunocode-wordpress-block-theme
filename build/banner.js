(()=>{"use strict";const e=window.wp.element,t=window.wp.blockEditor;(0,window.wp.blocks.registerBlockType)("ssbcodeblocks/banner",{title:"Banner - SSBCode",supports:{align:["full"]},attributes:{align:{type:"string",default:"full"}},edit:function(){return(0,e.createElement)(e.Fragment,null,(0,e.createElement)("section",{className:"p-2 ",id:"ssb-section-id-1",style:{backgroundColor:"#f4f4f4"}},(0,e.createElement)(t.InnerBlocks,{allowedBlocks:["ssbcodeblocks/header","ssbcodeblocks/buttom","core/image","core/columns"]})))},save:function(){return(0,e.createElement)(t.InnerBlocks.Content,null)}})})();