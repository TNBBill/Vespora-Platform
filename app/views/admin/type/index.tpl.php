{% extends admin/base %}

{% block content %}
<h1>Type Admin</h1>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>System</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% for type in types %}
            <tr>
                <td>{{type.name}}</td>
                <td>{{type.system}}</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}