<html>
    <head>
        <title>{% block title %}TEST{% endblock %} | Vespora Platform</title>
        {% block css %}
            {% for file in css %}
                <link rel="stylesheet" type="text/css" href="{{file}}" />
            {% endfor %}
        {% endblock %}
        <script LANGUAGE="JavaScript" SRC="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"> </script>

        {% block js %}
            {% for file in js %}
                <script LANGUAGE="JavaScript" SRC="{{file}}"> </script>
            {% endfor %}
        {% endblock %}

        <script LANGUAGE="JavaScript">
             //{% for varItem in jsVar %}

              var {{varItem.name}} = '{{varItem.value}}';
             //{% endfor %}

        </script>

        {% block pageJS %}
        {% endblock %}

    </head>
    <body class='{% block bodyclass %}{% endblock%}'>

    <div class="marker container_16">
        <div id='Menu' class='menu grid_16'>
            {% block menu %}
                <ul>
                    <li><a href='/character'>Your Characters</a></li>
                    <li><a href='/campaign'>Campaigns</a></li>
                    <li><a href='/user/login'>Login</a></li>
                    <li><a href='/user/logout'>Logout</a></li>
                </ul>
            {% endblock %}

        </div>

        {% block flash %}
            {% if exists flashMessage %}

            <div id='Flash' class='flash grid_12'>Flash: {{flashMessage }}</div>

            {% endif %}
        {% endblock %}
        {% block content %}{% endblock %}
    </div>


    </body>
</html>