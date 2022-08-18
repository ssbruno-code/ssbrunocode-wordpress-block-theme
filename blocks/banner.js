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
      <section className="p-5" id="ssb-section-id-1" style={{backgroundColor:'#f4f4f4'}}>
        <div className="container">
          <div className="d-sm-flex align-items-center justify-content-between row">
           
              <InnerBlocks  />         
            
          </div>        
        </div>
      </section>
    </>
  );
}

function SaveComponent() {
  return (
    <section className="p-5" id="ssb-section-id-1" style={{backgroundColor:'#f4f4f4'}}>
      <div className="container" >
        <div className="d-sm-flex align-items-center justify-content-between row">
          <div class="w-sm-50 order-md-2 col-md-6 col-12">
            <InnerBlocks.Content />
          </div>        
        </div>        
      </div>
    </section>
  );
}
