let tinyRick = require('rickmortyapi');
let $ = require( "jquery" );
window.$ = window.jQuery = $;

(async function () {
  const episodes = await tinyRick.getEpisode()


  episodes.results.forEach((item, i) => {
    $("<div>").addClass("col").addClass("s12").addClass("m4").append(
      $("<div>").addClass("card").append(
        $("<div>").addClass("card-image").addClass("waves-effect").addClass("waves-block").addClass("waves-light").append(
          $("<img>").addClass("activator").attr("src","https://www.nosoloposters.com/16877-thickbox_default/vade-escolar-rick-morty.jpg")
        ),
        $("<div>").addClass("card-content").append(
          $("<span>").addClass("card-title").addClass("activator").addClass("grey-text").addClass("text-darken-3").text(item.name).append($("<i>").addClass("material-icons").addClass("right").text("more_vert")),
          $("<p>").append($("<a>").attr("href","#").text("this is link"))
        ),
        $("<div>").addClass("card-reveal").append(
          $("<span>").addClass("card-title").addClass("grey-text").addClass("text-darken-4").text(item.name).append($("<i>").addClass("material-icons").addClass("right").text("close")),
          $("<p>").text("info")
        )
      )
    ).appendTo("#app")
  });
})();
