<nav role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="#" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="/">Home</a></li>
    </ul>

    <ul id="nav-mobile" class="sidenav">
      <li><a href="/">Home</a></li>
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </div>
</nav>

<div class="page-header">
    <h1>Search episodes</h1>
    <p>{{ link_to("episodes/new", "Create episodes") }}</p>
</div>

{{ content() }}

{{ flash.output() }}

<form action="/episodes/search" class="form-horizontal" method="get">
    <div class="form-group">
    <label for="fieldIdepisodes" class="col-sm-2 control-label">Idepisodes</label>
    <div class="col-sm-10">
        {{ text_field("idepisodes", "type" : "numeric", "class" : "form-control", "id" : "fieldIdepisodes") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEpisode" class="col-sm-2 control-label">Episode</label>
    <div class="col-sm-10">
        {{ text_field("episode", "size" : 30, "class" : "form-control", "id" : "fieldEpisode") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAirDate" class="col-sm-2 control-label">Air Of Date</label>
    <div class="col-sm-10">
        {{ text_field("air_date", "type" : "date", "class" : "form-control", "id" : "fieldAirDate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSinopsis" class="col-sm-2 control-label">Sinopsis</label>
    <div class="col-sm-10">
        {{ text_field("sinopsis", "size" : 30, "class" : "form-control", "id" : "fieldSinopsis") }}
    </div>
</div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Search', 'class': 'btn btn-default') }}
        </div>
    </div>
</form>
