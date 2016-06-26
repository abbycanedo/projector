{% extends 'templates/default.php' %}

{% block title %}
	Create Project
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../../public/projector.css'>
	<link rel='stylesheet' href='../../public/body.css'>
{% endblock %}

{% block content %}
	{% include '/templates/partials/header.php' %}
	<div class="main_content">
		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}">Dashboard</a>
					</li>
					<li>
						<a href="{{ urlFor('projects') }}" class="on">Create Project</a>
					</li>
					<li>
						<a href="{{ urlFor('register') }}">Create User</a>
					</li>
					<li>
						<a href="{{ urlFor('logout') }}">Sign Out</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="content">
			<h2>CREATE PROJECT</h2>
			<form class="projects" action="{{ urlFor('projects.post') }}" method="post" autocomplete="off">
				<section class="left">
					<label for='code'>Project Code</label>
					<input type="text" name="code" id="code"/>
					<label for='name'>Project Name</label>
					<input type="text" name="name" id="name"/>
					<label for='budget'>Budget</label>
					<input type="number" name="budget" id="budget"/>
				</section>
				<section class="right">
					<label for='remark'>Remarks</label>
					<textarea rows="10" name="remark" id="remark"></textarea>
				</section>
				<button class="bottom" type="submit" value="Add">Create Project</Button>				
			</form>
		</div>
	</div>
{% endblock %}