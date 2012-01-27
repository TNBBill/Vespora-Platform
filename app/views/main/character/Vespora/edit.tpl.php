{% extends main/base %}

{% block content %}
<h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>

<h3>Stats</h3>
    {% for stat in character.stats %}
        <label>{{stat.stat}}: {{stat.value}}</label> <br />
    {% endfor %}

<h3>Skills</h3>
{% for skill in character.skills %}
<label>{{skill.skill}}: {{skill.value}}</label> <br />
{% endfor %}
<label>General Knowledge: {{character.stats.Smarts.value}}</label>

{% endblock %}