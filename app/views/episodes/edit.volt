<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("episodes", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Edit episodes</h1>
</div>

{{ content() }}

<form action="/episodes/save" class="form-horizontal" method="post">
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


    {{ hidden_field("idepisodes") }}

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ submit_button('Send', 'class': 'btn btn-default') }}
        </div>
    </div>
</form>
