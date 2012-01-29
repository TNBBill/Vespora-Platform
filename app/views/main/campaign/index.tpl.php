{% extends main/base %}

{% block content %}
<div class='grid_16'>
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
                <td><a href='/campaign/characters/{{campaign.id}}'>View Characters</a></td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}