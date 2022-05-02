@extends('user.layout.index')

@section('title')

    
DASHBOARD

@endsection
@section('styles')
<style>
    blink {
        animation: blinker 2s linear infinite;
    }
    @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
  </style>   
@endsection


@section('contents')

@endsection
@section('scripts')
    <script src="{{ url('chart/Chart.min.js') }}"></script>
    <script>

        new Chart(document.getElementById("pie-chart"), {

            type: 'pie',

            data: {

                labels: [
                    // "Direct Income({{Auth::user()->directIncome->sum('price')}})", 
                    // "Direct Team Income({{Auth::user()->directTeamIncome->sum('price')}})", 
                    // "Upline Income({{Auth::user()->uplineIncome->sum('price')}})", 
                    // "Downline Income({{Auth::user()->downlineIncome->sum('price')}})", 
                    // "Upline Placement Income({{Auth::user()->uplinePlacementIncome->sum('price')}})", 
                    // "Downline Placement Income({{Auth::user()->downlinePlacementIncome->sum('price')}})",
                    // "Trade Income({{Auth::user()->tradeIncome->sum('price')}})",
                    // "Ranking Income({{Auth::user()->rankingIncome->sum('price')}})",
                    // "Associated Income({{Auth::user()->associatedIncome->sum('price')}})"
                    ],

                datasets: [{

                    label: "Earning",

                    backgroundColor: ["#990099","#109618","#ff9900", "#dc3912", "#3366cc","#33C4FF","#0C3343","#EC7063","#49BA98"],

                    data: [
                        // '{{Auth::user()->directIncome->sum('price')}}',
                        // '{{Auth::user()->directTeamIncome->sum('price')}}',
                        // '{{Auth::user()->uplineIncome->sum('price')}}',
                        // '{{Auth::user()->downlineIncome->sum('price')}}',
                        // '{{Auth::user()->uplinePlacementIncome->sum('price')}}',
                        // '{{Auth::user()->downlinePlacementIncome->sum('price')}}',
                        // '{{Auth::user()->tradeIncome->sum('price')}}',
                        // '{{Auth::user()->rankingIncome->sum('price')}}',
                        // '{{Auth::user()->associatedIncome->sum('price')}}'
                    ],

                }]
            },

            options: {

                title: {

                    display: true,

                    text: 'Total Income'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
    <script>

        new Chart(document.getElementById("withdraw-chart"), {

            type: 'pie',

            data: {

                labels: ["Total Withdraw", "Withdraw Completed", "Withdraw Onhold", "Withdraw In Process", "Withdraw Rejected"],

                datasets: [{

                    label: "Packages",

                    backgroundColor: ["#ABB2B9","#7FB3D5","#C39BD3", "#EC7063", "#3366cc","#33C4FF","#0C3343"],

                    data: [
                        // '{{Auth::user()->totalWithdraw()}}',
                        // '{{Auth::user()->completedWithdraw()}}',
                        // '{{Auth::user()->onHoldWithdraw()}}',
                        // '{{Auth::user()->inProcessWithdraw()}}',
                        // '{{Auth::user()->rejectedWithdraw()}}'
                    ],

                }]
            },

            options: {

                title: {

                    display: true,

                    text: 'Withdraw'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
@endsection
