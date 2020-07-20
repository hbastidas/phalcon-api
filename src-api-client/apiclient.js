let tinyRick = require('rickmortyapi');
let $ = require( "jquery" );
window.$ = window.jQuery = $;

(async function () {
  const episodes = await tinyRick.getEpisode()
  console.log(episodes)
})();
