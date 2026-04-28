<div class="admin-shell min-h-screen bg-slate-50 lg:flex">
    <x-admin.sidebar />

    <main class="flex-1">
        <!-- Premium Header -->
        <header class="sticky top-0 z-40 border-b border-slate-200/60 bg-white/80 backdrop-blur-md px-4 py-4 lg:px-10 shrink-0">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight lg:text-3xl">Incoming <span class="text-indigo-600">Signals</span></h1>
                    <div class="flex items-center gap-2 mt-1 text-xs font-bold text-slate-500 uppercase tracking-widest">
                        <span>Admin</span>
                        <i class="fas fa-chevron-right text-[8px]"></i>
                        <span class="text-indigo-500">Enquiry Nexus</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">Live Stream</span>
                    </div>
                </div>
            </div>
        </header>

        <section class="p-4 lg:p-10">
            <div class="mx-auto max-w-7xl space-y-10">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">{{ ucfirst($type) }} <span class="text-indigo-600">Comms</span></h2>
                        <p class="mt-2 text-slate-500 font-medium">Capture and process direct customer communications and service requests.</p>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/50 p-4 flex items-center gap-3 text-sm font-bold text-emerald-700 shadow-sm">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Enquiries Table -->
                <div class="rounded-[2.5rem] border border-slate-200 bg-white p-6 lg:p-10 shadow-2xl shadow-slate-200/50">
                    <div class="overflow-hidden rounded-3xl border border-slate-100 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-100 text-sm">
                            <thead class="bg-slate-50/80 backdrop-blur-sm">
                                <tr>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Priority & Status</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Originator</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Intelligence Snippet</th>
                                    <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-widest text-slate-500">Transmission</th>
                                    <th class="px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-500">Nexus Command</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($enquiries as $enquiry)
                                    <tr class="group hover:bg-slate-50/50 transition-all {{ $enquiry->status === 'unread' ? 'bg-indigo-50/30' : '' }}">
                                        <td class="px-6 py-6">
                                            @if($enquiry->status === 'unread')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-indigo-600 text-white shadow-lg shadow-indigo-100">
                                                    <span class="w-1 h-1 rounded-full bg-white animate-ping"></span> Urgent
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-slate-100 text-slate-400">
                                                    Processed
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="font-black text-slate-900 tracking-tight text-base">{{ $enquiry->name }}</span>
                                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $enquiry->email }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 max-w-md">
                                            <div class="flex flex-col gap-1.5">
                                                @if($enquiry->subject)
                                                    <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">{{ $enquiry->subject }}</span>
                                                @endif
                                                <p class="text-sm font-medium text-slate-500 line-clamp-2 leading-relaxed italic">"{{ $enquiry->message }}"</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6">
                                            <div class="flex flex-col">
                                                <span class="text-xs font-bold text-slate-800">{{ $enquiry->created_at->format('d M, Y') }}</span>
                                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest mt-1">{{ $enquiry->created_at->format('h:i A') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-6 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                @if($enquiry->status === 'unread')
                                                    <button wire:click="markAsRead({{ $enquiry->id }})" class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-indigo-500 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all shadow-sm" title="Mark as Processed">
                                                        <i class="fas fa-check-double text-xs"></i>
                                                    </button>
                                                @endif
                                                <button onclick="confirm('Relinquish this communication record?') || event.stopImmediatePropagation()" wire:click="delete({{ $enquiry->id }})" class="h-10 w-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-rose-400 hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all shadow-sm" title="Delete Signal">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-24 text-center">
                                            <div class="flex flex-col items-center gap-4">
                                                <div class="h-20 w-20 rounded-[2.5rem] bg-slate-50 flex items-center justify-center text-slate-100 text-5xl">
                                                    <i class="fas fa-envelope-open-text"></i>
                                                </div>
                                                <p class="text-slate-300 font-black uppercase tracking-[0.4em] text-[10px]">Zero Incoming Signals</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($enquiries->hasPages())
                        <div class="mt-10">
                            {{ $enquiries->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <footer class="py-10 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.9em]">Communication Intelligence • Signal Core</p>
        </footer>
    </main>
</div>
