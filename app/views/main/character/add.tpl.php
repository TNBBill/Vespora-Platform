{% extends main/base %}

{% block content %}

    <form action='/character/add' method='post'>
        <label>Name: <input type='text' name='name' /></label>
        <label>Campaign: <select name='campaign'>
            {% for campaign in campaigns %}
                <option value='{{campaign.id}}'>{{campaign.name}}</option>
            {% endfor %}
        </select></label>
        <input type='submit' />
    </form>
{% endblock %}