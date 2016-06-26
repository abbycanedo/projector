<header>
	<h1>THE PROJECTOR</h1>
	{% if auth %}
		<p>Welcome, {{auth.firstname}}! </p>
	{% else %}
		<p>Error!</p>
	{% endif %}
</header>