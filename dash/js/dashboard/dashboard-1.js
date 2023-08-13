(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	
	var widgetChart1 = function(){
		if(jQuery('#widgetChart1').length > 0 ){
			const chart_widget_1 = document.getElementById("widgetChart1").getContext('2d');
			new Chart(chart_widget_1, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May"],

					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(237, 11, 76, 0.1)'],
						borderColor: '#ed0b31',
						pointBackgroundColor: '#ed0b31',
						pointBorderColor: '#ed0b31',
						borderWidth:4,
						borderRadius:10,
						pointHoverBackgroundColor: '#ed0b31',
						pointHoverBorderColor: '#ed0b31',
						
						data: [0, 4, 2, 5, 6]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var widgetChart4 = function(){
		if(jQuery('#widgetChart4').length > 0 ){
			const chart_widget_1 = document.getElementById("widgetChart4").getContext('2d');
			new Chart(chart_widget_1, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May"],

					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(237, 11, 76, 0)'],
						borderColor: '#ed0b31',
						pointBackgroundColor: '#ed0b31',
						pointBorderColor: '#ed0b31',
						borderWidth:2,
						borderRadius:10,
						pointHoverBackgroundColor: '#ed0b31',
						pointHoverBorderColor: '#ed0b31',
						
						data: [0, 4, 2, 5, 6]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						line: {
							tension: .15,
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var chartBar = function(){
		if(jQuery('#widgetChart2').length > 0 ){
	
			const widgetChart2 = document.getElementById("widgetChart2").getContext('2d');
			//generate gradient
			

			// widgetChart1.attr('height', '100');

			new Chart(widgetChart2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
					datasets: [
						{
							label: "My First dataset",
							data: [15, 40, 55, 40, 25, 35, 40, 50, 85, 95, 54, 35,15, 40, 55, 40, 25, 35, 40, 50],
							borderColor: '#ed0b31',
							borderWidth: "0",
							backgroundColor: ['#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33','#ed0b31','#970b33',], 
							hoverBackgroundColor: '#ed0b31'
						}
					]
				},
				options: {
					legend: false,
					responsive: true, 
					maintainAspectRatio: false,  
					scales: {
						yAxes: [{
							display: false, 
							ticks: {
								beginAtZero: true, 
								display: false, 
								max: 100, 
								min: 0, 
								stepSize: 10
							}, 
							gridLines: {
								display: false, 
								drawBorder: false
							}
						}],
						xAxes: [{
							display: false, 
							barPercentage: 0.4, 
							gridLines: {
								display: false, 
								drawBorder: false
							}, 
							ticks: {
								display: false
							}
						}]
					}
				}
			});

		}
		
		
	}

	var lineChart2 = function(){
		
		if(jQuery('#lineChart_2').length > 0 ){


		//basic line chart
			const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(237, 11, 76, 1)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 0;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});
			
			lineChart_2.height = 100;

			new Chart(lineChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgba(237, 11, 76, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'transparent',
							pointBorderColor:'transparent',
							pointHoverBackgroundColor:'rgba(19,180,151,1)',
							pointBorderWidth:30,
							pointHoverRadius: 10,
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							color: "rgba(255, 255, 255,1)",
							ticks: {
								beginAtZero: true, 
								max: 100, 
								min: 0, 
								stepSize: 20, 
								padding: 10								
							},
							gridLines: {
								color: "rgba(255, 255, 255,0.05)",
								drawBorder: true
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5
							},
							gridLines: {
								color: "rgba(255, 255, 255,0.05)",
								drawBorder: true
							}
						}]
					}
				}
			});
			
		}
	}

	
	var lineChart4 = function(){
		//dual line chart
		if(jQuery('#lineChart_4').length > 0 ){
			const lineChart_4 = document.getElementById("lineChart_4").getContext('2d');
			//generate gradient
			const lineChart_4gradientStroke1 = lineChart_4.createLinearGradient(500, 0, 100, 0);
			lineChart_4gradientStroke1.addColorStop(0, "rgba(237, 11, 76, 1)");
			lineChart_4gradientStroke1.addColorStop(1, "rgba(237, 11, 76, 1)");

			const lineChart_4gradientStroke2 = lineChart_4.createLinearGradient(500, 0, 100, 0);
			lineChart_4gradientStroke2.addColorStop(0, "rgba(217, 183, 95, 1)");
			lineChart_4gradientStroke2.addColorStop(1, "rgba(217, 183, 95, 1)");

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(237, 11, 76, .8)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 0;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});
				
			lineChart_4.height = 100;

			new Chart(lineChart_4, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [0, 20, 60, 62, 50, 45, 65],
							borderColor: 'rgba(237, 11, 76, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent', 
							pointBackgroundColor: 'rgba(54, 201, 95, 0.5)'
						}, {
							label: "My First dataset",
							data: [30, 20, 20, 20, 35, 65, 45],
							borderColor: lineChart_4gradientStroke2,
							borderWidth: "2",
							backgroundColor: 'transparent', 
							pointBackgroundColor: 'rgba(254, 176, 25, 1)'
						}
					]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});
		}
	}
	/* Function ============ */
		return {
			init:function(){
				
			},
			
			
			load:function(){
				widgetChart1();
				widgetChart4();
				chartBar();
				doughnutChart();
				lineChart2();
				lineChart();
				lineChart4();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);