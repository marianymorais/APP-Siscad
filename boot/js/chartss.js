
	google.charts.load('current', {'packages':['bar']});
	google.charts.setOnLoadCallback(P2Chart);
	google.charts.setOnLoadCallback(TBChart);
	google.charts.setOnLoadCallback(ATChart);
	google.charts.setOnLoadCallback(POChart);
	google.charts.setOnLoadCallback(MAChart);

	function P2Chart() {
	var data = google.visualization.arrayToDataTable([
	  ['Nota', 'individual', 'Turma'],
	  ['P3', 7, 5.8,]
	]);

	var options = {
	  chart: {
	    title: 'Prova 2',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('P2'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
	}

	function TBChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Nota', 'individual', 'Turma'],
	  ['TB', 8.5, 6.45,]
	]);

	var options = {
	  chart: {
	    title: 'trabalho',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('TB'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
	}

	function ATChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Nota', 'individual', 'Turma'],
	  ['AT', 5, 4.8,]
	]);

	var options = {
	  chart: {
	    title: 'Trabalho em Sala',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('AT'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
	}

	function POChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Nota', 'individual', 'Turma'],
	  ['P0', 10, 10,]
	]);

	var options = {
	  chart: {
	    title: 'Prova Optativa',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('PO'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
	}
	function MAChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Nota', 'individual', 'Turma'],
	  ['MA', 8.2, 5.79,]
	]);

	var options = {
	  chart: {
	    title: 'Média',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('MA'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
	}