<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> 
<canvas id="chart-area"></canvas>
@php
    //dd($role_users);
    $roles = "";
    $roles_numbers = "";
    foreach ($role_users as $key => $user_role) {
        $roles .= "'$user_role->role', ";
        $roles_numbers .=  " $user_role->nb_users, ";
    }
@endphp
<script>
var ctx = document.getElementById('chart-area').getContext('2d');
//doughnut chart
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data : {
        datasets: [{
            data: [{!! $roles_numbers !!}]
        }],
		backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
        ],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [{!! $roles !!}]
    },
    labels: [{!! $roles !!}],
    options: {
        responsive: true
    }
});

</script>