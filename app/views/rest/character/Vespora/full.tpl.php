{
    "name": "{{character.name}}",
    "campaign": "{{character.campaign.name}}",
    "type": "{{character.type.name}}",
    "stats":{
        {% for stat in character.stats %}
        "{{stat.stat}}": "{{stat.value}}"
        {% endfor %}
        }
    "skills":{
        {% for skill in character.skills %}
       "{{skill.skill}}": "{{skill.value}}"
        {% endfor %}
        }

}