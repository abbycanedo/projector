{% extends 'header.html' %}

{% block body %}
	<div class="main_content">
		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}">Dashboard</a>
					</li>
					<li>
						<a href="projects" class="on">Create Project</a>
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
			<form class="projects">
				<section class="left">
					<label>Project Code</label>
					<input type="text"/>
					<label>Project Name</label>
					<input type="text"/>
					<label>Budget</label>
					<input type="number"/>
				</section>
				<section class="right">
					<label>Remarks</label>
					<textarea rows="10"></textarea>
				</section>
			</form>
			<button type="submit">Save</Button>
		</div>
	</div>
{% endblock %}
