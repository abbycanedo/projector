<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>The Projector | {% block title %}{% endblock %}</title>
		<link rel='stylesheet' href='../public/projector.css'>
		{% block style %}{% endblock %}
	</head>
	<body>
		{% include 'templates/partials/messages.php' %}
		{% block content %}{% endblock %}
	</body>
</html>