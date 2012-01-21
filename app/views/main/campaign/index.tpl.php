{% extends main/base %}

{% block content %}

<table>
    <thead>
    <tr>
        <th>Campaign Name</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    {% for campaign in campaigns %}
        <tr>
            <td>{{campaign.name}}</td>
            <td><a href='#'>/campaign/characters/{{campaign.id}}</a></td>
        </tr>
    {% endfor %}
    </tbody>
</table>

{% endblock %}