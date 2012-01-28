{% extends main/base %}

{% block content %}
<h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>

<h3>Stats</h3>
    {% for stat in character.stats %}
        <label id="Stat-{{stat.stat_id}}">{{stat.name}}: {{stat.currentValue}}</label> <br />
    {% endfor %}

<h3>Skills</h3>
{% for skill in character.skills %}
<label id='Skill-{{skill.skill_id}}'>{{skill.name}} ({{skill.stat}}): {{skill.currentValue}}</label> <br />
{% endfor %}
<label>General Knowledge: {{character.stats.Smarts.currentValue}}</label>

    <a href="#" onclick="updateStat('{{character.id}}','1', 'D8');" name="D8 Agility">D8 Agility</a>
    <a href="#" onclick="updateStat('{{character.id}}','1', 'D8');" name="D8 Skill">D8 Agility</a>
{% endblock %}