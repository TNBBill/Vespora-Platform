{% extends main/base %}

{% block content %}
<div class='grid_16'>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Campaign</th>
                <th>Campaign Type</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        {% for char in characters %}
            <tr>
                <td>{{char.name}}</td>
                <td>{{char.campaign.name}}</td>
                <td>{{char.type.name}}</td>
                <td><a href='/character/view/{{char.id}}'>View Character</a></td>
            </tr>
        {% empty %}
           <tr>
               <td colspan="4">:'( you have no characters....</td>
           </tr>

        {% endfor %}
        </tbody>
    </table>
    <a href='/character/add'>Add a Character</a>
</div>
{% endblock %}