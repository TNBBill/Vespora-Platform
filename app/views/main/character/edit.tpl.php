{% extends main/base %}

{% block content %}
<h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>

<h3>Stats</h3>
    <label>Agility: {{character.stats.Agility.value}}</label> <br />
    <label>Smarts: {{character.stats.Smarts.value}}</label> <br />
    <label>Spirit: {{character.stats.Spirit.value}}</label> <br />
    <label>Strength: {{character.stats.Strength.value}}</label> <br />
    <label>Vigor: {{character.stats.Vigor.value}}</label> <br />
{% endblock %}