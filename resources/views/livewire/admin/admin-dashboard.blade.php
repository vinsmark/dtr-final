<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    <div class="mb-8">
        <h1 class="text-2xl font-black uppercase tracking-tighter text-[#180C04]">Admin Dashboard</h1>
        <p class="text-xs font-bold text-[#A89070] uppercase">Overview of HR & Payroll Operations</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8] shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-[#F5EFE8] rounded-lg"><i class="fa-solid fa-users text-[#4A7A28]"></i></div>
                <span class="text-[10px] font-black text-green-600 bg-green-100 px-2 py-0.5 rounded-full">ACTIVE</span>
            </div>
            <h3 class="text-2xl font-black text-[#180C04]">{{ $activeEmployees }}</h3>
            <p class="text-[10px] font-bold text-[#A89070] uppercase">Total Employees</p>
        </div>

        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8] shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-[#F5EFE8] rounded-lg"><i class="fa-solid fa-calendar-day text-[#A89070]"></i></div>
                <span class="text-[10px] font-black text-orange-600 bg-orange-100 px-2 py-0.5 rounded-full">ACTION
                    REQUIRED</span>
            </div>
            <h3 class="text-2xl font-black text-[#180C04]">{{ $pendingLeaves }}</h3>
            <p class="text-[10px] font-bold text-[#A89070] uppercase">Pending Leaves</p>
        </div>

        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8] shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-[#F5EFE8] rounded-lg"><i class="fa-solid fa-clock text-[#A89070]"></i></div>
            </div>
            <h3 class="text-2xl font-black text-[#180C04]">{{ $pendingOT }}</h3>
            <p class="text-[10px] font-bold text-[#A89070] uppercase">OT Requests</p>
        </div>

        <div class="bg-[#180C04] p-6 rounded-xl shadow-lg">
            <div class="flex justify-between items-start mb-4">
                <div class="p-2 bg-white/10 rounded-lg"><i class="fa-solid fa-money-bill-wave text-[#8AB85A]"></i></div>
            </div>
            <h3 class="text-2xl font-black text-white">₱{{ number_format($totalPayroll / 1000, 1) }}k</h3>
            <p class="text-[10px] font-bold text-white/40 uppercase">Total Paid (MTD)</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8]">
            <h3 class="font-black text-xs uppercase mb-6 text-[#180C04]">Salary Expenditure Trend</h3>
            <div id="salaryChart"></div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8]">
            <h3 class="font-black text-xs uppercase mb-6 text-[#180C04]">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('employees') }}"
                    class="p-4 bg-[#F5EFE8] rounded-lg hover:bg-[#D4C4A8] transition-all group">
                    <i class="fa-solid fa-user-plus text-[#4A7A28] mb-2"></i>
                    <p class="text-[10px] font-black uppercase text-[#180C04]">Add Employee</p>
                </a>
                <a href="{{ route('payroll') }}"
                    class="p-4 bg-[#F5EFE8] rounded-lg hover:bg-[#D4C4A8] transition-all group">
                    <i class="fa-solid fa-file-invoice-dollar text-[#4A7A28] mb-2"></i>
                    <p class="text-[10px] font-black uppercase text-[#180C04]">Run Payroll</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: { type: 'area', height: 250, toolbar: {show: false}, zoom: {enabled: false} },
        series: [{ name: 'Salary', data: [30, 40, 35, 50, 49, 60] }],
        colors: ['#4A7A28'],
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1 } },
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], labels: {style: {fontSize: '9px', fontWeight: 900}} }
    };
    var chart = new ApexCharts(document.querySelector("#salaryChart"), options);
    chart.render();
</script>