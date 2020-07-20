let tinyRick = require('rickmortyapi');
let $ = require( "jquery" );

(async function () {
  const episodes = await tinyRick.getEpisode()
  console.log(episodes)
})();
