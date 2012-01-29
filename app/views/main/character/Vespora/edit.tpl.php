{% extends main/base %}

{% block pageJS %}
{% endblock %}

{% block content %}
<div class='grid_16'>
    <h2>Edit: {{character.name}}</h2>
    <p>Campaign: {{character.campaign.name}} ({{character.type.name}})</p>
</div>
<div class='grid_16'>
    <ul>
        <li>Stat Points: <span id='statPoints'>0</span></li>
        <li>Stat Points Available: <span id='statPointsAvailable'>{{statPointsAvailable}}</span></li>
        <li>Skill Points: <span id='skillPoints'>0</span></li>
        <li>Skill Points Available: <span id='skillPointsAvailable'>{{skillPointsAvailable}}</span></li>
        <li>Edges: <span id='edgePoints'>0</span></li>
        <li>Edges Available: <span id='edgePointsAvailable'>{{edgePointsAvailable}}</span></li>
    </ul>
</div>
<div class='grid_8'>
    <div id='stats'><h3>Stats</h3>

    {% for stat in character.stats %}
        <label id="Stat-{{stat.stat_id}}-label">{{stat.name}}:
        <select id="Stat-{{stat.stat_id}}-{{character.id}}" class='characterStat'>
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
    <div id='Edges'>
    <h3>Edges</h3>
    <ul>
        <li>Arcane Backgroud (Test)</li>
        <li>Sample</li>
    </ul>
    <button>Add an Edge</button>
    </div>
</div>


<div class='grid_8'>
    <h3>Skills</h3>
    {% for skill in character.skills %}
    <label id='Skill-{{skill.skill_id}}-label'>{{skill.name}} <span class='stat-label'>({{skill.stat}})</span>:
        <select id='Skill-{{skill.skill_id}}-{{character.id}}' class='characterSkill'>
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