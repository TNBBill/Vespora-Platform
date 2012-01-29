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
        {% block rest %}
            {% if exists restKey %}
                 <script LANGUAGE="JavaScript">var restkey='{{restKey}}'; </script>

            {% endif %}
        {% endblock %}
        <script type="text/javascript">

            $(document).ready(function(){
                var output = $(window).width();
                $('#docWidth').html('Document Width: '+ output + 'px');

                $(window).resize(function(){
                    output = $(window).width();
                    $('#docWidth').html('Document Width: ' + output + 'px');
                });

            });
        </script>
    </head>
    <body>

    <div class="marker container_16">
        {% block flash %}
            {% if exists flashMessage %}

            <div id='Flash' class='flash grid_12'>Flash: {{flashMessage }}</div>

            {% endif %}
        {% endblock %}
        {% block content %}{% endblock %}
    </div>


    </body>
</html>