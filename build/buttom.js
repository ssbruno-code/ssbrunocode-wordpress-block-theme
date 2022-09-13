(()=>{"use strict";const t=window.wp.element,e=window.wp.primitives,r=(0,t.createElement)(e.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,t.createElement)(e.Path,{d:"M15.6 7.2H14v1.5h1.6c2 0 3.7 1.7 3.7 3.7s-1.7 3.7-3.7 3.7H14v1.5h1.6c2.8 0 5.2-2.3 5.2-5.2 0-2.9-2.3-5.2-5.2-5.2zM4.7 12.4c0-2 1.7-3.7 3.7-3.7H10V7.2H8.4c-2.9 0-5.2 2.3-5.2 5.2 0 2.9 2.3 5.2 5.2 5.2H10v-1.5H8.4c-2 0-3.7-1.7-3.7-3.7zm4.6.9h5.3v-1.5H9.3v1.5z"})),n=window.wp.components,a=window.wp.blockEditor;(0,window.wp.blocks.registerBlockType)("ssbcodeblocks/buttom",{title:"Buttom - SSBCode",attributes:{text:{type:"string"},size:{type:"string",default:"large"},background:{type:"string",default:"primary"},linkObject:{type:"object",default:{url:""}}},edit:function(e){const[i,s]=(0,t.useState)(!1);return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(a.BlockControls,null,(0,t.createElement)(n.ToolbarGroup,null,(0,t.createElement)(n.ToolbarButton,{onClick:function(){s((t=>!t))},icon:r})),(0,t.createElement)(n.ToolbarGroup,null,(0,t.createElement)(n.ToolbarButton,{isPressed:"primary"===e.attributes.background,onClick:()=>e.setAttributes({background:"primary"})},"Gradient Blue"),(0,t.createElement)(n.ToolbarButton,{isPressed:"secondary"===e.attributes.background,onClick:()=>e.setAttributes({background:"secondary"})},"Gray"),(0,t.createElement)(n.ToolbarButton,{isPressed:"dark"===e.attributes.background,onClick:()=>e.setAttributes({background:"dark"})},"Dark")),(0,t.createElement)(n.ToolbarGroup,null,(0,t.createElement)(n.ToolbarButton,{isPressed:"large"===e.attributes.size,onClick:()=>e.setAttributes({size:"large"})},"Large"),(0,t.createElement)(n.ToolbarButton,{isPressed:"medium"===e.attributes.size,onClick:()=>e.setAttributes({size:"medium"})},"Medium"),(0,t.createElement)(n.ToolbarButton,{isPressed:"small"===e.attributes.size,onClick:()=>e.setAttributes({size:"small"})},"Small"))),(0,t.createElement)(a.RichText,{tagName:"a",className:`btn btn-${e.attributes.background} headline--${e.attributes.size}`,value:e.attributes.text,onChange:function(t){e.setAttributes({text:t})}}),i&&(0,t.createElement)(n.Popover,null,(0,t.createElement)(a.__experimentalLinkControl,{settings:[],value:e.attributes.linkObject,onChange:void e.setAttributes({linkObject:undefined})}),(0,t.createElement)(n.Button,{variant:"primary",onClick:()=>s(!1),style:{display:"block",width:"100%"}},"Confirm")))},save:function(e){return(0,t.createElement)("a",{href:e.attributes.linkObject.url,className:`btn headline--${e.attributes.size} btn-${e.attributes.background}`},e.attributes.text)}})})();