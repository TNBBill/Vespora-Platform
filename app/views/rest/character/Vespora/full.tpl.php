{
    "name": "{{character.name}}",
    "campaign": "{{character.campaign.name}}",
    "type": "{{character.type.name}}",
    "stats":{
        {% for stat in character.stats %}
        "{{stat.name}}": "{{stat.currentValue}}"
        {% endfor %}
        }
    "skills":{
            {% for skill in character.skills %}
            "skill":{
                "name": "{{skill.name}}",
                "value": "{{skill.currentValue}}",
                "attribute": "{{skill.stat}}"
            }
            {% endfor %}

    }

}