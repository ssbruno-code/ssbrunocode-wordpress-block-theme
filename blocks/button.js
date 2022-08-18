import { link } from "@wordpress/icons"
import { ToolbarGroup, ToolbarButton, Popover, Button, PanelBody, PanelRow, ColorPalette } from "@wordpress/components"
import { RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl, getColorObjectByColorValue } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import { useState } from "@wordpress/element"

registerBlockType("ssbcodeblocks/button", {
  title: "Button - SSBCode",
  attributes: {
    text: {type: "string"},
    size: {type: "string", default:"large"},
    background:{type: "string", default:"primary"},
    linkObject: {type: "object", default: { url: "" }}
  },
  edit: EditComponent,
  save: SaveComponent,
});


function EditComponent(props) {
  const [ isLinkPickerVisible, setIsLinkPickerVisible ] = useState(false)

  function handleTextChange(x){
    props.setAttributes({text: x})
  }

  function buttonHandler() {
    setIsLinkPickerVisible(prev => !prev)
  }

  function handleLinkChange(newLink) {
    props.setAttributes({ linkObject: newLink })
  }

  return (
    <>
      <BlockControls>
        <ToolbarGroup>
          <ToolbarButton onClick={buttonHandler} icon={link} />
        </ToolbarGroup>
        <ToolbarGroup>
          <ToolbarButton isPressed={props.attributes.background === "primary"} onClick={() => props.setAttributes({background: "primary"})} >
            Gradient Blue
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.background === "secondary"} onClick={() => props.setAttributes({background: "secondary"})} >
            Gray
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.background === "dark"} onClick={() => props.setAttributes({background: "dark"})} >
            Dark
          </ToolbarButton>
        </ToolbarGroup>
        <ToolbarGroup>
        <ToolbarButton isPressed={props.attributes.size === "large"} onClick={() => props.setAttributes({size: "large"})} >
            Large
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.size === "medium"} onClick={() => props.setAttributes({size: "medium"})} >
            Medium
          </ToolbarButton>
          <ToolbarButton isPressed={props.attributes.size === "small"} onClick={() => props.setAttributes({size: "small"})} >
            Small
          </ToolbarButton>
        </ToolbarGroup>
      </BlockControls>
      <RichText tagName="a" className={`btn btn-${props.attributes.background} headline--${props.attributes.size}`} value={props.attributes.text} onChange={handleTextChange} />
      {isLinkPickerVisible && (
        <Popover>
          <LinkControl settings={[]} value={props.attributes.linkObject} onChange={handleLinkChange()} />
          <Button variant="primary" onClick={() => setIsLinkPickerVisible(false)} style={{ display: "block", width: "100%" }} >Confirm</Button>
        </Popover>
      )}
    </>
  );
}

function SaveComponent(props) {

  return ( 
    <a href={props.attributes.linkObject.url} className={`btn headline--${props.attributes.size} btn-${props.attributes.background}`}>
      {props.attributes.text}
    </a>
  )

}
