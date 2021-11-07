@extends('layouts.guest')
@section('content')
<div class="min-h-screen bg-gray-100 py-14">
  <header>
    <div class=" mx-auto px-6 py-3">
      <div class="relative max-w-lg mx-auto">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
          <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Cari Berdasarkan NISN...">
      </div>
    </div>
  </header>
  <section class=" py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
        <div class="rounded-t bg-white mb-0 px-6 py-6">
          <div class="text-center flex justify-between">
            <h6 class="text-blueGray-700 text-xl font-bold">
              Data Pendidikan
            </h6>
          </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
          <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            Data Siswa
          </h6>
          <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Nama Lengkap
                </label>
                <p class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">John</p>
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Nomor Induk Siswa Nasional
                </label>
                <p class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">1234567890</p>
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Kelas / Jurusan
                </label>
                <p class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">X MIA 4</p>
              </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
              <div class="relative w-full mb-3">
                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                  Sekolah
                </label>
                <p class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">SMAN 1 Krayan</p>
              </div>
            </div>
          </div>
          <hr class="mt-6 border-b-1 border-blueGray-300">
          <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            Statistik Pelajaran
          </h6>
          <div class="flex flex-wrap">
            <div class="w-full lg:w-12/12 px-4">
              <div class="md:flex md:justify-center md:space-x-8 md:px-14">
                <div id="course" style="width: 600px;height:600px;"></div>
              </div>
            </div>
          </div>
          <hr class="mt-6 border-b-1 border-blueGray-300">
          <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            Presentasi Kehadiran
          </h6>
          <div class="flex flex-wrap">
            <div class="w-full lg:w-12/12 px-4">
              <div class="md:flex md:justify-center md:space-x-8 md:px-14">
                <div id="present" style="width: 600px;height:600px;"></div>
              </div>
            </div>
          </div>
          <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            Statistik Nilai Persemester
          </h6>
          <div class="flex flex-wrap">
            <div class="w-full lg:w-12/12 px-4">
              <div class="md:flex md:justify-center md:space-x-8 md:px-14">
                <div id="grades" style="width: 600px;height:600px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
var myChart = echarts.init(document.getElementById('course'));

var option = {
  legend: {
    data: ['Mata Pelajaran 1', 'Mata Pelajaran 2']
  },
  radar: {

    indicator: [
      { name: 'Indikator 1', max: 6500 },
      { name: 'Indikator 2', max: 16000 },
      { name: 'Indikator 3', max: 30000 },
      { name: 'Indikator 4', max: 38000 },
      { name: 'Indikator 5', max: 52000 },
      { name: 'Indikator 6', max: 25000 }
    ]
  },
  series: [
    {
      name: 'Nilai Mapel Siswa',
      type: 'radar',
      data: [
        {
          value: [4200, 3000, 20000, 35000, 50000, 18000],
          name: 'Mata Pelajaran 1'
        },
        {
          value: [5000, 14000, 28000, 26000, 42000, 21000],
          name: 'Mata Pelajaran 2'
        }
      ]
    }
  ]
};
myChart.setOption(option);
</script>
<script type="text/javascript">
var myChart = echarts.init(document.getElementById('present'));

var option = {
  series: [
    {
      type: 'gauge',
      progress: {
        show: true,
        width: 18
      },
      axisLine: {
        lineStyle: {
          width: 18
        }
      },
      axisTick: {
        show: false
      },
      splitLine: {
        length: 15,
        lineStyle: {
          width: 2,
          color: '#999'
        }
      },
      axisLabel: {
        distance: 25,
        color: '#999',
        fontSize: 20
      },
      anchor: {
        show: true,
        showAbove: true,
        size: 25,
        itemStyle: {
          borderWidth: 10
        }
      },
      title: {
        show: false
      },
      detail: {
        valueAnimation: true,
        fontSize: 80,
        offsetCenter: [0, '70%']
      },
      data: [
        {
          value: 70
        }
      ]
    }
  ]
};
myChart.setOption(option);
</script>
<script type="text/javascript">
var myChart = echarts.init(document.getElementById('grades'));

var option = {
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['Mata Pelajaran 1', 'Mata Pelajaran 2', 'Mata Pelajaran 3', 'Mata Pelajaran 4', 'Mata Pelajaran 5']
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
    },
    toolbox: {
    },
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: ['2020-1', '2020-2', '2021-1', '2021-2', '2022-1', '2022-2']
    },
    yAxis: {
      type: 'value'
    },
    series: [
      {
        name: 'Mata Pelajaran 1',
        type: 'line',
        stack: 'Total',
        data: [120, 132, 101, 134, 90, 230, 210]
      },
      {
        name: 'Mata Pelajaran 2',
        type: 'line',
        stack: 'Total',
        data: [220, 182, 191, 234, 290, 330, 310]
      },
      {
        name: 'Mata Pelajaran 3',
        type: 'line',
        stack: 'Total',
        data: [150, 232, 201, 154, 190, 330, 410]
      },
      {
        name: 'Mata Pelajaran 4',
        type: 'line',
        stack: 'Total',
        data: [320, 332, 301, 334, 390, 330, 320]
      },
      {
        name: 'Mata Pelajaran 5',
        type: 'line',
        stack: 'Total',
        data: [820, 932, 901, 934, 1290, 1330, 1320]
      }
    ]
};
myChart.setOption(option);
</script>
@endsection
