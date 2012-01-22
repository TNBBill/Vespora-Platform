{% extends main/base %}

{% block content %}
<h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>

{% endblock %}