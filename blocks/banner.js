import { InnerBlocks } from '@wordpress/block-editor';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType("ssbcodeblocks/banner", {
  title: "Banner - SSBCode",
  supports: {
    align: ["full"]
  },
  attributes: {
    align: { type:"string", default: "full" }
  },
  edit: EditComponent,
  save: SaveComponent,
});

function EditComponent() {
  return (
    <>
      <section className="p-2 " id="ssb-section-id-1" style={{backgroundColor:'#f4f4f4'}}>

            <InnerBlocks allowedBlocks={["ssbcodeblocks/header", "ssbcodeblocks/buttom", "core/image", "core/columns"]} />     
        
      </section>
    </>
  );
}

function SaveComponent() {
  return <InnerBlocks.Content />
}
