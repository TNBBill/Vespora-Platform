<html>
    <head>
        <title>{% block title %}TEST{% endblock %} | Vespora Platform</title>
        {% block css %}
            {% for file in css %}
                <link rel="stylesheet" type="text/css" href="{{file}}" />
            {% endfor %}
        {% endblock %}
        {% block js %}
            {% for file in js %}
                <script LANGUAGE="JavaScript" SRC="{{file}}"> </script>
            {% endfor %}
        {% endblock %}
    </head>
    <body>
    {% block flash %}
        {% if exists flashMessage %}
            Flash: {{flashMessage }}
        {% endif %}
    {% endblock %}
    {% block content %}{% endblock %}
    </body>
</html>