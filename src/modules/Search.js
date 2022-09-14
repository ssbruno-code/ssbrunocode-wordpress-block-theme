import $ from 'jquery'

class Search {

    //1. Construct/create/describe the object for initiation
    constructor() {
        //get the search query
        var searchTerm = "";
        $("#searchInput").keyup(function() {
            setTimeout(showResults, 300)                   
            
        });

        function showResults(){
            var searchTerm = $("#searchInput").val();
            runSearch(searchTerm);     
        }
        
        $("#searchInput").blur(function(){
            setTimeout( () => {$("#result-list").hide()}, 200)
        })
        //find and display the new articles
        var runSearch = function(search){
            
            $.getJSON(ssbcodeData.root_url + "/wp-json/wp/v2/works?search=" + search, (res) => {
                $("#result-list").empty()   
                $("#result-list").show()

                res.forEach((item) => {
                    var text = item.content.rendered
                    text = text.split(' ').slice(0, 20).join(' ')
                    $("#result-list").append(
                        '<a href="' + item.link + '" class="list-group-item"><h4 class="list-group-item-heading">' + item.title.rendered + '</h4><p class="list-group-item-text">' + text + '...</p></a>'
                    ); 
                })
                
            });
        }

    }

    


    
}

export default Search