 // Gráfico de Clientes Novos
 const clientesCtx = document.getElementById('clientesChart').getContext('2d');
 const clientesChart = new Chart(clientesCtx, {
   type: 'bar',
   data: {
     labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
     datasets: [{
       label: 'Clientes Novos',
       data: [12, 19, 3, 5, 2, 3, 7, 14, 9, 10, 11, 6],
       backgroundColor: 'rgba(75, 192, 192, 0.2)',
       borderColor: 'rgba(75, 192, 192, 1)',
       borderWidth: 1
     }]
   },
   options: {
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });

 // Gráfico de Consultas no Mês
 const consultasCtx = document.getElementById('consultasChart').getContext('2d');
 const consultasChart = new Chart(consultasCtx, {
   type: 'line',
   data: {
     labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
     datasets: [{
       label: 'Consultas Realizadas',
       data: [20, 30, 50, 60, 45, 80, 70, 65, 90, 100, 110, 95],
       backgroundColor: 'rgba(54, 162, 235, 0.2)',
       borderColor: 'rgba(54, 162, 235, 1)',
       borderWidth: 2,
       fill: true
     }]
   },
   options: {
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 });
