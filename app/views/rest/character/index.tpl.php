{
	{% for char in characters %}
	"character":{
		"id": "{{char.id}}",
		"name": "{{char.name}}",
		"campaign": "{{char.campaign.name}}",
		"type": "{{char.type.name}}",
		"edit": "/character/edit/{{char.id}}"
		}
	{% endfor %}

}
