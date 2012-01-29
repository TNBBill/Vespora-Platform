<html>
    <head>
        <title>Admin | {% block title %}TEST{% endblock %} | Vespora</title>
        {% block css %}

        {% endblock %}
        <script LANGUAGE="JavaScript" SRC="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"> </script>
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