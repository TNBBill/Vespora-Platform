<html>
    <head>
        <title>Admin | {% block title %}TEST{% endblock %} | Vespora</title>
        {% block css %}

        {% endblock %}
        {% block js %}

        {% endblock %}
    </head>
    <body>
    {% block flash %}
        {% if exists flashMessage %}
            Flash: {{flashMessage }}
        {% endif %}
    {% endblock %}
    <br />
    {% block menu %}
        <a href='/admin/type'>Type</a>

    {% endblock %}
    {% block content %}{% endblock %}
    </body>
</html>