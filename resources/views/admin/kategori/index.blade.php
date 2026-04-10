<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0f172a',
                        accent: '#6366f1'
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter min-h-screen bg-slate-100">

<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Kategori</h1>
        <p class="text-sm text-slate-500 mt-1">
            Kelola data kategori untuk sistem pengaduan sekolah
        </p>
    </div>

    <!-- Card Container -->
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-200 overflow-hidden">

        <!-- Top Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 border-b border-slate-100 bg-slate-50">

            <div>
                <h2 class="text-lg font-semibold text-slate-700">
                    Data Kategori
                </h2>
                <p class="text-xs text-slate-400 mt-1">
                    Total: {{ count($data) }} kategori
                </p>
            </div>

            <a href="{{ route('kategori.create') }}"
               class="mt-4 sm:mt-0 inline-flex items-center gap-2 px-5 py-2.5
                      rounded-full bg-accent text-white text-sm font-medium
                      hover:scale-105 hover:shadow-lg transition duration-300">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>

                Tambah Kategori
            </a>

        </div>

        <!-- Body -->
        <div class="p-6">

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="mb-6 px-5 py-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-slate-700">

                    <!-- Table Head -->
                    <thead>
                        <tr class="text-xs uppercase tracking-wider text-slate-400 border-b border-slate-100">
                            <th class="px-6 py-4 text-left">No</th>
                            <th class="px-6 py-4 text-left">Nama Kategori</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-slate-100">

                        @forelse($data as $item)
                        <tr class="hover:bg-slate-50 transition duration-200">

                            <td class="px-6 py-4 font-medium text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-slate-700">
                                {{ $item->nama_kategori }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                       class="px-4 py-1.5 rounded-full bg-amber-100 text-amber-600 text-xs font-semibold
                                              hover:bg-amber-200 transition duration-200">
                                        Edit
                                    </a>

                                    <form action="{{ route('kategori.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-1.5 rounded-full bg-red-100 text-red-600 text-xs font-semibold
                                                       hover:bg-red-200 transition duration-200">
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-16">

                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-6 w-6 text-slate-400"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M9 17v-6h13M9 7h13M5 6h.01M5 12h.01M5 18h.01"/>
                                        </svg>
                                    </div>
                                    <p class="text-slate-400 text-sm">
                                        Belum ada data kategori
                                    </p>
                                </div>

                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>