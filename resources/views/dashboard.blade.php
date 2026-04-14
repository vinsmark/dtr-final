<x-layouts::new :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        <div>
            <h1 class="text-xl font-bold text-[#180C04]">Workforce Overview</h1>
            <p class="text-xs text-[#A89070] mt-0.5">Real-time summary — New Asia Oil Incorporated</p>
        </div>


        <div class="grid gap-4 md:grid-cols-3">

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">Total Employees</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">248</p>
                        <p class="mt-1 text-[11px] font-medium text-[#4A7A28]">
                            <i class="fa-solid fa-arrow-trend-up mr-1"></i> +4 hired this month
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEF5E4] text-[#4A7A28]">
                        <i class="fa-solid fa-users text-base"></i>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">Present Today</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">213</p>
                        <p class="mt-1 text-[11px] font-medium text-[#A89070]">
                            <i class="fa-solid fa-circle-check mr-1 text-[#4A7A28]"></i> 85.9% attendance rate
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEF5E4] text-[#4A7A28]">
                        <i class="fa-solid fa-calendar-check text-base"></i>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">On Leave</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">21</p>
                        <p class="mt-1 text-[11px] font-medium text-[#C8823A]">
                            <i class="fa-solid fa-clock mr-1"></i> 5 pending approval
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FBF0E2] text-[#C8823A]">
                        <i class="fa-solid fa-umbrella-beach text-base"></i>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">Open Positions</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">12</p>
                        <p class="mt-1 text-[11px] font-medium text-red-500">
                            <i class="fa-solid fa-triangle-exclamation mr-1"></i> 3 urgent vacancies
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FEF2F2] text-red-500">
                        <i class="fa-solid fa-briefcase text-base"></i>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">Payroll (Apr)</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">₱2.4M</p>
                        <p class="mt-1 text-[11px] font-medium text-[#A89070]">
                            <i class="fa-solid fa-circle-check mr-1 text-[#4A7A28]"></i> Processed — Apr 5
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EEF5E4] text-[#4A7A28]">
                        <i class="fa-solid fa-peso-sign text-base"></i>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-[#D4C4A8] bg-white px-5 py-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#A89070]">Contracts Expiring</p>
                        <p class="mt-1.5 text-3xl font-semibold text-[#180C04]">3</p>
                        <p class="mt-1 text-[11px] font-medium text-[#C8823A]">
                            <i class="fa-solid fa-hourglass-half mr-1"></i> Within the next 30 days
                        </p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FBF0E2] text-[#C8823A]">
                        <i class="fa-solid fa-file-contract text-base"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="relative flex-1 overflow-hidden rounded-xl border border-[#D4C4A8] bg-white">

            <div
                class="flex flex-col gap-3 border-b border-[#EDE5D8] bg-[#FAF7F2] px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-sm font-bold text-[#180C04]">Employee Directory</h2>
                    <p class="text-[11px] text-[#A89070]">Showing 10 of 248 employees</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-[#A89070]"></i>
                        <input type="text" placeholder="Search employee..."
                            class="h-8 w-48 rounded-lg border border-[#D4C4A8] bg-white pl-9 pr-3 text-xs text-[#180C04] placeholder-[#C4B49A] outline-none focus:border-[#4A7A28] focus:ring-1 focus:ring-[#4A7A28]/20 transition-all" />
                    </div>
                    <select
                        class="h-8 rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs text-[#5A3A1A] outline-none focus:border-[#4A7A28] transition-all">
                        <option>All Departments</option>
                        <option>Operations</option>
                        <option>Finance</option>
                        <option>HR</option>
                        <option>Logistics</option>
                        <option>Engineering</option>
                    </select>
                    <button
                        class="flex h-8 items-center gap-1.5 rounded-lg bg-[#4A7A28] px-3 text-xs font-semibold text-white hover:bg-[#3A6A18] transition-all">
                        <i class="fa-solid fa-plus text-[10px]"></i> Add Employee
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-[#EDE5D8] bg-[#FAF7F2]">
                            <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">
                                Employee</th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">
                                Employee ID</th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">
                                Department</th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">
                                Position</th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">Date
                                Hired</th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">Status
                            </th>
                            <th class="px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#A89070]">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#EEF5E4] text-[10px] font-bold text-[#2E5A12]">
                                        MR</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Maria Reyes</p>
                                        <p class="text-[10px] text-[#A89070]">maria.reyes@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00124</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Operations</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Operations Supervisor</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Apr 1, 2025</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#FBF0E2] text-[10px] font-bold text-[#9A5E1A]">
                                        JD</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">James Dela Cruz</p>
                                        <p class="text-[10px] text-[#A89070]">j.delacruz@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00118</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Finance</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Finance Analyst</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Mar 15, 2025</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#FBF0E2] px-2.5 py-1 text-[10px] font-bold text-[#9A5E1A]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#C8823A]"></span> Probation
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#F5EFE8] text-[10px] font-bold text-[#6B3C1A]">
                                        AS</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Ana Santos</p>
                                        <p class="text-[10px] text-[#A89070]">ana.santos@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00105</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">HR</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">HR Specialist</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Feb 28, 2025</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#F0EDF8] text-[10px] font-bold text-[#4A2A8A]">
                                        BT</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Ben Torres</p>
                                        <p class="text-[10px] text-[#A89070]">ben.torres@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00098</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Logistics</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Logistics Coordinator</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Feb 10, 2025</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#E6EFFA] px-2.5 py-1 text-[10px] font-bold text-[#1A4D8A]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#3B82F6]"></span> On Leave
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#FEF2F2] text-[10px] font-bold text-[#9A1A1A]">
                                        CL</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Carmen Lim</p>
                                        <p class="text-[10px] text-[#A89070]">carmen.lim@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00089</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Finance</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Senior Accountant</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Jan 6, 2025</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#EEF5E4] text-[10px] font-bold text-[#2E5A12]">
                                        RP</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Rolando Pascual</p>
                                        <p class="text-[10px] text-[#A89070]">r.pascual@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00076</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Operations</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Copra Procurement Officer</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Nov 12, 2024</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#FBF0E2] text-[10px] font-bold text-[#9A5E1A]">
                                        LC</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Liza Cruz</p>
                                        <p class="text-[10px] text-[#A89070]">liza.cruz@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00065</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">HR</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Recruitment Officer</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Sep 3, 2024</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#FBF0E2] px-2.5 py-1 text-[10px] font-bold text-[#9A5E1A]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#C8823A]"></span> Probation
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#F5EFE8] text-[10px] font-bold text-[#6B3C1A]">
                                        DM</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Diego Mendoza</p>
                                        <p class="text-[10px] text-[#A89070]">d.mendoza@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00054</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Logistics</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Warehouse Supervisor</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Jul 21, 2024</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-[#F5EFE8] hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#EEF5E4] text-[10px] font-bold text-[#2E5A12]">
                                        NV</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Nora Villanueva</p>
                                        <p class="text-[10px] text-[#A89070]">nora.v@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00041</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Operations</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Quality Control Analyst</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Apr 14, 2024</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#EEF5E4] px-2.5 py-1 text-[10px] font-bold text-[#2E5A12]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#4A7A28]"></span> Active
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-[#FAF7F2] transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-[#FEF2F2] text-[10px] font-bold text-[#9A1A1A]">
                                        EG</div>
                                    <div>
                                        <p class="text-xs font-semibold text-[#180C04]">Eduardo Garcia</p>
                                        <p class="text-[10px] text-[#A89070]">e.garcia@newasiaOil.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">NAO-00033</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Finance</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Payroll Officer</td>
                            <td class="px-4 py-3 text-xs text-[#5A3A1A]">Jan 8, 2024</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-[#F5F0F0] px-2.5 py-1 text-[10px] font-bold text-[#7A3A3A]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#C85A5A]"></span> Inactive
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <button class="text-[11px] font-medium text-[#4A7A28] hover:underline">View</button>
                                    <span class="text-[#D4C4A8]">|</span>
                                    <button class="text-[11px] font-medium text-[#C8823A] hover:underline">Edit</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between border-t border-[#EDE5D8] bg-[#FAF7F2] px-6 py-3">
                <p class="text-[11px] text-[#A89070]">Showing <span class="font-semibold text-[#5A3A1A]">1–10</span> of
                    <span class="font-semibold text-[#5A3A1A]">248</span> employees
                </p>
                <div class="flex items-center gap-1">
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg border border-[#D4C4A8] bg-white text-[11px] text-[#A89070] hover:border-[#4A7A28] hover:text-[#4A7A28] transition-all">
                        <i class="fa-solid fa-chevron-left text-[9px]"></i>
                    </button>
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#4A7A28] text-[11px] font-bold text-white">1</button>
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg border border-[#D4C4A8] bg-white text-[11px] text-[#5A3A1A] hover:border-[#4A7A28] hover:text-[#4A7A28] transition-all">2</button>
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg border border-[#D4C4A8] bg-white text-[11px] text-[#5A3A1A] hover:border-[#4A7A28] hover:text-[#4A7A28] transition-all">3</button>
                    <span class="px-1 text-[11px] text-[#A89070]">...</span>
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg border border-[#D4C4A8] bg-white text-[11px] text-[#5A3A1A] hover:border-[#4A7A28] hover:text-[#4A7A28] transition-all">25</button>
                    <button
                        class="flex h-7 w-7 items-center justify-center rounded-lg border border-[#D4C4A8] bg-white text-[11px] text-[#A89070] hover:border-[#4A7A28] hover:text-[#4A7A28] transition-all">
                        <i class="fa-solid fa-chevron-right text-[9px]"></i>
                    </button>
                </div>
            </div>

        </div>

    </div>
</x-layouts::new>