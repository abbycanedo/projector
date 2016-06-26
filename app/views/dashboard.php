{% extends 'templates/default.php' %}

{% block title %}
	Dashboard
{% endblock %}

{% block style %}
	<link rel='stylesheet' href='../public/body.css'>	
{% endblock %}

{% block content %}
	{% include '/templates/partials/header.php' %}
	<div class="main_content">
		<div class="sidebar">
			<nav>
				<ul>
					<li>
						<a href="{{ urlFor('dashboard') }}" class="on">Dashboard</a>
					</li>
					<li>
						<a href="{{ urlFor('projects') }}">Create Project</a>
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
			{% if projects is empty %}
				<p>No projects found.</p>
			{%else%}
				<table>
					<tr>
						<th>Project Code</th>
						<th>Project Name</th>
						<th class='num'>Project Budget</th>
						<th class='wide'>Project Remarks</th>
						<th></th>
					</tr>
					{% for project in projects %}
						<tr>
							<td>{{project.code}}</td>
							<td>{{project.name}}</td>
							<td class='num'>{{project.budget}}</td>
							<td class='wide'>{{project.remark}}</td>
							<td class="link">
								<a href="{{ urlFor('addMembers', {'projectId':project.id}) }}">
									Assignment
								</a>
							</td>
						</tr>
					{% endfor %}
				</table>
			{% endif %}
		</div>
	</div>
{% endblock %}