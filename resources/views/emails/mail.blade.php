@yield('css_lib')
@yield('js_lib')

@include('libs.bootstrap')

<div class="container-fluid">
  <h1 class="text-center">{{ $vote->titre }}</h1>
  <p>
    Nous vous informons que plus 60% des personnes conercé ont voté.
    Voici les resultat ci-dessous:
  </p>
  <h3 style="color:green;">
    Vote Pour: {{$for}}
  </h3>
  <h3 style="color:red;">
    Vote Contre: {{$against}}
  </h3>
  <h3>
    Vote Indirrent: {{$indifferent}}
  </h3>
  <h3>
    Pas encore voté: {{$total - $voted}}
  </h3>

</div>

<style>
.container-fluid {
  margin-left: 2em;
  margin-right: 2em;
}

.text-center {
  text-align: center;
}

</style>

<div class="cintainer-fluid">
  <div class="text-center">
    <h1>Vote It</h1>
  </div>
</div>
{{-- 
<script src="https://cdnjs.com/libraries/Chart.js"></script>
<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <canvas id="vote-results"></canvas>
    </div>
  </div>
</div>
@php
    $not_voted = $total - $voted;
    $datas = "[ $for, $against, $indifferent, $not_voted ]";
@endphp

<script>
  function charResult() {
  var ctx = document.getElementById('vote-results').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Pour', 'Contre', 'Indiffrent', 'Pas de vote'],
      datasets: [{
        label: '# of Votes',
        data: {{$datas}},
        backgroundColor: [
          '#0275d8',
          '#d9534f',
          '#f0ad4e',
          'grey',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
        ],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true
    }
  });

  charResult();
    
  }
</script> --}}