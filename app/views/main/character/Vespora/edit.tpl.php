{% extends main/base %}

{% block content %}
<div class='grid_16'>
    <h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>
</div>
<div class='grid_8'>
    <h3>Stats</h3>
    {% for stat in character.stats %}
        <label id="Stat-{{stat.stat_id}}-label">{{stat.name}}:
        <select id="Stat-{{stat.stat_id}}">
            {% for rank in statRanks %}
                {% if stat.currentValue == rank.rank %}
                    <option selected="true">{{rank.rank}}</option>
                {% else %}
                    <option >{{rank.rank}}</option>
                {% endif %}
            {% endfor %}
        </select>
        </label> <br />
    {% endfor %}
</div>
<div class='grid_8'>
    <h3>Skills</h3>
    {% for skill in character.skills %}
    <label id='Skill-{{skill.skill_id}}-label'>{{skill.name}} ({{skill.stat}}):
        <select id='Skill-{{skill.skill_id}}'>
            {% for rank in skillRanks %}
                {% if skill.currentValue == rank.rank %}
                    <option selected="true">{{rank.rank}}</option>
                {% else %}
                    <option >{{rank.rank}}</option>
                {% endif %}
            {% endfor %}
        </select>
        </label> <br />
    {% endfor %}
    <label>General Knowledge: {{character.stats.Smarts.currentValue}}</label>
</div>

{% endblock %}