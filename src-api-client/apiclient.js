let tinyRick = require('rickmortyapi');
import $ from 'jquery';
window.jQuery = window.$ = $;
import * as JSZip from "jszip";
window.JSZip = JSZip;

import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

require( 'datatables.net-autofill-dt' );
require( 'datatables.net-buttons-dt' );
require( 'datatables.net-buttons/js/buttons.colVis.js' );
require( 'datatables.net-buttons/js/buttons.flash.js' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-colreorder-dt' );
require( 'datatables.net-fixedcolumns-dt' );
require( 'datatables.net-fixedheader-dt' );
require( 'datatables.net-keytable-dt' );
require( 'datatables.net-responsive-dt' );
require( 'datatables.net-rowgroup-dt' );
require( 'datatables.net-rowreorder-dt' );
require( 'datatables.net-scroller-dt' );
//require( 'datatables.net-searchPanes-dt' )(); bug on install and compile webpack
require( 'datatables.net-select-dt' );

window.$.DataTable = require( 'datatables.net' );
window.rickapi=tinyRick;

$(document).ready(async function(){
  global.episodes = await tinyRick.getEpisode()

  $('#example').DataTable( {
    data: global.episodes.results,
    columns: [
        { data: 'name' , "title": "nombre"},
        { data: 'air_date' , "title": "fecha de emision"},
        { data: 'episode' , "title": "episodio"}
    ],
    order: [[ 2, 'asc' ]],
    dom: 'Bfrtip',
    buttons: [
         'excelHtml5', 'pdf'
    ]
  } );

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
});
