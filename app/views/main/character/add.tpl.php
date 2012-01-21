{% extends main/base %}

{% block content %}

    <form action='/characters/add' method='post'>
        <label>Name: <input type='text' name='name' /></label>
        <label>Campaign: <select>
            {% for campaign in campaigns %}
                <option>{{campaign.name}}</option>
            {% endfor %}
        </select></label>
    </form>
{% endblock %}