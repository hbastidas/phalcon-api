<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("/episodes/index", "Go Back") }}</li>
            <li class="next">{{ link_to("/episodes/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Idepisodes</th>
            <th>Name</th>
            <th>Episode</th>
            <th>Air Of Date</th>
            <th>Sinopsis</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% for episode in page.getItems() %}
            <tr>
                <td>{{ episode['idepisodes'] }}</td>
            <td>{{ episode['name'] }}</td>
            <td>{{ episode['episode'] }}</td>
            <td>{{ episode['air_date'] }}</td>
            <td>{{ episode['sinopsis'] }}</td>

                <td>{{ link_to("episodes/edit/"~episode['idepisodes'], "Edit") }}</td>
                <td>{{ link_to("episodes/delete/"~episode['idepisodes'], "Delete") }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.getCurrent()~"/"~page.getTotalItems() }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("episodes/search", "First", false, "class": "page-link", 'id': 'first') }}</li>
                <li>{{ link_to("episodes/search?page="~page.getPrevious(), "Previous", false, "class": "page-link", 'id': 'previous') }}</li>
                <li>{{ link_to("episodes/search?page="~page.getNext(), "Next", false, "class": "page-link", 'id': 'next') }}</li>
                <li>{{ link_to("episodes/search?page="~page.getLast(), "Last", false, "class": "page-link", 'id': 'last') }}</li>
            </ul>
        </nav>
    </div>
</div>
