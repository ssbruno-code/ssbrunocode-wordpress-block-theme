import $ from 'jquery'

class Search {

    //1. Construct/create/describe the object for initiation
    constructor() {
        this.addSearchHTML()
        this.resultsDiv = $("#search-overlay__results")
        this.openButton = $(".js-search-trigger")
        this.closeButton = $(".search-overlay__close")
        this.searchOverlay = $(".search-overlay")
        this.searchField = $("#search-term")
        this.events()
        this.isOverlayOpen = false
        this.typingTimer
        this.previousValue
        this.spinnerVisible
    }

    //2. Events Listeners
    events() {
        this.openButton.on("click", this.openOverlay.bind(this))
        this.closeButton.on("click", this.closeOverlay.bind(this))
        $(document).on("keydown", this.keyPressDis.bind(this))
        this.searchField.on("keyup", this.typingLogic.bind(this))

    }


    //3. methods and functions
    typingLogic() {
        if (this.searchField.val() != this.previousValue) {
            clearTimeout(this.typingTimer)

            if (this.searchField.val()) {

                if (!this.spinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>')
                    this.spinnerVisible = true
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 750)

            } else {
                this.resultsDiv.html('')
                this.spinnerVisible = false
            }



        }
        this.previousValue = this.searchField.val()
    }

    getResults() {

        $.getJSON(ssbcodeData.root_url + "/wp-json/ssbcode/v1/search?term=" + this.searchField.val(), (res) => {
            this.resultsDiv.html(`
                  <div class="container">
                        <h2 class="search-overlay__section-title">Projects found:</h2><br>
                        ${res.works.length ? '' : "<p>No project match this search.</p>"}
                            ${res.works.map(item => `                                
                                
                                    <div class="card card-space">
										<a href="${item.permalink}">
											<img src="${item.image}" alt="work-result " class="card-img-top" />
										</a>        
										<div class="card-body">          
										<h5 class="card-title"><a href="${item.permalink}">${item.title}</a></h5>
										<a href="${item.permalink}" class="btn btn-primary">View project &raquo;</a>
                                    </div>                                

                            `).join("")}
                        ${res.works.length ? "" : ""}
                    </div>                                     
                
            `);
        });
    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active")
        $("body").addClass("body-no-scroll")
        $("#ssb-overlay").addClass("not-display-element")
        this.searchField.val('')
        setTimeout(() => this.searchField.focus(), 305)
        this.isOverlayOpen = true
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active")
        $("body").removeClass("body-no-scroll")
        $("#ssb-overlay").removeClass("not-display-element")
        this.isOverlayOpen = false
    }

    keyPressDis(e) {
        if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
            this.openOverlay()
        }
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay()
        }
    }

    addSearchHTML() {
        $("body").append(`
        <div class="search-overlay">
            <div class="search-overlay--top">
                <div class="container" id="search-overlay-id">
                    <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                    <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term" autocomplete="off">
                    <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
                </div>
            </div>
            
            <div class="container">
                <div id="search-overlay__results"></div>
            </div>
        </div>
        `)
    }
}

export default Search