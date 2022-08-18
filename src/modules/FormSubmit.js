import axios from "axios"
import $ from 'jquery'

class FormSubmit {
  constructor() {
    
    axios.defaults.headers.common["X-WP-Nonce"] = ssbcodeData.nonce    
    this.events()
    
        
  }

  events() {
    // Form processor
    document.querySelector('#contact-form').addEventListener('submit', (e) => {
      e.preventDefault();
      
      var ourNewPost = {
        "title": e.target.elements.email.value,
        "content": "Name: " + e.target.elements.name.value + "<br/>Message: " + e.target.elements.message.value,
        "status": "publish"
      }
      console.log(ourNewPost)
      this.submitForm(ourNewPost)
    });
  
  }


  async submitForm(ourNewPost) {    

    try {
      const response = await axios.post(ssbcodeData.root_url + "/wp-json/wp/v2/messages/", ourNewPost)
      $("#ssb-alert-message").removeClass("not-display-ssb")
      setTimeout(function () {
        $("#ssb-alert-message").addClass("not-display-ssb")

      }, 5000)
      
    } catch (e) {
      console.error(e)
    }
  }
}

export default FormSubmit
